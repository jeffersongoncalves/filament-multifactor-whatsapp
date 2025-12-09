<?php

namespace JeffersonGoncalves\Filament\MultiFactorWhatsApp;

use Closure;
use Filament\Actions\Action;
use Filament\Auth\MultiFactor\Contracts\HasBeforeChallengeHook;
use Filament\Auth\MultiFactor\Contracts\MultiFactorAuthenticationProvider;
use Filament\Facades\Filament;
use Filament\Forms\Components\OneTimeCodeInput;
use Filament\Notifications\Notification;
use Filament\Schemas\Components\Actions;
use Filament\Schemas\Components\Text;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use JeffersonGoncalves\Filament\MultiFactorWhatsApp\Actions\DisableWhatsAppAuthenticationAction;
use JeffersonGoncalves\Filament\MultiFactorWhatsApp\Actions\SetUpWhatsAppAuthenticationAction;
use JeffersonGoncalves\Filament\MultiFactorWhatsApp\Contracts\HasWhatsAppAuthentication;
use JeffersonGoncalves\Filament\MultiFactorWhatsApp\Notifications\VerifyWhatsappAuthentication;
use LogicException;

class WhatsAppAuthentication implements HasBeforeChallengeHook, MultiFactorAuthenticationProvider
{
    protected int $codeExpiryMinutes = 4;

    protected string $codeNotification = VerifyWhatsappAuthentication::class;

    protected ?Closure $generateCodesUsing = null;

    public function getId(): string
    {
        return 'whatsapp_code';
    }

    public function codeExpiryMinutes(int $minutes): static
    {
        $this->codeExpiryMinutes = $minutes;

        return $this;
    }

    public function beforeChallenge(Authenticatable $user): void
    {
        if (! ($user instanceof HasWhatsAppAuthentication)) {
            throw new LogicException('The user model must implement the ['.HasWhatsAppAuthentication::class.'] interface to use whatsapp authentication.');
        }

        $this->sendCode($user);
    }

    public function sendCode(HasWhatsAppAuthentication $user): bool
    {
        if (! ($user instanceof Model)) {
            throw new LogicException('The ['.$user::class.'] class must be an instance of ['.Model::class.'] to use whatsapp authentication.');
        }

        if (! method_exists($user, 'notify')) {
            $userClass = $user::class;

            throw new LogicException("Model [{$userClass}] does not have a [notify()] method.");
        }

        $rateLimitingKey = "filament_whatsapp_authentication.{$user->getKey()}";

        if (RateLimiter::tooManyAttempts($rateLimitingKey, maxAttempts: 2)) {
            return false;
        }

        RateLimiter::hit($rateLimitingKey);

        $code = $this->generateCode();
        $codeExpiryMinutes = $this->getCodeExpiryMinutes();

        session()->put('filament_whatsapp_authentication_code', Hash::make($code));
        session()->put('filament_whatsapp_authentication_code_expires_at', now()->addMinutes($codeExpiryMinutes));

        $user->notify(app($this->getCodeNotification(), [
            'code' => $code,
            'codeExpiryMinutes' => $codeExpiryMinutes,
        ]));

        return true;
    }

    public function generateCode(): string
    {
        if ($this->generateCodesUsing) {
            return ($this->generateCodesUsing)();
        }

        return str_pad((string) random_int(0, 999999), 6, '0', STR_PAD_LEFT);
    }

    public function getCodeExpiryMinutes(): int
    {
        return $this->codeExpiryMinutes;
    }

    public static function make(): static
    {
        return app(static::class);
    }

    public function getCodeNotification(): string
    {
        return $this->codeNotification;
    }

    public function enableWhatsappAuthentication(HasWhatsAppAuthentication $user): void
    {
        $user->toggleWhatsappAuthentication(true);
    }

    public function generateCodesUsing(?Closure $callback): static
    {
        $this->generateCodesUsing = $callback;

        return $this;
    }

    public function getLoginFormLabel(): string
    {
        return __('filament-multifactor-whatsapp::provider.login_form.label');
    }

    public function getManagementSchemaComponents(): array
    {
        $user = Filament::auth()->user();

        return [
            Actions::make($this->getActions())
                ->label(__('filament-multifactor-whatsapp::provider.management_schema.actions.label'))
                ->belowContent(__('filament-multifactor-whatsapp::provider.management_schema.actions.below_content'))
                ->afterLabel(fn (): Text => $this->isEnabled($user)
                    ? Text::make(__('filament-multifactor-whatsapp::provider.management_schema.actions.messages.enabled'))
                        ->badge()
                        ->color('success')
                    : Text::make(__('filament-multifactor-whatsapp::provider.management_schema.actions.messages.disabled'))
                        ->badge()),
        ];
    }

    public function getActions(): array
    {
        $user = Filament::auth()->user();

        return [
            SetUpWhatsAppAuthenticationAction::make($this)
                ->hidden(fn (): bool => $this->isEnabled($user)),
            DisableWhatsAppAuthenticationAction::make($this)
                ->visible(fn (): bool => $this->isEnabled($user)),
        ];
    }

    public function isEnabled(Authenticatable $user): bool
    {
        if (! ($user instanceof HasWhatsAppAuthentication)) {
            throw new LogicException('The user model must implement the ['.HasWhatsAppAuthentication::class.'] interface to use whatsapp authentication.');
        }

        return $user->hasWhatsappAuthentication();
    }

    public function getChallengeFormComponents(Authenticatable $user): array
    {
        return [
            OneTimeCodeInput::make('code')
                ->label(__('filament-multifactor-whatsapp::provider.login_form.code.label'))
                ->validationAttribute('code')
                ->belowContent(Action::make('resend')
                    ->label(__('filament-multifactor-whatsapp::provider.login_form.code.actions.resend.label'))
                    ->link()
                    ->action(function () use ($user): void {
                        // @phpstan-ignore-next-line
                        if (! $this->sendCode($user)) {
                            Notification::make()
                                ->title(__('filament-multifactor-whatsapp::provider.login_form.code.actions.resend.notifications.throttled.title'))
                                ->danger()
                                ->send();

                            return;
                        }

                        Notification::make()
                            ->title(__('filament-multifactor-whatsapp::provider.login_form.code.actions.resend.notifications.resent.title'))
                            ->success()
                            ->send();
                    }))
                ->required()
                ->rule(function (): Closure {
                    return function (string $attribute, $value, Closure $fail): void {
                        if ($this->verifyCode($value)) {
                            return;
                        }

                        $fail(__('filament-multifactor-whatsapp::provider.login_form.code.messages.invalid'));
                    };
                }),
        ];
    }

    public function verifyCode(string $code): bool
    {
        $codeHash = session('filament_whatsapp_authentication_code');
        $codeExpiresAt = session('filament_whatsapp_authentication_code_expires_at');

        if (
            blank($codeHash)
            || blank($codeExpiresAt)
            || (! Hash::check($code, $codeHash))
            || now()->greaterThan($codeExpiresAt)
        ) {
            return false;
        }

        session()->forget('filament_whatsapp_authentication_code');
        session()->forget('filament_whatsapp_authentication_code_expires_at');

        return true;
    }

    public function codeNotification(string $notification): static
    {
        $this->codeNotification = $notification;

        return $this;
    }
}

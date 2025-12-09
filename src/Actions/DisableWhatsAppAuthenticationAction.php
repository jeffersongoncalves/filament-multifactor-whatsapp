<?php

namespace JeffersonGoncalves\Filament\MultiFactorWhatsApp\Actions;

use Closure;
use Filament\Actions\Action;
use Filament\Facades\Filament;
use Filament\Forms\Components\OneTimeCodeInput;
use Filament\Notifications\Notification;
use Filament\Support\Enums\Width;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Facades\DB;
use JeffersonGoncalves\Filament\MultiFactorWhatsApp\Contracts\HasWhatsAppAuthentication;
use JeffersonGoncalves\Filament\MultiFactorWhatsApp\WhatsAppAuthentication;

class DisableWhatsAppAuthenticationAction
{
    public static function make(WhatsAppAuthentication $whatsappAuthentication): Action
    {
        return Action::make('disableWhatsappAuthentication')
            ->label(__('filament-multifactor-whatsapp::actions/disable.label'))
            ->color('danger')
            ->icon(Heroicon::LockOpen)
            ->link()
            ->mountUsing(function () use ($whatsappAuthentication): void {
                /** @var HasWhatsAppAuthentication $user */
                $user = Filament::auth()->user();

                $whatsappAuthentication->sendCode($user);
            })
            ->modalWidth(Width::Medium)
            ->modalIcon(Heroicon::OutlinedLockOpen)
            ->modalHeading(__('filament-multifactor-whatsapp::actions/disable.modal.heading'))
            ->modalDescription(__('filament-multifactor-whatsapp::actions/disable.modal.description'))
            ->schema([
                OneTimeCodeInput::make('code')
                    ->label(__('filament-multifactor-whatsapp::actions/disable.modal.form.code.label'))
                    ->validationAttribute(__('filament-multifactor-whatsapp::actions/disable.modal.form.code.validation_attribute'))
                    ->belowContent(Action::make('resend')
                        ->label(__('filament-multifactor-whatsapp::actions/disable.modal.form.code.actions.resend.label'))
                        ->link()
                        ->action(function () use ($whatsappAuthentication): void {
                            /** @var HasWhatsAppAuthentication $user */
                            $user = Filament::auth()->user();

                            if (! $whatsappAuthentication->sendCode($user)) {
                                Notification::make()
                                    ->title(__('filament-multifactor-whatsapp::actions/disable.modal.form.code.actions.resend.notifications.throttled.title'))
                                    ->danger()
                                    ->send();

                                return;
                            }

                            Notification::make()
                                ->title(__('filament-multifactor-whatsapp::actions/disable.modal.form.code.actions.resend.notifications.resent.title'))
                                ->success()
                                ->send();
                        }))
                    ->required()
                    ->rule(function () use ($whatsappAuthentication): Closure {
                        return function (string $attribute, mixed $value, Closure $fail) use ($whatsappAuthentication): void {
                            if (is_string($value) && $whatsappAuthentication->verifyCode($value)) {
                                return;
                            }

                            $fail(__('filament-multifactor-whatsapp::actions/disable.modal.form.code.messages.invalid'));
                        };
                    }),
            ])
            ->modalSubmitAction(fn (Action $action) => $action
                ->label(__('filament-multifactor-whatsapp::actions/disable.modal.actions.submit.label')))
            ->action(function (): void {
                /** @var HasWhatsAppAuthentication $user */
                $user = Filament::auth()->user();

                DB::transaction(function () use ($user): void {
                    $user->toggleWhatsappAuthentication(false);
                });

                Notification::make()
                    ->title(__('filament-multifactor-whatsapp::actions/disable.notifications.disabled.title'))
                    ->success()
                    ->icon(Heroicon::OutlinedLockOpen)
                    ->send();
            })
            ->rateLimit(5);
    }
}

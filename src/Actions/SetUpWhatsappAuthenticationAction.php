<?php

namespace JeffersonGoncalves\Filament\MultiFactorWhatsapp\Actions;

use Closure;
use Filament\Actions\Action;
use Filament\Facades\Filament;
use Filament\Forms\Components\OneTimeCodeInput;
use Filament\Notifications\Notification;
use Filament\Support\Enums\Width;
use Filament\Support\Icons\Heroicon;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\DB;
use JeffersonGoncalves\Filament\MultiFactorWhatsapp\Contracts\HasWhatsappAuthentication;
use JeffersonGoncalves\Filament\MultiFactorWhatsapp\WhatsappAuthentication;

class SetUpWhatsappAuthenticationAction
{
    public static function make(WhatsappAuthentication $whatsappAuthentication): Action
    {
        return Action::make('setUpWhatsappAuthentication')
            ->label(__('filament-multifactor-whatsapp::actions/set-up.label'))
            ->color('primary')
            ->icon(Heroicon::LockClosed)
            ->link()
            ->mountUsing(function () use ($whatsappAuthentication): void {
                /** @var HasWhatsappAuthentication $user */
                $user = Filament::auth()->user();

                $whatsappAuthentication->sendCode($user);
            })
            ->modalWidth(Width::Large)
            ->modalIcon(Heroicon::OutlinedLockClosed)
            ->modalIconColor('primary')
            ->modalHeading(__('filament-multifactor-whatsapp::actions/set-up.modal.heading'))
            ->modalDescription(__('filament-multifactor-whatsapp::actions/set-up.modal.description'))
            ->schema([
                OneTimeCodeInput::make('code')
                    ->label(__('filament-multifactor-whatsapp::actions/set-up.modal.form.code.label'))
                    ->belowContent(Action::make('resend')
                        ->label(__('filament-multifactor-whatsapp::actions/set-up.modal.form.code.actions.resend.label'))
                        ->link()
                        ->action(function () use ($whatsappAuthentication): void {
                            /** @var HasWhatsappAuthentication $user */
                            $user = Filament::auth()->user();

                            if (! $whatsappAuthentication->sendCode($user)) {
                                Notification::make()
                                    ->title(__('filament-multifactor-whatsapp::actions/set-up.modal.form.code.actions.resend.notifications.throttled.title'))
                                    ->danger()
                                    ->send();

                                return;
                            }

                            Notification::make()
                                ->title(__('filament-multifactor-whatsapp::actions/set-up.modal.form.code.actions.resend.notifications.resent.title'))
                                ->success()
                                ->send();
                        }))
                    ->validationAttribute(__('filament-multifactor-whatsapp::actions/set-up.modal.form.code.validation_attribute'))
                    ->required()
                    ->rule(function () use ($whatsappAuthentication): Closure {
                        return function (string $attribute, $value, Closure $fail) use ($whatsappAuthentication): void {
                            if ($whatsappAuthentication->verifyCode($value)) {
                                return;
                            }

                            $fail(__('filament-multifactor-whatsapp::actions/set-up.modal.form.code.messages.invalid'));
                        };
                    }),
            ])
            ->modalSubmitAction(fn (Action $action) => $action
                ->label(__('filament-multifactor-whatsapp::actions/set-up.modal.actions.submit.label')))
            ->action(function (): void {
                /** @var Authenticatable&HasWhatsappAuthentication $user */
                $user = Filament::auth()->user();

                DB::transaction(function () use ($user): void {
                    $user->toggleWhatsappAuthentication(true);
                });

                Notification::make()
                    ->title(__('filament-multifactor-whatsapp::actions/set-up.notifications.enabled.title'))
                    ->success()
                    ->icon(Heroicon::OutlinedLockClosed)
                    ->send();
            })
            ->rateLimit(5);
    }
}

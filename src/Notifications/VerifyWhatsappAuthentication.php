<?php

namespace JeffersonGoncalves\Filament\MultiFactorWhatsapp\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use WallaceMartinss\FilamentEvolution\Enums\StatusConnectionEnum;
use WallaceMartinss\FilamentEvolution\Facades\Whatsapp;
use WallaceMartinss\FilamentEvolution\Models\WhatsappInstance;

class VerifyWhatsappAuthentication extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(
        public string $code,
        public int    $codeExpiryMinutes,
    )
    {
    }

    public function via(object $notifiable): string
    {
        return WhatsappChannel::class;
    }

    public function toWhatsapp(object $notifiable): array
    {
        $whatsappInstance = WhatsappInstance::query()->where('status', StatusConnectionEnum::CONNECTING->value)->first();
        if (!$whatsappInstance) {
            return [];
        }
        $message = trans_choice('filament-multifactor-whatsapp::notifications/verify-whatsapp-authentication.message.0', $this->codeExpiryMinutes, ['code' => $this->code, 'minutes' => $this->codeExpiryMinutes]) . '\n';
        $message .= trans_choice('filament-multifactor-whatsapp::notifications/verify-whatsapp-authentication.message.1', $this->codeExpiryMinutes, ['code' => $this->code, 'minutes' => $this->codeExpiryMinutes]);

        return Whatsapp::sendText($whatsappInstance->id, $notifiable->getAttribute(config('filament-multifactor-whatsapp.phone_column_name', 'phone')), $message);
    }
}

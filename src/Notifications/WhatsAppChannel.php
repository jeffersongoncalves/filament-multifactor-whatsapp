<?php

namespace JeffersonGoncalves\Filament\MultiFactorWhatsApp\Notifications;

use Illuminate\Notifications\Notification;

class WhatsAppChannel
{
    public function send(object $notifiable, Notification $notification): void
    {
        /** @var VerifyWhatsappAuthentication $notification */
        $notification->toWhatsapp($notifiable);
    }
}

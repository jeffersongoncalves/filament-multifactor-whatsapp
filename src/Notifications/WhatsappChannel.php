<?php

namespace JeffersonGoncalves\Filament\MultiFactorWhatsapp\Notifications;

use Illuminate\Notifications\Notification;

class WhatsappChannel
{
    public function send(object $notifiable, Notification $notification): void
    {
        $notification->toWhatsapp($notifiable);
    }
}

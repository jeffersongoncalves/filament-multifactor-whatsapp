<?php

namespace JeffersonGoncalves\Filament\MultiFactorWhatsapp\Notifications;

use Illuminate\Notifications\Notification;
use WallaceMartinss\FilamentEvolution\Enums\StatusConnectionEnum;
use WallaceMartinss\FilamentEvolution\Facades\Whatsapp;
use WallaceMartinss\FilamentEvolution\Models\WhatsappInstance;

class WhatsappChannel
{
    public function send(object $notifiable, Notification $notification): void
    {
        $notification->toWhatsapp($notifiable);
    }
}

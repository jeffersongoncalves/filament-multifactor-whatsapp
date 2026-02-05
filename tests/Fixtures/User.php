<?php

namespace JeffersonGoncalves\Filament\MultiFactorWhatsApp\Tests\Fixtures;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use JeffersonGoncalves\Filament\MultiFactorWhatsApp\Contracts\HasWhatsAppAuthentication;

class User extends Authenticatable implements HasWhatsAppAuthentication
{
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'has_whatsapp_authentication',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'has_whatsapp_authentication' => 'boolean',
        ];
    }

    public function hasWhatsAppAuthentication(): bool
    {
        return (bool) $this->has_whatsapp_authentication;
    }

    public function toggleWhatsAppAuthentication(bool $condition): void
    {
        $this->has_whatsapp_authentication = $condition;
        $this->save();
    }

    public function routeNotificationForWhatsApp(): ?string
    {
        return $this->phone;
    }
}

<?php

namespace JeffersonGoncalves\Filament\MultiFactorWhatsApp\Contracts;

interface HasWhatsAppAuthentication
{
    public function hasWhatsappAuthentication(): bool;

    public function toggleWhatsappAuthentication(bool $condition): void;
}

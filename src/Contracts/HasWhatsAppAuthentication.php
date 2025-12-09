<?php

namespace JeffersonGoncalves\Filament\MultiFactorWhatsApp\Contracts;

interface HasWhatsAppAuthentication
{
    public function hasWhatsAppAuthentication(): bool;

    public function toggleWhatsAppAuthentication(bool $condition): void;
}

<?php

namespace JeffersonGoncalves\Filament\MultiFactorWhatsapp\Contracts;

interface HasWhatsappAuthentication
{
    public function hasWhatsappAuthentication(): bool;

    public function toggleWhatsappAuthentication(bool $condition): void;
}

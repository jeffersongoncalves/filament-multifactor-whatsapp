<?php

namespace JeffersonGoncalves\Filament\MultiFactorWhatsapp;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class MultiFactorWhatsappServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('filament-multifactor-whatsapp');
    }
}

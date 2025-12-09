<?php

namespace JeffersonGoncalves\Filament\MultiFactorWhatsApp;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class MultiFactorWhatsAppServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('filament-multifactor-whatsapp')
            ->hasTranslations()
            ->hasConfigFile();
    }
}

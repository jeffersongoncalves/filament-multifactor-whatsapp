<?php

namespace JeffersonGoncalves\Filament\MultiFactorWhatsApp\Tests;

use Filament\FilamentServiceProvider;
use Filament\Support\SupportServiceProvider;
use JeffersonGoncalves\Filament\MultiFactorWhatsApp\MultiFactorWhatsAppServiceProvider;
use JeffersonGoncalves\Filament\MultiFactorWhatsApp\Tests\Fixtures\TestPanelProvider;
use Livewire\LivewireServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app): array
    {
        return [
            LivewireServiceProvider::class,
            SupportServiceProvider::class,
            FilamentServiceProvider::class,
            TestPanelProvider::class,
            MultiFactorWhatsAppServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app): void
    {
        config()->set('database.default', 'testing');
        config()->set('database.connections.testing', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);

        config()->set('app.key', 'base64:'.base64_encode(random_bytes(32)));

        config()->set('auth.providers.users.model', \JeffersonGoncalves\Filament\MultiFactorWhatsApp\Tests\Fixtures\User::class);
    }

    protected function defineDatabaseMigrations(): void
    {
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
    }
}

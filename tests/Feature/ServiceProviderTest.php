<?php

it('publishes config file', function () {
    $config = config('filament-multifactor-whatsapp');

    expect($config)
        ->toBeArray()
        ->toHaveKey('phone_column_name');
});

it('has phone as default phone column name', function () {
    expect(config('filament-multifactor-whatsapp.phone_column_name'))->toBe('phone');
});

it('loads translations', function () {
    $translation = __('filament-multifactor-whatsapp::provider.login_form.label');

    expect($translation)
        ->toBeString()
        ->not->toBe('filament-multifactor-whatsapp::provider.login_form.label');
});

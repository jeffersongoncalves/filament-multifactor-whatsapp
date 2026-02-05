<?php

use Illuminate\Support\Facades\Hash;
use JeffersonGoncalves\Filament\MultiFactorWhatsApp\Tests\Fixtures\User;
use JeffersonGoncalves\Filament\MultiFactorWhatsApp\WhatsAppAuthentication;

it('can create whatsapp authentication instance', function () {
    $auth = WhatsAppAuthentication::make();

    expect($auth)->toBeInstanceOf(WhatsAppAuthentication::class);
});

it('returns whatsapp_code as id', function () {
    $auth = WhatsAppAuthentication::make();

    expect($auth->getId())->toBe('whatsapp_code');
});

it('can set code expiry minutes', function () {
    $auth = WhatsAppAuthentication::make()
        ->codeExpiryMinutes(10);

    expect($auth->getCodeExpiryMinutes())->toBe(10);
});

it('has default code expiry of 4 minutes', function () {
    $auth = WhatsAppAuthentication::make();

    expect($auth->getCodeExpiryMinutes())->toBe(4);
});

it('generates 6 digit code', function () {
    $auth = WhatsAppAuthentication::make();
    $code = $auth->generateCode();

    expect($code)
        ->toBeString()
        ->toHaveLength(6)
        ->toMatch('/^\d{6}$/');
});

it('can set custom code generator', function () {
    $auth = WhatsAppAuthentication::make()
        ->generateCodesUsing(fn () => '123456');

    expect($auth->generateCode())->toBe('123456');
});

it('can verify valid code', function () {
    $auth = WhatsAppAuthentication::make();
    $code = '123456';

    session()->put('filament_whatsapp_authentication_code', Hash::make($code));
    session()->put('filament_whatsapp_authentication_code_expires_at', now()->addMinutes(5));

    expect($auth->verifyCode($code))->toBeTrue();
});

it('rejects invalid code', function () {
    $auth = WhatsAppAuthentication::make();

    session()->put('filament_whatsapp_authentication_code', Hash::make('123456'));
    session()->put('filament_whatsapp_authentication_code_expires_at', now()->addMinutes(5));

    expect($auth->verifyCode('654321'))->toBeFalse();
});

it('rejects expired code', function () {
    $auth = WhatsAppAuthentication::make();
    $code = '123456';

    session()->put('filament_whatsapp_authentication_code', Hash::make($code));
    session()->put('filament_whatsapp_authentication_code_expires_at', now()->subMinutes(1));

    expect($auth->verifyCode($code))->toBeFalse();
});

it('clears session after successful verification', function () {
    $auth = WhatsAppAuthentication::make();
    $code = '123456';

    session()->put('filament_whatsapp_authentication_code', Hash::make($code));
    session()->put('filament_whatsapp_authentication_code_expires_at', now()->addMinutes(5));

    $auth->verifyCode($code);

    expect(session('filament_whatsapp_authentication_code'))->toBeNull()
        ->and(session('filament_whatsapp_authentication_code_expires_at'))->toBeNull();
});

it('can check if user is enabled', function () {
    $user = new User([
        'name' => 'Test User',
        'email' => 'test@example.com',
        'password' => 'password',
        'has_whatsapp_authentication' => true,
    ]);

    $auth = WhatsAppAuthentication::make();

    expect($auth->isEnabled($user))->toBeTrue();
});

it('can check if user is disabled', function () {
    $user = new User([
        'name' => 'Test User',
        'email' => 'test@example.com',
        'password' => 'password',
        'has_whatsapp_authentication' => false,
    ]);

    $auth = WhatsAppAuthentication::make();

    expect($auth->isEnabled($user))->toBeFalse();
});

it('can enable whatsapp authentication', function () {
    $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

    $user = User::create([
        'name' => 'Test User',
        'email' => 'test@example.com',
        'password' => 'password',
        'has_whatsapp_authentication' => false,
    ]);

    $auth = WhatsAppAuthentication::make();
    $auth->enableWhatsappAuthentication($user);

    expect($user->fresh()->hasWhatsAppAuthentication())->toBeTrue();
});

it('returns login form label as translation', function () {
    $auth = WhatsAppAuthentication::make();
    $label = $auth->getLoginFormLabel();

    expect($label)->toBeString();
});

it('returns challenge form components as array', function () {
    $user = new User([
        'name' => 'Test User',
        'email' => 'test@example.com',
        'password' => 'password',
    ]);

    $auth = WhatsAppAuthentication::make();
    $components = $auth->getChallengeFormComponents($user);

    expect($components)
        ->toBeArray()
        ->not->toBeEmpty();
});

it('returns management schema components as array', function () {
    $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

    $user = User::create([
        'name' => 'Test User',
        'email' => 'test@example.com',
        'password' => 'password',
    ]);

    $this->actingAs($user);

    $auth = WhatsAppAuthentication::make();
    $components = $auth->getManagementSchemaComponents();

    expect($components)
        ->toBeArray()
        ->not->toBeEmpty();
});

it('returns actions as array', function () {
    $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

    $user = User::create([
        'name' => 'Test User',
        'email' => 'test@example.com',
        'password' => 'password',
    ]);

    $this->actingAs($user);

    $auth = WhatsAppAuthentication::make();
    $actions = $auth->getActions();

    expect($actions)
        ->toBeArray()
        ->not->toBeEmpty();
});

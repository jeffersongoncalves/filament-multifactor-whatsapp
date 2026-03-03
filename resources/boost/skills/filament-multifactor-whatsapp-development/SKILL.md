---
name: filament-multifactor-whatsapp-development
description: Build and work with Filament Multi-Factor WhatsApp authentication, including WhatsApp OTP verification, Evolution API integration, setup/disable actions, and custom notification channels.
---

# Filament Multifactor WhatsApp Development

## When to use this skill

Use this skill when:
- Adding WhatsApp-based multi-factor authentication to a Filament panel
- Implementing the `HasWhatsAppAuthentication` contract on a User model
- Customizing code expiration, notification messages, or code generation
- Integrating with Evolution API for WhatsApp message delivery
- Troubleshooting MFA flow (setup, login challenge, code verification)
- Extending the setup/disable actions or notification channel

## Requirements

- PHP 8.2+
- Laravel 11.0+
- Filament 5.0
- `wallacemartinss/filament-whatsapp-conector` ^2.0 (Evolution API client)
- A running Evolution API instance with a connected WhatsApp number

## Installation

```bash
composer require jeffersongoncalves/filament-multifactor-whatsapp
```

### Database Setup

Add the WhatsApp authentication column to your users table:

```php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

Schema::table('users', function (Blueprint $table) {
    $table->boolean('has_whatsapp_authentication')->default(false);
});
```

### User Model Implementation

Your User model must implement the `HasWhatsAppAuthentication` interface:

```php
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Foundation\Auth\User as Authenticatable;
use JeffersonGoncalves\Filament\MultiFactorWhatsApp\Contracts\HasWhatsAppAuthentication;

class User extends Authenticatable implements FilamentUser, HasWhatsAppAuthentication
{
    protected function casts(): array
    {
        return [
            'has_whatsapp_authentication' => 'boolean',
        ];
    }

    public function hasWhatsappAuthentication(): bool
    {
        return $this->has_whatsapp_authentication;
    }

    public function toggleWhatsappAuthentication(bool $condition): void
    {
        $this->has_whatsapp_authentication = $condition;
        $this->save();
    }
}
```

### Panel Registration

```php
use Filament\Panel;
use JeffersonGoncalves\Filament\MultiFactorWhatsApp\WhatsAppAuthentication;

public function panel(Panel $panel): Panel
{
    return $panel
        ->multiFactorAuthentication([
            WhatsAppAuthentication::make(),
        ]);
}
```

## Configuration

### Config File (`filament-multifactor-whatsapp.php`)

```php
return [
    'phone_column_name' => 'phone',
];
```

Publish with:

```bash
php artisan vendor:publish --tag=filament-multifactor-whatsapp-config
```

### Customize Code Expiry

```php
WhatsAppAuthentication::make()
    ->codeExpiryMinutes(2), // default: 4 minutes
```

### Custom Code Generator

```php
WhatsAppAuthentication::make()
    ->generateCodesUsing(fn (): string => str_pad((string) random_int(0, 9999), 4, '0', STR_PAD_LEFT)),
```

### Custom Notification Class

```php
WhatsAppAuthentication::make()
    ->codeNotification(MyCustomWhatsAppNotification::class),
```

## Architecture

### Namespace

`JeffersonGoncalves\Filament\MultiFactorWhatsApp`

### Key Classes

#### WhatsAppAuthentication (Main Provider)

```php
namespace JeffersonGoncalves\Filament\MultiFactorWhatsApp;

use Filament\Auth\MultiFactor\Contracts\HasBeforeChallengeHook;
use Filament\Auth\MultiFactor\Contracts\MultiFactorAuthenticationProvider;

class WhatsAppAuthentication implements HasBeforeChallengeHook, MultiFactorAuthenticationProvider
{
    public static function make(): static;
    public function getId(): string;                                    // returns 'whatsapp_code'
    public function codeExpiryMinutes(int $minutes): static;            // default: 4
    public function getCodeExpiryMinutes(): int;
    public function generateCodesUsing(?Closure $callback): static;
    public function generateCode(): string;                             // 6-digit zero-padded
    public function codeNotification(string $notification): static;
    public function getCodeNotification(): string;
    public function beforeChallenge(Authenticatable $user): void;       // sends code before login challenge
    public function sendCode(HasWhatsAppAuthentication $user): bool;    // rate-limited (max 2)
    public function verifyCode(string $code): bool;                     // checks session hash + expiry
    public function isEnabled(Authenticatable $user): bool;
    public function enableWhatsappAuthentication(HasWhatsAppAuthentication $user): void;
    public function getLoginFormLabel(): string;
    public function getChallengeFormComponents(Authenticatable $user): array;
    public function getManagementSchemaComponents(): array;
    public function getActions(): array;
}
```

#### HasWhatsAppAuthentication (Contract)

```php
namespace JeffersonGoncalves\Filament\MultiFactorWhatsApp\Contracts;

interface HasWhatsAppAuthentication
{
    public function hasWhatsAppAuthentication(): bool;
    public function toggleWhatsAppAuthentication(bool $condition): void;
}
```

#### SetUpWhatsAppAuthenticationAction

Creates an `Action` that:
1. Sends a verification code to the user's WhatsApp on mount
2. Displays a modal with a `OneTimeCodeInput` field
3. Validates the entered code against the session hash
4. Enables WhatsApp authentication on the user model via `toggleWhatsappAuthentication(true)`
5. Rate-limited to 5 attempts

#### DisableWhatsAppAuthenticationAction

Creates an `Action` that:
1. Sends a verification code to confirm identity
2. Displays a modal requiring code entry
3. Disables WhatsApp authentication via `toggleWhatsappAuthentication(false)`
5. Rate-limited to 5 attempts

#### VerifyWhatsappAuthentication (Notification)

```php
namespace JeffersonGoncalves\Filament\MultiFactorWhatsApp\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;

class VerifyWhatsappAuthentication extends Notification implements ShouldQueue
{
    public function __construct(public string $code, public int $codeExpiryMinutes);
    public function via(object $notifiable): string;       // returns WhatsAppChannel::class
    public function toWhatsapp(object $notifiable): array; // sends via Evolution API
}
```

The notification:
- Finds the first connected `WhatsappInstance` (status = `OPEN`)
- Reads the phone number from the user's attribute configured in `phone_column_name`
- Sends via the `Whatsapp::sendText()` facade

#### WhatsAppChannel

```php
namespace JeffersonGoncalves\Filament\MultiFactorWhatsApp\Notifications;

class WhatsAppChannel
{
    public function send(object $notifiable, Notification $notification): void;
}
```

### Code Verification Flow

1. Code is generated as a 6-digit zero-padded random integer
2. Code hash is stored in session at `filament_whatsapp_authentication_code`
3. Expiry timestamp stored at `filament_whatsapp_authentication_code_expires_at`
4. On verification, the entered code is checked against the hash and expiry
5. On success, both session keys are cleared

### Rate Limiting

- Code sending: max 2 attempts per user via `RateLimiter` (key: `filament_whatsapp_authentication.{user_id}`)
- Setup/Disable actions: rate-limited to 5 attempts via Filament's `->rateLimit(5)`

## Evolution API Setup

The plugin requires `wallacemartinss/filament-whatsapp-conector` for WhatsApp message delivery:

```env
EVOLUTION_URL=https://your-evolution-api.com
EVOLUTION_API_KEY=your_api_key
EVOLUTION_WEBHOOK_URL=https://your-app.com/api/webhooks/evolution
```

Publish config and migrations:

```bash
php artisan vendor:publish --tag="filament-evolution-config"
php artisan vendor:publish --tag="filament-evolution-migrations"
php artisan migrate
```

## Troubleshooting

### Codes not being sent
**Cause**: No connected WhatsApp instance found (status != OPEN), or rate limiter triggered.
**Solution**: Verify you have a WhatsApp instance with status `OPEN` in the database. Check rate limiting by ensuring the user hasn't exceeded 2 send attempts.

### Invalid code errors
**Cause**: Code has expired or session was lost between code send and verification.
**Solution**: Increase `codeExpiryMinutes()`. Ensure session driver is persistent (not `array`). Check that the session is not being cleared between requests.

### Wrong phone number used
**Cause**: The `phone_column_name` config does not match the actual column on the User model.
**Solution**: Update `config/filament-multifactor-whatsapp.php` to set `phone_column_name` to the correct column name.

### Notification queue failures
**Cause**: `VerifyWhatsappAuthentication` implements `ShouldQueue` but no queue worker is running.
**Solution**: Start a queue worker with `php artisan queue:work`, or remove the `ShouldQueue` interface from a custom notification class for synchronous delivery.

## Filament Multifactor WhatsApp

Filament 5 multi-factor authentication via WhatsApp one-time codes, with Evolution API connector integration for sending messages.

### Installation

@verbatim
<code-snippet name="Install the plugin" lang="bash">
composer require jeffersongoncalves/filament-multifactor-whatsapp
</code-snippet>
@endverbatim

### Database Migration

@verbatim
<code-snippet name="Add WhatsApp authentication column" lang="php">
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

Schema::table('users', function (Blueprint $table) {
    $table->boolean('has_whatsapp_authentication')->default(false);
});
</code-snippet>
@endverbatim

### User Model Setup

@verbatim
<code-snippet name="Implement HasWhatsAppAuthentication on User model" lang="php">
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
</code-snippet>
@endverbatim

### Register in Panel

@verbatim
<code-snippet name="Activate WhatsApp MFA in PanelProvider" lang="php">
use Filament\Panel;
use JeffersonGoncalves\Filament\MultiFactorWhatsApp\WhatsAppAuthentication;

public function panel(Panel $panel): Panel
{
    return $panel
        ->multiFactorAuthentication([
            WhatsAppAuthentication::make(),
        ]);
}
</code-snippet>
@endverbatim

### Customize Code Expiry

@verbatim
<code-snippet name="Change code expiration time" lang="php">
WhatsAppAuthentication::make()
    ->codeExpiryMinutes(2),
</code-snippet>
@endverbatim

### Features
- WhatsApp-based multi-factor authentication with 6-digit one-time codes
- Configurable code expiration time (default: 4 minutes)
- Rate limiting on code sending (max 2 attempts)
- Setup and Disable actions with modal verification
- Custom notification channel via Evolution API (`WhatsAppChannel`)
- Resend code functionality in both setup and login flows
- Configurable phone column name via `filament-multifactor-whatsapp.phone_column_name`
- Integration with `wallacemartinss/filament-whatsapp-conector` for WhatsApp delivery

### Architecture
- **Namespace**: `JeffersonGoncalves\Filament\MultiFactorWhatsApp`
- **Provider class**: `WhatsAppAuthentication` implements `MultiFactorAuthenticationProvider`, `HasBeforeChallengeHook`
- **Contract**: `HasWhatsAppAuthentication` interface (User model must implement)
- **Actions**: `SetUpWhatsAppAuthenticationAction`, `DisableWhatsAppAuthenticationAction`
- **Notifications**: `VerifyWhatsappAuthentication` (queued), `WhatsAppChannel`
- **Config**: `filament-multifactor-whatsapp.php` with `phone_column_name` setting

### Best Practices
- Always implement the `HasWhatsAppAuthentication` interface on your User model
- Ensure Evolution API is configured with a connected WhatsApp instance
- Set up queue workers for reliable notification delivery
- Use `codeExpiryMinutes()` to adjust code lifetime based on your security needs
- Configure the `phone_column_name` in config if your phone field is not named `phone`

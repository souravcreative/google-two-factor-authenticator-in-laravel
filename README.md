# Laravel 12 Two-Factor Authentication (2FA) with Google Authenticator

This is a Laravel 12 authentication starter project using [Laravel Breeze](https://laravel.com/docs/starter-kits#breeze) and Google Authenticator for two-factor login without a password.

Users register with their email, scan a QR code to link their Google Authenticator app, and then log in using email and 2FA code only.

---

## 🔐 Features

- Laravel 12 + Breeze starter kit
- Email + Google Authenticator code login (no password)
- QR code generated on registration
- Secure 2FA validation using `pragmarx/google2fa`
- Clean Blade views and components

📱 How It Works
📝 Registration
The user fills out the registration form with their email and any other required fields.

Upon form submission, the backend automatically generates a unique secret key for the user using pragmarx/google2fa.

This secret is securely stored in the google2fa_secret field in the users table.

The user is then redirected to a confirmation page or shown a QR code on the same page.

This QR code is generated using the bacon/bacon-qr-code library and encodes the secret key along with the app name and user's email.

The user scans the QR code using the Google Authenticator app (or any TOTP-compatible app like Authy or Microsoft Authenticator).

Once scanned, the authenticator app will generate a new 6-digit code every 30 seconds for this user.

The user uses this code to log in going forward — no password is needed.

🔐 Login
The user enters their email and the current 6-digit code from their authenticator app.

The backend validates the code against the secret stored in the database.

If the OTP code is valid, the user is logged in.

If not, an error message is returned.

🔧 Dependencies
Laravel 12

Laravel Breeze

pragmarx/google2fa

bacon/bacon-qr-code

Install the required packages:

bash
Copy
Edit
composer require pragmarx/google2fa
composer require bacon/bacon-qr-code
💻 Screenshots
Registration with QR Code	Login with 2FA

You can add or update screenshots inside the public/screenshots/ folder.

🧪 Testing
You can test 2FA login using the Google Authenticator app (iOS/Android):

Register a new user.

Scan the QR code using the app.

Login using your email and the 6-digit OTP code from the app.

🛡️ Security Notes
No password is stored or required during login.

The google2fa_secret is stored securely in the database.

OTP codes are time-based and expire every 30 seconds.

QR code and secret key should never be shared publicly.

---

## 🚀 Installation

```bash
git clone https://github.com/your-username/laravel-2fa-breeze.git
cd laravel-2fa-breeze

composer install
cp .env.example .env
php artisan key:generate

# Set up your database in `.env`, then run:
php artisan migrate

# Install frontend assets (if needed)
npm install && npm run build
---




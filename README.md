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

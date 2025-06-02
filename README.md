<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
  </a>
</p>

<p align="center">
  <a href="https://github.com/your-username/laravel-2fa-breeze/actions">
    <img src="https://img.shields.io/github/workflow/status/your-username/laravel-2fa-breeze/laravel" alt="Build Status">
  </a>
  <a href="https://packagist.org/packages/pragmarx/google2fa">
    <img src="https://img.shields.io/packagist/v/pragmarx/google2fa" alt="Google2FA Version">
  </a>
  <a href="https://packagist.org/packages/bacon/bacon-qr-code">
    <img src="https://img.shields.io/packagist/v/bacon/bacon-qr-code" alt="BaconQR Version">
  </a>
  <a href="https://opensource.org/licenses/MIT">
    <img src="https://img.shields.io/badge/license-MIT-blue.svg" alt="License">
  </a>
</p>

---

# 🚀 Laravel 12 2FA Login with Google Authenticator (No Password)

A clean and modern Laravel 12 starter with **Google Authenticator 2FA** instead of traditional passwords. Built on top of [Laravel Breeze](https://laravel.com/docs/starter-kits#breeze).

✅ Scan a QR on registration → 🔐 Login with email + authenticator code only.  
No passwords. Fully time-based OTP login.

---

## ✨ Features

- 🔐 2FA login without passwords
- 📱 QR code setup using Google Authenticator or Authy
- 🛡️ Secure TOTP validation via `pragmarx/google2fa`
- 📦 Laravel 12 + Breeze
- ✅ Clean UI with Blade components

---

## 📦 Dependencies

- Laravel 12
- Laravel Breeze
- `pragmarx/google2fa`
- `bacon/bacon-qr-code`

Install via Composer:

```bash
composer require pragmarx/google2fa
composer require bacon/bacon-qr-code

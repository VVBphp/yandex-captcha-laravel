# Yandex Smart Captcha for Laravel

[![Latest Version](https://img.shields.io/packagist/v/vvb/yandex-smart-captcha.svg)](https://packagist.org/packages/vvb/yandex-smart-captcha)

## Установка
```bash
composer require vvb/yandex-smart-captcha
```
### Настройка
Добавьте в .env:

```ini
YANDEX_SMART_CAPTCHA_CLIENT_KEY=your_client_key
YANDEX_SMART_CAPTCHA_SERVER_KEY=your_server_key
```
Опубликуйте конфиг:

```bash
php artisan vendor:publish --tag=config --provider="vvb\YandexSmartCaptcha\YandexSmartCaptchaServiceProvider"
```
### Использование
В Blade-шаблоне:

```blade
<x-yandex-smart-captcha::smart-captcha />
```
### Валидация:

```php
use vvb\YandexSmartCaptcha\Rules\YandexSmartCaptchaRule;

$request->validate([
    'smartcaptcha_token' => ['required', new YandexSmartCaptchaRule],
]);
```
### Кастомизация
Измените сообщение об ошибке в resources/lang/xx/validation.php:

```php
'custom' => [
    'smartcaptcha_token' => [
        'yandex_smart_captcha_rule' => 'Captcha verification failed',
    ],
],
```
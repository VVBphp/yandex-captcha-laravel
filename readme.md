# Yandex Smart Captcha для Laravel 10/11

[![Latest Version](https://img.shields.io/packagist/v/vvb/yandex-smart-captcha.svg)](https://packagist.org/packages/vvb/yandex-smart-captcha)
[![PHP Version](https://img.shields.io/badge/php-%3E%3D8.1-blue)](https://php.net)
[![Laravel Version](https://img.shields.io/badge/laravel-10%2F11-red)](https://laravel.com)

Пакет для простой интеграции Yandex Cloud Smart Captcha в Laravel приложения

## Установка

```bash
composer require vvb/yandex-smart-captcha
```

## Настройка

1. Получите ключи в [Yandex Cloud Console](https://cloud.yandex.ru/services/smartcaptcha)
2. Добавьте в `.env`:
```ini
YANDEX_SMART_CAPTCHA_CLIENT_KEY=your_client_key
YANDEX_SMART_CAPTCHA_SERVER_KEY=your_server_key
```

3. Опубликуйте конфиг:
```bash
php artisan vendor:publish --tag=config --provider="vvb\YandexSmartCaptcha\YandexSmartCaptchaServiceProvider"
```

## Использование

### 1. Добавление капчи в форму
```blade
<form method="POST">
    @csrf
    
    <!-- Стандартный вид -->
    <x-yandex-smart-captcha::smart-captcha />

    <!-- С кастомным контейнером -->
    <div id="my-captcha-container"></div>
    <x-yandex-smart-captcha::smart-captcha container="my-captcha-container" />

    <button type="submit">Отправить</button>
</form>
```

### 2. Валидация запроса
```php
use vvb\YandexSmartCaptcha\Rules\YandexSmartCaptchaRule;

public function store(Request $request)
{
    $request->validate([
        'smart-token' => [new YandexSmartCaptchaRule],
    ]);
    
    // Ваша логика
}
```

## Кастомизация сообщений

### Через конструктор
```php
new YandexSmartCaptchaRule(
    message: 'Неверная капча!',
    emptyMessage: 'Пожалуйста, пройдите проверку'
)
```

### Через языковые файлы
Добавьте в `resources/lang/xx/validation.php`:
```php
return [
    'yandex_smart_captcha_rule' => 'Капча не пройдена',
    'yandex_smart_captcha_empty' => 'Требуется подтверждение капчи',
];
```

## Локализация капчи
Измените параметр `hl` в Blade-компоненте:
```blade
<x-yandex-smart-captcha::smart-captcha lang="en" />
```

Поддерживаемые языки: `ru`, `en`, `uk`, `tr`, `lv`

## Пример контроллера

```php
use Illuminate\Http\Request;
use vvb\YandexSmartCaptcha\Rules\YandexSmartCaptchaRule;

class FormController extends Controller
{
    public function showForm()
    {
        return view('form');
    }

    public function submitForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'smartcaptcha_token' => [
                new YandexSmartCaptchaRule(
                    __('validation.captcha_failed'),
                    __('validation.captcha_required')
                )
            ]
        ]);

        // Логика обработки формы
        return back()->with('success', 'Форма успешно отправлена!');
    }
}
```

## Лицензия
MIT License. 

---

[Документация Yandex SmartCaptcha](https://cloud.yandex.ru/docs/smartcaptcha/)
```
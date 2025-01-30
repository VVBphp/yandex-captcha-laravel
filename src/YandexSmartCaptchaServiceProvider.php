<?php

namespace vvb\YandexSmartCaptcha;

use Illuminate\Support\ServiceProvider;

class YandexSmartCaptchaServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton('yandex-smart-captcha', function () {
            return new Services\YandexSmartCaptchaService(
                config('yandex-smart-captcha.client_key'),
                config('yandex-smart-captcha.server_key')
            );
        });
    }

    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../config/yandex-smart-captcha.php' => config_path('yandex-smart-captcha.php'),
        ]);

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'yandex-smart-captcha');
    }
}
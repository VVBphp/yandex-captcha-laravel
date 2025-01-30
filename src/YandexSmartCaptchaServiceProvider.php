<?php

namespace vvb\YandexSmartCaptcha;

use Illuminate\Support\ServiceProvider;

class YandexSmartCaptchaServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/yandex-smart-captcha.php', 'yandex-smart-captcha');

        $this->app->singleton(Services\YandexSmartCaptchaService::class, function ($app) {
            return new Services\YandexSmartCaptchaService($app['config']['yandex-smart-captcha']['client_key'], $app['config']['yandex-smart-captcha']['server_key']);
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
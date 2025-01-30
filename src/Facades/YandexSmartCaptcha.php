<?php

namespace vvb\YandexSmartCaptcha\Facades;

use Illuminate\Support\Facades\Facade;

class YandexSmartCaptcha extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'yandex-smart-captcha';
    }
}

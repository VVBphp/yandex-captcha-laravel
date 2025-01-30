<?php

namespace vvb\YandexSmartCaptcha\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SmartCaptcha extends Component
{
    public function render(): View
    {
        return view('yandex-smart-captcha::smart-captcha');
    }
}

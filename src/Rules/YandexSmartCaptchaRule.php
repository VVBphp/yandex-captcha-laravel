<?php

namespace vvb\YandexSmartCaptcha\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use vvb\YandexSmartCaptcha\Services\YandexSmartCaptchaService;

class YandexSmartCaptchaRule implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!app(YandexSmartCaptchaService::class)->verify($value)) {
            $fail('The :attribute is invalid.');
        }
    }
}
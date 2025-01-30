<?php

namespace vvb\YandexSmartCaptcha\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use vvb\YandexSmartCaptcha\Services\YandexSmartCaptchaService;

class YandexSmartCaptchaRule implements ValidationRule
{
    protected string $message;
    protected string $emptyMessage;

    public function __construct(
        string $message = 'Неверная капча',
        string $emptyMessage = 'Подтвердите, что вы человек'
    ) {
        $this->message = $message;
        $this->emptyMessage = $emptyMessage;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (empty($value)) {
            $fail($this->emptyMessage);
            return;
        }

        if (!app(YandexSmartCaptchaService::class)->verify($value)) {
            $fail($this->message);
        }
    }
}
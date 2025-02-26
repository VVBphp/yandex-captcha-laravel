<?php

namespace vvb\YandexSmartCaptcha\Services;

use Illuminate\Support\Facades\Http;
use Exception;

class YandexSmartCaptchaService
{
    protected string $clientKey;
    protected string $serverKey;

    public function __construct(string $clientKey, string $serverKey)
    {
        $this->clientKey = $clientKey;
        $this->serverKey = $serverKey;
    }

    public function verify(string $token): bool
    {
        $response = Http::asForm()->timeout(30)
            ->post('https://smartcaptcha.yandexcloud.net/validate', [
                'secret' => $this->serverKey,
                'token' => $token,
                'ip' => request()->ip(),
            ]);

        if ($response->failed()) {
            throw new Exception('Yandex Smart Captcha API error');
        }

        return $response->json('status') === 'ok';
    }
}
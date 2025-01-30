<div id="smartcaptcha-container"></div>

<script src="https://smartcaptcha.yandexcloud.net/captcha.js?render=onload&onload=onloadSmartCaptchaFunction" defer></script>
<script>
    function onloadSmartCaptchaFunction() {
        if (window.smartCaptcha) {
            const container = document.getElementById('smartcaptcha-container');

            const widgetId = window.smartCaptcha.render(container, {
                sitekey: '{{ config("yandex-smart-captcha.client_key") }}',
                hl: 'ru',
            });
        }
    }
</script>
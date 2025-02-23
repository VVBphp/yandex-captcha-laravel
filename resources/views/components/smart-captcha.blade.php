<div id="smartcaptcha-container"></div>
<div class="g-recaptcha"></div>

<script src="https://smartcaptcha.yandexcloud.net/captcha.js?render=onload&onload=onloadSmartCaptchaFunction" defer></script>
<script>
    let grecaptcha = {};
    function onloadSmartCaptchaFunction() {
        if (window.smartCaptcha) {
            const container = document.getElementById('smartcaptcha-container');

            const widgetId = window.smartCaptcha.render(container, {
                sitekey: '{{ config("yandex-smart-captcha.client_key") }}',
                hl: 'ru',
            });
            grecaptcha = window.smartCaptcha;
            console.log(grecaptcha,widgetId)
        }
    }
</script>

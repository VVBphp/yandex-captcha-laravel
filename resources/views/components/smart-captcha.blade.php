<div id="smartcaptcha-container"></div>
<input type="hidden" name="smartcaptcha_token" id="smartcaptcha-token">

<script src="https://smartcaptcha.yandexcloud.net/captcha.js" defer></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        window.smartCaptcha.init({
            sitekey: '{{ config("yandex-smart-captcha.client_key") }}',
            hl: 'ru',
            container: document.getElementById('smartcaptcha-container')
        }, function(token) {
            document.getElementById('smartcaptcha-token').value = token;
        });
    });
</script>
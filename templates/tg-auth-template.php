<?php
/**
 * Template Name: Телеграм Авторизация
 */
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Telegram Авторизация...</title>
</head>
<body>
<p>Авторизация через Telegram...</p>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const hash = window.location.hash;

        if (!hash || !hash.startsWith('#tgAuthResult=')) {
            window.location.replace('<?php echo esc_url( home_url( '/' ) ); ?>');
            return;
        }

        try {
            const base64 = hash.replace('#tgAuthResult=', '');
            const jsonStr = atob(base64); // <-- Раскодируем Base64
            const data = JSON.parse(jsonStr); // <-- Теперь можно парсить

            const params = new URLSearchParams();
            for (const key in data) {
                if (data.hasOwnProperty(key)) {
                    params.append(key, data[key]);
                }
            }

            const newUrl = '<?php echo esc_url( home_url( '/wp-json/telegram-auth/v1/callback' ) ); ?>?' + params.toString();
            window.location.replace(newUrl);

        } catch (e) {
            console.error(e);
            document.body.innerText = 'Ошибка обработки данных Telegram.';
        }
    });
</script>
</body>
</html>

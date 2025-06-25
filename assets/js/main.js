document.addEventListener('DOMContentLoaded', function () {

    // Mobile menu
    const burger = document.getElementById('burger');
    const menu = document.querySelector('.main-nav .menu');

    burger.addEventListener('click', function () {
        menu.classList.toggle('active');
    });


    // Telegram OAUTH
    const buttons = document.querySelectorAll(".tg-auth-btn");
    if (!buttons.length) return;

    buttons.forEach(button => {
        button.addEventListener("click", function (e) {
            e.preventDefault();
            const bot_username = TGAuthSettings.bot_username;
            const callback_url = TGAuthSettings.callback_url;
            const bot_id = TGAuthSettings.bot_id;

            const url = `https://oauth.telegram.org/auth?bot_id=${bot_id}&bot=${bot_username}&origin=${location.origin}&embed=1&request_access=write&return_to=${encodeURIComponent(callback_url)}`;

            const width = 500;
            const height = 500;
            const left = (screen.width - width) / 2;
            const top = (screen.height - height) / 2;

            window.location.href = url;
            // window.open(url, 'tgAuth', `width=${width},height=${height},left=${left},top=${top}`);
        });
    });
});
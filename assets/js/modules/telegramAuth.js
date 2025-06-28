export function initTelegramAuth() {
    const buttons = document.querySelectorAll(".tg-auth-btn");
    if (!buttons.length || typeof TGAuthSettings === 'undefined') return;

    buttons.forEach(button => {
        button.addEventListener("click", function (e) {
            e.preventDefault();

            const { bot_username, callback_url, bot_id } = TGAuthSettings;

            const url = `https://oauth.telegram.org/auth?bot_id=${bot_id}&bot=${bot_username}&origin=${location.origin}&embed=1&request_access=write&return_to=${encodeURIComponent(callback_url)}`;

            window.location.href = url;
        });
    });
}

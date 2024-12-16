document.addEventListener('DOMContentLoaded', function () {
    const eyeIcons = document.querySelectorAll('.eye-icon');

    eyeIcons.forEach(eyeIcon => {
        eyeIcon.addEventListener('click', () => {
            const passwordField = eyeIcon.previousElementSibling; // Получаем поле пароля

            if (passwordField.type === 'password') {
                passwordField.type = 'text'; // Показываем текст пароля
                eyeIcon.classList.remove('bx-show');
                eyeIcon.classList.add('bx-hide'); // Меняем иконку на скрытый глаз
            } else {
                passwordField.type = 'password'; // Скрываем текст пароля
                eyeIcon.classList.remove('bx-hide');
                eyeIcon.classList.add('bx-show'); // Меняем иконку на показанный глаз
            }
        });
    });
});

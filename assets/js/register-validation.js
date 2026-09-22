document.addEventListener('DOMContentLoaded', () => {
    const registerForm = document.getElementById('registerForm');
    const passwordInput = document.getElementById('password');
    const confirmPasswordInput = document.getElementById('confirm_password');
    const errorMessage = document.getElementById('js-error-message');

    if (registerForm) {
        registerForm.addEventListener('submit', (e) => {
            errorMessage.style.display = 'none';
            errorMessage.textContent = '';

            if (passwordInput.value !== confirmPasswordInput.value) {
                e.preventDefault();
                errorMessage.textContent = 'Las contraseñas no coinciden.';
                errorMessage.style.display = 'block';
                confirmPasswordInput.focus();
                return;
            }

            if (passwordInput.value.length < 6) {
                e.preventDefault();
                errorMessage.textContent = 'La contraseña debe tener al menos 6 caracteres.';
                errorMessage.style.display = 'block';
                passwordInput.focus();
                return;
            }
        });
    }
});
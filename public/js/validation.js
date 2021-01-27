const form = document.querySelector("form");
const emailInput = form.querySelector('input[name="email"]');
const passwordInput = form.querySelector('input[name="password"]');
const confirmPasswordInput = form.querySelector('input[name="conf-password"]');

function isEmail(email) {
    return /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(email);
}

function arePasswordsTheSame(password, confPassword) {
    return password === confPassword;
}

function passwordsRequirements(password) {
    if (/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,255}$/.test(password)) {
        return true;
    }
    else {
        alert('Password must be at least 8 characters long (255 max) and contain at least one lowercase letter, one uppercase letter, one digit and one special character');
        return false;
    }
}

function markValidation(element, condition) {
    !condition ? element.classList.add('no-valid') : element.classList.remove('no-valid')
}

function validateEmail() {
    setTimeout(function () {
            markValidation(emailInput, isEmail(emailInput.value));
        }, 1000);
}

function validatePasswordRepetition() {
    setTimeout(function () {
            const condition = arePasswordsTheSame(
                passwordInput.value,
                confirmPasswordInput.value
            );
            markValidation(confirmPasswordInput, condition);
        }, 1000);
}

function validatePassword() {
    setTimeout(function () {
        markValidation(passwordInput, passwordsRequirements(passwordInput.value));
    }, 1000);
}

emailInput.addEventListener('keyup', validateEmail);
passwordInput.addEventListener('focusout', validatePassword);
confirmPasswordInput.addEventListener('keyup', validatePasswordRepetition);
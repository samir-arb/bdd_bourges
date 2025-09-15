// Sélectionne les ID Qui correspondent dans l'HTML //
let pswrd = document.getElementById('pswrd');
let toggleBtn = document.getElementById('toggleBtn');

let lowerCase = document.getElementById('lower');
let upperCase = document.getElementById('upper');
let digit = document.getElementById('number');
let specialCar = document.getElementById('special');
let minLength = document.getElementById('length');
let button = document.getElementById('ok');

function checkPassword(data) {
    const lower = new RegExp('(?=.*[a-z])'); //sélectionne les lettres minuscules //
    const upper = new RegExp('(?=.*[A-Z])'); //sélectionne les lettres majuscules //
    const number = new RegExp('(?=.*[0-9])'); //sélectionne les chiffres //
    const special = new RegExp('(?=.*[!@#.\$%\^&\*])'); //sélectionne les caracteres spéciaux //
    const length = new RegExp('(?=.{8,})'); //indique que le mot de passe doit faire 8 caracteres //

    // Validation des données //
    if (lower.test(data)) {
        lowerCase.classList.add('valid');
    } else {
        lowerCase.classList.remove('valid');
    }

    if (upper.test(data)) {
        upperCase.classList.add('valid');
    } else {
        upperCase.classList.remove('valid');
    }

    if (number.test(data)) {
        digit.classList.add('valid');
    } else {
        digit.classList.remove('valid');
    }

    if (special.test(data)) {
        specialCar.classList.add('valid');
    } else {
        specialCar.classList.remove('valid');
    }

    if (length.test(data)) {
        minLength.classList.add('valid');
    } else {
        minLength.classList.remove('valid');
    }

    if (lower.test(data) && upper.test(data) && number.test(data) && special.test(data) && length.test(data)) {
        button.disabled = false;
    } else {
        button.disabled = true;
    }
}

toggleBtn.onclick = function () {
    if (pswrd.type === "password") {
        pswrd.setAttribute('type', 'text');
        toggleBtn.classList.add('hide');
    } else {
        pswrd.setAttribute('type', 'password');
        toggleBtn.classList.remove('hide');
    }
}
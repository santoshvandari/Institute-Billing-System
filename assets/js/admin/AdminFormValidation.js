const validateForm=()=>{
    let isValid = true;

    // Validate Full Name
    const fullName = document.getElementById('name').value.trim();
    if (fullName === "") {
        displayErrorMsg('name', "* Name cannot be empty");
        isValid = false;
    } else {
        displayErrorMsg('name', "");
    }

    // Validate Email
    const email = document.getElementById('email').value.trim();
    if (!isValidEmail(email)) {
        displayErrorMsg('email', "* Enter a valid Email");
        isValid = false;
    } else {
        displayErrorMsg('email', "");
    }

    // Validate Phone Number
    const phoneNumber = document.getElementById('phone').value.trim();
    if (!isValidPhoneNumber(phoneNumber)) {
        displayErrorMsg('phone', "* Enter a valid Phone Number");
        isValid = false;
    } else {
        displayErrorMsg('phone', "");
    }

    // Validate Username
    const username = document.getElementById('username').value.trim();
    if (username === "") {
        displayErrorMsg('username', "* Username cannot be empty");
        isValid = false;
    } else {
        displayErrorMsg('username', "");
    }

    // Validate Password
    const password = document.getElementById('adminpassword').value.trim();
    if (password.length < 8) {
        displayErrorMsg('password', "* Password must be at least 8 characters long");
        isValid = false;
    } else {
        displayErrorMsg('password', "");
    }

    return isValid;
}

function displayErrorMsg(el, msg) {
    document.querySelector(`.${el}-error`).textContent = msg;
}

function isValidEmail(email) {
    const emailRegex = /^[^\s@]+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
    return emailRegex.test(email);
}

function isValidPhoneNumber(phoneNumber) {
    const phoneRegex = /^[0-9]{10}$/;
    return phoneRegex.test(phoneNumber);
}
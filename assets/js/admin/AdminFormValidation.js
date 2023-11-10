const validateForm=()=>{
    let validationStatus = true;
    const fullName = document.getElementById('name').value.trim();
    const email = document.getElementById('email').value.trim();
    const phoneNumber = document.getElementById('phone').value.trim();
    const username = document.getElementById('username').value.trim();


    // Validate Full Name
    if (fullName === "") {
        displayErrorMsg('name', "* Name cannot be empty");
        validationStatus = false;
    } else {
        displayErrorMsg('name', "");
    }

    // Validate Email
    if (!validationStatusEmail(email)) {
        displayErrorMsg('email', "* Enter a valid Email");
        validationStatus = false;
    } else {
        displayErrorMsg('email', "");
    }

    // Validate Phone Number
    if (!validationStatusPhoneNumber(phoneNumber)) {
        displayErrorMsg('phone', "* Enter a valid Phone Number");
        validationStatus = false;
    } else {
        displayErrorMsg('phone', "");
    }

    // Validate Username
    if (username === "") {
        displayErrorMsg('username', "* Username cannot be empty");
        validationStatus = false;
    } else {
        displayErrorMsg('username', "");
    }

    // Validate Password
    const password = document.getElementById('adminpassword').value.trim();
    if (password.length < 8) {
        displayErrorMsg('password', "* Password must be at least 8 characters long");
        validationStatus = false;
    } else {
        displayErrorMsg('password', "");
    }

    return validationStatus;
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
const displayErrorMsg=(el, msg)=>{
    document.querySelector(`.${el}-error`).textContent = msg;
}

const isValidEmail=(email)=>{
    const emailRegex = /^[^\s@]+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
    return emailRegex.test(email);
}

const isValidPhoneNumber=(phoneNumber)=>{
    const phoneRegex = /^98\d{8}$/;
    return phoneRegex.test(phoneNumber);
}

const isValidPassword = (password) => {
    const passwordRegex = /^(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()_+])[A-Za-z\d!@#$%^&*()_+]{8,}$/;
    return passwordRegex.test(password);
}

const isValidName = (name) => {
    const nameRegex = /^[a-zA-Z ]{2,}$/;
    return nameRegex.test(name);
}
const isValidUsername=(username)=>{
    // const usernameRegex=/^[a-zA-Z]/;
    const usernameRegex=/^[a-zA-Z][a-zA-Z0-9_]*$/;;
    return usernameRegex.test(username);
}


const validateForm=()=>{
    let validationStatus = true;
    const fullName = document.getElementById('name').value.trim();
    const email = document.getElementById('email').value.trim();
    const phoneNumber = document.getElementById('phone').value.trim();
    const username = document.getElementById('username').value.trim();
    const password = document.getElementById('adminpassword').value.trim();



    // Validate Full Name
    if (!isValidName(fullName)) {
        displayErrorMsg('name', "* Name must contains characters only");
        validationStatus = false;
    } else {
        displayErrorMsg('name', "");
    }

    // Validate Email
    if (!isValidEmail(email)) {
        displayErrorMsg('email', "* Enter a valid Email");
        validationStatus = false;
    } else {
        displayErrorMsg('email', "");
    }

    // Validate Phone Number
    if (!isValidPhoneNumber(phoneNumber)) {
        displayErrorMsg('phone', "* Enter a valid Phone Number");
        validationStatus = false;
    } else {
        displayErrorMsg('phone', "");
    }

    // Validate Username
    if (!isValidUsername(username)) {
        displayErrorMsg('username', "* Enter a Valid Username");
        validationStatus = false;
    } else {
        displayErrorMsg('username', "");
    }

    // Validate Password
    if (password.length < 8) {
        displayErrorMsg('password', "* Password must contains at least 8 characters");
        validationStatus = false;
    }else if(!isValidPassword(password)){
        displayErrorMsg('password', "* Password must contain uppercase,lowercase, number and special character");
        validationStatus = false;
    } else {
        displayErrorMsg('password', "");
    }

    return validationStatus;
}



const displayerrormsg = (el, msg) => {
    document.querySelector(`.${el}-error`).textContent = msg;
}
let validateForm=()=>{
    let ValidationStatus = false;
    let courseId = document.getElementById('cid').value.trim();
    let courseName = document.getElementById('cname').value.trim();
    let price = document.getElementById('price').value.trim();

    // Validate Course ID
    if (courseId == "") {
        displayerrormsg('courseid', "* Course ID cannot be empty");
        ValidationStatus = false;
    } else {
        displayerrormsg('courseid', "");
        ValidationStatus = true;
    }
    //Validate Course Name
    if (!/^[a-zA-Z\s]+$/.test(courseName)) {
        displayerrormsg('coursename', "* Course Name Must Contain aplhabitical Characters Only");
        ValidationStatus = false;
    } else {
        displayerrormsg('coursename', "");
        ValidationStatus = true;
    }
    // Validate Price
    if (price <= 0) {
        displayerrormsg('courseprice', "*Price Cannot be Negative or Zero");
        ValidationStatus = false;
    } else {
        displayerrormsg('courseprice', "");
        ValidationStatus = true;
    }
    // Validation Successful and Failure Check
    if (ValidationStatus) {
        return true;
    } else {
        return false;
    }
}

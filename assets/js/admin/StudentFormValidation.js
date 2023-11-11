const displayErrorMsg=(el, msg)=>{
    document.querySelector(`.${el}-error`).textContent = msg;
}


const validateForm=()=>{
        // Get form elements
        let validationStatus= true;
        let name = document.getElementById('name').value.trim();
        let address = document.getElementById('add').value.trim();
        let phone = document.getElementById('phone').value.trim();
        let email = document.getElementById('email').value.trim();
        let parentName = document.getElementById('parent').value.trim();
        let course = document.getElementById('course').value;

        // Regular expression for a 10-digit phone number
        const phoneRegex = /^98\d{8}$/;;
        const nameRegex = /^[a-zA-Z ]{2,}$/;
        const emailRegex = /^[^\s@]+@[a-zA-Z_-]+?\.[a-zA-Z]{2,3}$/;
        const addressRegex = /^[a-zA-Z0-9\s,'-]*$/;
        // Validate Name
        if (!nameRegex.test(name)) {
            displayErrorMsg('name', "* Name must contains characters only");
            validationStatus = false;
        } else {
            displayErrorMsg('name', "");
        }

        // Validate Address
        if (address.length < 3 || !addressRegex.test(address)) {
            displayErrorMsg('address', "* Enter a Valid Address");
            validationStatus=false;
        }else{
            displayErrorMsg('address', "");
        }

        // Validate Phone Number
        if (!phoneRegex.test(phone)) {
            displayErrorMsg('phone', "* Enter a Valid Phone Number");
            validationStatus=false;
        }else{
            displayErrorMsg('phone', "");
        }
        
        // Validate Email Address 
        if(email===""){
            displayErrorMsg('email', "");
        }else if(!emailRegex.test(email)){
            displayErrorMsg('email', "* Enter a valid Email");
            validationStatus=false;
        }else{
            displayErrorMsg('email', "");
        }

        // Validate Parent Name
        if (!nameRegex.test(parentName)) {
            displayErrorMsg('parentname', "* Name must contains characters only");
            validationStatus = false;
        } else {
            displayErrorMsg('parentname', "");
        }


        // Validate Course Selection
        if (course === "") {
            displayErrorMsg('course', "* Please Select a Course");
            validationStatus = false;
        } else {
            displayErrorMsg('course', "");
        }

        // If all validations pass
        return validationStatus;
    }

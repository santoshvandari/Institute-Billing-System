const displayErrorMsg=(el, msg)=>{
    document.querySelector(`.${el}-error`).textContent = msg;
}


const validateForm=()=>{
        // Get form elements
        let validationStatus= true;
        let name = document.getElementById('name').value.trim();
        let address = document.getElementById('add').value.trim();
        let phone = document.getElementById('phone').value.trim();
        let parentName = document.getElementById('parent').value.trim();
        let course = document.getElementById('course').value;

        // Regular expression for a 10-digit phone number
        const phoneRegex = /^[0-9]{10}$/;
        const nameRegex = /^[a-zA-Z ]{2,}$/;
        const emailRegex = /^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+$/;
        // Validate Name
        if (!nameRegex.test(name)) {
            alert('Full Name cannot be empty');
            return false;
        }

        // Validate Address
        if (address === "") {
            alert('Address cannot be empty');
            return false;
        }

        // Validate Phone Number
        if (!phoneRegex.test(phone)) {
            alert('Invalid Phone Number');
            return false;
        }

        // Validate Parent Name
        if (parentName === "") {
            alert('Parent Name cannot be empty');
            return false;
        }

        // Validate Course Selection
        if (course === "") {
            alert('Please select a Course');
            return false;
        }

        // If all validations pass
        return true;
    }

function validateForm() {
    // Get form input values
    var courseId = document.getElementById('cid').value.trim();
    var courseName = document.getElementById('cname').value.trim();
    var price = document.getElementById('price').value;

    // Validate Course ID
    if (courseId === "") {
        alert("Course ID cannot be empty");
        return false;
    }

    // Validate Course Name (Alphabetical characters only)
    if (!/^[a-zA-Z\s]+$/.test(courseName)) {
        alert("Course Name must contain alphabetical characters only");
        return false;
    }

    // Validate Price (Not negative or zero)
    if (price <= 0) {
        alert("Price cannot be negative or zero");
        return false;
    }

    // If all validations pass, the form will be submitted
    return true;
}
document.getElementById('courseForm').addEventListener('submit', function(){
    SubmitEvent.preventDefault();
    if(validateForm()){
        document.getElementById('courseForm').submit();
    }
});
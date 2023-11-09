let displayerrormsg=(el,msg)=>{
document.querySelector(`.${el}`).textContent=msg;
}
function validateForm() {
    // Get form input values
    let courseId = document.getElementById('cid').value.trim();
    let courseName = document.getElementById('cname').value.trim();
    let price = document.getElementById('price').value.trim();

    // Validate Course ID
    if (courseId == "") {
        // alert("Course ID cannot be empty");
        displayerrormsg('courseid',"* Course ID cannot be empty");
        return false;
    }else{
        displayerrormsg('courseid',"");
    }
    
    // Validate Course Name (Alphabetical characters only)
    if (!/^[a-zA-Z\s]+$/.test(courseName)) {
        // alert("Course Name must contain alphabetical characters only");
        displayerrormsg('coursename',"* Course Name Must Contain aplhabitical Characters Only");
        return false;
    }else{
        displayerrormsg('coursename',"");
    }
    
    // Validate Price (Not negative or zero)
    if (price <= 0) {
        // alert("Price cannot be negative or zero");
        displayerrormsg('courseprice',"*Price Cannot be Negative or Zero");
        
        return false;
    }else{
        displayerrormsg('courseprice',"");
    }

    // If all validations pass, the form will be submitted
    return true;
}
document.getElementById('courseform').addEventListener('submit', function(e){
    e.preventDefault();
    if(validateForm()){
        document.getElementById('courseForm').submit();
    }
});
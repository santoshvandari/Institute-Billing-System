let totalfee = document.getElementById("totalfee").value;
let dueamount = document.getElementById("dueamount").value;
let errorMessage= document.querySelector(".errormessage");
let submitBtn= document.querySelector("button[type='submit']");
document.getElementById("amount").addEventListener("input",(e)=>{
    let amount = Number(e.target.value);
    console.log(amount)
    if(amount>dueamount){
        errorMessage.innerHTML="<p>* Amount cannot be greater than Due Amount</p>";
        submitBtn.disabled=true;
    }else if(amount<0 || amount==0){
        errorMessage.innerHTML="<p>* Amount cannot be less than or Equal to 0</p>";
        submitBtn.disabled=true;
    }else{
        errorMessage.innerHTML="";
        submitBtn.disabled=false;
    }
});
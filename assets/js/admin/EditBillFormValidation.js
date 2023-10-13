let dueamountEl = document.getElementById("dueamount");
let dueamountold=Number(dueamountEl.value);
let errorMessage= document.querySelector(".errormessage");
let submitBtn= document.querySelector("button[type='submit']");
let paidamountEl=document.getElementById("amount");
let paidamount=Number(paidamountEl.value);
let flag=true;
paidamountEl.addEventListener("input",(e)=>{
    let amount = Number(e.target.value);
    dueamount=Number(dueamountEl.value);
    if(flag){
        dueamountEl.value=dueamountold+paidamount;
        flag=false;
    }
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
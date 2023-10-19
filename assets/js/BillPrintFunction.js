let printbtn=document.getElementById("print");
let btndiv = document.querySelector(".billoptions");
printbtn.addEventListener('click',function(e){
    btndiv.style.display="none";
    window.print()
    btndiv.style.display="block";
})
setTimeout(() => {
    printbtn.click();
}, 100);
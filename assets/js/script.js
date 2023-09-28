let print=document.getElementById("print");
function BillPrint(){
   print.click()
}
print.addEventListener('click',function(e){
    e.target.style.display='none'
    print()
})

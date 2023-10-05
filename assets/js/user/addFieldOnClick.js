counter=0
document.getElementById("add").addEventListener("click",function(e){
    e.preventDefault();
    counter++;
    document.getElementById("counter").value=counter
    let element = `<input type='text' name='desc${counter}' placeholder='Enter a Bill Title'/>`
    document.querySelector('.addbtn').insertAdjacentHTML("beforebegin",element)
    console.log(document.getElementById("counter").value)
})
let SearchInput=document.getElementById("namesearch");
let tableElement=document.querySelector(".student-list table tbody");
console.log(SearchInput)
SearchInput.addEventListener("input",()=>{
    let searchvalue=SearchInput.value.trim();
    fetch(`read.php?name=${searchvalue}`)
    .then(response=>response.text())
    .then(response=>{
        tableElement.innerHTML=response;
    }).catch(e=>{
        console.log(e);
    })
    // let xhr = new XMLHttpRequest();
    // xhr.onreadystatechange=()=>{
    //     if(xhr.readyState==4 && xhr.status==200){
    //         console.log(xhr.responseText);
    //     }
    // }
    // xhr.open("GET",`Institute-Billing-System/user/read.php?name=${searchvalue}`,true);
    // xhr.send();
});
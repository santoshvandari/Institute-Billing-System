let SearchInput=document.getElementById("name");
SearchInput.addEventListener("change",()=>{
    let searchvalue=SearchInput.value();
    fetch(`../../../user/read.php?name=${searchvalue}`)
    .then(response=>response.text())
    .then(response=>{
        console.log(response);
    }).catch(e=>{
        console.log(e);
    })
       
});
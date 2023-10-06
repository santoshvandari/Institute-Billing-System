let SearchInput=document.getElementById("namesearch");
console.log(SearchInput)
SearchInput.addEventListener("change",()=>{
    let searchvalue=SearchInput.value.trim();
    console.log(searchvalue)
    // fetch(`../../../user/read.php?name=${searchvalue}`)
    // .then(response=>response.text())
    // .then(response=>{
    //     console.log(response);
    // }).catch(e=>{
    //     console.log(e);
    // })
});
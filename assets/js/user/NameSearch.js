let SearchInput=document.getElementById("namesearch");
console.log(SearchInput)
SearchInput.addEventListener("input",()=>{
    let searchvalue=SearchInput.value.trim();
    console.log(searchvalue);
    console.log("HEllo")
    // fetch(`../../../user/read.php?name=${searchvalue}`)
    // .then(response=>response.text())
    // .then(response=>{
    //     console.log(response);
    // }).catch(e=>{
    //     console.log(e);
    // })
    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange=()=>{
        if(xhr.readyState==4 && xhr.status==200){
            console.log(xhr.responseText);
        }
    }
    xhr.open("GET",`/project/Institute-Billing-System/user/read.php?name=${searchvalue}`,true);
    xhr.send();
});
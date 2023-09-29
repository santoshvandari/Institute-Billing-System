<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../assets/css/common-style.css">
    <link rel="stylesheet" href="../assets/css/user-dashboard.css"/>
    <link rel="stylesheet" href="../assets/css/studentbillform.css">

</head>
<body>
   <header>
    <nav>
        <div class="logo">Billing System</div>
        <div class="user-info">
            <div class="user">
                <div class="username">Santosh Bhandari</div>
                <div class="user-img"><img src="../img/img.jpg" alt="" srcset=""></div>
            </div>
        </div>
    </nav>
   </header>
   <main>
    <section class="side-option">
       <div class="side-option-container">
        <h4>User</h4>
        <ul class="side-option-list">
            <li><a href="user-dashboard.html">Home</a></li>
            <li><a href="student-bill.html">Bill</a></li>
            <li><a href="student-list.html">Student</a></li>
            <li><a href="add-student.html">Add Student</a></li>
            <li><a href="#">Logout</a></li>
        </ul>
        </div>
           
    </section>
    <section class="main-container form-container">
        <div class="form-wrapper">
            <div class="studentinfo">
                <h3>Student Information</h3>
                <p class="name">Name: Santosh Bhandari</p>
                <p class="address">Address: Kanakai-07 </p>
                <p class="phone">Phone: 98060221</p>
            </div>
            <form class="form" action="#" method="post">
                <h3>Fill the Bill Information</h3>
                <input type="text" name="name" hidden value="santosh vandari">
                <input type="text" name="address" hidden value="kanakai-07">
                <input type="phone" name="phone" hidden value="9824988945">
                <label for="desc">Description</label>
                <input type="text" id="desc" name="desc0" placeholder="Enter a Bill title"/>
                <div class="addbtn">
                    <button id="add">+</button>
                </div>
                <label for="amt">Amount</label>
                <input type="number" id="amt" name="address" placeholder="Enter a Amount"/>
                <input type="number" name="counter" id="counter" value="0" hidden>
                <div class="btn-wrapper">
                    <button type="reset">Clear</button>
                    <button type="submit">Generate</button>
                </div>
            </form>
            </div>
    </section>
   </main>
   <footer>
   </footer>
   <script>
    counter=0
    document.getElementById("add").addEventListener("click",function(e){
        e.preventDefault();
        counter++;
        document.getElementById("counter").value=counter
        let element = `<input type='text' name='desc${counter}' placeholder='Enter a Bill Title'/>`
        document.querySelector('.addbtn').insertAdjacentHTML("beforebegin",element)
        console.log(document.getElementById("counter").value)
    })
   </script>
</body>
</html>
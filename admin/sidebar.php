</head>
<body>
   <header>
    <nav>
        <div class="logo">Billing System</div>
        <div class="user-info">
            <div class="user">
                <div class="username"><strong><?=$_SESSION['adminname']?></strong></div>
            </div>
        </div>
    </nav>
   </header>
   <main>
    <section class="side-option">
       <div class="side-option-container">
        <h4> Admin<a href="admin-dashboard.php">Admin</a></h4>
        <ul class="side-option-list">
            <li><a href="admin-dashboard.php">Home</a></li>
            <li><a href="course-list.php">Course</a></li>
            <li><a href="student-list.php">Student</a></li>
            <li><a href="student-bill.php">Bill</a></li>
                <li><a href="admin-list.php">Admin</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
        </div>
           
    </section>
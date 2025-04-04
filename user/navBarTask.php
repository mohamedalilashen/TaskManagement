<?php
include '../init.php';
print time_session();
user() == false ?  print "<script>window.location.replace('login.php')</script>" : print '';
$code = $_SESSION['code'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="">
    <meta content="" name="description">

    <!-- Favicon -->
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;400;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />


    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/stylee.css" rel="stylesheet">
    <!--  sweetalert2-->
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class=" bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <!-- Sidebar Start -->
        <div class="sidebar pb-3">
            <nav class="navbar">
                <a href="index.php" class="navbar-brand w-100 mb-5 mt-2">
                    <div class="container-fluid m-auto w-75" style = 'font-size:32 px;'>
                       EraaSoft
                    </div>
                </a>
                <div class="navbar-nav w-100">
                    <a href="index.php" dir="rtl" class="nav-item nav-link active mb-3">
                        <span class="w-25">
                            <img class="rounded-circle me-lg-2" src="img/home.png" alt="" style="width: 30px; height: 30px;">
                        </span>
                        <span dir="rtl" class="w-75 text-dark">  home page </span>
                    </a>
                    <!-- سكشن الطلاب  -->
                    <div class="dropdown mb-2 open-on-load ">
                        <a href="addTask.php?code=<?php print $code;?>" class="nav-link dropdown-toggle" dir="rtl" >
                            <span class="w-25">
                                <img class="me-lg-2" src="img/center.png" alt="" style="width: 30px; height: 30px;">
                            </span>
                            <span class="d-none d-lg-inline-flex me-2 clicked">add task</span>
                        </a>
</div>
<div class="dropdown mb-2 open-on-load ">
                        <a href="viewTasks.php?code=<?php print $code;?>" class="nav-link dropdown-toggle" dir="rtl" >
                            <span class="w-25">
                                <img class="me-lg-2" src="img/center.png" alt="" style="width: 30px; height: 30px;">
                            </span>
                            <span class="d-none d-lg-inline-flex me-2 clicked">view tasks</span>
                        </a>
</div>
<div class="dropdown mb-2 open-on-load ">
                        <a href="tasks.php?code=<?php print $code;?>" class="nav-link dropdown-toggle" dir="rtl" >
                            <span class="w-25">
                                <img class="me-lg-2" src="img/center.png" alt="" style="width: 30px; height: 30px;">
                            </span>
                            <span class="d-none d-lg-inline-flex me-2 clicked">control tasks</span>
                        </a>
</div>
                       
                   
                    <!-- سكشن الطلاب  -->
                    <!-- <div class="dropdown mb-2 open-on-load ">
                        <a href="editPost.php" class="nav-link dropdown-toggle" dir="rtl" >
                            <span class="w-25">
                                <img class="me-lg-2" src="img/students.png" alt="" style="width: 30px; height: 30px;"> -->
                            </span>
                            <!-- <span class="d-none d-lg-inline-flex me-2 clicked">edit posts</span> -->
                        </a>
              
                    </div>
                </div>
            </nav>
        </div>

        <!-- Sidebar End -->

        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand navbar-dark sticky-top px-4 py-0 mb-3">
                <div class="navbar-nav align-items-center me-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="img/admin.png" alt="" style="width: 50px; height: 50px;">
                            <span class="d-none d-lg-inline-flex">
                              
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-white border-0 rounded-0 rounded-bottom m-0">
                           
                            <a href="../admin/logout.php " class="dropdown-item bg-white">Log Out</a>
                        </div>
                    </div>
                </div>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
            </nav>

            <!-- Navbar End -->
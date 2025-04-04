<?php
include '../init.php';
print time_session();
user() == false ?  print "<script>window.location.replace('login.php')</script>" : print '';
$code = $_SESSION['code'];

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="content/css/style.css" />
    <link rel="stylesheet" href="content/css/navbar/navbar.css" />
    <title>Home</title>
  </head>
  <body>
    <nav class="main-nav">
      <div class="container">
        <div class="main-nav__logo">
          <a href="index.html">
            <h1> EraaSoft </h1>
          </a>
        </div>
        <div class="menu-icon">
          <span class="icon"></span>
        </div>
        <ul class="main-nav__list">
        
            <ul class="main-nav__item__menu">
            </ul>
          </li>
          <li class="main-nav__item">
            <a href="tasks.php?code=<?php print $code;?>" class="main-nav__link">your task</a>
          </li>
          <li class="main-nav__item">
          <a href="#" class="main-nav__link"></a>
          <li class="main-nav__item">
            <a href="content/src/about-us.html" class="main-nav__link"
              >About Us</a
            >
          </li>
          <li class="main-nav__item sign-in">
          <?php user() == true ?  print '<a href="logout.php" class="main-nav__link">logout</a>'  : print'<a href="login.php" class="main-nav__link">Sign in</a>'; 
          ?>
          </li>
        </ul>
      </div>
    </nav>
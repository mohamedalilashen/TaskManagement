<?php
include '../init.php';
 user() == true ?  print "<script>window.location.replace('index.php')</script>" : print '';

if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $s = new TaskManagement();
    $ss = $s->selectOne('user', ['email' => $email, 'password' => $password]);
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    } else {
        die(" please enter you'r email " . $email);
    }
    if (empty($email || $hashedPassword)) {
        print 'the input empty  <br>';
    }

    if ($ss) {
        $code = $ss['code'];
        $_SESSION['user'] = true;
        $_SESSION['userLogged'] = true;
        $_SESSION['code'] = $code;
      

        print "<script>window.location.replace('index.php')</script>";
    } else {
        print '<script>alert("error in email or password")</script>';
        // die();
    } 
}
    ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="content/css/login.css" />
    <title>Document</title>
  </head>
  <body>
    <section class="login">
      <div class="login-box">
        <h2>Login</h2>
        <form action="" method="post">
          <div class="user-box">
            <input type="text" name="email" required="" />
            <label>email</label>
          </div>
          <div class="user-box">
            <input type="password" name="password" required="" />
            <label>Password</label>
          </div>
          <a href="#" >
            <span></span>
            <span></span>
            <span></span>
            <span></span>
           <input type="submit" calss="b"  name="login"value="login"> 
          </a>
          <a href="signIn.php" >
            <span></span>
            <span></span>
            <span></span>
            <span></span>
              don't have an account  
          </a>
        </form>
      </div>
    </section>
  </body>
</html>

<?php
include '../init.php';
 user() == true ?  print "<script>window.location.replace('index.php')</script>" : print '';
 $class = new TaskManagement();
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
            <input type="text" name="firstName" required="" />
            <label>first name</label>
          </div>
          <div class="user-box">
            <input type="text" name="lastName" required="" />
            <label>last name</label>
          </div>
          <div class="user-box">
            <input type="text" name="phone" required="" />
            <label>phone number</label>
          </div>
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
           <input type="submit" calss="b"  name="signIn"value="sign in"> 
          </a>
         
      </div>
    </section>
  </body>
</html>
<?php
if(isset($_POST['signIn'])){
    $firstName= $_POST['firstName'];
    $lastName = $_POST['lastName']; 
    $phone =  $_POST['phone'];
       $email = $_POST['email'] ;
    $password = md5($_POST['password']);
     $code = rand(100000,999999);
 
     
    // هنا يتم التحقق من وجود بينات مشابهه او فارغه
   
    //   gettype($phone) == 'string' || gettype($fatherPhone) == 'string' ? print ' <script>alert("من فضلك ضع ايميل );</script>' : print'';
 
    empty($firstName) || empty($lastName) || empty($phone)  || empty($email) || empty($password) ? die(' the input is empty '):print '';
     filter_var( $email , FILTER_VALIDATE_EMAIL )? print '': print ' <script>alert(" please enter email ")</script>' ; 
     strlen($phone) != 11 ? die('<script>alert( the number is  '.strlen($phone). ' only 11 digits are allowed)</script>'): print '';
    $selectRow =$class->selectRowCountOr('user',['phone'=>$phone,'email'=>$email]);
    if($selectRow == 0){
      $create =$class->create('user', ['firstName'=>$firstName,'lastName'=>$lastName,'phone' =>intval($phone),'email'=>$email,'password'=>$password,'code'=>$code]);
      print $create;
      print "<script>window.location.replace('login.php?msg')</script>";
  
    }
    else{
        print '<script>alert("this email is already registered")</script>';
    }
}
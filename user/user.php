<?php
include '../init.php';
// اولا الاستعلام عن السنين الدراسيه 
$selectYear = selectAll('scoolyear');


//هنا هجيب صاحب الايميل \
if (isset($_GET['code'])) {
    if (empty($_GET['code'])) {
        die("لا يوجد ايميل مسجل من قبل الموقع يرجي الرجوع وتسجيل الدخول");
    }
    $selectUser = selectOne('user', ['email' => $_GET['code']]);
    $email = $selectUser['email'];
    $code = $selectUser['code'];
    print '
     <div class="w-75 m-auto text-center p-3  card mt-3">
        <h3>الكود الخاص بك  <span class="text-danger">' . $code . ' </span>  </h3> 
         <h6 class="text-success">سيتم ارسال الكود للبريد الالكتروني </h6>
         </div>  ';
    // send($email, "مرحبا بك ايها الطالب " . $selectUser['firstName'] . "", " يرجي الحفاظ علي الكود   " . "<br/>" . " الكود الخاص بك هو: $code
    // ");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN_USER</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <div class="wrapper w-75 m-auto mt-5 border-info border-3 mb-3 border">
        <div class="logo">
            <img src="./favicon .png" alt="">
        </div>
        <div class="text-center mt-4 name">
        برجاء إدخال البيانات بشكل صحيح
        </div>
        <form class="p-3 mt-3" action="" method="post" dir="rtl">
            <div class="container w-75">
                <div class="row d-flex">
                    <div class="col-12 col-lg-6 col-md-6">
                        <div class="form-field d-flex align-items-center ">
                            <span class="far fa-user"></span>
                            <?php print csrf();       ?>
                            <input type="text" name="firstName" id="firstName" placeholder="الاسم الاول">
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-md-6">
                        <div class="form-field d-flex align-items-center">
                            <span class="fas fa-key"></span>
                            <input type="text" name="lastName" id="pwd" placeholder="الاسم الاخير">
                        </div>
                    </div>
                    <div class="col-12 col-lg-4 col-md-6">
                        <div class="form-field d-flex align-items-center">
                            <span class="fas fa-key"></span>
                            <input type="number" name="phone" id="pwd" placeholder="رقم الموبايل ">
                        </div>
                    </div>
                    <div class="col-12 col-lg-8 col-md-6">
                        <div class="form-field d-flex align-items-center">
                            <span class="fas fa-key"></span>
                            <input type="number" name="fatherPhone" id="pwd" placeholder="رقم موبايل الاب">
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-md-6">
                        <div class="form-field d-flex align-items-center">
                            <span class="fas fa-key"></span>
                            <input type="email" name="email" id="pwd" placeholder="الايميل">
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-md-6">
                        <div class="form-field d-flex align-items-center">
                            <span class="fas fa-key"></span>
                            <input type="password" name="password" id="pwd" placeholder="الباسورد ">
                        </div>
                    </div>
                    <div class="col-12 col-lg-12 col-md-6 ">
                    <div class="row">
                    <div class="col-12 col-lg-4 col-md-6 ">
                        <select class="form-select form-field" name="year" aria-label="Default select example">
                            <option value="0" selected>السنه الدراسيه</option>
                            <!--هنا وضع الاستعلام عن طريق اتش-->
                            <?php
                            foreach ($selectYear as $year) {
                                $Yearr = $year['scoolYear'];
                                $id_year = $year['id'];
                                print ' 
                            <option value="' . $year['scoolYear'] . '">' . $year['scoolYear'] . '</option>';
                            }

                            ?>

                        </select>
                    </div>
                <div class="col-12 col-lg-4 col-md-6 ">
                    <select name="type" class="form-select form-field" aria-label="Default select example">
                        <option value="0" selected>طريقه الدفع</option>
                        <option value="m">شهريه</option>
                        <option value="d">يوميه</option>
                    </select>
                </div>
                <button type="submit" name="add" class="btn mt-3">تسجيل</button>
            </div>
            </div   >
            </div>
            </div>
        </form>
    </div>
    <?php

    if (isset($_POST['add'])) {
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $phone =  $_POST['phone'];
        $fatherPhone = $_POST['fatherPhone'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $year = $_POST['year'];
        $code = rand(100000, 999999);
        $type = $_POST['type'];

        // هنا يتم التحقق من وجود بينات مشابهه او فارغه

        //   gettype($phone) == 'string' || gettype($fatherPhone) == 'string' ? print ' <script>alert("من فضلك ضع ايميل );</script>' : print'';

        empty($firstName) || empty($lastName) || empty($phone) || empty($fatherPhone) || empty($email) || empty($password) || $year == 0 ||  $type == 0 ?
        
            die('<div><h4 class="text-center "> يرجي عدم ترك حقول فارغة</h4> </div>') : print '';

        filter_var($email, FILTER_VALIDATE_EMAIL) ? print '': print ' <script>alert("من فضلك ضع ايميل ")</script>';

        $phone == $fatherPhone ? die(' <div> <h4 class="text-center "> ضع رقم والدك في الخانه وليس رقمك</h4> </div>') : print '';

        strlen($phone) != 11   ||   strlen($fatherPhone) != 11 ? die('<script>alert("  يجب وضع 11 رقم في خانه رقم الهاتف الخاص بك او الوالد' . strlen($phone) . '")</script>') : print '';

        $selectRow = selectRowCountOr('user', ['phone' => $phone, 'fatherPhone' => $fatherPhone, 'email' => $email]);

        if ($selectRow <= 0) {

            $create = create('user', ['firstName' => $firstName, 'lastName' => $lastName, 'phone' => intval($phone), 'fatherPhone' => intval($fatherPhone), 'email' => $email, 'password' => $password, 'scoolYear' => $year, 'code' => $code, 'typePay' => $type]);

            print $create;

            print "<script>window.location.replace('user.php?code=" . $email . "')</script>";

        } else {

            print 'هذا الايميل موجود من قبل';

        }
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>

</html>
<?php
include 'navBarTask.php';

user() == false ?  print "<script>window.location.replace('login.php')</script>" : print '';
$code = $_GET['code']; 

?>
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Amasi tech login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="./css/style.css">
</head>

<body style="background-color: #eee;">
    <section class="gradient-form">
        <div class="container  h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-10">
                    <div class="card rounded-3 text-black">
                        <div class="row g-0">
                        <div class="col-lg-6 d-flex align-items-center gradient-custom-2 bg_info">
                                <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                                    <h4 class="mb-4 text-center" dir="rtl"> welcome to the add Tasks page ! please added Task </h4>
                                    <p class="small mb-0" dir="rtl"> EraaSoft . welcome add Tasks page where you manage your important and exciting topics wishing you great day thank you !

                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card-body p-md-5 mx-md-4">
                                    <div class="text-center">
                                     <h1 >  EraaSoft </h1>
                                        <h4 class="mt-1 mb-5 pb-1">Welcome to  EraaSoft 
                                    </div>
                                    <form action="" method="POST">
                                        <?php print csrf(); ?>
                                        <p>Please  added Tasks</p>

                                        <div class="form-outline mb-4">
                                            <input type="text" id="form2Example11" class="form-control" name="title" placeholder=" your title" />
                                        </div>
                                        <div class="form-outline mb-4">
                                            <span> your content </span>
                                            <textarea rows="" cols=""id="form2Example22" class="form-control" name="content" placeholder="your content "> </textarea>
                                        </div>
                                        <div class="form-outline mb-4">
                                        <span> your time Task </span>
                                        <input
                                           type="datetime-local"
                                            id="meeting-time"
                                            name="date"
                                           value="2025-01-12T02:30"
                                           min="2024-06-07T00:00"
                                           max="2060-06-14T00:00" />
                                        <div class="text-center pt-1 mb-5 pb-1">
                                            <input name="add" type="submit" class="btn btn-primary bg_info btn-block fa-lg gradient-custom-2 mb-3" >
                                        </div>

                                    </form>
                                </div>
                            </div>
                       
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
 <?php
 $class = new TaskManagement();
  if (isset($_POST['add'])) {
    $title = $_POST['title'] ;
    $content = $_POST['content'] ;
    $date = $_POST['date'];
    $codeTask = rand(100000,999999);
    empty($title) || empty($content) ? die('<script>alert("error the title and content is empty")</script>') : print '' ;
    $sucssesMassege = $class->selectRowCountOr('posts' , ['codeTask' => $code]) ;
    $taskDate = $date;
    $taskTimestamp = strtotime($taskDate); 
    $currentTimestamp = time();
    $difference = $taskTimestamp - $currentTimestamp;
    if ($difference > 0) {
        $days = floor($difference / (60 * 60 * 24));
        $hours = floor(($difference % (60 * 60 * 24)) / (60 * 60));
        $minutes = floor(($difference % (60 * 60)) / 60);
        $seconds = $difference % 60;
        if($sucssesMassege < 0) {
            print '<script>alert("sucssesfully your post")</script>';
        }
        else {
            print 'error in send post';
        }
        $s = $class->create('posts' , [
            "title" => $title,
            "content" => $content ,
            "date" => $date ,
            "codeTask" => $codeTask,
            "code_user" => $code
            ]) ;
        
    } else {
        print '<script>alert("The deadline has passed.")</script>';
    }



}

include 'footer.php';
?>
<?php
// include 'navBar.php';
include 'navBarTask.php';
!isset($_GET['code']) ? die(' <center> <div style="margin-top:20%;font-size:50px;"  class="alert alert-danger"> error 404</div> </center>') : print '';
empty($_GET['code']) ? die(' <center> <div style="margin-top:20%;font-size:50px;"  class="alert alert-danger"> error 404</div> </center>') : print '';
$class = new TaskManagement();
$code = $_GET['code'];
$selcteCodeRow = $class-> selectRowCountOr('user', ['code' => $code]); 
$selcteCodeRow <= 0 ?  die(' <center> <div style="margin-top:20%;font-size:50px;"  class="alert alert-danger"> error 404</div> </center>') : print '';
$selcteCodeRowTask = $class-> selectRowCountOr('posts', ['code_user' => $code]);
$selcteCodeRowTask <= 0 ?  die(' <center> <div style="margin-top:20%;font-size:50px;"  class="alert alert-danger"> No tasks found</div> </center>') : print '';


?>

<!-- Start your project here-->
<!-- Page Content -->

<div class="vh-100 ">
    <!-- Sale & Revenue Start -->
    <div class="container-fluid pt-4 px-4 w-100 ">
        <a href="viewTasks.php?code=<?php print $code ?>">
        <div class="row g-4">
            <div class="col-sm-6 col-xl-6 col-lg-6">
                <div class="bg-white  rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-bar fa-3x text-info"></i>
                    <div class="ms-3">
                        <p class="mb-2"><?php print $selcteCodeRowTask ?></p>
                        <h6 class="mb-0 text-primary" dir="rtl">
                            <div>
                                <span>    </span>
                                <span> all date </span>
                            </div>
                        </h6>
                    </div>
                </div></a>
            </div>

            <!-- <div class="col-sm-6 col-x  l-6 col-lg-6 ">
                <div class="bg-white  rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-line fa-3x text-info"></i>
                    <div class="ms-3">
                        <p class="mb-2">1 </p>
                        <h6 class="mb-0 text-primary" dir="rtl">
                            <div>
                                <span>    </span>
                                <span>all date</span>
                            </div>
                        </h6>
                    </div>
                </div> -->
            </div>
        </div>
    </div>


<?php
include 'footer.php';
?>
                
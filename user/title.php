<?php
include 'navBar.php';

?>
<link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.11/typed.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="icon" href="img/logo_free-file.png" type="image/png">
 
<section class="services" id="services">
        <div class="max-width">
            <center> <h1 class="mb-0 text-primary" style = " margin-top:-50px; margin-bottom:20px;"> Essential Topics </h1></center>
            <div class="serv-content">
                <?php 
                $sq = selectOrder("posts" , "created_at" , "DESC"); 
                print '    <tbody>';
                   foreach ($sq as $sql) {
                    echo '
                 <a href="blogs.php?code='.$sql['code'].'"> <div class="card" style = margin-bottom:20px;>
                    <div class="box">
                        <i class="fas fa-book"></i>
                        <div class="text">'.$sql['title'].' </div>
                 </div>
                 </a>
                  </div>

                           
      '; }?>
                      
               
               </div>
            </div>
        </div>
    </section>
                  
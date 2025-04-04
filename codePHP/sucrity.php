<?php 
include 'taskManagement.php';

function XXS($input)
{
$safe_data = htmlspecialchars($input , ENT_QUOTES, 'UTF-8');
return $safe_data ;
} 
 

function csrf(){
    $csrf_token = bin2hex(random_bytes(32));
    $_SESSION['csrf_token'] = $csrf_token;    
if (isset($_POST['csrf_token'] )=== $_SESSION['csrf_token']) {

} else {
 return false; 
 exit();
}
}

function HTTPS(){
    if ($_SERVER['HTTPS'] !== 'on') {
        header('Location: https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
        exit;
      }      
}
<?php 

// function admin(){
//     if(isset($_SESSION['admin'])&& $_SESSION['ad_id']){
//         return true;
//     }
//     return false;
// }
function user(){
    if(isset($_SESSION['user'])&& $_SESSION['userLogged']){
        return true;
    }
    return false;
}

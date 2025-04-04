<?php  
/*
 * 
 
+-----------------------------------------------------------------------------------------------------------------+
|                                                                                                              |
|        o                                                                                                     |
|       /|\/                                                                                                   |              
|       / \                                                                                                    |
|                                                                                                              |
|                 ____                                                                                         |
|               /      \                                                                                       |
|              |  🐘   |                                                                                       | 
|               \______/                                                                                       |
|          ~~  ~~  ~~  ~~                                                                                      |
|                                                                                                              |
|  __________________________________________                                                                  |
| |                                          |                                                                 |
| |  CREATED BY:                             |                                                                 |
| |  eng/mohamed ali Lasheen                 |                                                                 | 
| |__________________________________________|                                                                 | 
|                                                                                                              |
+------------------------------------------------------------------------------------------------------------------+



 */

session_set_cookie_params(10800, '/'); 
session_start();
function time_session()
{
if (!isset($_SESSION['start_time'])) {
    $_SESSION['start_time'] = time(); 
}
$sessionStartTime = $_SESSION['start_time']; 

if(isset($sessionStartTime) && (time() - $sessionStartTime) > (10800)) {
    session_unset();
    session_destroy();  
    return '<meta http-equiv="refresh" content="0.5">';
}

}


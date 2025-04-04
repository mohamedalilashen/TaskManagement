<?php

$username='root';
$password= "" ;
$database = new PDO('mysql:host=localhost;dbname=taskmanagement;' ,$username,$password);
if(!$database){print'error connection';}

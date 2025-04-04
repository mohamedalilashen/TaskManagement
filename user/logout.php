<?php
include '../init.php';
session_unset();
session_destroy();
print "<script>window.location.replace('login.php')</script>";
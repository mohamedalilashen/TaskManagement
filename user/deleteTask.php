<?php
include 'navBarTask.php';

user() == false ?  print "<script>window.location.replace('login.php')</script>" : print '';
$code = $_GET['code']; 
$userCode = $_GET['u'];
$class = new TaskManagement();
$selectTaskData = $class->selectOne('posts', ['codeTask'=> $code]);
// $class->dd($selectTaskData['title']);
$task_id = $selectTaskData['id'];
$delete = $class->delete('posts' , $task_id);
print "<script>window.location.replace('viewTasks.php?code=".$userCode."')</script>";
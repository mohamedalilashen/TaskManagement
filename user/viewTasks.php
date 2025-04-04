<?php
include 'navBarTask.php';
!isset($_GET['code']) ? die(' <center> <div style="margin-top:20%;font-size:50px;"  class="alert alert-danger"> error 404</div> </center>') : print '';
empty($_GET['code']) ? die(' <center> <div class="alert alert-warning" style="margin-top:20%;font-size:50px;" > error 404</div> </center>') : print '';
$class = new TaskManagement();
$user_code = $_GET['code'];

?>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">titel</th>
      <th scope="col">tasks</th>
      <th scope="col">time</th>
      <th scope="col">date</th>
      <th scope="col">Remaining time</th>
      <th scope="col">edit</th>
      <th scope="col">delete</th>


    </tr>
  </thead>
  <tbody>
    <?php
    $selectAll = $class->selectAllif('posts' , ['code_user' => $user_code]);
    foreach($selectAll as $selectAl){
        $dateTime = $selectAl['date'];
        $parts = explode(' ' , $dateTime);
      $taskDate = $selectAl['date'];
$taskTimestamp = strtotime($taskDate); 
$currentTimestamp = time();
$difference = $taskTimestamp - $currentTimestamp;
    $days = floor($difference / (60 * 60 * 24));
    $hours = floor(($difference % (60 * 60 * 24)) / (60 * 60));
    $minutes = floor(($difference % (60 * 60)) / 60);
    $seconds = $difference % 60; 
    $task_code = $selectAl['codeTask']; 
    // die('<h1 style=color:red; >'.intval($minutes));

   print '<tr>
      <th scope="row">1</th>
      <td>'.$selectAl['title'].'</td>
      <td>'.$selectAl['content'].'</td>
      <td>'.$parts[1].'</td>
       <td>'.$parts[0].'</td>
      ';
      if ($days > 0) {
        print '<td>'.$days.' days remaining</td>';
    }
     elseif ($days == 0 && $hours > 0) {
        print '<td>'.$hours.' hours remaining</td>';
    } 
    elseif ($days == 0 && $hours == 0 && $minutes > 0) {
        print '<td>'.$minutes.' minutes remaining</td>';
    } 
    elseif ($days == 0 && $hours == 0 && $minutes == 0 && $seconds > 0) {
        print '<td>'.$seconds.' seconds remaining</td>';
    } 
    else {
        print '<td class="table-danger">Time expired</td>';
        print '<script>alert("Time expired")</script>';
        $id = $selectAl['id'];
        $delete = $class->delete('posts', $id);
    }
        
        print '<td><a href="editTask.php?code='.$task_code.'&u='.$user_code.'"><button type="button" class="btn btn-info">edit</button></a></td>
               <td> <a href="deleteTask.php?code='.$task_code.'&u='.$user_code.'"><button type="button" class="btn btn-danger">delete</button></a></td>';
        }
    
?>
    
    </tr>
  
  </tbody>
</table>
<?php
include 'footer.php';
?>
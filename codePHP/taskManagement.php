<?php 
   include 'functionManagement.php';

  class TaskManagement 
  {
  
function dd($values)
{
    echo "<pre>", print_r($values, true), "</pre>";
    die();
}


function create($table, $data) {
    try {
  
      global $database;


        $columns = implode(", ", array_keys($data));
        $values = ":" . implode(", :", array_keys($data));
        // return $columns . $values;
        // die();
        $stmt = $database->prepare("INSERT INTO $table ($columns) VALUES ($values)");

        $stmt->execute($data);
      echo '<script>alert("sucssesfully added post")</script>';
    } 
    catch (PDOException $e) {
        echo "<script>alert('error sending post try aging later')</script> " . $e->getMessage();
    }
}

function update($table,$id,$data){
    global $database;
   try {
      $sql = "UPDATE $table SET ";
      $updates = array();
  
      foreach ($data as $key => $value) {
          $updates[] = "$key = ?";
      }
  
      $sql .= implode(", ", $updates);
      $sql .= " WHERE id = ?";
      
  
      $stmt = $database->prepare($sql);
      $bindParams = array_values($data);
      $bindParams[] = $id;
      $stmt->execute($bindParams);
      echo '<script>alert("sucssesfully editing post")</script>';
    }
    catch (PDOException $e) {
        echo "<script>alert('error edit post try aging later')</script> " . $e->getMessage();
    }

   }



function deleteAll($table)
{
    global $database;
    $delete = $database->prepare("delete from $table");
    $delete->execute();
} 

function delete( $table ,$id )
{
    global $database;
    try {
    $delete = $database->prepare("delete from $table where id = $id");
    $delete->execute();
    echo '<script>alert("sucssesfully deleted post")</script>';
    }
    catch (PDOException $e){
        echo '<script>alert("errer try aging later")</script>';
    }

} 

function selectAll($table)
{
    global $database;
    $sel = $database->prepare("SELECT * from $table");
    $sel->execute();
    // $s = $sel->fetch(PDO::FETCH_ASSOC);
    return $sel;
}


public function selectOne($table ,$conditions )
{
    global $database;
    try {
        // Create a database connection

        // Construct the SQL query
        $sql = "SELECT * FROM $table WHERE ";

        $whereConditions = array();
        $bindValues = array();

        foreach ($conditions as $column => $value) {
            $whereConditions[] = "$column = ?";
            $bindValues[] = $value;
        }

        $sql .= implode(" AND ", $whereConditions);

        $stmt = $database->prepare($sql);
        $stmt->execute($bindValues);

        
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

       
        return $data;
    } 
    catch (PDOException $e) {
       
        return "Error: " . $e->getMessage();
    }
}
function selectRowCount($table ,$conditions )
{
    global $database;
    try {
        // Create a database connection

        // Construct the SQL query
        $sql = "SELECT * FROM $table WHERE ";

        $whereConditions = array();
        $bindValues = array();

        foreach ($conditions as $column => $value) {
            $whereConditions[] = "$column = ?";
            $bindValues[] = $value;
        }

        $sql .= implode(" AND ", $whereConditions);

        $stmt = $database->prepare($sql);
        $stmt->execute($bindValues);

        
        $data = $stmt->rowCount();

       
        return $data;
    } 
    catch (PDOException $e) {
       
        return "Error: " . $e->getMessage();
    }
}
function selectRowCountOr($table ,$conditions )
{
    global $database;
    try {
      
        $sql = "SELECT * FROM $table WHERE ";

        $whereConditions = array();
        $bindValues = array();

        foreach ($conditions as $column => $value) {
            $whereConditions[] = "$column = ?";
            $bindValues[] = $value;
        }

        $sql .= implode(" OR ", $whereConditions);

        $stmt = $database->prepare($sql);
        $stmt->execute($bindValues);

        
        $data = $stmt->rowCount();

       
        return $data;
    } 
    catch (PDOException $e) {
       
        return "Error: " . $e->getMessage();
    }
}

function selectAllif($table ,$conditions)
{
    global $database;
    try {
       
        $sql = "SELECT * FROM $table WHERE ";

        $whereConditions = array();
        $bindValues = array();

        foreach ($conditions as $column => $value) {
            $whereConditions[] = "$column = ?";
            $bindValues[] = $value;
        }

        $sql .= implode(" AND ", $whereConditions);

        $stmt = $database->prepare($sql);
        $stmt->execute($bindValues);

        return $stmt;
     
    } 
    catch (PDOException $e) {
       
        return "Error: " . $e->getMessage();
    }
}
function selectOrder($table , $column, $OrderType = 'ASC')
{
    global $database;
    try {
       $OrderType = strtoupper(trim($OrderType));
       if(!in_array($OrderType, ['ASC' , 'DESC'])){
        $OrderType = 'ACS';
       }
        $sql = "SELECT * FROM $table ORDER BY $column  $OrderType";
        $stmt = $database->prepare($sql);
        $stmt->execute(); 
       
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC) ;
        
       
        return $result ?: [] ;
     
    } 
    catch (PDOException $e) {
       
        return $e->getmessage();
    }
}

function send($to , $title ,$body){
    $header = "From: eztech Team". "<br>" ."CC:Eztech@gmail.com";
    mail($to,$title ,$body,$header);  
 } 
  }
?>

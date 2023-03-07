<?php 
include 'conn/conn.php';

$stream = $_POST['stream'];
$classid = $_POST['classid'];


// first check wether that year exists


  $query = "SELECT * FROM streams WHERE stream = ? AND class_id = ?";
  $stmt = $db->prepare($query);


//bind the placeholder to a vlaue
  $stmt->bindparam(1, $stream);
  $stmt->bindparam(2, $classid);
  $stmt->execute();


   if($stmt->rowCount() > 0){
     echo "error";
  }else{

    $query = "INSERT INTO streams (stream ,class_id) VALUES (:stream, :class_id)";
    $stmt = $db->prepare($query);
    $stmt->bindparam(':stream', $stream); 
    $stmt->bindparam(':class_id', $classid);
    $res = $stmt->execute();

    if($res){
 		echo 'yap';

    }else{
    	echo "nop";

    }
  }





 
 ?>
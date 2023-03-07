<?php
include 'conn/conn.php';

$term = $_POST['term'];

$query = "SELECT term FROM terms WHERE term = ?";

$stmt = $db->prepare($query);

$stmt->bindparam(1, $term);
$stmt->execute();


  if($stmt->rowCount() > 0){

    $query = "UPDATE terms SET status = 0";
    $stmt = $db->prepare($query);

    if($stmt->execute()){
      $query = "UPDATE terms SET status = 1 WHERE term = ?";
      $stmt = $db->prepare($query);

      $stmt->bindparam(1, $term);

      if($stmt->execute()){
        $_SESSION['term'] = $term;
        echo "yap";
      }else{
        echo "nop";
      }

    }else{
      echo "sometihing went wrong";
    }



  }else{
    echo "no year";
  }




 ?>

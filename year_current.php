<?php
include 'conn/conn.php';

$year = $_POST['year'];

$query = "SELECT year FROM years WHERE year = ?";

$stmt = $db->prepare($query);

$stmt->bindparam(1, $year);
$stmt->execute();


  if($stmt->rowCount() > 0){

    $query = "UPDATE years SET status = 0";
    $stmt = $db->prepare($query);

    if($stmt->execute()){
      $query = "UPDATE years SET status = 1 WHERE year = ?";
      $stmt = $db->prepare($query);

      $stmt->bindparam(1, $year);

      if($stmt->execute()){
        $_SESSION['year'] = $year;
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

<?php
include_once 'conn/conn.php';
if(isset($_POST['year_add'])){

$year = $_POST['year'];

// first check wether that year exists

  if(is_numeric($year)){
    $query = "SELECT * FROM years WHERE year = ?";
    $stmt = $db->prepare($query);


  //bind the placeholder to a vlaue
    $stmt->bindparam(1, $year);
    $stmt->execute();


     if($stmt->rowCount() > 0){
       $_SESSION['msg'] = "The year $year exists!";
       $_SESSION['msg-type'] = "warning";
    }else{

      $query = "INSERT INTO years (year) VALUES (:year)";
      $stmt = $db->prepare($query);
      $stmt->bindparam(':year', $year);

      $res = $stmt->execute();

      if($res){

        $_SESSION['msg'] = " Year Inserted Succesfully";
        $_SESSION['msg-type'] = "success";

      }else{

        $_SESSION['msg'] = " Something went wrong";
        $_SESSION['msg-type'] = "warning";

      }
    }


  }else{
    $_SESSION['msg'] = "Please enter a number as a year";
    $_SESSION['msg-type'] = "warning";
  }

}

header("location:dashboard.php?page=years");
 ?>

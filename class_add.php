<?php
include_once 'conn/conn.php';
if(isset($_POST['class_add'])){

$class = $_POST['class'];
$level = $_POST['level'];
// first check wether that class exists


    $query = "SELECT * FROM classes WHERE classname = ?";
    $stmt = $db->prepare($query);


  //bind the placeholder to a vlaue
    $stmt->bindparam(1, $class);
    $stmt->execute();


     if($stmt->rowCount() > 0 || $level ==' '){
       $_SESSION['msg'] = "Enter level or $class class  exists! $level";
       $_SESSION['msg-type'] = "warning";
    }else{

      $query = "INSERT INTO classes (classname, level) VALUES (:class, :level)";
      $stmt = $db->prepare($query);
      $stmt->bindparam(':class', $class);
      $stmt->bindparam(':level', $level);

      $res = $stmt->execute();

      if($res){

        $_SESSION['msg'] = " Class Inserted Succesfully";
        $_SESSION['msg-type'] = "success";

      }else{

        $_SESSION['msg'] = " Something went wrong";
        $_SESSION['msg-type'] = "warning";

      }
    }




}

header("location:dashboard.php?page=classes");
 ?>

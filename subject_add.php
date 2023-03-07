<?php
include_once 'conn/conn.php';
if(isset($_POST['subject_add'])){

$class = $_POST['class'];
$subject = $_POST['subject'];
$code = $_POST['subject_code'];
$op = 0;

if (isset($_POST['op'])){
  $op = 1;
}



// first check wether that subject exists


$query = "SELECT * FROM subjects WHERE code = ? AND class_id = ?";
$stmt = $db->prepare($query);


//bind the placeholder to a vlaue
$stmt->bindparam(1, $code);
$stmt->bindparam(2, $class);
$stmt->execute();


 if($stmt->rowCount() > 0){
   $_SESSION['msg'] = "$subject exists in $class class!";
   $_SESSION['msg-type'] = "warning";
}else{

  $query = "INSERT INTO subjects (subject, code , op ,class_id) VALUES (:subject, :code, :op ,:class_id)";
  $stmt = $db->prepare($query);
  $stmt->bindparam(':subject', $subject);
  $stmt->bindparam(':code', $code);
  $stmt->bindparam(':op', $op);
  $stmt->bindparam(':class_id', $class);
  $res = $stmt->execute();

  if($res){

    $_SESSION['msg'] = " Subjected added Succesfully";
    $_SESSION['msg-type'] = "success";

  }else{

    $_SESSION['msg'] = " Something went wrong";
    $_SESSION['msg-type'] = "warning";

  }
}



}

header("location:dashboard.php?page=subjects");
 ?>

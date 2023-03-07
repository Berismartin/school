<?php
include 'conn/conn.php';

if(isset($_POST['teacher_update'])){
  $id = $_POST['tr_id'];
  $name = $_POST['trname'];
  $phone = $_POST['contact'];
  $email = $_POST['email'];
  $address = $_POST['address'];
  $ins = $_POST['ins'];


  $query = "UPDATE teachers SET
  tr_name = '$name',
  contact = '$phone',
  email = '$email',
  address = '$address',
  initials = '$ins'
  WHERE id = ?";

$stmt = $db->prepare($query);
$stmt->bindparam(1, $id);

if($stmt->execute()){

  $_SESSION['msg'] = " Teacher Updated Succesfully!";
  $_SESSION['msg-type'] = "success";

}else{

  $_SESSION['msg'] = " Something went wrong with Update of User!";
  $_SESSION['msg-type'] = "warning";

}


header('location:dashboard.php?page=teachers');
}
 ?>

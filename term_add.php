<?php

include 'conn/conn.php';

if(isset($_POST['term_add'])){

//first get the curren years

$query = "SELECT id FROM years WHERE status = 1 ";
$stmt = $db->prepare($query);

$stmt->execute();


if($stmt->rowCount() == 1){

  $res = $stmt->fetch();

  $current_year_id = $res['id'];
  $term = $_POST['term'];

  $query = "INSERT INTO terms (term , year_id) VALUES (:term , :yearid)";

  $stmt = $db->prepare($query);
  $stmt->bindparam(':term', $term);
  $stmt->bindparam(':yearid', $current_year_id);


  if($stmt->execute()){
    $_SESSION['msg'] = " Term Inserted Succesfully";
    $_SESSION['msg-type'] = "success";

  }else{

    $_SESSION['msg'] = " Something went wrong";
    $_SESSION['msg-type'] = "warning";
  }



}else{

  $_SESSION['msg'] = " First Set the current term from year management section";
  $_SESSION['msg-type'] = "warning";
}

  header("location:dashboard.php?page=terms");

}


 ?>

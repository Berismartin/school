<?php

include 'conn/conn.php';

$sub1 = $_POST['sub1'];
$sub2 = $_POST['sub2'];
$sub3 = $_POST['sub3'];
$sub4 = $_POST['sub4'];

$subs = array($sub1, $sub2, $sub3);

$comb = strtoupper($_POST['comb'])."/".$sub4;


$query = "INSERT INTO
 combinations (comb_name)
 VALUES(:comb_name)";

$stmt = $db->prepare($query);

$stmt->bindparam(':comb_name', $comb);



$insert = $stmt->execute();

if($insert){


 $com_id = $db->lastinsertId();


  foreach($subs as $sub){
    $query = "INSERT INTO
    combination_subjects (comb_id, subject_id)
     VALUES( :comb_id, :subject_id)";

      $stmt = $db->prepare($query);

      $stmt->bindparam(':comb_id', $com_id);
      $stmt->bindparam(':subject_id', $sub);

      $insertuser = $stmt->execute();

  }
  echo "success";

}else{

   echo "false";

}


 
 ?>

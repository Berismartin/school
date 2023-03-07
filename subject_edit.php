<?php

include 'conn/conn.php';

$sub_id = $_POST['sub_id'];
$code = $_POST['code'];
$subject = $_POST['subject'];


$query = "UPDATE subjects SET code = '$code', subject = '$subject' WHERE id = ? ";

$stmt = $db->prepare($query);
$stmt->bindparam(1, $sub_id);


if($stmt->execute()){
  echo "update";
}
 ?>

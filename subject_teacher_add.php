<?php
include 'conn/conn.php';

$class_id = $_POST['class_id'];
$tr_id = $_POST['tr_id'];
$sub_id = $_POST['sub_id'];
$stream = $_POST['stream'];


//check the db for simillar data
$query = "SELECT * FROM
 subject_teacher WHERE
 tr_id = :tr_id
  AND
  subject_id = :sub_id
  AND
   class_id = :class_id";

$stmt = $db->prepare($query);

$stmt->bindparam(':tr_id', $tr_id);
$stmt->bindparam(':sub_id', $sub_id);
$stmt->bindparam(':class_id', $class_id);
$stmt->execute();

$stmt->fetchAll();

if($stmt->rowCount() > 0){
  echo "not possible";
}else{

  $query = "INSERT INTO
  subject_teacher (class_id, subject_id, tr_id, stream_id)
  VALUES  (:class_id, :subject_id, :tr_id, :stream)";

  $stmt = $db->prepare($query);

  $stmt->bindparam(':tr_id', $tr_id);
  $stmt->bindparam(':subject_id', $sub_id);
  $stmt->bindparam(':class_id', $class_id);
  $stmt->bindparam(':stream', $stream);

$insert =   $stmt->execute();

if($insert){
  echo "success";
}else{
  echo "failure";
}

}

 ?>

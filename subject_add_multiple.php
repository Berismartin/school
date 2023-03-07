<?php

include 'conn/conn.php';

$codes = $_POST['codes'];
$subjects = $_POST['subjects'];
$class = strtolower($_POST['setclass']);

//combine the codes with their corresponding subjects
$subs = array_combine($codes, $subjects);

//get the id from the class
$classid = $db->prepare("SELECT id FROM classes WHERE classname = ?");
$classid->bindparam(1, $class);
$classid->execute();

$classn = $classid->fetch();

$id =  $classn['id'];


foreach ($subs as $key => $value) {

$query = "INSERT INTO
 subjects (code, subject, class_id)
 VALUES (:code, :subject, :id)";
$stmt = $db->prepare($query);

$stmt->bindparam(':code', $key);
$stmt->bindparam(':subject', $value);
$stmt->bindparam(':id', $id);

$insert = $stmt->execute();

}

if($insert){
  echo "go";
}
 ?>

<?php
$class_id = $row['id'];

$st = $db->prepare("SELECT * FROM students WHERE class_id = ?");
$st->bindparam(1, $class_id);

$st->execute();
$st->fetch();


$q = "SELECT * FROM subjects WHERE class_id = ?";

$sub = $db->prepare($q);
$sub->bindparam(1, $class_id);

$sub->execute();
$sub->fetch();

 ?>

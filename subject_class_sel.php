<?php
$tr_id = $tr['id'];

$query = "SELECT * FROM subject_teacher INNER JOIN classes on classes.id = class_id AND subject_teacher.tr_id = ?";

$r = $db->prepare($query);

$r->bindparam(1 , $tr_id);

$r->execute();

$ress = $r->fetchAll();


 ?>

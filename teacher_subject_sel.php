<?php
$tr_id = $tr['id'];

$query = "SELECT * FROM subject_teacher INNER JOIN subjects on subjects.id = subject_id AND subject_teacher.tr_id = ?";

$q = $db->prepare($query);

$q->bindparam(1 , $tr_id);

$q->execute();

$res = $q->fetchAll();


 ?>

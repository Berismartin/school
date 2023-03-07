<?php
$query = "SELECT * FROM subject_teacher

INNER JOIN classes on classes.id = class_id
INNER JOIN subjects on subjects.id = subject_id
INNER JOIN streams ON streams.id = stream_id
INNER JOIN teachers on teachers.id = tr_id";

$sub_tr = $db->query($query);
 ?>

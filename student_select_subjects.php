<?php
$level = o;
$query_subj = "SELECT * FROM classes INNER JOIN subjects on classes.id = class_id  WHERE classes.level = ?";

$stmt = $db->prepare($query_subj);
$stmt->bindparam(1, $level);

$stmt->execute();



 ?>

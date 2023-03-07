<?php

$query = $db->query(
  "SELECT * FROM subject_teacher
INNER JOIN teachers ON subject_teacher.tr_id = teachers.id
INNER JOIN subjects on subject_id = subjects.id
INNER JOIN streams ON streams.id = stream_id
INNER JOIN  classes on subject_teacher.class_id = classes.id
ORDER BY classname ASC");

 ?>

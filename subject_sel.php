<?php

  $query_subj = "SELECT * FROM classes INNER JOIN subjects on classes.id = class_id";
  $subjects = $db->query($query_subj);



 ?>

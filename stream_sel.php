<?php
  $class_id = $row['id'];

  $query = "SELECT * FROM streams WHERE class_id = ?";
  $stream = $db->prepare($query);

  $stream->bindparam(1, $class_id);
  $stream->execute();

 ?>

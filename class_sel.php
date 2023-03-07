<?php
  $query = "SELECT * FROM classes ORDER BY classname";
  $stmt = $db->prepare($query);
  $stmt->execute();

 

 ?>

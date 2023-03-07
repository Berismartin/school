<?php

try {
  $db = new PDO('mysql:host=localhost; dbname=school;', 'root', '');
  $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
  $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, 0);
} catch (\Exception $e) {
  echo "an error has occured";
}
session_start();

 ?>

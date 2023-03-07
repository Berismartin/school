<?php

include 'conn/conn.php';

$regdate = $_POST['regdate'];
$indexno = $_POST['indexno'];
$name = $_POST['name'];
$term = $_POST['term'];
$year = $_POST['year'];
$classname = $_POST['classname'];
$stream = $_POST['stream'];
$get_comb = $_POST['get_comb'];



 array_pop($indexno);
 array_pop($get_comb);
 array_pop($name);

print_r($name);

print_r($indexno);
print_r($get_comb);


 ?>

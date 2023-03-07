<?php
include 'conn/conn.php';

$id = $_POST['year_id'];

$query = "DELETE FROM years WHERE id = ?";

$stmt = $db->prepare($query);
$stmt->bindparam(1, $id);

$result = $stmt->execute();


 ?>

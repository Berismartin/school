<?php
include 'conn/conn.php';

$id = $_POST['term_id'];

$query = "DELETE FROM terms WHERE id = ?";

$stmt = $db->prepare($query);
$stmt->bindparam(1, $id);

$result = $stmt->execute();


 ?>

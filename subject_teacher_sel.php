<?php
include 'conn/conn.php';

$id = $_POST['classid'];

$query = "SELECT * FROM subjects WHERE class_id = ?";
$stmt = $db->prepare($query);

$stmt->bindparam(1, $id);

$success = $stmt->execute();

$subjs = $stmt->fetchAll();


 ?>
 <select class="select_sub">
  <option value="selected" selected>--select subject--</option>
  <?php foreach($subjs as $subs): ?>
  <option value="<?=$subs['id'] ?>"><?=$subs['subject'] ?></option>
  <?php endforeach; ?>
 </select>

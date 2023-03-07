<?php

include 'conn/conn.php';

$classname = $_POST['classname'];

$query = "SELECT * FROM streams WHERE class_id = ?";

$stmt = $db->prepare($query);
$stmt->bindparam(1, $classname);

$stmt->execute();

$result = $stmt->fetchAll();

if($stmt->rowCount() > 0):

foreach($result as $stream):
 ?>
<option value="<?=$stream['id'] ?>"><?=$stream['stream'] ?></option>

<?php endforeach;
else:
 ?>
<option value="">No streams in this class</option>

<?php endif; ?>

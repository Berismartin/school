<?php
include 'conn/conn.php';

$regdate = $_POST['regdate'];
$indexno = $_POST['indexno'];
$name = $_POST['name'];
$term = $_POST['term'];
$year = $_POST['year'];
$classname = $_POST['classname'];
$stream = $_POST['stream'];
$comb = $_POST['comb'];


$query = "INSERT INTO
students(regdate, indexno, name, term, year, class_id, stream, op_comb)
VALUES (:regdate, :indexno, :name, :term, :year, :class_id, :stream, :op_comb)";

$stmt = $db->prepare($query);
$stmt->bindparam(':regdate', $regdate);
$stmt->bindparam(':indexno', $indexno);
$stmt->bindparam(':name', $name);
$stmt->bindparam(':term', $term);
$stmt->bindparam(':year', $year);
$stmt->bindparam(':class_id', $classname);
$stmt->bindparam(':stream', $stream);
$stmt->bindparam(':op_comb', $comb);

$ins = $stmt->execute();

if($ins):
 ?>

<div class="alert alert-success alert-dismissible"><i class="fa fa-check-circle text-success"></i>Sucess!</div>
<?php else: ?>

<div class="alert alert-danger alert-dismissible"><i class="fa fa-exclamation text-danger"></i>Something Went Wrong!</div>

<?php endif; ?>

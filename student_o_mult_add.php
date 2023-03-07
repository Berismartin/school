<?php

include 'conn/conn.php';



  $regdate = $_POST['regdate'];
  $indexno = $_POST['indexno'];
  $name = $_POST['name'];
  $term = $_POST['term'];
  $year = $_POST['year'];
  $classname = $_POST['classname'];
  $stream = $_POST['stream'];


$std = array_combine($indexno, $name);


foreach ($std as $key => $value) {

  if(!empty($key && $value)){
    $query = "INSERT INTO
    students(regdate, indexno, name, term, year, class_id, stream)
    VALUES (:regdate, :indexno, :name, :term, :year, :class_id, :stream)";

    $stmt = $db->prepare($query);
    $stmt->bindparam(':regdate', $regdate);
    $stmt->bindparam(':indexno', $key);
    $stmt->bindparam(':name', $value);
    $stmt->bindparam(':term', $term);
    $stmt->bindparam(':year', $year);
    $stmt->bindparam(':class_id', $classname);
    $stmt->bindparam(':stream', $stream);

    $ins = $stmt->execute();

    $std_id = $db->lastinsertId();

    $q = $db->prepare("INSERT INTO results(std_id) VALUES(:std)");
    $q->bindparam(':std', $std_id);
    $ins = $q->execute();
  }

}

echo '<div class="alert alert-success alert-dismissible"><i class="fa fa-check-circle text-success"></i>Sucess!</div>';


 ?>

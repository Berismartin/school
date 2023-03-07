<?php
include 'conn/conn.php';

if(isset($_POST['save'])){
  $regdate = $_POST['regdate'];
  $indexno = $_POST['indexno'];
  $name = $_POST['name'];
  $term = $_POST['term'];
  $year = $_POST['year'];
  $classname = $_POST['classname'];
  $stream = $_POST['stream'];
  $op1 = $_POST['op1'];
  $op2 = $_POST['op2'];


  $op = $op1.'/'.$op2;


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
  $stmt->bindparam(':op_comb', $op);

  $ins = $stmt->execute();

  $std_id = $db->lastinsertId();

  $q = $db->prepare("INSERT INTO results(std_id) VALUES(:std)");
  $q->bindparam(':std', $std_id);
  $ins = $q->execute();


  if($ins){
   ?>

  <div class="alert alert-success alert-dismissible"><i class="fa fa-check-circle text-success"></i>Sucess!</div>
<?php }else{ ?>

  <div class="alert alert-danger alert-dismissible"><i class="fa fa-exclamation text-danger"></i>Something Went Wrong!</div>


<?php } }?>

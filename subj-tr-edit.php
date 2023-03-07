<?php

include 'conn/conn.php';

$tr_id = $_POST['tr_id'];

$tr = $_POST['teacher'];
$sub = $_POST['subject'];
$clls = $_POST['classq'];
$str = $_POST['stream'];

$sub_id = $_POST['subject_id'];
$clls_id = $_POST['classq_id'];
$str_id = $_POST['stream_id'];

// $query = "SELECT * FROM subject_teacher
//
// INNER JOIN classes on classes.id = class_id
// INNER JOIN subjects on subjects.id = subject_id
// INNER JOIN streams ON streams.id = stream_id
// INNER JOIN teachers on teachers.id = tr_id
// WHERE teachers.id = ?";
//
// $stm = $db->prepare($query);
//
// $stm->bindparam(1, $tr_id);
// $stm->execute();
//
// $ro = $stm->fetch();

 ?>


 <div class="card-head hd">
   <p class="lead">Edit Teacher subject</p>
   <i class="fa fa-check text-success"></i>
 </div>
 <div class="card-body" >
   <div class=" ">
     <p class="mb-0">Class:</p>
     <?php include 'class_sel.php'; ?>
     <select class="" name="" >
       <option value="<?=$clls_id ?>" selected><?=$clls ?></option>
       <?php while($row = $stmt->fetch()): ?>
       <option value="<?=$row['id']?>"><?=$row['classname']?></option>
       <?php endwhile; ?>

     </select>
   </div>

   <div class="">
     <p class="mb-0">Stream:</p>
     <select class="" name="" >
       <option value="<?=$str_id ?>" selected><?=$str ?></option>
       <?php
       $q = $db->prepare("SELECT * FROM streams WHERE class_id = ?");
       $q->bindparam(1, $clls_id)->execute();
       while ($st = $q->fetch()):
// end for today
        ?>
        <option value="<?=$st['id'] ?>"><?=$st['stream'] ?></option>
      <?php endwhile; ?>
     </select>
   </div>

   <div class="">
     <p class="mt-2 mb-0">Teacher:</p>
     <select class="" name="" disabled>
       <option value="">--select teacher--</option>
     </select>
   </div>

   <div class="  mb-5">
     <p class="mt-2 mb-0">Subject:</p>
     <div class="">
       <select class="" name="" disabled>
         <option value="" selected>--select subject--</option>
       </select>
     </div>
   </div>
 </div>
 <div class="card-footer">
   <button type="button" name="button" class="buut sub p-1">Update</button>
 </div>

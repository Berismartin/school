
<?php

require_once 'conn/conn.php';
if(!isset($_POST['class_id']) || !isset($_POST['subject']) || !isset($_POST['stream'])){
  echo "no";
}else{

  $class_id = $_POST['class_id'];

  $sub = $_POST['subject'];
  $tr = $_POST['teacher'];
  $str = $_POST['stream'];


echo $sub .'/ '.$tr.' /'.$str;



 ?>
<div class="text-center p-2 bg-white">
  <h3 class="lead">Entering marks section</h3>
</div>
<div class="container bg-white">

  <div class="table-responsive"> 
    <div style="width:30%; margin-left:270px;" class="d-flex justify-content-between">
      <p>Term 1</p>
      <p>Term 2</p>
      <p>Term 3</p>
    </div>
    <table class="table table-sm results-table table-bordered">
      <thead>
        <th width="4%">#</th>
        <th width="20%">Student Name</th>
        <?php 
          $terms = $db->query("SELECT id FROM terms");
          foreach($terms as $term):
        ?>
        <th>BOT</th>
        <th>MOT</th>
        <th>EOT</th>
         <?php endforeach ?>
      </thead>
      <tbody>
        <?php
        $query = "SELECT * FROM  students   WHERE  class_id = ? AND  stream = ? ";
        $stmt = $db->prepare($query);
        $stmt->bindparam(1, $class_id);
        $stmt->bindparam(2, $str);
        $stmt->execute();
        $i = 1;

        
        
        while($row = $stmt->fetch()):
          
         ?>
         <tr>
           <td><?=$i; ?></td>
           <td><?=$row['name'] ?></td>
           <!-- get all the terms -->
           <?php
           $terms = $db->query("SELECT id FROM terms");
           foreach($terms as $term):
           ?>
           
           <?php 
           $stds = $db->prepare("SELECT * FROM results WHERE std_id = ? AND term_id = ?");
           $stds->bindparam(1, $row['id']);
           $stds->bindparam(2, $term['id']);
           $stds->execute();
           //print_r($stds->fetch());
           $std = $stds->fetch();
           
           ?>
          <td std_id="<?=$row['id']?>" tr="<?=$tr?>" subj_id="<?=$sub?>" stream_id="<?=$str?>" class_id="<?=$class_id?>" term_id="<?=$term['id']?>" exam="bot" contentEditable class="mark_o_edit"><?=$std['bot'] ?> </td>
          <td std_id="<?=$row['id']?>" tr="<?=$tr?>" subj_id="<?=$sub?>" stream_id="<?=$str?>" class_id="<?=$class_id?>" term_id="<?=$term['id']?>" exam="mot" contentEditable class="mark_o_edit"><?=$std['mot'] ?></td>
          <td std_id="<?=$row['id']?>" tr="<?=$tr?>" subj_id="<?=$sub?>" stream_id="<?=$str?>" class_id="<?=$class_id?>" term_id="<?=$term['id']?>" exam="eot" contentEditable class="mark_o_edit"><?=$std['eot'] ?></td> 
            
           <?php endforeach?>
         </tr>
<?php $i++; endwhile; ?>
      </tbody>
    </table>
  </div>
</div>
<?php } ?>
<script src="js/results_o_insert.js"></script>
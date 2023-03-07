
<?php

include 'conn/conn.php';

$classid = $_POST['classid'];


$query = "SELECT * FROM streams WHERE class_id = ?";
$stmt = $db->prepare($query);

$stmt->bindparam(1, $classid);
$stmt->execute();


 ?>
 <p class="mb-0">Stream:</p>
 <select class="select_stream" name="">
         <option selected>--Select stream--</option>

          <?php while($row = $stmt->fetch()): ?>
          <option value="<?=$row['id']?>"><?=$row['stream']?></option>
          <?php endwhile; ?>

 </select>




<?php
include 'conn/conn.php';
$tr_id = $_POST['tr_id'];

$query = "SELECT * FROM teachers WHERE id = ?";

$stmt = $db->prepare($query);
$stmt->bindparam(1, $tr_id);
$stmt->execute();


 while ($trdata = $stmt->fetch()):

 ?>
<div class="text-center">
   <p class="lead">Change data for <?=$trdata['tr_name']?></p>
   <?php if ($trdata['tr_image'] == !""): ?>
     <img src="uploads/teachers/<?=$trdata['tr_image']?>" alt=""  width="190px" height="150px">
   <?php else: ?>
     <img src="uploads/teachers/default.png" alt="" width="90px" height="90px" >
   <?php endif; ?>
   <div class="mt-1 ">
     <table class="table-edit">
       <tr>
         <td>Fullname:</td>
         <td><input type="text" name="trname" value="<?=$trdata['tr_name']?>" required autocomplete="off" class="form-control shadow-none"></td>
       </tr>
       <tr>
         <td>Contact:</td>
         <td><input type="text" name="contact" value="<?=$trdata['contact']?>" required autocomplete="off" class="form-control shadow-none"></td>
       </tr>
       <tr>
         <td>Email:</td>
         <td><input type="text" name="email" value="<?=$trdata['email']?>" required autocomplete="off" class="form-control shadow-none"></td>
       </tr>
       <tr>
         <td>Address:</td>
         <td><input type="text" name="address" value="<?=$trdata['address']?>" required autocomplete="off" class="form-control shadow-none"></td>
       </tr>
       <tr>
         <td>Initials:</td>
         <td><input type="text" name="ins" value="<?=$trdata['initials']?>" equired autocomplete="off" class="form-control shadow-none"></td>
       </tr>
       <tr>
         <td> <input type="hidden" name="tr_id" value="<?=$trdata['id'] ?>"> </td>
       </tr>
     </table>
   </div>
 </div>

<?php endwhile; ?>

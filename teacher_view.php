<?php
include 'conn/conn.php';
$tr_id = $_POST['tr_id'];

$query = "SELECT * FROM teachers WHERE id = ?";

$stmt = $db->prepare($query);
$stmt->bindparam(1, $tr_id);
$stmt->execute();


 while ($trdata = $stmt->fetch()):

 ?>

 <style media="screen">
.context{
  display: flex;
  border : 1px solid black;
}
.imgg img{
  height: 200px;

}
 </style>

<div>
  <div class="container bt-3">
    <div class="context">
      <div class="imgg">
        <?php if ($trdata['tr_image'] == !""): ?>
          <img src="uploads/teachers/<?=$trdata['tr_image']?>" alt="">
        <?php else: ?>
          <img src="uploads/teachers/default.png" alt="" >
        <?php endif; ?>
      </div>
      <div class="details pt-2">
        <p>RegDate: <?=$trdata['regtime'] ?></p>
        <p>Name: <?=$trdata['tr_name'] ?></p>
        <p>Contact: <?=$trdata['contact'] ?></p>
        <p>Email: <?=$trdata['email'] ?></p>
        <p>Address: <?=$trdata['address'] ?></p>
        <p>RegDate: <?=$trdata['initials'] ?></p>
      </div>
    </div>
  </div>
 </div>

<?php endwhile; ?>

<?php
include 'conn/conn.php';

$stmt = $db->query("SELECT * FROM combinations");

$result = $stmt->fetchAll();


 ?>
<option value="" selected>Select Combination</option>
<?php foreach($result as $comb): ?>
<option value="<?=$comb['id'] ?>"><?=$comb['comb_name'] ?></option>
<?php endforeach; ?>

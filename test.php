<?php include 'includes/header.php'; ?>
 <div class="container">
   <input type="radio" class="s" name="op" val="comp">
   <input type="radio" class="s" name="op" val="opp">
   <input type="checkbox" id="d">
   <button type="button" name="button">walah  </button>
 </div>


<script type="text/javascript">
  var yo = $('.s').val();

$('button').click(function(){

      alert(yo);

});
</script>

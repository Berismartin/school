<?php

 		if(isset($_SESSION['msg'])):

  ?>
 	 	<div id="alert" class="alert alert-<?=$_SESSION['msg-type']?> alert-dismissible fade show alert-sm " role="alert">
      <i></i>
      <span>
			<?php
			 echo $_SESSION['msg'];
		   	unset($_SESSION['msg']);
			 ?>
     </span>
			 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
 	<?php endif; ?>

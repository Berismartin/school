<!-- class add modal -->
<div class="modal fade" id="subjectadd" tabindex="-1" role="dialog" aria-labelledby="largemodal" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header modal-head">
				<h5 class="modal-title pri text-center">Add new subject</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">&times;</span></button>
			</div>
			<form action="subject_add.php" method="POST" id="subjectform">
				<div class="modal-body">
          <table class="table-form">
            <tr>
              <td>Select class:</td>
              <td>
                <select name="class" class="subjectval form-control">
                  <option selected>--Select class --</option>
									<?php include 'class_sel.php'; ?>
									<?php if($stmt->rowCount() > 0): ?>
		                <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
											<option value="<?=$row['id']?>"><?=strtoupper($row['classname']) ?></option>
		                <?php endwhile; ?>
		              <?php else: ?>
		                <li>No classes present</li>
		              <?php endif; ?>
                </select>
							</td>
            </tr>
            <tr>
              <td>Subject name:</td>
              <td>
                <input  type="text" name="subject" placeholder="Enter Subject name" required autocomplete="off"  class="form-control shadow-none">              </td>
            </tr>
            <tr>
              <td>Subject code:</td>
              <td>
                <input   type="text" name="subject_code" placeholder="Enter subjectcode" required autocomplete="off"  class="form-control shadow-none">              </td>
            </tr> 
          </table>
		  <div class="m-3">
			<input type="checkbox" name="op"> 
			<span>Check for optional subjects</span>
		  </div>
					<p class="subject-check text-danger text-center"> </p>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-outline-secondary mr-auto" data-dismiss="modal">close</button>
				<button name="subject_add" value="subject_add" class="btn buut"><i class="fa fa-save"></i> Save</button>
			</div>
			</form>
		</div>
	</div>
</div>

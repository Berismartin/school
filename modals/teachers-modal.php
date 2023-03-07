<!-- teacher add modal -->
<div class="modal fade" id="teacheradd" tabindex="-1" role="dialog" aria-labelledby="largemodal" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header modal-head">
				<h5 class="modal-title pri text-center">Regester Teacher</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">&times;</span></button>
			</div>
			<form action="teacher_add.php" method="POST" id="teacherform" enctype="multipart/form-data">
				<div class="modal-body">
          <table class="table-form form-table">
            <tr>
              <td>RegDate:</td>
              <td>
                <input   type="text" name="regdate" value="<?= date("Y-M-d"); ?>" disabled class="form-control shadow-none"></td>
            </tr>
            <tr>
              <td>Fullname:</td>
              <td><input type="text" name="trname" placeholder="Enter fullname" required autocomplete="off" class="form-control shadow-none"></td>
            </tr>
            <tr>
              <td>Contact:</td>
              <td><input type="text" name="contact" placeholder="Enter phone number" required autocomplete="off" class="form-control shadow-none"></td>
            </tr>
            <tr>
              <td>Email:</td>
              <td><input type="text" name="email" placeholder="Enter Email address" required autocomplete="off" class="form-control shadow-none"></td>
            </tr>
            <tr>
              <td>Address:</td>
              <td><input type="text" name="address" placeholder="Enter home address" required autocomplete="off" class="form-control shadow-none"></td>
            </tr>
            <tr>
              <td>Initials:</td>
              <td><input type="text" name="ins" placeholder="Enter teacher Initials" required autocomplete="off" class="form-control shadow-none"></td>
            </tr>
            <tr>
              <td>Username:</td>
              <td><input type="text" name="username" placeholder="Enter username" required autocomplete="off"  class="form-control shadow-none"></td>
            </tr>
            <tr>
              <td>Password:</td>
              <td><input id="pass" type="password"  placeholder="Enter password(max 3o chars)" required autocomplete="off" class="form-control shadow-none"></td>
            </tr>
            <tr>
              <td>Pass-Check:</td>
              <td>
								<input id="passCheck" check='true' type="password" name="password" placeholder="Re-enter password" required autocomplete="off" class="form-control shadow-none">
								<div class="invalid-feedback">Add a fullstop after password correction</div>
							</td>
            </tr>
            <tr>
              <td>photo:</td>
              <td><input type="file" name="image" value="trphoto" class="form-control form-control-sm"></td>
            </tr>
          </table>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-outline-secondary mr-auto" data-dismiss="modal">close</button>
				<button name="teacher_add" value="teacher_add" class="btn buut"><i class="fa fa-save"></i> Save</button>
			</div>
			</form>
		</div>
	</div>
</div>

<!--teachers edit modal-->
<div class="modal fade" id="teacheredit" tabindex="-1" role="dialog" aria-labelledby="largemodal" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header modal-head ">
				<h4 class="modal-title pri ms-auto">Edit Profile</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">&times;</span></button>
			</div>
			<form action="teacher_update.php" method="post" enctype="multipart/form-data">
				<div class="modal-body">
					<div id="teacher_edit">
						<!-- content lies in teachers_fetch.php -->
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-outline-secondary mr-auto" data-dismiss="modal">close</button>
					<button name="teacher_update" value="teacher_update" class="btn buut"><i class="fa fa-check-square-o"></i> Update</button>
				</div>
			</form>
		</div>
	</div>
</div>


<!--teachers view modal-->
<div class="modal fade" id="teacherview" tabindex="-1" role="dialog" aria-labelledby="largemodal" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header modal-head ">
				<h5 class="modal-title pri ms-auto">Teachers details</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">&times;</span></button>
			</div>
			<form action="teacher_update.php" method="post" enctype="multipart/form-data">
				<div class="modal-body">
					<div id="teacher_view">
						<!-- content lies in teachers_view.php -->
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-outline-secondary mr-auto" data-dismiss="modal">close</button>

				</div>
			</form>
		</div>
	</div>
</div>

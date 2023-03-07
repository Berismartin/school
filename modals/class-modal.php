<!-- class add modal -->
<div class="modal fade" id="classadd" tabindex="-1" role="dialog" aria-labelledby="largemodal" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header modal-head">
				<h5 class="modal-title pri text-center">Add new class</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">&times;</span></button>
			</div>
			<form action="class_add.php" method="POST" enctype="multipart/form-data">

				<div class="modal-body">
          <table class="table-form ">
            <tr>
              <td>Class name:</td>
              <td>
                <input  type="text" name="class" placeholder="Enter classname" required autocomplete="off"  class="form-control shadow-none">              </td>
            </tr>
            <tr>
              <td>Class level:</td>
              <td>
								 <p class="mt-2"> <input type="radio" name="level" value="O">O level	</p>
								 <p>  <input type="radio" name="level"  value="A">A level	</p>
             </td>
            </tr>

          </table>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-outline-secondary mr-auto" data-dismiss="modal">close</button>
				<button name="class_add" value="class_add" class="btn buut"><i class="fa fa-save"></i> Save</button>
			</div>
			</form>
		</div>
	</div>
</div>

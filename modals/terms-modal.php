<!-- term add modal -->
<div class="modal fade" id="termadd" tabindex="-1" role="dialog" aria-labelledby="largemodal" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header modal-head">
				<h5 class="modal-title pri text-center">Set a term</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">&times;</span></button>
			</div>
			<form action="term_add.php" method="POST" enctype="multipart/form-data">

				<div class="modal-body">
          <table class="table-form form-table">
            <tr>
              <td>Term: </td>
              <td>
                <input   type="text" name="term" placeholder="Enter Term" required autocomplete="off"  class="form-control shadow-none">              </td>
            </tr>
          </table>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-outline-secondary mr-auto" data-dismiss="modal">close</button>
				<button name="term_add" value="term_add" class="btn buut"><i class="fa fa-save"></i> Save</button>
			</div>
			</form>
		</div>
	</div>
</div>

<?php include_once 'modals/year-modal.php'; ?>
<?php  include 'year_sel.php'; ?>
    <div class="title-head bg-white">
      <div>
        <i class="fa fa-home"></i>
        <h5>Years management</h5>
      </div>
      <div>
        <a class="added butShow tooltip-bottom" title="select current year" type="button">Set Year</a>
        <a data-toggle="modal"  href="#yearadd" type="button" class="added"><i class="fa fa-plus"></i> Add Year</a>
      </div>
    </div>

    <div class="form-drop bg-white ">
      <div class="form-content text-center px-3 pt-5 ">
         <select class="select_years" name="">
               <?php if($stmt->rowCount() > 0):?>
                 <option selected>--Select curent year--</option>

                  <?php while($row = $stmt->fetch()): ?>
                  <option value="<?=$row['year']?>"><?=$row['year']?></option>
                  <?php endwhile; ?>

               <?php else: ?>
                  <option selected>--Insert years first</option>
                <?php endif; ?>
         </select>
         <p class="year-check text-danger"></p>
        <div class="mt-3">
           <button type="button" name="button" class="get_current">save</button>
           <button type="button" name="button" class="reset_year">reset</button>
        </div>
      </div>
    </div>

    <div class="container tables bg-white mt-3 pt-2">
      <div class="table-responsive p-2">
        <table class="table text-center table-striped table-sm table-bordered table-hover  beristable years">
          <thead>
            <th width="5%">Id</th>
            <th >Year</th>
            <th width="5%">Tool</th>
          </thead>
          <tbody>
            <?php  include 'year_sel.php'; ?>
            <?php while($row = $stmt->fetch()): ?>
              <tr data=<?=$row['id']?>>
                <td><?=$row['id']?></td>
                <td><?=$row['year']?></td>
                <td class="d-flex justify-content-around">
                  <i class="fa fa-trash text-danger"
                   data="<?=$row['id']?>"></i>
               </td>
              </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function () {


    //when the icon delete is clicked

    $('.beristable   i').click(function(){
        var year_id =  $(this).attr('data');
        var par = $(this).parentsUntil('tbody');

        $.ajax({
          url : "year_del.php",
          method: "POST",
          data: {year_id: year_id},
          success: function(){

              par.remove();
              $('.alert_mess').html('<div class="alert alert-dismissible alert-success alert-sm fade show"><i class="fa fa-check-circle text-success"></i><span> Year deleted!</span><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

          }
      });

    });



//set current years

      $('.get_current').click(function(){

        var years =  $('.select_years').val();

        if(years == '--Select curent year--'){

          $('.year-check').html('select current year before submit!');

        }else{

           $.ajax({
              url: "year_current.php",
              method: "POST",
              data: {year: years},
              success: function(res){
                  if(res == 'yap'){
                    $('.alert_mess').html('<div class="alert alert-dismissible alert-success alert-sm fade show"><i class="fa fa-check-circle text-success"></i><span> Current year updated!</span><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

                    $('.form-drop').removeClass('on');
                    $('.form-content').fadeOut();
                  }else{
                    $('.alert_mess').html('<div class="alert alert-dismissible alert-warning alert-sm fade show"><i class="fa fa-exclamation-triangle text-warning"></i><span> The year doesnot exist!</span><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

                  }
              }
           });
        }
      });
  });
</script>

<?php include_once 'modals/terms-modal.php'; ?>
<?php include 'term_sel.php'; ?>
    <div class="title-head bg-white">
      <div>
        <i class="fa fa-home"></i>
        <h5>Manage your terms</h5>
      </div>
      <p>current term is <?=$_SESSION['term']; ?></p>
      <div>
        <a class="added butShow tooltip-bottom" title="select current year" type="button">Set Term</a>
        <a data-toggle="modal"  href="#termadd" type="button" class="added"><i class="fa fa-plus"></i> Add Term</a>
      </div>
    </div>

    <div class="form-drop bg-white ">
      <div class="form-content text-center px-3 pt-5 ">
        <select class="select_terms">
              <?php if($stmt->rowCount() > 0):?>
                <option selected>--Select curent term--</option>

                 <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                 <option value="<?=$row['term']?>"><?=$row['term']?></option>
                 <?php endwhile; ?>

              <?php else: ?>
                 <option selected>--Insert terms first</option>
               <?php endif; ?>
        </select>
         <p class="term-check text-danger"></p>
        <div class="mt-3">
           <button type="button" name="button" class="get_current">save</button>
           <button type="button" name="button" class="">reset</button>
        </div>
      </div>
    </div>

    <div class="container tables bg-white mt-3 pt-2">
      <div class="table-responsive p-2">
        <table class="table text-center table-striped table-sm table-bordered table-hover  beristable">
          <thead>
            <th width="5%">Id</th>
            <th >Term</th>
            <th width="5%">Tool</th>
          </thead>
          <tbody>
            <?php include 'term_sel.php'; ?>
            <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
              <tr data=<?=$row['id']?>>
                <td><?=$row['id']?></td>
                <td><?=$row['term']?></td>
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
  $(document).ready(function(){
    //when the icon delete is clicked

    $('.beristable   i').click(function(){
        var term_id =  $(this).attr('data');
        var par = $(this).parentsUntil('tbody');

        $.ajax({
          url : "term_del.php",
          method: "POST",
          data: {term_id: term_id},
          success: function(){

              par.remove();
              $('.alert_mess').html('<div class="alert alert-dismissible alert-success alert-sm fade show"><i class="fa fa-check-circle text-success"></i><span> Term deleted!</span><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

          }
      });

    });



    //set current years

          $('.get_current').click(function(){

            var terms =  $('.select_terms').val();

            if(terms == '--Select curent term--'){

              $('.term-check').html('select current term before submit!');

            }else{

               $.ajax({
                  url: "term_current.php",
                  method: "POST",
                  data: {term: terms},
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

               $('.title-head p').html('current term is '+ terms);

            }
          });

         

  });

</script>

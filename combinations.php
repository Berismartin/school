    <div class="title-head bg-white">
      <div>
        <i class="fa fa-home"></i>
        <h5>Combinations</h5>
        <i class="fa fa-angle-up arrow-key"></i>
      </div>
      <p>Manage your subjets</p>
      <button class="added cls-sel text-white px-3 text-center"> <span> <i class="fa fa-plus"></i>Add Combination</span> </button>
    </div>

  <div class="tblss" >
    <div class="coll text-center p-3">
      <div class="d-flex justify-content-center">
        <p class="lead">select class:</p>
        <?php
        $level = 'A';
        $query = "SELECT classname, level FROM classes WHERE level =?";
        $stmt = $db->prepare($query);
        $stmt->bindparam(1, $level);
        $stmt->execute();
         ?>
        <select class="form-" name="" style="width:200px">
          <option selected>--Select class--</option>
          <?php while($row = $stmt->fetch()): ?>
            <option value="<?=$row['id'] ?>"><?=$row['classname'] ?></option>
          <?php endwhile; ?>
        </select>
      </div>
      <button type="button" class="p-1 ms-5 mt-2 " id="enters">Enter</button>
    </div>
  </div>

    <div class="bg-white form-dro" >
      <div class="text-center pb-2 form-content">
        <div class="container  p-3">
          <div class="bg-white text-center collect_al">
            <p>comb Name <input type="text" class="form-cont" id="comb"> </p>
            <?php
            $level = 'A';
            $query = "SELECT * FROM classes INNER JOIN subjects ON classes.id = class_id AND level =?";
            $stmt = $db->prepare($query);
            $stmt->bindparam(1, $level);
            $stmt->execute();

            $sub = $stmt->fetchAll();

             ?>
            <table class="combs-table">
              <tr>
                <td>Subject 1</td>
                <td>
                  <select class="form-control shadow-none sub-1" >
                    <option selected>select subject</option>
                    <?php foreach($sub as $row): ?>
                      <option value="<?=$row['id'] ?>"><?=$row['subject'] ?></option>
                    <?php endforeach; ?>
                  </select>
                </td>
              </tr>
              <tr>
                <td>Subject 2</td>
                <td>
                  <select class="form-control shadow-none sub-2" >
                    <option selected>select subject</option>
                    <?php foreach($sub as $ro): ?>
                      <option value="<?=$ro['id'] ?>"><?=$ro['subject'] ?></option>
                    <?php endforeach; ?>
                  </select>
                </td>
              </tr>
              <tr>
                <td>Subject 3</td>
                <td>
                  <select class="form-control shadow-none sub-3" >
                    <option selected>select subject</option>
                    <?php foreach($sub as $rop): ?>
                      <option value="<?=$rop['id'] ?>"><?=$rop['subject'] ?></option>
                    <?php endforeach; ?>
                  </select>
                </td>
              </tr>
              <tr>
                <td>Subcidiary</td>
                <td>
                  <select class="form-control shadow-none sub-4" name="">
                    <option selected>select subject</option>
                    <option value="Submaths">Sub Maths</option>
                    <option value="ict">Ict</option>
                  </select>
                </td>
              </tr>
            </table>

            <div class="d-flex justify-content-center mt-3">
              <button type="button" name="button" class="ms-2 px-2 " id="save-comb">Save</button>
              <button type="button" name="button" class="mx-2 px-2">Reset</button>
            </div>
          </div>
        </div>
      </div>
    </div>





    <div class="container tables bg-white mt-3 pt-2">
      <div class="table-responsive p-2">
        <table class="table table-sm table-striped table-bordered table-hover  beristable comb">
          <thead class="table-info text-center">
            <th width="5%">#</th>
            <th >Combination</th>
            <th>subjects</th>
          </thead>
          <tbody>
            <?php
            include 'combination_sel.php';
            $i = 1;
              while($row = $stmt->fetch()): ?>
              <tr>
                <td><?=$i;?></td>
                <td><?=$row['comb_name'] ?></td>
                <td> <button type="button" name="button">combination papers</button> </td>
              </tr>
            <?php $i++; endwhile; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
  $(document).ready(function(){
    $('.cls-sel').click(function(){
       
      //$('.tblss').animate({height: '120px'}, 500);

      $('.tblss').toggleClass('tbls-down');
      $('.coll').fadeToggle();
       $('.tblss').css('background-image', 'url(bg/bg-square-grey.jpg)');

      if($('.form-dro').hasClass('form-droped')){
        $('.form-dro').removeClass('form-droped');
        $('.arrow-key').fadeOut();
        $('.title-head h5').text('Combinations');
      }
     });


     $('#enters').click(function(){

       $('.coll').hide();
        $('.tblss').removeClass('tbls-down');

         $('.form-dro').addClass('form-droped');
         $('.form-content').show();
        $('.title-head h5').text('Add A-level combination');

        $('.arrow-key').fadeIn();

        $('.arrow-key').click(function(){
          $('.form-dro').removeClass('form-droped');
          $('.arrow-key').fadeOut();
          $('.title-head h5').text('Combinations');

        });


     });

       $('#save-comb').click(function() {

         var sub1 = $('.sub-1').val();
         var sub2 = $('.sub-2').val();
         var sub3 = $('.sub-3').val();
         var sub4 = $('.sub-4').val();

         var subb4 = $('.sub-4 :selected').text();

         var comb = $('#comb').val().toUpperCase();

         var combo = comb+'/'+subb4;


         if(sub1 =='select subject' || sub2 == 'select subject' || sub3 == 'select subject' || sub4 == 'select subject'){

           alert('first fix the problem below');

         }else if(comb == ''){

           $('#comb').css('border','2px solid red').attr('placeholder', 'Enter combination name');

         }else{


           $.ajax({
             url: 'combination_add.php',
             method: 'POST',
             data: {
               sub1: sub1,
               sub2: sub2,
               sub3: sub3,
               sub4: sub4,
               comb: comb
             },
             success: function(res){
              if(res == 'success'){
                $('.alert_mess').html('<div class="alert alert-dismissible alert-success alert-sm fade show"><i class="fa fa-check-circle text-warning"></i><span> Success!</span><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

              }else{
                alert('something went wrong');
              }
             }
           });
           $('.title-head h5').text('Manage your subjects');
           $('.comb').append('<tr><td>1</td><td>'+combo+'</td><td><button type="button" name="button">combination papers</button></td></tr>');
         }
       });

  });
</script>

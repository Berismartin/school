<?php include_once 'modals/subject-modal.php'; ?>
<?php include 'class_sel.php'; ?>
<?php include 'subject_sel.php'; ?>
    <div class="title-head bg-white">
      <div>
        <i class="fa fa-home"></i>
        <h5>Manage subjects</h5>
      </div>
      <p>Manage your subjets</p>
      <button class="added butShow text-white px-3 "><i class="fa fa-plus"></i> Add Subject</button>
    </div>

  <div class="tbls"></div>
    <div class="bg-white form-drop" >
      <div class="text-center pb-2 form-content">
        <div class="container collect_all">
          <div>
            <h6>System subject control</h6>
            <table class="table-form">
              <tr>
                <td>Select class:</td>
                <td>
                  <input type="text" name="" id="selClass"   class="form-control shadow-none ">
                 </td>
              </tr>
              <tr>
                <td>Number of subjects:</td>
                <td>
                  <input type="text" id="numRow" name="" class="form-control shadow-none">              </td>
              </tr>

            </table>

            <div class="mt-3 text-end">
              <button type="button" name="button" class="formgenerate">Generate</button>
              <button type="button" name="button" class="modalck px-2">Add</button>
            </div>
            <span class="feedback"></span>
          </div>
          <div>
            <div>
              Class list
            </div>
            <div class="listed" id="listed">
              <ul class="list-group list-group-flush">
                <?php if($stmt->rowCount() > 0): ?>
                  <?php while($row = $stmt->fetch()): ?>
                    <li class="tooltip-bottom text-sm " title="click to set class"><?=strtoupper($row['classname']  ) ?></li>
                  <?php endwhile; ?>
                <?php else: ?>
                  <li>No classes present</li>
                <?php endif; ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>





    <div class="container tables bg-white mt-3 pt-2">
      <div class="table-responsive p-2" id="loading">
        <table class="table table-sm table-striped table-bordered table-hover  beristable">
          <thead class="table-info text-center">
            <th width="5%">#</th>
            <th >Code</th>
            <th>Class</th>
            <th>Subject Name</th>
            <th width="5%">Tool</th>
          </thead>
          <tbody>
            <?php
            $i = 1;
             while($row = $subjects->fetch()): ?>
              <tr>
                <td><?=$i ?></td>
                <td><?=$row['code'] ?></td>
                <td><?=$row['classname'] ?></td>
                <td><?=$row['subject'] ?></td>
                <td class="text-center">
                  <i class="fa fa-pencil tooltip-bottom sub_edit" data-id="<?=$row['id'] ?>" title="Edit subject"></i>
               </td>
              </tr>
            <?php $i++; endwhile; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript" charset="utf-8">
  $(document).ready(function(){


    $('#subjectform').submit(function(){
      var sub = $('.subjectval').val();
      if(sub == '--Select class --'){
        $('.subject-check').html('<i class="fa fa-exclamation text-danger"></i> Please select class');
        return false;
      }else{
        return true;
      }
    });

    $('.modalck').click(function(){
      $('#subjectadd').modal('show');
    });



    $('.sub_edit').click(function(){

//subjectt //
    var sub_id = $(this).attr('data-id');



        var tr = $(this).closest('tr');

        var data = tr.children('td').map(function(){
          return $(this).text();
        }).get();

        var bod = "<div class='d-flex justify-content-around p-2 subs'>";
        bod+= '<div class="card p-2">';
        bod+= '<div class="card-head">';
        bod+= '<div class="card-title">';
        bod+= '<p class="lead text-center">Edit '+data[2]+' subjects from this form</p>';
        bod+= '</div></div>';
        bod+= '<div class="card-body">';
        bod+= '<table style="width: 100%">';
        bod+= '<tr><td>Code: </td><td><input type="text"  value="'+data[1]+'" style="width: 80%" required autocomplete="off" class="form-control shadow-none code"></td></tr>';
        bod+= '<tr><td>Subject: </td><td><input type="text" value="'+data[3]+'"  style="width: 80%" required autocomplete="off" class="form-control shadow-none mt-1 subject"></td></tr>';
        bod+= '<table>';
        bod+= '<input type="radio" name="op" val="comp">';
        bod+= '<input type="radio" name="op" val="opp">';
        bod+= '</div>';
        bod+= '<div class="card-footer mt-2 text-center"><button type="button" name="button" class="buut sub p-2" id="sub_editt">Save changes</button></div>';
        bod+= '</div>';
        bod+= '</div>';


        $('.tbls').addClass('tblsdown');
        if($('.form-drop').hasClass('on')){
          $('.form-drop').removeClass('on');
          $('.form-content').removeClass('off');
        }
        $('.tbls').css('background-image', 'url(bg/bg-square-grey.jpg)').css('overflow','hidden');
        $('.tbls').html(bod);

        // $('.op').click(function(){
        //   $('.op').css('background', 'green') ;
        //   });
        //edit the subject_sel
        $('#sub_editt').click(function(){


           var code =  $('.code').val();
           var subject =  $('.subject').val();
          //var op = $('.op').attr('check');

          $.ajax({
             url: "subject_edit.php",
             method: "POST",
             data: {
               sub_id:sub_id,
               code: code,
               subject: subject
             },
             success:function(res){
               if(res == 'update'){
                 $('.alert_mess').html('<div class="alert alert-dismissible alert-success alert-sm fade show"><i class="fa fa-check-circle text-success"></i><span>Subject Updated!</span><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                 $('.sub_edit').dblclick();
               }else{
                 alert('something went wrong');

                 }
             }
           });


        });
    });


  });
</script>

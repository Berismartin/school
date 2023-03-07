<?php include_once 'modals/teachers-modal.php'; ?>
<style media="screen">
  .card{
    height: auto;
    width: 300px;
  }
  .card i{
    display: none;
  }
  .card select{
    width: 90%;
  }

</style>
<div class="mt-3">
  <div class="container">
    <div class="title-head bg-white">
      <div>
        <i class="fa fa-home"></i>
        <h5>Manage Teachers</h5>
      </div>
      <p>Total no of teachers: </p>
      <div class="tr_nav">
        <i id="back"></i>
        <a class="add tooltip-bottom" disabled title="set teacher to subject" id="set-tr-subj"><i class="fa fa-calendar"></i></a>
        <a data-toggle="modal"  href="#teacheradd" class="add tooltip-bottom" title="Add teacher"><i class="fa fa-user-plus"></i></a>
      </div>
    </div>


    <div class="container tables bg-white mt-3  ">
      <div class="layer1 ">
        <div class="contain pt-3 d-flex justify-content-around">
          <div class="card text-center">
            <div class="card-head hd">
              <p class="lead">Set subject to class</p>
              <i class="fa fa-check text-success"></i>
            </div>
            <div class="card-body">
              <div class="first">
                <p class="mb-0">Class:</p>
                <?php include 'class_sel.php'; ?>
                <select class="select_class" name="">
                      <?php if($stmt->rowCount() > 0):?>
                        <option selected>--Select Class--</option>

                         <?php while($row = $stmt->fetch()): ?>
                         <option value="<?=$row['id']?>"><?=$row['classname']?></option>
                         <?php endwhile; ?>

                      <?php else: ?>
                         <option selected>Empty classes</option>
                       <?php endif; ?>
                </select>
              </div>

              <div class="stream">
                <p class="mb-0">Stream:</p>
                <select class="select_stream " name="" disabled>
                  <option value="">--select stream--</option>
                </select>
              </div>

              <div class="">
                <p class="mt-2 mb-0">Teacher:</p>
                <?php include 'teacher_sel.php'; ?>
                <select class="select_tr" name="">
                      <?php if($stmt->rowCount() > 0):?>
                        <option selected>--Select teacher--</option>

                         <?php while($row = $stmt->fetch()): ?>
                         <option value="<?=$row['id']?>"><?=$row['tr_name']?></option>
                         <?php endwhile; ?>

                      <?php else: ?>
                         <option selected>Empty classes</option>
                       <?php endif; ?>
                </select>
              </div>

              <div class="last mb-5">
                <p class="mt-2 mb-0">Subject:</p>
                <div class="well">
                  <!-- appenden from subject_teacher_sel.php -->
                </div>
              </div>
            </div>
            <div class="card-footer">
              <button type="button" name="button" class="buut sub">Submit</button>
            </div>
          </div>


          <div class="card text-center" id ="edit-tr">
            <div class="card-head hd">
              <p class="lead">Edit Teacher subject</p>
              <i class="fa fa-check text-success"></i>
            </div>
            <div class="card-body" >
              <div class=" ">
                <p class="mb-0">Class:</p>
                <select class="" name="" disabled>
                       <option value="" seleced>--Select class--</option>
                </select>
              </div>

              <div class="">
                <p class="mb-0">Stream:</p>
                <select class="" name="" disabled>
                  <option value="">--Select stream --</option>
                </select>
              </div>

              <div class="">
                <p class="mt-2 mb-0">Teacher:</p>
                <select class="" name="" disabled>
                  <option value="">--select teacher--</option>
                </select>
              </div>

              <div class="  mb-5">
                <p class="mt-2 mb-0">Subject:</p>
                <div class="">
                  <select class="" name="" disabled>
                    <option value="" selected>--select subject--</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <button type="button" name="button" class="buut sub p-1">Update</button>
            </div>
          </div>
          </div>



          <?php include 'subject_teachers_fetch.php'; ?>
         <div class="table-responsive p-2  mt-3 bg-white">
           <div class="bg-light m-0 p-0">
             <h5 class="lead">Table showing teachers with their subjects</h5>
           </div>
           <table class="table table-sm table-striped beristable table-bordered sub-tr-table table-hover">
             <thead>
               <th>Teacher</th>
               <th>Subject</th>
               <th>Class</th>
               <th>Stream</th>
               <th width="5%">Tool</th>
             </thead>
             <tbody>
               <?php while($sub = $sub_tr->fetch()): ?>
                 <tr>
                   <td><?=$sub['tr_name'] ?></td>
                   <td data="<?=$sub['subject_id'] ?>"><?=$sub['subject'] ?></td>
                   <td data="<?=$sub['class_id'] ?>"><?=$sub['classname'] ?></td>
                   <td data="<?=$sub['stream_id'] ?>"><?=$sub['stream'] ?></td>
                   <td class="d-flex justify-content-around">
                     <i class="fa fa-pencil text-warning edit" data-id="<?=$sub['id'] ?>"></i>
                  </td>

                 </tr>
               <?php endwhile; ?>
             </tbody>
           </table>
         </div>
        </div>
      </div>

      <!-- normal table -->
        <div class="lay bg-white">
          <?php include 'teacher_sel.php'; ?>
          <div class="table-responsive p-2 ">
            <table class="table table-sm table-striped table-bordered table-hover  beristable ">
              <thead class="table-info text-center">
                <th width="9%">Img</th>
                <th>Name</th>
                <th width="30%">Subjects</th>
                <th>Classes</th>
                <th>Contact</th>
                <th>Status</th>
                <th width="5%">Tool</th>
              </thead>
              <tbody>
                <?php while($tr = $stmt->fetch()): ?>
                  <tr>
                    <td>
                      <?php if ($tr['tr_image'] == !""): ?>
                        <img src="uploads/teachers/<?=$tr['tr_image']?>" alt="" class="table-image">
                      <?php else: ?>
                        <img src="uploads/teachers/default.png" alt="" class="table-image">
                      <?php endif; ?>
                     </td>
                    <td><?=$tr['tr_name'] ?></td>
                    <?php include 'teacher_subject_sel.php'; ?>
                    <td>
                      <?php if($q->rowCount() > 0): ?>
                        <?php foreach ($res as $re):
                          echo $re['subject'].'/';
                         ?>
                      <?php endforeach; else: ?>
                        No subjects taught
                      <?php endif; ?>
                    </td>
                    <?php include 'subject_class_sel.php'; ?>
                    <td>
                      <?php if($r->rowCount() > 0): ?>
                      <?php foreach ($ress as $res):
                        echo $res['classname'].'/';
                       ?>
                    <?php endforeach; else: ?>
                      No classes taught
                    <?php endif; ?>
                  </td>
                    <td><?=$tr['contact'] ?></td>
                      <?php if($tr['status'] ==true): ?>
                        <td class="status">
                        Active
                        </td>
                      <?php else: ?>
                        <td class="text-danger">
                        offline
                        </td>
                      <?php endif; ?>
                    <td class="text-center">
                      <i class="fa fa-pencil tooltip-bottom tr_edit" data-id="<?=$tr['id'] ?>" title="Edit teacher"></i>
                      <i class="fa fa-eye tooltip-bottom m-2 pro tr_view" data-id="<?=$tr['id'] ?>" title="View data"></i>
                   </td>

                  </tr>
                <?php endwhile; ?>
              </tbody>
            </table>
          </div>



        </div>
    </div>
  </div>
</div>

<script type="text/javascript" charset="utf-8">
// first check and confirm password before submit form
  $('#teacherform').submit(function(){

      var pass = $('#pass').val();
      var passed = $('#passCheck').val();

    if(pass === passed){
      return true;

    }else{
      alert('check your password');
      return false;
    }
  });

  //trigger edit form modals


  $('.tr_edit').click(function(){
    var tr_id = $(this).attr('data-id');

    $.ajax({
      url: 'teacher_fetch.php',
      method: 'POST',
      data: {tr_id: tr_id},
      success: function(data){
        $('#teacher_edit').html(data);
        $('#teacheredit').modal('show');

      }
    });


  });

  //view teacher data
  $('.tr_view').click(function(){
    var tr_id = $(this).attr('data-id');

    $.ajax({
      url: 'teacher_view.php',
      method: 'POST',
      data: {tr_id: tr_id},
      success: function(data){
        $('#teacher_view').html(data);
        $('#teacherview').modal('show');

      }
    });




  });
</script>
<script src="js/subject_teacherss.js" charset="utf-8"></script>

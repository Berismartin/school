 <?php include 'conn/conn.php'; ?>
 <?php include 'includes/scripts.php'; ?>
 <?php include 'subject_teacher_fetch.php'; ?>
<style media="screen">
.contain{
  background-image: url('bg/bg-square-grey.jpg');
}
  .subj-tr{
    width: 350px;
    height: auto;
  }
  select{
    width: 90%;

  }

select::selected{
  text-align: center;
}


  option{
    text-align: left;
  }

  button{
    border: none;
    height: 40px;
    transition: .3s;
  }

  .last{
    display: none;
  }
  .hd{
    display: flex;
    justify-content: space-around;
  }

  .hd p{
    flex-grow: 2;
  }
  .hd i{
    padding-right: 10px;
    padding-top: 5px;
    display: none;
  }
</style>
<div class="p-2 contain">
  <div class="d-flex justify-content-between">
    <div class="card text-center subj-tr">
      <div class="card-head">
        <div class="card-title hd">
          <p class="lead">Set subject to class</p>
          <i class="fa fa-check text-success"></i>
        </div>
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


        <div class="last">
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

    <div class="stats">
      <div class="card">
        <div class="">
          sdsdsds
        </div>
      </div>
    </div>
  </div>

<div class="table-responsive p-2 lay mt-3 bg-white">
  <table class="table table-sm table-striped table-bordered table-hover  subj_tr">
    <thead>
      <th>Teacher</th>
      <th>Subject</th>
      <th>Class</th>
      <th width="5%">Tool</th>
    </thead>
    <tbody>
      <?php while($sub = $sub_tr->fetch()): ?>
        <tr>
          <td><?=$sub['tr_name'] ?></td>
          <td><?=$sub['subject'] ?></td>
          <td><?=$sub['classname'] ?></td>
          <td class="d-flex justify-content-around">
            <i class="fa fa-trash text-danger del" ></i>
         </td>

        </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>
</div>

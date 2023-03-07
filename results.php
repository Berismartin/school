
  <div class="mt-3">
    <div class="showed">

    </div>
    <div class="container results">
      <div class="title-head bg-white">
        <div>
          <i class="fa fa-home"></i>
          <h5>Marks Entry</h5>
        </div>
        <div>
          <a class="added butShow tooltip-bottom" title="select current year" type="button">Set Year</a>
          <a data-toggle="modal"  href="#yearadd" type="button" class="added"><i class="fa fa-plus"></i> Add Year</a>
        </div>
      </div>
      <div class="getstream text-center bg-white">

      </div>
<?php include 'results_table.php'; ?>
      <div class="container tables bg-white mt-3 pt-2">
        <div class="table-responsive p-2">
          <table class="table table-striped table-sm table-bordered table-hover  beristable">
            <thead>
              <th width="5%">#</th>
              <th width="12%">Class</th>
              <th>Subject</th>
              <th>Teachers</th>
              <th>Stream</th>
              <th>Marks</th>
            </thead>
            <tbody>
              <?php
             $i = 1;
            // print_r($query->fetch());
              while ($row = $query->fetch()):
               ?>
               <tr>
                 <td><?=$i ?></td>
                 <td data="<?=$row['class_id'] ?>"><?=$row['classname'] ?></td>
                 <td data="<?=$row['subject_id'] ?>"><?=$row['subject'] ?></td>
                 <td data="<?=$row['tr_id'] ?>"><?=$row['tr_name'] ?></td>
                 <td data="<?=$row['stream_id'] ?>"><?=$row['stream'] ?></td> 
                 <td class="text-center"> <button data="<?=$row['id'] ?>" type="button" class="text-secondary see-result">Enter marks</button> </td>
               </tr>
             <?php $i++; endwhile; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <script src="js/results.js" charset="utf-8"></script>

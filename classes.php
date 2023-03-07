<?php include_once 'modals/class-modal.php'; ?>
<?php include 'class_sel.php'; ?>
    <div class="title-head bg-white">
      <div>
        <i class="fa fa-home"></i>
        <h5>Classes</h5>
      </div>
      <p>Classes of <?=$_SESSION['year']." " . $_SESSION['term'] ?></p>
      <a data-toggle="modal"  href="#classadd" class="added"><i class="fa fa-plus"></i> Add class</a>
    </div>
    <div class="container tables bg-white mt-3 pt-2">
      <div class="table-responsive p-2 ">
        <table class="table table-sm merge table-striped table-bordered table-hover  beristable">
          <thead>
            <th>Class</th>
            <th>students</th>
            <th>Class teacher</th>
            <th width="30%">Streams</th>
            <th>No of subjects</th>
            <th width="5%">Tool</th>
          </thead>
          <tbody>

            <?php while($row = $stmt->fetch()): ?>

            <?php include 'stream_sel.php'; ?>
          <?php include 'class_counts.php'; ?>
            <tr>
              <td><?=strtoupper($row['classname'])?></td>
              <td><?=$st->rowCount()?></td>
              <td>Beris martin</td>
              <td class="stream">
                <div class="row px-1">
                  <?php if($stream->rowCount() > 0): ?>
                    <?php while($str = $stream->fetch()): ?>

                  <div class="col col-2 p-1">
                  <?php
                  $st = $db->prepare("SELECT * FROM students WHERE stream = ?");
                  $st->bindparam(1, $str['id']);
                  $st->execute(); 
                  ?>
                    <button   name="button"><?=$str['stream']. $st->rowCount() ?> </button>
                  </div>
                <?php endwhile; ?>
                  <?php else: ?>
                    <div>No streams!</div>
                  <?php endif; ?>
                </div>
               </td>
              <td><?=$sub->rowCount() ?></td>
              <td class="d-flex justify-content-around">
                <i class="fa fa-pencil tooltip-bottom" title="Edit class"></i>
             </td>
            </tr>
          <?php endwhile; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>



 

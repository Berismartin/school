<?php include 'class_sel.php'; ?>
    <div class="title-head bg-white">
      <div>
        <i class="fa fa-home"></i>
        <h5>Streams</h5>
      </div>
    </div>
    <div class="container bg-white mt-3">
      <div class="text-center">
        <p class="lead">Manage your streams</p>
      </div>
      <div class="container cont p-2">
        <div class="row justify-content-center">
          <?php while($row = $stmt->fetch()): ?>
            <div class="col col-5 mb-3">
              <div class="card stream-card">
                <div class="card-header">
                <?=strtoupper($row['classname']) ?>
                <?php include 'stream_sel.php'; ?>
                </div>
                <div class="card-body">
                  <div class="card-content">
                    <ul class="list-group list-group-flus streamlist">
                      <?php if($stream->rowCount() > 0): ?>
                        <?php while ($str = $stream->fetch()): ?>
                        <li class="list-group-item"><?=$str['stream']?></li>
                      <?php endwhile; ?>
                      <?php else: ?>
                        <li>No streams in <?=$row['classname'] ?></li>
                      <?php endif; ?>
                    </ul>
                  </div>
                  <span id="<?=$row['id']?>" class="d-none"></span>
                  <input  type="text" class=" addstream">
                  <button class="mt-3 streamadd" type="button" name="button">add</button>
                </div>
              </div>
            </div>
          <?php endwhile; ?>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript" charset="utf-8">
  $(document).ready(function(){

    $('.streamadd').click(function(){
      var body  = $(this).closest('.card-body');
      var input = body.children('input');
      var classid = body.children('span').attr('id');

      var stream = input.val();
      input.val('');

      $.ajax({
        url : "stream_add.php",
        method: "POST",
        data: {
          classid: classid,
          stream: stream
        },
        success: function(res){
                      if(res == 'yap'){
                        $('.alert_mess').html('<div class="alert alert-dismissible alert-success alert-sm fade show"><i class="fa fa-check-circle text-success"></i><span> '+stream +' added successfully!</span><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');



                      }else if(res = 'error'){
                        $('.alert_mess').html('<div class="alert alert-dismissible alert-warning alert-sm fade show"><i class="fa fa-exclamation-triangle text-warning"></i><span> The provided stream exists!</span><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

                      }else{
                        $('.alert_mess').html('<div class="alert alert-dismissible alert-warning alert-sm fade show"><i class="fa fa-exclamation-triangle text-warning"></i><span> Someting went wrong. Contact beris!</span><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                      }
                  }
      });

        body.children('.card-content').children('ul').append('<li class="list-group-item">'+ stream +'</li>');

       
    });

  });
</script>

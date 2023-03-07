
    <div class="title-head bg-white">
      <div>
        <i class="fa fa-home"></i>
        <h5>Manage system students</h5>
      </div>
      <p>students</p>
      <div class="">
        <button class="added  text-white px-3 detail"><i class="fa fa-table"></i> Detail</button>
        <button class="added  text-white px-3 stdviews"><i class="fa fa-eye"></i> View Student</button>
        <button class="added  text-white px-3 mtadd"><i class="fa fa-check"></i> Multiple add</button>
        <button class="added  text-white px-3  stadd"><i class="fa fa-plus"></i> Add Student</button>
      </div>
    </div>

<!-- show students table -->



    <div class="container p-2 bg-white mt-3">
      <p class="lead">Students Management Section</p>
        <div class="contain-dash">
          <div class="stdash">
            <p>students dash</p>
          </div>

          <!-- students view -->

          <div class="stview">
            <?php include 'student_sel.php'; ?>

            <div class="container p-3 ">
              <div class="container bg-white">
                <div class="table-responsive p-2">
                  <table class="table text-center table-striped table-sm table-bordered table-hover  beristable years">
                    <thead>
                      <th width="5%">Id</th>
                      <th >Name</th>
                      <th >class</th>
                      <th width="5%">Tool</th>
                    </thead>
                    <tbody>
                      <?php  include 'year_sel.php'; ?>
                      <?php while($row = $query->fetch()): ?>
                        <tr>
                          <td><?=$row['id']?></td>
                          <td><?=$row['name']?></td>
                          <td><?=$row['classname']?></td>
                          <td class="d-flex justify-content-around">
                            <i class="fa fa-pencil text-warning"></i>
                         </td>
                        </tr>
                      <?php endwhile; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
<!-- multiple student form -->
          <div class="stmtadd">
            <div class="s">

            </div>
            <div class="studentsec">
              <div class=" m-3">
                <div class="stdmtdloader"></div>
                <p class="error"></p>
                <div class="multiple-form">
                  <div class="pt-2">
                    <p class="mt-4">Term of entry:</p>
                    <p class="mt-4">Year of entry:</p>
                    <p class="mt-4">Class:</p>
                    <p class="mt-4">Stream:</p>
                    <p class="mt-4">Number of rows:</p>
                  </div>
                  <div class="multiples p-4">
                    <input type="hidden" name="regdate" value="<?=date('d-m-y') ?>"class="regdate">
                    <select class="form-control term" name="term">
                      <option value="" selected>Select Term</option>
                      <?php
                      include 'term_sel.php';
                      while ($row = $stmt->fetch()):
                       ?>
                       <option value="<?=$row['id'] ?>"><?=$row['term'] ?></option>
                     <?php endwhile; ?>
                    </select>

                    <select class="form-control year" name="year">
                      <option value="" selected>Select Year</option>
                      <?php
                      include 'year_sel.php';
                      while ($row = $stmt->fetch()):
                       ?>
                       <option value="<?=$row['id'] ?>"><?=$row['year'] ?></option>
                     <?php endwhile; ?>
                    </select>

                    <select class="form-control class" name="class">
                      <option value="" selected>Select class</option>
                      <?php
                      include 'class_sel.php';
                      while ($row = $stmt->fetch()):
                       ?>
                       <option value="<?=$row['id'] ?>" data="<?=$row['level'] ?>" ><?=$row['classname'] ?></option>
                     <?php endwhile; ?>
                    </select>

                    <select class="form-control stream" name="stream" disabled >
                       <!-- loading streams -->
                    </select>

                    <input type="number" class="numrows form-control shadow-none">

                  </div>
                </div>
                <div class="multiple-form pb-3">
                  <button type="button" name="button" class="px-1 generate">Generate</button>
                </div>
              </div>
            </div>

            <div class="mulpleform text-center">
              <div class="head">
                <p class="lead">Multiple add students</p>
              </div>
              <div class="formstd p-3 m-2 text-center">
                <div class="">
                  <table class="stdforms">
                    <!-- loading from student-mult-form -->
                  </table>
                </div>
                <div class="text-center">
                  <button type="button" name="button" id="save" class="px-2">Save</button>
                  <button type="button" name="button" id="back" class="px-2">back</button>
                </div>
              </div>
            </div>
          </div>
<!-- add single student -->
          <div class="staddsec">
            <div class="container ">
              <div class="bg-light m-3">
                <p class="p-2">Student Regestration form</p>
                <div class="container">
                  <p class="error "></p>
                  <div class="stdloader"></div>
                  <form class="studentadd" action="student_add.php" method="POST">
                    <div class=" student-form">
                      <div class="regester">
                        <div>
                          <p>Registration Date: </p>
                          <p>Index number:</p>
                          <p>Fullname:</p>
                          <p class="mt-4">Term of entry:</p>
                          <p class="mt-4">Year of entry:</p>
                          <p class="mt-4">Class:</p>
                          <p class="mt-4">Stream:</p>
                          <p class="mt-4">Gender:</p>
                      </div>
                        <div>
                          <input type="text" name="regdate" value="<?=date('d-m-y') ?>" disabled class="form-control shadow-none regdate">
                          <input type="text" name="indexno"  class="indexno form-control shadow-none" required>
                          <input type="text" name="name"   class="name form-control shadow-none" required>

                          <select class="form-control term" name="term">
                            <option value="" selected>Select Term</option>
                            <?php
                            include 'term_sel.php';
                            while ($row = $stmt->fetch()):
                             ?>
                             <option value="<?=$row['id'] ?>"><?=$row['term'] ?></option>
                           <?php endwhile; ?>
                          </select>

                          <select class="form-control year" name="year">
                            <option value="" selected>Select Year</option>
                            <?php
                            include 'year_sel.php';
                            while ($row = $stmt->fetch()):
                             ?>
                             <option value="<?=$row['id'] ?>"><?=$row['year'] ?></option>
                           <?php endwhile; ?>
                          </select>

                          <select class="form-control class" name="class">
                            <option value="" selected>Select class</option>
                            <?php
                            include 'class_sel.php';
                            while ($row = $stmt->fetch()):
                             ?>
                             <option value="<?=$row['id'] ?>" data="<?=$row['level'] ?>" ><?=$row['classname'] ?></option>
                           <?php endwhile; ?>
                          </select>

                          <select class="form-control stream" name="stream" disabled >
                             <!-- loading streams -->
                          </select>

                           <span><input type="radio" name="gender" value="male" class="rad"> <p>male</p> </span>
                           <span><input type="radio" name="gender" value="female" class="rad"> <p>female</p> </span>
                           <div class="s">
                             <button name="save" value="save"class="save">Save</button>
                             <button type="button" name="reset" value="reset">Reset</button>
                           </div>
                      </div>
                      </div>
                      <div class="optionals">
                        <div class="olevel">
                          <p class="lead">Optionals</p>

                          <select class="form-control op1" name="op1">
                            <option value="" selected>Select option 1</option>
                            <?php
                            include 'student_select_subjects.php';
                            while ($row = $stmt->fetch()):
                             ?>
                             <option value="<?=$row['id'] ?>"><?=$row['subject'] ?></option>
                           <?php endwhile; ?>
                          </select>

                          <select class="form-control op2" name="op2">
                            <option value="" selected>Select option 2</option>
                            <?php
                            include 'student_select_subjects.php';
                            while ($row = $stmt->fetch()):
                             ?>
                             <option value="<?=$row['id'] ?>"><?=$row['subject'] ?></option>
                           <?php endwhile; ?>
                          </select>

                        </div>
                        <div class="alevel">
                          <p class="lead mb-4">Select Combination</p>
                          <select class="form-control comb" name="comb">
                            <option value="" selected>Select combination</option>
                            <?php
                            include 'combination_sel.php';
                            while ($row = $stmt->fetch()):
                             ?>
                             <option value="<?=$row['id'] ?>"><?=$row['comb_name'] ?></option>
                           <?php endwhile; ?>
                          </select>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>

  </div>
</div>


<script type="text/javascript">
  $(document).ready(function(){
    $('.stdash, .stview, .stmtadd, .staddsec').css('background-image', 'url(bg/bg-square-grey.jpg)');

    //handling the animations
//view button  clicked
    $('.stdviews').click(function(){
      $('.stdash').addClass('stdashup');

      if($('.stmtadd').hasClass('stmtaddtgl')){
        $('.stmtadd').css('transition', '.5s');
        $('.stmtadd').removeClass('stmtaddtgl');

      }else if($('.staddsec').hasClass('staddtgl')){
        $('.staddsec').css('transition', '.5s');
        $('.staddsec').removeClass('staddtgl');

      }

      $('.stview').addClass('stviewdown');
    });


//multiple add button  clicked

    $('.mtadd').click(function(){
      $('.stdash').addClass('stdashup');

      if($('.stview').hasClass('stviewdown')){
        $('.stview').css('transition', '.5s');
        $('.stview').removeClass('stviewdown');

      }else if($('.staddsec').hasClass('staddtgl')){
        $('.staddsec').css('transition', '.5s');
        $('.staddsec').removeClass('staddtgl');

      }

      $('.stmtadd').addClass('stmtaddtgl');

     if($('.mulpleform').hasClass('mulpleform-on')){
        $('.mulpleform').removeClass('mulpleform-on');
        $('.studentsec').removeClass('studentsecoff');
      }
    });


//  add button  clicked
    $('.stadd').click(function(){
      $('.stdash').addClass('stdashup');

      if($('.stview').hasClass('stviewdown')){

        $('.stview').css('transition', '.5s');
        $('.stview').removeClass('stviewdown');

      }else if($('.stmtadd').hasClass('stmtaddtgl')){
        $('.stmtadd').css('transition', '.5s');
        $('.stmtadd').removeClass('stmtaddtgl');

      }

      $('.staddsec').addClass('staddtgl');
    });

    //  detail button  clicked
        $('.detail').click(function(){
          $('.stdash').removeClass('stdashup');

          if($('.stview').hasClass('stviewdown')){

            $('.stview').css('transition', '.5s');
            $('.stview').removeClass('stviewdown');

          }else if($('.stmtadd').hasClass('stmtaddtgl')){
            $('.stmtadd').css('transition', '.5s');
            $('.stmtadd').removeClass('stmtaddtgl');

          }else if($('.staddsec').hasClass('staddtgl')){
            $('.staddsec').css('transition', '.5s');
            $('.staddsec').removeClass('staddtgl');

          }

          //$('.staddsec').addClass('staddtgl');
        });

        //back button clicked

        $('#back').click(function(){
          $('.mulpleform').removeClass('mulpleform-on');
          $('.studentsec').removeClass('studentsecoff');
          $('.stdforms').html('');
        });
        // var opt = [];
        //   $('.term option').each(function(){
        //     opt.push($(this).text());
        //   });
        //   alert(opt);
  });

</script>

<script type="text/javascript" src="js/student-form.js"></script>
<script type="text/javascript" src="js/student-mult-form.js"></script>

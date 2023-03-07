$(document).ready(function(){

  //when a class has been selected
   $('.stmtadd .class').blur(function(){
     var classname = $('.stmtadd .class').val();
     var level = $('.stmtadd .class :selected').attr('data');


     if(!classname == ''){
       $('.stmtadd .stream').load('students-streams.php',{
         classname: classname
       }).removeAttr('disabled');

     }


    });


  $('.generate').click(function(){
    var regdate = $('.stmtadd .regdate').val();
    var term = $('.stmtadd .term').val();
    var year = $('.stmtadd .year').val();
    var classname = $('.stmtadd .class').val();
    var stream = $('.stmtadd .stream').val();
    var rows = $('.stmtadd .numrows').val();

    var level = $('.stmtadd .class :selected').attr('data');

    if(term =="" || year =="" || classname =="" || stream ==""){

    $('.error').html('Fill in all fields!').addClass('text-danger');

      setTimeout(function(){
        $('.error').html('').removeClass('text-danger');
      }, 1500);

    }else if(rows == ''){
      $('.error').html('Enter number of rows!').addClass('text-danger');

        setTimeout(function(){
          $('.error').html('').removeClass('text-danger');
        }, 1500);
    }else {

        $('.mulpleform').addClass('mulpleform-on');
        $('.studentsec').addClass('studentsecoff');

        if(level == 'O'){

          for(var i = 1; i <= rows; i++){
            $('.stdforms').append('<tr><td><input type="text" class="indexno" placeholder="index number" ></td><td><input type="text" class="name" placeholder="Fullname" ></td></tr>');
            }


        }else{

          for(var i = 1; i <= rows; i++){
            $('.stdforms').append('<tr><td><input type="text" class="indexno" placeholder="index number" ></td><td><input type="text" class="name" placeholder="Fullname" ></td> <td><select class="get_comb"></select></td> </tr>');
            $('.get_comb').load('student_a_comb.php');
            }


        }


      $('#save').click(function(){


        if(level == 'O'){
          var indexno = [];
          var name = [];


          $('.indexno').each(function(){
            indexno.push($(this).val());

          });

          $('.name').each(function(){
            name.push($(this).val());

          });



          //create a request
          $('.stdmtdloader').load('student_o_mult_add.php', {
            regdate: regdate,
            indexno: indexno,
            name: name,
            term: term,
            year: year,
            classname: classname,
            stream: stream,
            success:  function(){
              $('.stdforms').html('');
                $('.mulpleform').removeClass('mulpleform-on');
                $('.studentsec').removeClass('studentsecoff');
                $('.stdmtdloader').html('');
                  setTimeout(function(){
                    $('.stdmtdloader div').fadeOut();

                  }, 1500);

            }

          });

        }else{
          alert('not yet possible');

          // var indexno = [];
          // var name = [];
          // var get_comb = [];
          //
          // $('.indexno').each(function(){
          //   indexno.push($(this).val());
          //
          // });
          //
          // $('.name').each(function(){
          //   name.push($(this).val());
          //
          //   $('.get_comb :selected').each(function(){
          //     get_comb.push($(this).val());
          //
          //   });
          //
          //   alert(get_comb);
          // //  create a request
          //   $('.s').load('student_a_mult_add.php', {
          //     regdate: regdate,
          //     indexno: indexno,
          //     name: name,
          //     get_comb: get_comb,
          //     term: term,
          //     year: year,
          //     classname: classname,
          //     stream: stream,
          //     success:  function(){
          //       // $('.stdforms').html('');
          //       //   $('.mulpleform').removeClass('mulpleform-on');
          //       //   $('.studentsec').removeClass('studentsecoff');
          //       //   $('.stdmtdloader').html('');
          //       //     setTimeout(function(){
          //       //       $('.stdmtdloader div').fadeOut();
          //       //
          //       //     }, 1500);
          //
          //     }
          //
          //    });
          //
          // });






        }
      });
    }


  });

});

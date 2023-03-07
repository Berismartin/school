$(document).ready(function(){
   //var tu = $('.term :selected').val();

//when a class has been selected

 $('.staddsec .class').blur(function(){
   var classname = $('.staddsec .class').val();
   var level = $('.staddsec .class :selected').attr('data');


   if(!classname == ''){
     $('.staddsec .stream').load('students-streams.php',{
       classname: classname
     }).removeAttr('disabled');

   }

   if(!level ==''){
     if(level == 'O'){
       $('.olevel').fadeIn();
       $('.alevel').hide();
     }else{
       $('.olevel').hide();
       $('.alevel').fadeIn();
     }
   }

  });


  //when the form is submimtted

  $('.studentadd').submit(function(event){
    event.preventDefault();

    var regdate = $('.staddsec .regdate').val();
    var indexno = $('.staddsec .indexno').val();
    var name = $('.staddsec .name').val();

    var term = $('.staddsec .term').val();
    var year = $('.staddsec .year').val();
    var classname = $('.staddsec .class').val();
    var stream = $('.staddsec .stream').val();
    var gender = $('.staddsec .staddsec :radio').val();

    var level = $('.staddsec .class :selected').attr('data');
    var save = $('.staddsec .save').val();

if(term =="" || year =="" || classname =="" || stream ==""){

$('.error').html('Fill in all fields!').addClass('text-danger');

  setTimeout(function(){
    $('.error').html('').removeClass('text-danger');
  }, 1500);

}else{
  if(level == 'O'){
      var op1 = $('.optionals .op1').val();
      var op2 = $('.optionals .op2').val();

      if(op1 =="" || op2 ==""){
        $('.error').html('Fill in the form aside!').addClass('text-danger');

          setTimeout(function(){
            $('.error').html('').removeClass('text-danger');
          }, 1500);
      }else{
        //loading to add o level students
        $('.stdloader').load('student_o_add.php',{
          regdate: regdate,
          indexno: indexno,
          name: name,
          term: term,
          year: year,
          classname: classname,
          stream: stream,
          //gender: gender,
          op1: op1,
          op2: op2,
          save: save


        });
         $('.staddsec .indexno').val('');
          $('.staddsec .name').val('');

         //  $('.term').text('Select Term');
         // $('.year').text('Select Year');
         // $('.class').text('Select class');
         // $('.stream').text('select stream');
         // $('.op1').text('select option 1');
         // $('.op2').text('select option 2');

         setTimeout(function(){
           $('.stdloader div').fadeOut();
         }, 1500);

      }

    }else if(level == "A"){

      var comb = $('.staddsec .comb').val();

      if(comb ==''){
        $('.error').html('Fill in the form aside!').addClass('text-danger');

          setTimeout(function(){
            $('.error').html('');
          }, 1500);
      }else{
        $('.stdloader').load('student_a_add.php',{
          regdate: regdate,
          indexno: indexno,
          name: name,
          term: term,
          year: year,
          classname: classname,
          stream: stream,
          //gender: gender,
          comb: comb

        });
        $('.staddsec .indexno').val('');
         $('.staddsec .name').val('');

        //  $('.term').text('Select Term');
        // $('.year').text('Select Year');
        // $('.class').text('Select class');
        // $('.stream').text('select stream');
        // $('.comb').text('select combination');

        setTimeout(function(){
          $('.stdloader div').fadeOut();
        }, 1500);

      }

    }else{
        $('.error').html('Select class!').addClass('text-danger');
    }

}




  });

});

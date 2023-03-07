$(document).ready(function(){

$('.butShow').click(function(){

  $('.form-drop').toggleClass('on');
  $('.form-content').toggleClass('off'); 

  if($('.tbls').hasClass('tblsdown')){
    $('.tbls').removeClass('tblsdown');
  }
});

  $('.form-content').parent().css('background-image', 'url(bg/bg-square-grey.jpg)');

  $('.formgenerate').click(function(){
    var setclass = $('#selClass').val().toUpperCase();
    var num = $('#numRow').val();

    if(setclass == ""){
      $('.feedback').text("Select class to add subject first!");

    }else if(!$.isNumeric(num) || num > 10){

      $('.feedback').text("Insert number not greater than 10!");

    }else{

      //we use a callback functiom
      $('#loading').load('subject_multiple_form.php' ,function(){
        $('.sub-title').append('<h5 class="text-center lead">Multiple add  '+ setclass +' subjects</h5>');
        $('#loading').css('background-image', 'url(bg/bg-square-grey.jpg)') ;


      for(var i = 1; i <= num; i++){
          $('#formcontent').append('<tr><td><input type="text" class="code"  class="shadow-none form-control" placeholder="code"></td><td><input class="shadow-none form-control subject" type="text" placeholder="Enter subject name"></td></tr>');
        }


        $('.reset_subject_form').click(function(){
            $('#formcontent tr td input').val("");
        });
//multiple forms submitted

        $('#submit_multiple_subjs').click(function(){

          var codes = [];
          var subjects = [];

          $('.code').each(function(){
            codes.push($(this).val());

          });

          $('.subject').each(function(){
            subjects.push($(this).val());

          });

           $.ajax({
             url: "subject_add_multiple.php",
             method: "POST",
             data: {
               codes:codes,
               subjects: subjects,
               setclass:setclass

             },
             success: function(res){
               if(res ==='go'){
                 location.href="dashboard.php?page=subjects";
               }
             }
           });


        });


      });


        $('.form-drop').removeClass('on');
        $('.form-content').fadeOut();
    }
  });

  $('#listed ul li').click(function(){
      var classclick = $(this).text();
      $('#selClass').val(classclick).attr('disabled', 'disabled');
  });

});

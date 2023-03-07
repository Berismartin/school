$(document).ready(function(){
  $('.see-result').click(function(){
    $('#check').attr('checked', 'checked');
    $('.nav').slideUp(700);
    $('.results').slideUp();
    $('.showed').addClass('showedon');



      var class_id = $(this).attr('data');
       tr = $(this).closest('tr');

      var data = tr.children('td').map(function(){
        return $(this).attr('data');
      }).get();

      var subject = data[1];
      var teacher = data[2];
      var stream = data[3];


      $('.showed').load('enter_o_marks.php',{
        class_id: class_id,
        subject: subject,
        teacher: teacher,
        stream: stream
      });



  });
});

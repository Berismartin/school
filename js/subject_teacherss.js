$(document).ready(function(){

    $('#set-tr-subj').click(function(){
      //slide up the table
      $('.layer1').toggleClass('layer1-on');
      $('.layer1').css('background', 'url(bg/bg-square-grey.jpg)');
      $('.lay').toggleClass('lay-off');


      $('.select_class').blur(function(){
        var classid =  $('.select_class').val();



        $.ajax({
          url: "subject_teacher_sel.php",
          method: "POST",
          data: {classid: classid},
          success: function(res){
              $('.last').css('display', 'block');
              $('.well').html(res);
          }
        });

        $('.stream').load('sub_stream_class.php', {
          classid: classid
        });
      });

    });

  //  when form is submitted

    $('.sub').click(function(){

    var class_id = $('.select_class').val();
    var tr_id = $('.select_tr').val();
    var sub_id = $('.select_sub').val();
    var stream  = $('.select_stream').val();

    var classs = $('.select_class option:selected').text();
    var tr= $('.select_tr option:selected').text();
    var sub = $('.select_sub option:selected').text();
    var streams = $('.select_stream option:selected').text();


    if(class_id == '--Select Class--' || tr_id =='--Select teacher--' || stream =='--Select stream--'){

      alert('Class, stram or teacher not selected');

    }else if(sub_id == 'selected'){

      alert('select teacher for this subject');
    }else{

      $.ajax({
        url: "subject_teacher_add.php",
        method: "POST",
        data: {
          class_id: class_id,
          tr_id: tr_id,
          sub_id: sub_id,
          stream: stream,
        },
        success: function(res){
          if(res == 'not possible'){
            alert('record exists');
          }else if(res =='success'){

              $('.hd i').fadeIn();
              setTimeout(function(){
                $('.hd i').fadeOut();
              },2000);

              $('.sub-tr-table tbody').append('<tr><td>'+tr+'</td><td>'+sub+'</td><td>'+classs+'</td><td>'+streams+'</td><td><i class="fa fa-pencil text-warning edit" ></i></td></tr>');

              $('.select_class').val("--Select Class--");
              $('.select_tr').val("--Select teacher--");
              $('.stream').html('<p>Stream: </p><select disabled><option selected>--select teacher--</option></select>');

              $('.last').css('display', 'none');


          }else{
            alert('something went wrong--contact beris!');
          }
        }
      });

    }

    });


    $('.sub-tr-table .edit').click(function(){
      var tr_id  = $(this).attr('data-id');

      tr = $(this).closest('tr');

     var data = tr.children('td').map(function(){
       return $(this).text();
     }).get();

     var data_id = tr.children('td').map(function(){
       return $(this).attr('data');
     }).get();


     var teacher = data[0];
     var subject = data[1];
     var classq = data[2];
     var stream = data[3];

     var subject_id = data_id[0];
     var classq_id = data_id[1];
     var stream_id = data_id[2];

      $('#edit-tr').load('subj-tr-edit.php',{
        tr_id:tr_id,
        teacher: teacher,
        subject:subject,
        classq:classq,
        stream:stream,
 
        subject_id:subject_id,
        classq_id:classq_id,
        stream_id:stream_id
      });
    });



});

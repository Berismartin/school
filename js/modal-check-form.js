$(document).ready(function(){

$('.form-table tr td input').on('keypress',function(){

    var val = $(this).val();
// first check length before if function to confirm the number
     if(val.length > 2){
      $(this).addClass('is-valid');
      $(this).removeClass('is-invalid');
    }else{
      $(this).removeClass('is-invalid');
      $(this).addClass('is-invalid');
    }

    var pass = $('#pass').val();

  if($(this).attr('check') == 'true'){
     if(val === pass){
       $(this).addClass('is-valid');
       $(this).removeClass('is-invalid');
    }else{
      $(this).removeClass('is-invalid');
      $(this).addClass('is-invalid');
    }

  }

  if($(this).attr('check')=='true'){
    var pass = $('#pass').val();
    var passCheck = $('#passCheck').val();

    if(pass === passCheck){
       $('#passCheck').addClass('is-valid');

    }else{
      $('#passCheck').addClass('is-invalid');
    }
  }

});


});

$(document).ready(function(){
  $('.trigger').click(function(){
    $('.triggered').toggleClass('triggeredon');
      if($('.triggered').hasClass('triggeredon')){
        $('.trigger i').attr('class', 'fa fa-angle-down');
      }else{
          $('.trigger i').attr('class', 'fa fa-angle-right');
      }
  });
});

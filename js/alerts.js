$(document).ready(function(){

if($('#alert').hasClass('alert-success')){
  $('.alert i').addClass('fa fa-check-circle text-success');

}else if($('#alert').hasClass('alert-danger')){

  $('.alert i').addClass('fa fa-exclamation text-danger');

}else{
  $('.alert i').addClass('fa fa-exclamation-triangle text-warning');
}

setTimeout(function(){
    $('.alert_mess div').fadeOut() ;
}, 5000);
});

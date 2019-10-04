jQuery(document).ready(function($) {

  $("#share_form").submit(function(event){
    event.preventDefault();

    var post_url = '/wp/wp-admin/admin-ajax.php';
    var form_data = $(this).serialize();

    setTimeout(function(){
      $('.js-share_message').html('Mensaje Enviado');
      $('.js-input-mail').val('');
      }, 500);


    $.ajax({
      url: post_url,
      type: "POST",
      data: form_data,
    }).done(function(response){ //o
      $('.js-share_message').html(response.message);
      $('.js-share_form').removeClass('error');
      $('.js-share_form').removeClass('success');
      if(response.status === 'ok') {
        $('.js-share_message').html(response.message);
        $('.js-input-mail').val('');
        $('.js-share_form').addClass('success');
      } else {
        $('.js-share_form').addClass('error');
      }
    });

  });
});
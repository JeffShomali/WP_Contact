jQuery(document).ready(function(){
     //Get Form
     var form = jQuery('#ajax-contact');

     //Message
     var formMessages = jQuery('#form-messages');

     //Form Event Handler
     jQuery(form).submit(function(event){
          //stop browser from submitting form directly
          event.preventDefault();
          console.log('Contact Form Submitted');

          //Serliaized Data
          var formData = jQuery(form).serialize();

          //Submit with ajax
          jQuery.ajax({
               type: 'post',
               url: jQuery(form).attr('action'),
               data : formData

          }).done(function(response){
               //Make sure sent was success
               jQuery(formMessages).removeClass('error');
               jQuery(formMessages).addClass('success');

               //Set Message Text
               jQuery(formMessages).text(response);

               //Clear the form inputs
               jQuery('#name').val('');
               jQuery('#email').val('');
               jQuery('#message').val('');
          }).fail(function(data){
               //Make sure sent was not successfull
               jQuery(formMessages).removeClass('error');
               jQuery(formMessages).addClass('error');

               //Set Message Text
               if(data.responseText !== '') {
                    jQuery(formMessages).text(data.response);
               }else {
                    jQuery(formMessages).text('There is some errors');
               }
          });
     });
});

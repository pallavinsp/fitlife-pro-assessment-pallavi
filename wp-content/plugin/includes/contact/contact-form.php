<?php


if(!defined('ABSPATH')){

exit;

}



/*
|--------------------------------------------------------------------------
| Handle Contact Form Submission
|--------------------------------------------------------------------------
*/


function fitlife_handle_contact_form(){



if(

isset($_POST['fitlife_contact_submit'])

){





if(

!isset($_POST['fitlife_contact_nonce'])

||

!wp_verify_nonce(

$_POST['fitlife_contact_nonce'],

'fitlife_contact_action'

)

){


return;

}





$name = sanitize_text_field(

$_POST['name']

);



$email = sanitize_email(

$_POST['email']

);



$message = sanitize_textarea_field(

$_POST['message']

);






if(

empty($name)

||

empty($email)

||

empty($message)

){


return;

}






$options = get_option(

'fitlife_options'

);



$admin_email = !empty($options['contact_email'])

?

$options['contact_email']

:

get_option('admin_email');








$subject = "New FitLife Contact Request";





$body = "

Name:

$name


Email:

$email


Message:

$message

";






$headers=array(

'Content-Type: text/html; charset=UTF-8',

'Reply-To: '.$email

);






wp_mail(

$admin_email,

$subject,

$body,

$headers

);






add_filter(

'redirect_post_location',

function($location){


return add_query_arg(

'sent',

'1',

$location

);


}

);





}



}



add_action(

'init',

'fitlife_handle_contact_form'

);
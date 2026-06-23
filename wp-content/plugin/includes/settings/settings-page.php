<?php


if(!defined('ABSPATH')){

exit;

}



/*
|--------------------------------------------------------------------------
| FitLife Settings Menu
|--------------------------------------------------------------------------
*/


function fitlife_add_settings_page(){


add_options_page(

'FitLife Settings',

'FitLife Settings',

'manage_options',

'fitlife-settings',

'fitlife_settings_html'

);


}


add_action(

'admin_menu',

'fitlife_add_settings_page'

);







/*
|--------------------------------------------------------------------------
| Register Settings
|--------------------------------------------------------------------------
*/


function fitlife_register_settings(){



register_setting(

'fitlife_settings_group',

'fitlife_options',

array(

'sanitize_callback'=>'fitlife_sanitize_options'

)

);







add_settings_section(

'fitlife_main',

'General Settings',

null,

'fitlife-settings'

);







add_settings_field(

'brand_color',

'Brand Color',

'fitlife_brand_color_field',

'fitlife-settings',

'fitlife_main'

);







add_settings_field(

'contact_email',

'Contact Email',

'fitlife_contact_email_field',

'fitlife-settings',

'fitlife_main'

);







add_settings_field(

'programs_per_page',

'Programs Per Page',

'fitlife_programs_page_field',

'fitlife-settings',

'fitlife_main'

);







add_settings_field(

'enable_reviews',

'Enable Reviews',

'fitlife_reviews_field',

'fitlife-settings',

'fitlife_main'

);



}



add_action(

'admin_init',

'fitlife_register_settings'

);








/*
|--------------------------------------------------------------------------
| Sanitize
|--------------------------------------------------------------------------
*/


function fitlife_sanitize_options($input){



$output=array();





$output['brand_color']=sanitize_hex_color(

$input['brand_color'] ?? '#2563eb'

);





$output['contact_email']=sanitize_email(

$input['contact_email'] ?? ''

);





$output['programs_per_page']=absint(

$input['programs_per_page'] ?? 6

);





$output['enable_reviews']=isset(

$input['enable_reviews']

)

?1:0;





return $output;



}









/*
|--------------------------------------------------------------------------
| Fields
|--------------------------------------------------------------------------
*/


function fitlife_brand_color_field(){


$options=get_option(

'fitlife_options',

array()

);


?>


<input

type="color"

name="fitlife_options[brand_color]"

value="<?php echo esc_attr(

$options['brand_color'] ?? '#2563eb'

); ?>"


>


<?php

}









function fitlife_contact_email_field(){


$options=get_option(

'fitlife_options',

array()

);


?>


<input

type="email"

name="fitlife_options[contact_email]"

value="<?php echo esc_attr(

$options['contact_email'] ?? ''

); ?>"

style="width:300px;"


>


<?php

}









function fitlife_programs_page_field(){


$options=get_option(

'fitlife_options',

array()

);


?>


<input

type="number"

min="1"

name="fitlife_options[programs_per_page]"

value="<?php echo esc_attr(

$options['programs_per_page'] ?? 6

); ?>"


>


<?php

}









function fitlife_reviews_field(){


$options=get_option(

'fitlife_options',

array()

);


?>


<input

type="checkbox"

name="fitlife_options[enable_reviews]"

value="1"

<?php checked(

$options['enable_reviews'] ?? 0,

1

); ?>


>


Enable Reviews


<?php

}









/*
|--------------------------------------------------------------------------
| Frontend CSS Variables
|--------------------------------------------------------------------------
*/


function fitlife_dynamic_styles(){



$options=get_option(

'fitlife_options'

);



$color = !empty($options['brand_color'])

?

$options['brand_color']

:

'#2563eb';



?>


<style>


:root{


--fitlife-primary:

<?php echo esc_html($color); ?>;


}




.primary-btn,
button,
input[type="submit"]{


background:var(--fitlife-primary)!important;


}


</style>



<?php


}



add_action(

'wp_head',

'fitlife_dynamic_styles'

);









/*
|--------------------------------------------------------------------------
| Settings HTML
|--------------------------------------------------------------------------
*/


function fitlife_settings_html(){


?>


<div class="wrap">


<h1>

FitLife Settings

</h1>





<form method="post" action="options.php">



<?php


settings_fields(

'fitlife_settings_group'

);



do_settings_sections(

'fitlife-settings'

);



submit_button();



?>


</form>



</div>



<?php


}
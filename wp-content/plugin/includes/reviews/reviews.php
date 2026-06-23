<?php


if(!defined('ABSPATH')){

exit;

}



/*
|--------------------------------------------------------------------------
| Check Reviews Enabled
|--------------------------------------------------------------------------
*/


function fitlife_reviews_enabled(){



$options = get_option('fitlife_options');



return !empty($options['enable_reviews']);



}
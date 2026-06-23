<?php
if(!defined('ABSPATH')) exit;



/*
|--------------------------------------------------------------------------
| Disable XML RPC
|--------------------------------------------------------------------------
*/


add_filter(

    'xmlrpc_enabled',

    '__return_false'

);





/*
|--------------------------------------------------------------------------
| Login Attempt Protection
|--------------------------------------------------------------------------
*/


function fitlife_login_limit(){


    $ip = $_SERVER['REMOTE_ADDR'];

    $key = 'fitlife_login_'.$ip;


    $count = get_transient($key);



    if(
        $count &&
        $count > 5
    ){


        wp_die(
            'Too many login attempts. Try later.'
        );


    }



    set_transient(

        $key,

        ($count ? $count + 1 : 1),

        15 * MINUTE_IN_SECONDS

    );


}


add_action(

    'wp_login_failed',

    'fitlife_login_limit'

);






/*
|--------------------------------------------------------------------------
| Remove WP Version
|--------------------------------------------------------------------------
*/


remove_action(

    'wp_head',

    'wp_generator'

);






/*
|--------------------------------------------------------------------------
| Security Headers
|--------------------------------------------------------------------------
*/


function fitlife_security_headers(){



    if(!is_admin()){


        header(
            'X-Content-Type-Options: nosniff'
        );


        header(
            'X-Frame-Options: SAMEORIGIN'
        );


        header(
            'Referrer-Policy: strict-origin-when-cross-origin'
        );


    }


}



add_action(

    'send_headers',

    'fitlife_security_headers'

);






/*
|--------------------------------------------------------------------------
| Sanitize Helper
|--------------------------------------------------------------------------
*/


function fitlife_sanitize_all($value){


    return sanitize_text_field($value);


}
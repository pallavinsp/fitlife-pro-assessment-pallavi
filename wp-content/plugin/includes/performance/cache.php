<?php
if(!defined('ABSPATH')) exit;


/*
|--------------------------------------------------------------------------
| Program Cache
|--------------------------------------------------------------------------
*/


function fitlife_get_cached_programs(){


    $data = get_transient(
        'fitlife_program_cache'
    );


    if(!$data){


        $data = get_posts(array(

            'post_type'=>'fitlife_program',

            'posts_per_page'=>-1,

            'post_status'=>'publish'

        ));



        set_transient(

            'fitlife_program_cache',

            $data,

            12 * HOUR_IN_SECONDS

        );


    }



    return $data;


}





/*
|--------------------------------------------------------------------------
| Remove WordPress Unnecessary Assets
|--------------------------------------------------------------------------
*/


function fitlife_disable_emojis(){


    remove_action(
        'wp_head',
        'print_emoji_detection_script',
        7
    );


    remove_action(
        'wp_print_styles',
        'print_emoji_styles'
    );


}


add_action(
    'init',
    'fitlife_disable_emojis'
);





/*
|--------------------------------------------------------------------------
| Defer Frontend Javascript
|--------------------------------------------------------------------------
*/


function fitlife_defer_scripts(
    $tag,
    $handle,
    $src
){


    if(
        is_admin()
    ){

        return $tag;

    }



    if(
        strpos($src,'main.js')
    ){


        return str_replace(

            'src',

            'defer src',

            $tag

        );


    }



    return $tag;


}


add_filter(

    'script_loader_tag',

    'fitlife_defer_scripts',

    10,

    3

);
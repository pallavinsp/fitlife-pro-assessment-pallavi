<?php


/*
|-------------------------------------------------------------------------- 
| Theme Setup
|-------------------------------------------------------------------------- 
*/


function fitlife_setup(){


    add_theme_support(
        'title-tag'
    );


    add_theme_support(
        'post-thumbnails'
    );


    add_theme_support(
        'custom-logo'
    );


    /*
    |------------------------------------------------------------------
    | WooCommerce Support
    |------------------------------------------------------------------
    */


    add_theme_support(
        'woocommerce'
    );



    add_theme_support(
        'html5',
        array(

            'search-form',

            'comment-form',

            'comment-list',

            'gallery',

            'caption',

            'style',

            'script'

        )
    );



    register_nav_menus(

        array(

            'primary'=>'Primary Menu',

            'footer'=>'Footer Menu'

        )

    );


}


add_action(

    'after_setup_theme',

    'fitlife_setup'

);







/*
|--------------------------------------------------------------------------
| Load Theme Assets
|--------------------------------------------------------------------------
*/


function fitlife_assets(){



    wp_enqueue_style(

        'fitlife-style',

        get_stylesheet_uri(),

        array(),

        wp_get_theme()->get('Version')

    );





    wp_enqueue_script(

        'fitlife-main',

        get_template_directory_uri()

        . '/assets/js/main.js',

        array(),

        '1.0',

        true

    );


}


add_action(

    'wp_enqueue_scripts',

    'fitlife_assets'

);








/*
|--------------------------------------------------------------------------
| WooCommerce Setup
|--------------------------------------------------------------------------
*/


function fitlife_woocommerce_setup(){


    if(class_exists('WooCommerce')){


        add_theme_support(

            'woocommerce'

        );


    }


}


add_action(

    'after_setup_theme',

    'fitlife_woocommerce_setup'

);









/*
|--------------------------------------------------------------------------
| Dynamic Brand Color
|--------------------------------------------------------------------------
*/


function fitlife_dynamic_brand_color(){



    $options = get_option(

        'fitlife_options'

    );



    $brand_color = !empty($options['brand_color'])

    ?

    $options['brand_color']

    :

    '#2563eb';



?>


<style>


:root{


--fitlife-brand-color:

<?php echo esc_html($brand_color); ?>


}



.primary-btn,
button,
input[type="submit"]{


background:

var(--fitlife-brand-color)!important;


}



.primary-btn:hover,
button:hover,
input[type="submit"]:hover{


opacity:.85;


}


</style>


<?php


}


add_action(

    'wp_head',

    'fitlife_dynamic_brand_color'

);










/*
|--------------------------------------------------------------------------
| Performance Optimization
|--------------------------------------------------------------------------
*/


function fitlife_lazy_images($content){



    if(is_admin()){


        return $content;


    }





    return preg_replace(

        '/<img(.*?)>/',

        '<img$1 loading="lazy">',

        $content

    );


}



add_filter(

    'the_content',

    'fitlife_lazy_images'

);











/*
|--------------------------------------------------------------------------
| Remove WooCommerce Generator
|--------------------------------------------------------------------------
*/


function fitlife_remove_woocommerce_generator(){



    remove_action(

        'wp_head',

        'woocommerce_generator'

    );


}



add_action(

    'init',

    'fitlife_remove_woocommerce_generator'

);











/*
|--------------------------------------------------------------------------
| WooCommerce Shop Container
|--------------------------------------------------------------------------
*/


function fitlife_shop_container_start(){


    echo '<div class="container">';


}



function fitlife_shop_container_end(){


    echo '</div>';


}



add_action(

    'woocommerce_before_main_content',

    'fitlife_shop_container_start',

    10

);



add_action(

    'woocommerce_after_main_content',

    'fitlife_shop_container_end',

    10

);

<?php
/*
Plugin Name: FitLife Core
Description: Custom functionality for FitLife Pro
Version: 1.0
Author: Pallavi N S
*/


if(!defined('ABSPATH')){

    exit;

}



/*
|--------------------------------------------------------------------------
| CPT
|--------------------------------------------------------------------------
*/


require_once plugin_dir_path(__FILE__) . 'includes/cpt/trainer.php';

require_once plugin_dir_path(__FILE__) . 'includes/cpt/program.php';





/*
|--------------------------------------------------------------------------
| Taxonomies
|--------------------------------------------------------------------------
*/


require_once plugin_dir_path(__FILE__) . 'includes/taxonomies/taxonomy.php';





/*
|--------------------------------------------------------------------------
| Meta Boxes
|--------------------------------------------------------------------------
*/


require_once plugin_dir_path(__FILE__) . 'includes/metaboxes/fields.php';





/*
|--------------------------------------------------------------------------
| Admin Columns
|--------------------------------------------------------------------------
*/


require_once plugin_dir_path(__FILE__) . 'includes/admin/columns.php';





/*
|--------------------------------------------------------------------------
| Settings
|--------------------------------------------------------------------------
*/


require_once plugin_dir_path(__FILE__) . 'includes/settings/settings-page.php';





/*
|--------------------------------------------------------------------------
| REST API
|--------------------------------------------------------------------------
*/


require_once plugin_dir_path(__FILE__) . 'includes/rest-api/api-post.php';


require_once plugin_dir_path(__FILE__) . 'includes/contact/contact-form.php';


require_once plugin_dir_path(__FILE__) . 'includes/reviews/reviews.php';


require_once plugin_dir_path(__FILE__) . 'includes/shortcodes/shortcodes.php';

require_once plugin_dir_path(__FILE__) . 'includes/security/security.php';

require_once plugin_dir_path(__FILE__) . 'includes/performance/cache.php';

require_once plugin_dir_path(__FILE__) . 'includes/woocommerce/product-type.php';
require_once plugin_dir_path(__FILE__) . 'includes/woocommerce/product-fields.php';
require_once plugin_dir_path(__FILE__) . 'includes/woocommerce/checkout.php';
require_once plugin_dir_path(__FILE__) . 'includes/woocommerce/my-account.php';
require_once plugin_dir_path(__FILE__) . 'includes/woocommerce/emails.php';







/*
|--------------------------------------------------------------------------
| Gutenberg Blocks
|--------------------------------------------------------------------------
*/


function fitlife_register_blocks(){



    register_block_type(

        __DIR__ . '/blocks/trainer-block'

    );




    register_block_type(

        __DIR__ . '/blocks/program-block'

    );



}



add_action(

    'init',

    'fitlife_register_blocks'

);
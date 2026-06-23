<?php

if(!defined('ABSPATH')) exit;


/*
|--------------------------------------------------------------------------
| Register Fitness Bundle Product Type
|--------------------------------------------------------------------------
*/


add_filter(
    'product_type_selector',
    'fitlife_add_bundle_product_type'
);


function fitlife_add_bundle_product_type($types){


    $types['fitness_bundle'] = 'Fitness Bundle';


    return $types;

}




/*
|--------------------------------------------------------------------------
| Product Class
|--------------------------------------------------------------------------
*/


add_action(
    'init',
    'fitlife_register_bundle_product_class'
);


function fitlife_register_bundle_product_class(){


    if(!class_exists('WC_Product_Simple')){

        return;

    }



    class WC_Product_Fitness_Bundle extends WC_Product_Simple{


        public function get_type(){

            return 'fitness_bundle';

        }


    }


}




add_filter(
    'woocommerce_product_class',
    'fitlife_bundle_product_class',
    10,
    2
);



function fitlife_bundle_product_class($classname,$type){


    if($type === 'fitness_bundle'){


        $classname = 'WC_Product_Fitness_Bundle';


    }


    return $classname;


}
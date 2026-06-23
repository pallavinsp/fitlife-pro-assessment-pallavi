<?php


if(!defined('ABSPATH')){

    exit;

}



/*
|--------------------------------------------------------------------------
| Register Trainer CPT
|--------------------------------------------------------------------------
*/


function fitlife_register_trainer_cpt(){



    $labels=array(


        'name'=>'Trainers',

        'singular_name'=>'Trainer',

        'menu_name'=>'Trainers',

        'add_new'=>'Add Trainer',

        'add_new_item'=>'Add New Trainer',

        'edit_item'=>'Edit Trainer',

        'new_item'=>'New Trainer',

        'view_item'=>'View Trainer',

        'view_items'=>'View Trainers',

        'search_items'=>'Search Trainers',

        'not_found'=>'No trainers found',

        'not_found_in_trash'=>'No trainers found in trash',

        'all_items'=>'All Trainers'


    );







    $args=array(



        'labels'=>$labels,



        'public'=>true,



        'publicly_queryable'=>true,



        'show_ui'=>true,



        'show_in_menu'=>true,



        'query_var'=>true,



        'rewrite'=>array(


            'slug'=>'trainers',

            'with_front'=>false


        ),





        'has_archive'=>true,



        'show_in_rest'=>true,



        'menu_icon'=>'dashicons-groups',



        'menu_position'=>5,



        'capability_type'=>'post',



        'supports'=>array(


            'title',

            'editor',

            'thumbnail',

            'excerpt'


        ),




        'taxonomies'=>array(

            'specialty'

        )


    );






    register_post_type(

        'fitlife_trainer',

        $args

    );



}





add_action(

    'init',

    'fitlife_register_trainer_cpt'

);







/*
|--------------------------------------------------------------------------
| Flush Rewrite Rules
|--------------------------------------------------------------------------
*/


function fitlife_trainer_flush(){



    fitlife_register_trainer_cpt();


    flush_rewrite_rules();


}





register_activation_hook(

    __FILE__,

    'fitlife_trainer_flush'

);





function fitlife_trainer_remove_flush(){


    flush_rewrite_rules();


}



register_deactivation_hook(

    __FILE__,

    'fitlife_trainer_remove_flush'

);
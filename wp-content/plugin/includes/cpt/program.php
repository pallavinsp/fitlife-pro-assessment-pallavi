<?php


if(!defined('ABSPATH')){

    exit;

}



/*
|--------------------------------------------------------------------------
| Register Program CPT
|--------------------------------------------------------------------------
*/


function fitlife_register_program_cpt(){



    $labels=array(



        'name'=>'Programs',

        'singular_name'=>'Program',

        'menu_name'=>'Programs',

        'add_new'=>'Add Program',

        'add_new_item'=>'Add New Program',

        'edit_item'=>'Edit Program',

        'new_item'=>'New Program',

        'view_item'=>'View Program',

        'view_items'=>'View Programs',

        'search_items'=>'Search Programs',

        'not_found'=>'No programs found',

        'not_found_in_trash'=>'No programs found in trash',

        'all_items'=>'All Programs'


    );








    $args=array(



        'labels'=>$labels,



        'public'=>true,



        'publicly_queryable'=>true,



        'show_ui'=>true,



        'show_in_menu'=>true,



        'query_var'=>true,



        'rewrite'=>array(


            'slug'=>'programs',

            'with_front'=>false


        ),




        'has_archive'=>true,



        'show_in_rest'=>true,



        'menu_icon'=>'dashicons-heart',



        'menu_position'=>6,



        'capability_type'=>'post',




        'supports'=>array(


            'title',

            'editor',

            'thumbnail',

            'excerpt'


        ),




        'taxonomies'=>array(


            'program_type'


        )


    );







    register_post_type(

        'fitlife_program',

        $args

    );



}





add_action(

    'init',

    'fitlife_register_program_cpt'

);








/*
|--------------------------------------------------------------------------
| Flush Rewrite Rules
|--------------------------------------------------------------------------
*/


function fitlife_program_flush(){



    fitlife_register_program_cpt();


    flush_rewrite_rules();


}





register_activation_hook(

    __FILE__,

    'fitlife_program_flush'

);





function fitlife_program_remove_flush(){


    flush_rewrite_rules();


}



register_deactivation_hook(

    __FILE__,

    'fitlife_program_remove_flush'

);
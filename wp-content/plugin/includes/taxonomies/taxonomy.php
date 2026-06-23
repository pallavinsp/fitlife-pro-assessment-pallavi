<?php


/*
|--------------------------------------------------------------------------
| Trainer Specialty Taxonomy
|--------------------------------------------------------------------------
*/


function fitlife_trainer_specialty_taxonomy(){


    register_taxonomy(

        'specialty',

        'fitlife_trainer',

        array(

            'labels'=>array(

                'name'=>'Specialties',

                'singular_name'=>'Specialty'

            ),


            'public'=>true,

            'show_ui'=>true,

            'show_admin_column'=>true,

            'hierarchical'=>true,

            'show_in_rest'=>true

        )

    );


}


add_action(

    'init',

    'fitlife_trainer_specialty_taxonomy'

);




/*
|--------------------------------------------------------------------------
| Program Type Taxonomy
|--------------------------------------------------------------------------
*/


function fitlife_program_type_taxonomy(){


    register_taxonomy(

        'program_type',

        'fitlife_program',

        array(

            'labels'=>array(

                'name'=>'Program Types',

                'singular_name'=>'Program Type'

            ),


            'public'=>true,

            'show_ui'=>true,

            'show_admin_column'=>true,

            'hierarchical'=>true,

            'show_in_rest'=>true

        )

    );


}


add_action(

    'init',

    'fitlife_program_type_taxonomy'

);
<?php

if(!defined('ABSPATH')) exit;


/*
|--------------------------------------------------------------------------
| Add Fitness Goal Field Checkout
|--------------------------------------------------------------------------
*/


add_action(
    'woocommerce_after_order_notes',
    'fitlife_add_fitness_goal_field'
);



function fitlife_add_fitness_goal_field($checkout){



    woocommerce_form_field(

        'fitness_goal',

        array(

            'type'=>'select',

            'class'=>array(

                'form-row-wide'

            ),

            'label'=>'Fitness Goal',

            'required'=>true,

            'options'=>array(

                ''=>'Select Goal',

                'weight_loss'=>'Weight Loss',

                'muscle_gain'=>'Muscle Gain',

                'endurance'=>'Endurance',

                'flexibility'=>'Flexibility'

            )

        ),


        $checkout->get_value('fitness_goal')

    );


}





/*
|--------------------------------------------------------------------------
| Save Fitness Goal
|--------------------------------------------------------------------------
*/


add_action(

    'woocommerce_checkout_update_order_meta',

    'fitlife_save_fitness_goal'

);



function fitlife_save_fitness_goal($order_id){



    if(

        isset($_POST['fitness_goal'])

    ){



        update_post_meta(

            $order_id,

            '_fitness_goal',

            sanitize_text_field(

                $_POST['fitness_goal']

            )

        );


    }


}






/*
|--------------------------------------------------------------------------
| Display in Admin Order
|--------------------------------------------------------------------------
*/


add_action(

    'woocommerce_admin_order_data_after_billing_address',

    'fitlife_show_goal_admin'

);



function fitlife_show_goal_admin($order){


    $goal = get_post_meta(

        $order->get_id(),

        '_fitness_goal',

        true

    );


    if($goal){


        echo '<p>';

        echo '<strong>Fitness Goal:</strong> ';

        echo esc_html($goal);

        echo '</p>';


    }


}






/*
|--------------------------------------------------------------------------
| Display in Emails
|--------------------------------------------------------------------------
*/


add_filter(

    'woocommerce_email_order_meta_fields',

    'fitlife_email_goal_field'

);



function fitlife_email_goal_field($fields){



    $fields['fitness_goal'] = array(

        'label'=>'Fitness Goal',

        'value'=>get_post_meta(

            get_the_ID(),

            '_fitness_goal',

            true

        )

    );


    return $fields;


}
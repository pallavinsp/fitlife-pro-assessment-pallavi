<?php

if(!defined('ABSPATH')) exit;


/*
|--------------------------------------------------------------------------
| Add My Programs Tab
|--------------------------------------------------------------------------
*/


add_filter(
    'woocommerce_account_menu_items',
    'fitlife_add_programs_tab'
);



function fitlife_add_programs_tab($items){



    $new_items = array();



    foreach($items as $key=>$value){



        $new_items[$key] = $value;



        if($key === 'orders'){


            $new_items['fitness-programs'] = 'My Programs';


        }


    }



    return $new_items;


}





/*
|--------------------------------------------------------------------------
| Register Endpoint
|--------------------------------------------------------------------------
*/


add_action(
    'init',
    'fitlife_program_endpoint'
);



function fitlife_program_endpoint(){


    add_rewrite_endpoint(

        'fitness-programs',

        EP_ROOT | EP_PAGES

    );


}






/*
|--------------------------------------------------------------------------
| Show Purchased Programs
|--------------------------------------------------------------------------
*/


add_action(

    'woocommerce_account_fitness-programs_endpoint',

    'fitlife_show_programs'

);



function fitlife_show_programs(){



    echo '<h2>My Fitness Programs</h2>';



    $orders = wc_get_orders(

        array(

            'customer_id'=>get_current_user_id(),

            'status'=>array(

                'processing',

                'completed'

            )

        )

    );





    if(empty($orders)){



        echo '<p>No purchased programs found.</p>';

        return;


    }





    echo '<div class="fitlife-my-programs">';



    foreach($orders as $order){



        foreach($order->get_items() as $item){



            echo '<div class="program-item">';



            echo '<h3>';

            echo esc_html(

                $item->get_name()

            );

            echo '</h3>';



            echo '<p>';

            echo 'Order ID: ';

            echo esc_html(

                $order->get_id()

            );

            echo '</p>';



            echo '</div>';



        }



    }



    echo '</div>';



}
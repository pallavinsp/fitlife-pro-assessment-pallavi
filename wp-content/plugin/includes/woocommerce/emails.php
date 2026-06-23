<?php
if(!defined('ABSPATH')) exit;

add_action('woocommerce_email_order_meta',function($order){

$goal=get_post_meta(
$order->get_id(),
'Fitness Goal',
true
);

if($goal){
echo '<p>Fitness Goal: '.esc_html($goal).'</p>';
}

});

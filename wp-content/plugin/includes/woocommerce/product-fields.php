<?php
if(!defined('ABSPATH')) exit;

add_action('woocommerce_product_options_general_product_data',function(){

echo '<div class="options_group">';

woocommerce_wp_text_input([
'id'=>'_calories',
'label'=>'Calories'
]);

woocommerce_wp_text_input([
'id'=>'_protein',
'label'=>'Protein'
]);

woocommerce_wp_text_input([
'id'=>'_allergen',
'label'=>'Allergen'
]);

echo '</div>';

});


add_action('woocommerce_process_product_meta',function($id){

foreach(['_calories','_protein','_allergen'] as $field){

if(isset($_POST[$field])){
update_post_meta(
$id,
$field,
sanitize_text_field($_POST[$field])
);
}

}

});

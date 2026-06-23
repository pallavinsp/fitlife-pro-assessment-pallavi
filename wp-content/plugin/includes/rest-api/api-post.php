<?php
if(!defined('ABSPATH')) exit;

add_action('rest_api_init',function(){

register_rest_route('fitlife/v1','/programs',
array(
'methods'=>'POST',
'permission_callback'=>function(){
return current_user_can('edit_posts');
},
'callback'=>'fitlife_create_program'
));

});

function fitlife_create_program($request){

$id=wp_insert_post(array(
'post_title'=>sanitize_text_field($request['title']),
'post_type'=>'fitlife_program',
'post_status'=>'publish'
));

return array(
'id'=>$id,
'message'=>'Program created'
);

}

<?php


if(!defined('ABSPATH')){

exit;

}


/*
|--------------------------------------------------------------------------
| Trainer Columns
|--------------------------------------------------------------------------
*/


function fitlife_trainer_columns($columns){


return array(

'cb'=>$columns['cb'],

'title'=>'Trainer Name',

'certification'=>'Certification',

'experience'=>'Experience',

'rate'=>'Hourly Rate',

'date'=>'Date'

);


}



add_filter(

'manage_fitlife_trainer_posts_columns',

'fitlife_trainer_columns'

);





function fitlife_trainer_column_data($column,$post_id){



switch($column){



case 'certification':


echo esc_html(

get_post_meta(

$post_id,

'_certification',

true

)

);


break;





case 'experience':


echo esc_html(

get_post_meta(

$post_id,

'_experience',

true

)

);


break;





case 'rate':


echo esc_html(

get_post_meta(

$post_id,

'_rate',

true

)

);


break;



}



}




add_action(

'manage_fitlife_trainer_posts_custom_column',

'fitlife_trainer_column_data',

10,

2

);







/*
|--------------------------------------------------------------------------
| Program Columns
|--------------------------------------------------------------------------
*/


function fitlife_program_columns($columns){


return array(


'cb'=>$columns['cb'],


'title'=>'Program Name',


'difficulty'=>'Difficulty',


'duration'=>'Duration',


'goals'=>'Goals',


'date'=>'Date'


);


}



add_filter(

'manage_fitlife_program_posts_columns',

'fitlife_program_columns'

);







function fitlife_program_column_data($column,$post_id){



switch($column){



case 'difficulty':


echo esc_html(

get_post_meta(

$post_id,

'_difficulty',

true

)

);


break;





case 'duration':


echo esc_html(

get_post_meta(

$post_id,

'_duration',

true

)

);


echo ' Weeks';


break;





case 'goals':


echo esc_html(

get_post_meta(

$post_id,

'_goals',

true

)

);


break;


}



}




add_action(

'manage_fitlife_program_posts_custom_column',

'fitlife_program_column_data',

10,

2

);
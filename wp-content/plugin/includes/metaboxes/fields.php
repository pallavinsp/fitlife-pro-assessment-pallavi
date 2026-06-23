<?php


/*
|--------------------------------------------------------------------------
| Register Meta Boxes
|--------------------------------------------------------------------------
*/


function fitlife_add_meta_boxes(){



add_meta_box(

    'trainer_details',

    'Trainer Details',

    'fitlife_trainer_fields',

    'fitlife_trainer',

    'normal',

    'high'

);





add_meta_box(

    'program_details',

    'Program Details',

    'fitlife_program_fields',

    'fitlife_program',

    'normal',

    'high'

);



}


add_action(

'add_meta_boxes',

'fitlife_add_meta_boxes'

);









/*
|--------------------------------------------------------------------------
| Trainer Fields
|--------------------------------------------------------------------------
*/


function fitlife_trainer_fields($post){



wp_nonce_field(

'fitlife_save_meta',

'fitlife_meta_nonce'

);



$certification = get_post_meta(

$post->ID,

'_certification',

true

);



$experience = get_post_meta(

$post->ID,

'_experience',

true

);



$rate = get_post_meta(

$post->ID,

'_rate',

true

);



$social = get_post_meta(

$post->ID,

'_social',

true

);



?>



<p>

<label><strong>Certification</strong></label>


<input

type="text"

name="certification"

value="<?php echo esc_attr($certification); ?>"

style="width:100%;"

/>


</p>





<p>

<label><strong>Years of Experience</strong></label>


<input

type="text"

name="experience"

value="<?php echo esc_attr($experience); ?>"

style="width:100%;"

/>


</p>






<p>

<label><strong>Hourly Rate</strong></label>


<input

type="text"

name="rate"

value="<?php echo esc_attr($rate); ?>"

style="width:100%;"

/>


</p>







<p>

<label><strong>Social Link</strong></label>


<input

type="url"

name="social"

value="<?php echo esc_url($social); ?>"

style="width:100%;"

/>


</p>



<?php


}









/*
|--------------------------------------------------------------------------
| Program Fields
|--------------------------------------------------------------------------
*/


function fitlife_program_fields($post){



wp_nonce_field(

'fitlife_save_meta',

'fitlife_meta_nonce'

);



$duration = get_post_meta(

$post->ID,

'_duration',

true

);



$goals = get_post_meta(

$post->ID,

'_goals',

true

);



$difficulty = get_post_meta(

$post->ID,

'_difficulty',

true

);



$equipment = get_post_meta(

$post->ID,

'_equipment',

true

);



$participants = get_post_meta(

$post->ID,

'_participants',

true

);



?>





<p>

<label><strong>Duration (Weeks)</strong></label>


<input

type="text"

name="duration"

value="<?php echo esc_attr($duration); ?>"

style="width:100%;"

/>


</p>





<p>

<label><strong>Goals</strong></label>


<textarea

name="goals"

style="width:100%;"

>

<?php echo esc_textarea($goals); ?>

</textarea>


</p>








<p>

<label><strong>Difficulty</strong></label>


<input

type="text"

name="difficulty"

value="<?php echo esc_attr($difficulty); ?>"

style="width:100%;"

/>


</p>






<p>

<label><strong>Equipment</strong></label>


<input

type="text"

name="equipment"

value="<?php echo esc_attr($equipment); ?>"

style="width:100%;"

/>


</p>







<p>

<label><strong>Maximum Participants</strong></label>


<input

type="text"

name="participants"

value="<?php echo esc_attr($participants); ?>"

style="width:100%;"

/>


</p>





<?php


}









/*
|--------------------------------------------------------------------------
| Save Meta Securely
|--------------------------------------------------------------------------
*/


function fitlife_save_meta($post_id){





if(

!isset($_POST['fitlife_meta_nonce'])

||

!wp_verify_nonce(

sanitize_text_field(

wp_unslash($_POST['fitlife_meta_nonce'])

),

'fitlife_save_meta'

)

){

return;

}






if(

defined('DOING_AUTOSAVE')

&&

DOING_AUTOSAVE

){

return;

}






if(

!current_user_can(

'edit_post',

$post_id

)

){

return;

}







$post_type = get_post_type($post_id);



if(

$post_type !== 'fitlife_trainer'

&&

$post_type !== 'fitlife_program'

){

return;

}







$fields=array(


'certification',

'experience',

'rate',

'social',

'duration',

'goals',

'difficulty',

'equipment',

'participants'


);







foreach($fields as $field){



if(isset($_POST[$field])){





$value = wp_unslash($_POST[$field]);





if($field === 'social'){


$value = esc_url_raw($value);


}


elseif($field === 'goals'){


$value = sanitize_textarea_field($value);


}


else{


$value = sanitize_text_field($value);


}






update_post_meta(

$post_id,

'_'.$field,

$value

);





}



}



}



add_action(

'save_post',

'fitlife_save_meta'

);
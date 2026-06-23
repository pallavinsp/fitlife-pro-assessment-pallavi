<?php


if(!defined('ABSPATH')){

exit;

}





/*
|--------------------------------------------------------------------------
| Trainers Shortcode
|--------------------------------------------------------------------------
*/


function fitlife_trainers_shortcode($atts){



$atts = shortcode_atts(

array(

'limit'=>6

),

$atts,

'fitlife_trainers'

);




ob_start();





$query = new WP_Query(array(

'post_type'=>'fitlife_trainer',

'posts_per_page'=>intval($atts['limit'])

));





if($query->have_posts()){


?>


<div class="trainer-grid">



<?php



while($query->have_posts()){


$query->the_post();



?>


<div class="trainer-card">



<?php


if(has_post_thumbnail()){


the_post_thumbnail(

'medium',

array(

'class'=>'trainer-thumb'

)

);


}

?>



<h3>

<?php the_title(); ?>

</h3>



<p>

<?php echo wp_trim_words(

get_the_content(),

20

); ?>

</p>



<p>


<strong>
Experience:
</strong>


<?php


echo esc_html(

get_post_meta(

get_the_ID(),

'_experience',

true

)

);


?>


</p>




<a href="<?php the_permalink(); ?>">

View Profile

</a>



</div>



<?php


}



?>


</div>



<?php


wp_reset_postdata();


}

else{


echo '<p>No Trainers Found</p>';


}



return ob_get_clean();


}




add_shortcode(

'fitlife_trainers',

'fitlife_trainers_shortcode'

);








/*
|--------------------------------------------------------------------------
| Programs Shortcode
|--------------------------------------------------------------------------
*/


function fitlife_programs_shortcode($atts){



$atts = shortcode_atts(

array(

'type'=>'',

'limit'=>6

),

$atts,

'fitlife_programs'

);





$args=array(


'post_type'=>'fitlife_program',


'posts_per_page'=>intval($atts['limit'])


);





if(!empty($atts['type'])){


$args['tax_query']=array(

array(

'taxonomy'=>'program_type',

'field'=>'slug',

'terms'=>$atts['type']

)

);


}





$query=new WP_Query($args);




ob_start();





if($query->have_posts()){


?>


<div class="fitlife-program-grid">



<?php



while($query->have_posts()){


$query->the_post();



?>



<div class="program-card">



<?php


if(has_post_thumbnail()){


the_post_thumbnail(

'medium'

);


}


?>



<h3>

<?php the_title(); ?>

</h3>




<p>

<?php echo wp_trim_words(

get_the_content(),

20

); ?>

</p>



<p>


<strong>

Duration:

</strong>


<?php


echo esc_html(

get_post_meta(

get_the_ID(),

'_duration',

true

)

);


?>

Weeks


</p>



<a href="<?php the_permalink(); ?>">

View Program

</a>



</div>



<?php


}



?>


</div>



<?php



wp_reset_postdata();



}

else{


echo '<p>No Programs Found</p>';


}





return ob_get_clean();



}





add_shortcode(

'fitlife_programs',

'fitlife_programs_shortcode'

);
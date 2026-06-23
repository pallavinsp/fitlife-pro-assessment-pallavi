<?php

get_header();


$options = get_option('fitlife_options');


$trainer_per_page = !empty($options['programs_per_page'])

?

intval($options['programs_per_page'])

:

6;


?>



<div class="container">


<h1>

<?php the_title(); ?>

</h1>





<form method="GET" class="trainer-filter">





<input

type="text"

name="trainer_search"

placeholder="Search Trainer..."

value="<?php echo isset($_GET['trainer_search']) ? esc_attr($_GET['trainer_search']) : ''; ?>"

/>






<select name="specialty">


<option value="">

All Specialties

</option>





<?php


$specialties = get_terms(array(


    'taxonomy'=>'specialty',

    'hide_empty'=>false


));





if(

!is_wp_error($specialties)

&&

!empty($specialties)

){



foreach($specialties as $specialty){



?>




<option


value="<?php echo esc_attr($specialty->slug); ?>"


<?php


selected(

isset($_GET['specialty'])

?

$_GET['specialty']

:

'',

$specialty->slug

);


?>

>


<?php echo esc_html($specialty->name); ?>


</option>




<?php


}



}



?>





</select>





<button type="submit">


Search


</button>





</form>








<?php




$paged = max(

1,

get_query_var('paged')

);






$args=array(



'post_type'=>'fitlife_trainer',



'post_status'=>'publish',



'posts_per_page'=>$trainer_per_page,



'paged'=>$paged



);






if(!empty($_GET['trainer_search'])){



$args['s'] = sanitize_text_field(

$_GET['trainer_search']

);



}







if(!empty($_GET['specialty'])){



$args['tax_query']=array(



array(


'taxonomy'=>'specialty',


'field'=>'slug',


'terms'=>sanitize_text_field(

$_GET['specialty']

)


)



);



}







$query = new WP_Query($args);







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







<h2>



<a href="<?php the_permalink(); ?>">



<?php the_title(); ?>



</a>



</h2>






<p>



<?php echo wp_trim_words(


get_the_content(),


20


); ?>



</p>







<p>



<strong>

Certification:

</strong>



<?php echo esc_html(



get_post_meta(



get_the_ID(),



'_certification',



true



)



); ?>



</p>








<p>



<strong>

Experience:

</strong>



<?php echo esc_html(



get_post_meta(



get_the_ID(),



'_experience',



true



)



); ?>



</p>







<p>



<strong>

Hourly Rate:

</strong>



<?php echo esc_html(



get_post_meta(



get_the_ID(),



'_rate',



true



)



); ?>



</p>






<a href="<?php the_permalink(); ?>">


View Details


</a>






</div>





<?php


}



?>




</div>





<?php



echo paginate_links(array(


'total'=>$query->max_num_pages


));





}



else{



echo "<p>No trainers found</p>";



}






wp_reset_postdata();





?>





</div>






<?php


get_footer();


?>
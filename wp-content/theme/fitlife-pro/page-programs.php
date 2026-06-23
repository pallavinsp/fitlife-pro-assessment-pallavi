<?php


/*
Template Name: Programs Page
*/


get_header();


?>



<main class="site-content">



<section class="programs-page">



<div class="container">





<div class="program-header">


<h1>

<?php the_title(); ?>

</h1>


<p>

Explore our professional fitness programs designed for your goals.

</p>


</div>








<?php



$options = get_option('fitlife_options');



$program_limit = !empty($options['programs_per_page'])

?

$options['programs_per_page']

:

6;






$paged = max(

1,

get_query_var('paged')

);







$query = new WP_Query(array(


'post_type'=>'fitlife_program',


'post_status'=>'publish',


'posts_per_page'=>$program_limit,


'paged'=>$paged



));







if($query->have_posts()):

?>





<div class="fitlife-program-grid">





<?php



while($query->have_posts()):


$query->the_post();



?>







<div class="program-card">







<?php



if(has_post_thumbnail()){


the_post_thumbnail(

'medium',

array(

'class'=>'program-thumb'

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


<?php


echo wp_trim_words(

get_the_content(),

20

);


?>


</p>









<div class="program-meta">





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


</p>









<p>


<strong>

Difficulty:

</strong>


<?php



echo esc_html(

get_post_meta(

get_the_ID(),

'_difficulty',

true

)

);



?>


</p>








<p>


<strong>

Goal:

</strong>


<?php



echo esc_html(

get_post_meta(

get_the_ID(),

'_goals',

true

)

);



?>


</p>







</div>










<a 

href="<?php the_permalink(); ?>"

class="primary-btn"

>


View Program


</a>







</div>








<?php


endwhile;



?>





</div>







<div class="program-pagination">



<?php



echo paginate_links(array(


'total'=>$query->max_num_pages


));



?>



</div>







<?php


else:


?>



<p>

No Programs Found

</p>




<?php


endif;





wp_reset_postdata();



?>






</div>



</section>




</main>




<?php


get_footer();


?>
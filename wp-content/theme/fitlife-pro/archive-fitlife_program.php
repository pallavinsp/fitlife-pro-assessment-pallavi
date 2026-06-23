<?php

get_header();


$options = get_option('fitlife_options');


$programs_per_page = !empty($options['programs_per_page'])

?

intval($options['programs_per_page'])

:

6;


?>


<div class="container single-page">


<h1>
Fitness Programs
</h1>



<div class="fitlife-program-grid">



<?php


$query = new WP_Query(array(

'post_type'=>'fitlife_program',

'posts_per_page'=>$programs_per_page,

'post_status'=>'publish'

));



if($query->have_posts()):



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

<?php the_title(); ?>

</h2>




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


endwhile;


wp_reset_postdata();



else:


?>


<p>

No Programs Found

</p>



<?php


endif;


?>




</div>


</div>



<?php

get_footer();

?>
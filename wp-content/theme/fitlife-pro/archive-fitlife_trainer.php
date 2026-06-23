<?php

get_header();

?>


<div class="container single-page">


<h1>
Our Expert Trainers
</h1>



<div class="trainer-grid">



<?php


$args = array(

'post_type'=>'fitlife_trainer',

'posts_per_page'=>-1

);



$trainers = new WP_Query($args);



if($trainers->have_posts()):


while($trainers->have_posts()):


$trainers->the_post();



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


endwhile;


wp_reset_postdata();


else:


?>


<p>
No Trainers Found
</p>



<?php


endif;


?>


</div>


</div>



<?php

get_footer();

?>
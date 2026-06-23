<?php

get_header();

?>


<main class="site-content">


<section class="program-page">


<div class="container">



<?php if(have_posts()): ?>


<?php while(have_posts()): the_post(); ?>



<div class="program-single-card">



<?php if(has_post_thumbnail()): ?>


<div class="program-feature-image">


<?php

the_post_thumbnail(
    'large',
    array(
        'class'=>'program-main-image'
    )
);

?>


</div>


<?php endif; ?>






<div class="program-details">



<h1>

<?php the_title(); ?>

</h1>






<div class="program-description">


<?php the_content(); ?>


</div>








<div class="program-meta">



<?php


$duration = get_post_meta(

    get_the_ID(),

    '_duration',

    true

);



$goals = get_post_meta(

    get_the_ID(),

    '_goals',

    true

);



$difficulty = get_post_meta(

    get_the_ID(),

    '_difficulty',

    true

);



$equipment = get_post_meta(

    get_the_ID(),

    '_equipment',

    true

);



$participants = get_post_meta(

    get_the_ID(),

    '_participants',

    true

);



?>





<?php if($duration): ?>

<p>

<strong>
Duration:
</strong>


<?php echo esc_html($duration); ?>

</p>

<?php endif; ?>






<?php if($goals): ?>

<p>

<strong>
Goals:
</strong>


<?php echo esc_html($goals); ?>


</p>


<?php endif; ?>








<?php if($difficulty): ?>

<p>

<strong>
Difficulty:
</strong>


<?php echo esc_html($difficulty); ?>


</p>


<?php endif; ?>








<?php if($equipment): ?>

<p>

<strong>
Equipment:
</strong>


<?php echo esc_html($equipment); ?>


</p>


<?php endif; ?>







<?php if($participants): ?>

<p>

<strong>
Participants:
</strong>


<?php echo esc_html($participants); ?>


</p>


<?php endif; ?>






</div>








<a href="<?php echo wc_get_page_permalink('shop'); ?>" class="primary-btn">

Buy Program

</a>





</div>



</div>




<?php endwhile; ?>



<?php else: ?>


<p>
Program not found.
</p>


<?php endif; ?>





</div>


</section>



</main>




<?php

get_footer();

?>
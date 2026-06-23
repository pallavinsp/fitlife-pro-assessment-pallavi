<?php

get_header();

?>


<div class="container">


<h1>
Archive
</h1>


<?php

while(have_posts()):

the_post();

?>


<h2>

<a href="<?php the_permalink(); ?>">

<?php the_title(); ?>

</a>

</h2>


<?php endwhile; ?>


</div>


<?php get_footer(); ?>
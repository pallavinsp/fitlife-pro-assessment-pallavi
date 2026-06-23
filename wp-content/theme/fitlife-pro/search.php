<?php get_header(); ?>


<div class="container">

<h1>
Search Results
</h1>


<?php while(have_posts()): the_post(); ?>


<h2>

<?php the_title(); ?>

</h2>


<?php endwhile; ?>


</div>


<?php get_footer(); ?>
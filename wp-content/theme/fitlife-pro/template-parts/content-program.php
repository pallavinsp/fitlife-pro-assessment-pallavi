<article class="trainer-card">


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



<p>

<strong>
Duration:
</strong>


<?php

echo get_post_meta(

get_the_ID(),

'_duration',

true

);

?>


</p>



<p>

<strong>
Goals:
</strong>


<?php

echo get_post_meta(

get_the_ID(),

'_goals',

true

);

?>


</p>


<a href="<?php the_permalink(); ?>">

View Details

</a>


</article>
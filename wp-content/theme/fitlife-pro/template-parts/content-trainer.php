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



<div class="trainer-meta">


<p>

<strong>
Certification:
</strong>


<?php

echo get_post_meta(

get_the_ID(),

'_certification',

true

);

?>

</p>



<p>

<strong>
Experience:
</strong>


<?php

echo get_post_meta(

get_the_ID(),

'_experience',

true

);

?>

</p>



<p>

<strong>
Hourly Rate:
</strong>


<?php

echo get_post_meta(

get_the_ID(),

'_rate',

true

);

?>

</p>



</div>


<a href="<?php the_permalink(); ?>">

View Details

</a>


</article>
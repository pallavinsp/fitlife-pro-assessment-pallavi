<?php

get_header();

?>


<section class="trainer-single">


<div class="container trainer-wrapper">



<div class="trainer-content">


<h1>

<?php the_title(); ?>

</h1>




<div class="trainer-description">


<?php the_content(); ?>


</div>





<div class="trainer-meta">


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


₹

<?php echo esc_html(
get_post_meta(
get_the_ID(),
'_rate',
true
)
); ?>


</p>



</div>


</div>








<div class="trainer-image">


<?php


if(has_post_thumbnail()){


the_post_thumbnail(
'large'
);


}

else{


?>

<img

src="<?php echo esc_url(
wp_upload_dir()['baseurl']
.'/2026/06/karsten-winegeart-0Wra5YYVQJE-unsplash-scaled.jpg'
); ?>"

alt="Trainer"


>


<?php


}


?>


</div>






</div>


</section>




<?php

get_footer();

?>
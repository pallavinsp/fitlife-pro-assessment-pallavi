<?php


$id =
intval(
$attributes['trainerId']
);


if(!$id){

return;

}



$post =
get_post($id);



?>


<div class="trainer-card">


<h2>

<?php echo esc_html(
$post->post_title
); ?>

</h2>



<p>

<?php echo wp_trim_words(
$post->post_content,
20
); ?>


</p>


<p>

Certification:

<?php

echo esc_html(
get_post_meta(
$id,
'_certification',
true
)
);

?>


</p>



</div>
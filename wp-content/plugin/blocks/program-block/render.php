<?php

$title =
esc_html(
$attributes['title']
);


$description =
esc_html(
$attributes['description']
);


$image =
esc_url(
$attributes['image']
);


?>


<div class="program-box">


<?php if($image): ?>

<img src="<?php echo $image; ?>">


<?php endif; ?>


<h2>

<?php echo $title; ?>

</h2>



<p>

<?php echo $description; ?>

</p>


<p>

<strong>

Difficulty:

</strong>


<?php echo esc_html(
$attributes['difficulty']
); ?>


</p>



<a class="primary-btn"

href="<?php echo esc_url(
$attributes['buttonUrl']
); ?>">

<?php echo esc_html(
$attributes['buttonText']
); ?>

</a>



</div>
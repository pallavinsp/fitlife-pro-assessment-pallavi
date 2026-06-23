<?php
/**
 * Header Template
 */
?>

<!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>

<meta charset="<?php bloginfo('charset'); ?>">

<meta name="viewport" content="width=device-width, initial-scale=1">

<?php wp_head(); ?>

</head>



<body <?php body_class(); ?>>


<?php wp_body_open(); ?>



<div class="site-wrapper">



<header class="site-header">


<div class="container header-inner">



<div class="logo">

<a href="<?php echo esc_url(home_url('/')); ?>">

FitLife Pro

</a>

</div>





<button class="mobile-toggle" aria-label="Menu">

☰

</button>






<nav class="main-navigation">


<?php


wp_nav_menu(array(

'theme_location'=>'primary',

'menu_class'=>'main-menu',

'container'=>false,

'fallback_cb'=>false

));


?>


</nav>




</div>


</header>




<main class="site-content">
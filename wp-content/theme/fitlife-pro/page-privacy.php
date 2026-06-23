<?php

/*
Template Name: Privacy Page
*/


get_header();

?>


<div class="container">


<h1>

Privacy Policy

</h1>



<div class="content">


<?php


while(have_posts()){


the_post();


the_content();


}



?>


</div>



</div>



<?php

get_footer();

?>
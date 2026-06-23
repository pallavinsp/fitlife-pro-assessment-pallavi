<?php

/*
Template Name: Contact Page
*/


get_header();



$options = get_option('fitlife_options');



$contact_email = !empty($options['contact_email'])

?

$options['contact_email']

:

'info@fitlifepro.com';


?>



<section class="contact-page">


<div class="container contact-container">





<div class="contact-header">


<h1>

Contact Us

</h1>



<p>

Have questions? Reach out to our fitness experts.

</p>


</div>







<?php


if(

isset($_GET['sent'])

&&

sanitize_text_field($_GET['sent']) == '1'

){


?>


<div class="contact-message">


Thank you for contacting FitLife Pro. We will get back to you soon.


</div>


<?php


}


?>








<div class="contact-wrapper">







<div class="contact-box">



<h2>

Send Message

</h2>







<form method="post">





<?php


wp_nonce_field(

'fitlife_contact_action',

'fitlife_contact_nonce'

);


?>





<input

type="hidden"

name="fitlife_contact_submit"

value="1"


>









<p>


<label>

Name

</label>





<input


type="text"

name="name"

placeholder="Your Name"

required


>


</p>











<p>


<label>

Email

</label>







<input


type="email"

name="email"

placeholder="Your Email"

required


>



</p>









<p>


<label>

Message

</label>







<textarea


name="message"

rows="6"

placeholder="Your Message"

required


></textarea>




</p>








<button 

type="submit"

>


Send Message


</button>







</form>







</div>












<div class="contact-info">








<div class="contact-card">



<h3>

FitLife Pro

</h3>



<p>

Professional fitness training and personalized programs.

</p>



</div>









<div class="contact-card">



<h3>

Contact

</h3>



<p>

Email:

<?php echo esc_html($contact_email); ?>


</p>




<p>

Phone: +91 9876543210

</p>



</div>









<div class="contact-card">



<h3>

Working Hours

</h3>





<p>

Monday - Saturday

</p>





<p>

6 AM - 10 PM

</p>



</div>






</div>









</div>






</div>


</section>






<?php


get_footer();


?>
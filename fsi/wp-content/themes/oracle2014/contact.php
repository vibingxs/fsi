<?php

/* Template Name: Contact Us */

global $response;

if(isset($_POST['contactsubmit'])){
	
	$response = "";

	function response($type, $message){
		global $response;

		if($type == "success") {
			$response = "<div class='success'>{$message}</div>";
		}
		else {
			$response = "<div class='error'>{$message}</div>";
		}
	}

	

	$missing = "Please fill in all fields.";
	$failed  = "Message was not sent. Please try again.";
	$success = "Your message has been sent.";

	$subject = $_POST['subject'];
	$name 	 = $_POST['namefield'];
	$message = $_POST['message'];

	$to = 'charlie.lodder@mointernational.com';

	$headers = 'From: Oracle FSI - '. $name . "\r\n";

	if(empty($name) || empty($message) || empty($subject)) {
		response("error", $missing);
	}
	else {
		$sent = wp_mail($to, $subject, strip_tags($message), $headers);
		if($sent) {
			response("success", $success); 
		}
		else {
			response("error", $failed);
		}	
	}

}


get_header();

?>

<div class="banner">
	<?php if( get_field('slider_image_3') ): ?>
		<div>
			<img src="<?php the_field('slider_image_3'); ?>" />
			<div class="ns_slideContent">
				<div class="container">
					<h2>Innovation in Financial Services - Staying Ahead of the Competition </h2>
					<p>This on-demand webcast will help you discover how leading banks and financial services organizations are forging a competitive advantage.</p>
					<a class="red-btn pull-left" href="http://oracle-eppm.loc/fsi/regulatory-mastery/compliance-week-ondemand-webcast-project-portfolio-management-can-enable-regulatory-mastery/#anchor">Read more <i class="fa fa-angle-double-right"></i></a>
				</div>
			</div>
		</div>
	<?php endif; ?>
</div>
 
 
 
<div class="container">
	<div class="col-md-12">
		<h1 class="centre red">Feel free to get in touch</h1>
	</div>
</div>
	
	
<div class="container">	
	
	<div id="contact">
		<div class="col-xs-12 col-sm-7">
			<h3>Further information query</h3>
			
			<?php echo $response; ?>
			
			<form action="/fsi/contact-us" method="post" class="contact" name="contact">
				<div class="form-row">
					<label for="subject">Subject</label>
					<input type="text" name="subject" required="" />
				</div>
				<div class="form-row">
					<label for="name">Name</label>
					<input type="text" name="namefield" required="" />
				</div>
				<div class="form-row">
					<label for="message">Message</label>
					<textarea name="message" cols="30" rows="10" required=""></textarea>
				</div>
				<div class="form-row">
					<button type="submit" name="contactsubmit" value="1" class="grey-btn pull-right details-btn">Submit <i class="fa fa-angle-double-right"></i></button>
				</div>			
			</form>		
		</div>
		<div class="col-xs-12 col-sm-5">
			<div class="grey-bg red-border">
				<h4>Contact Oracle</h4>
			</div>		
			<div class="grey-bg">
				<div class="contact-details">
					<p class="red">General Enquiries</p>
					<p>+1.650.506.7000 or +1.800.392.2999</p>
				</div>
				<div class="contact-details">
					<p class="red">International</p>
					<p>+1.650.506.7000<br />
					Sales: +1.800.ORACLE1</p>
				</div>
				<div class="contact-details">
					<p class="red">Physical Address</p>
					<p>Oracle Corporation<br />
					500 Oracle Parkway<br />
					Redwood Shores, CA 94065</p>
				</div>
			</div>
				
		</div>
	</div>
	
</div>


<?php get_footer(); ?>

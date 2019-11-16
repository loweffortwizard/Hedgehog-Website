<!doctype html>
<html>
<head>
	
	<title>Website</title>
	<!-- css link -->
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/contact-form.css">
	
</head>
<body>
/*
 http://www.123contactform.com/simple-php-contact-form.html
 http://stackoverflow.com/questions/19542601/php-contact-form-not-working-with-some-email-addresses
 http://stackoverflow.com/questions/19696257/html-php-form-error-undefined-index-action-in-php-code
*/
	<!-- header -->
	<div class="header"><div class="section-inner">
		<h1 id="logo"> <h1 id="logo"> <img src="images/logo.png" alt="A Logo"> </h1>
	</div></div><!--/header-->
	
	<!-- nav -->
	<div class="nav"><div class="section-inner">
		<ul class="clearfix">
			<li><a href="index.html">Home</a></li>
			<li><a href="about.html">About</a></li>
			<li class="active"><a href="contact.php">Contact</a></li>
			<li><a href="collection.html">Collection</a></li>
			<li><a href="login.html"><strong>Login</strong></a></li>
		</ul>
	</div></div><!--/nav-->
		
	<!-- body-content -->
	<div class="body-content"><div class="section-inner">
		
		<!-- two-columns -->
		<div class="two-columns clearfix">
			
			<!-- main -->
			<div class="main">
				
				<h2>Contact</h2>
				
				<p> Why is this such an important area to focus on? Why not just have contact information, like a phone number or email address? While providing the best ways to get in touch is an essential part of the contact page, there should be a little more thought put into it. No matter what industry or field you are involved with, an amazing contact page has the ability to entice visitors and convince them to either make a purchase or hire your services. </p>
				
				<p> Make Sure it is Functional: We know this is obvious, but take the time to double-check everything on the page. Having links that are broken or will not send properly is just bad for business. If the email or phone number links are not functional, how can people communicate with you? That kind of defeats the purpose of the contact page. </p>
				
				<?php 
				
				/*
					this script will create an error textfile (if any), check the session
					and send email message if there is content.
				*/
				
				ini_set('display_errors', 0);
				#displaying errors to user
				ini_set('log_errors', 1);
				#recoring error made
				#The ini_set(‘log_errors’) either turns of the writing of error logs by adding 0, or turn on error log writing using 1.
				ini_set('error_log', 'error-contact');
				#saving error as textfile
				
				$action=$_REQUEST['action']; 
				#var action has the value of action - hidden input. 
				# $_REQUEST is An associative array that by default contains the contents of $_GET, $_POST and $_COOKIE.
				if ($action=="")
					# if var action has no content do this:
				
					{#start of IF 
					?> 
						<form  action="" method="POST" enctype="multipart/form-data"> 
							<!-- action var --> 
							<input type="hidden" name="action" value="submit"> 
							Your name:<br> 
							<input name="name" id="name" type="text" value="" size="30"/><br> 
							<span id="name_validation" class="error"></span>
							Your email:<br> 
							<input name="email" id="email" type="text" value="" size="30"/><br> 
							<span id="email_validation" class="error"></span>
							Your message:<br> 
							<input type="text" id="message" name="message" rows="7" cols="30"></input>
							<span id="message_validation" class="error"></span>
							<br> 
							<input type="submit" value="Send email"/> 
						</form> 
					<?php 
					}  
				else
					#if action has content send form:
					{ 
							$name=$_REQUEST['name']; 
							##var name has value of name
							$email=$_REQUEST['email']; 
							##var email has value of email
							$message=$_REQUEST['message']; 
							##var message has value of message
							
						if (($name=="")||($email=="")||($message=="")) 
							# if any of the vars have not content do this:
							{ 
								echo "All fields are required, please fill <a href=\"\">the form</a> again."; 
								#print above
							} 
						else{    
							#sending the email with content if there is content in each var
								$from="From: $name<$email>\r\nReturn-path: $email"; 
								$subject="Message sent using contact form"; 
								#var subject has value of text content
								mail("tr143938@truro-penwith.ac.uk", $subject, $message, $from); 
								#sending email to email address
								echo "Email sent!"; 
								#print above
								
								if( mail("tr143938@truro-penwith.ac.uk", $subject, $message, $from)){
									echo "Email sent!";
								}
								
								else {
									echo "failed" ;
								}
							}#end of else 
					
					}#end of else   
				?> 
				
			</div><!--/main-->
			
			<!-- side -->
			<div class="side">
				
				<!-- info-box -->
				<div class="info-box-a">
					<h4>Did You Know?</h4>
					<p>The hedgehog got its name because of its peculiar foraging habits. They root through hedges and other undergrowth in search of their favourite food - small creatures such as insects, worms, centipedes, snails, mice, frogs, and snakes. As it moves through the hedges it emits pig-like grunts thus, the name hedgehog.</p>
				</div><!--/info-box-->
				
				<!-- info-box -->
				<div class="info-box-b">
					<h4>Did You Know?</h4>
					<p>The hedgehog is nocturnal, coming out at night and spending the day sleeping in a nest under bushes or thick shrubs.</p>
				</div><!--/info-box-->
				
				<!-- info-box -->
				<div class="info-box-b">
					<h4>Did You Know?</h4>
					<p>While hunting for food, they rely primarily upon their senses of hearing and smell because their eyesight is weak though their eyes are adapted for night-time vision.</p>
				</div><!--/info-box-->
				
			</div><!--/side-->
			
		</div><!--/two-columns-->
		
	</div></div><!--/body-content-->
	
	<!-- footer -->
	<div class="footer"><div class="section-inner">
		
		<p><b>01872 267 879</b><br>
			Random Place Street<br>
			Random Area In The World<br>
			random@random.e-mail.co.uk<br>
		</p>
		
		<p><b>Tele: 01872 267 879</b><br>
			Twitter: @somecarthing<br>
			Facebook: somecarthing<br>
			E-mail: random@random.e-mail.co.uk<br>
		</p>
		
	</div></div><!--/footer-->
	
</body>
</html>
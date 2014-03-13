<?php

// Do not edit this if you are not familiar with php
error_reporting (E_ALL ^ E_NOTICE);
$post = (!empty($_POST)) ? true : false;
if($post) {
	function ValidateEmail($email){

		$regex = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";
		$eregi = preg_replace($regex,'', trim($email));
		
		return empty($eregi) ? true : false;
	}

	$name = stripslashes($_POST['ContactName']);
	$to = trim($_POST['to']);
	$email = trim($_POST['ContactEmail']);
	$subject = stripslashes($_POST['subject']);
	$phone = stripslashes($_POST['ContactPhone']);
	$custominput = stripslashes($_POST['ContactCustom']);
	$customlabel = stripslashes($_POST['customlabel']);
	$message = stripslashes($_POST['ContactComment']);
	$error = '';
	$Reply=$to;
	$from=$to;
	
	// Check Name Field
	if(!$name) {
		$error .= 'Please enter your name.<br />';
	}
	
	// Checks Email Field
	if(!$email) { 
		$error .= 'Please enter an e-mail address.<br />';
	}
	if($email && !ValidateEmail($email)) {
		$error .= 'Please enter a valid e-mail address.<br />';
	}

	// Checks Subject Field
	if(!$subject) {
		$error .= 'Please enter your subject.<br />';
	}
	
	// Checks Message (length)
	if(!$message || strlen($message) < 3) {
		$error .= "Please enter your message. It should have at least 5 characters.<br />";
	}
	
	// Let's send the email.
	if(!$error) {
		$messages="From: $email \n\n";
		$messages.="Name: $name \n\n";
		$messages.="Email: $email \n\n";
		if($phone) {$messages.="Phone: $phone \n\n";	}
		if($custominput) {$messages.="$customlabel: $custominput \n\n";	}
		$messages.="Message: $message \n\n";
		$emailto=$to;
		
		$headers = 'From: '. $name .' <'.$email.'>' . "\r\n" . 'Reply-To: ' . $email;
        $mail = @mail($emailto, $subject, $messages, $headers);	
	
		if($mail) {
			echo 'success';
		}
	} else {
		echo '<div class="error">'.$error.'</div>';
	}
	

}
?>
<?php

require "libs/recaptchalib.php";

$secret = '_SECRET_KEY_';

$data = $_POST;

// g-recaptcha-response

$re = new Recaptcha($secret);
$reResult = $re->verifyResponse($_SERVER['REMOTE_ADDR'], $data['g-recaptcha-response']);

if($reResult->success) {

	// recaptcha successfully
	if($_POST) {
		$name = "";
		$email = "";
		$phone = "";
		$visitor_message = "";
		$recipient = "yourEmail@mail.com";
		 
		if(isset($_POST['name'])) {
			$name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
		}
		 
		if(isset($_POST['email'])) {
				$email = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['email']);
				$email = filter_var($email, FILTER_VALIDATE_EMAIL);
		}
		 
		if(isset($_POST['phone'])) {
				$phone = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
		}
		 
		if(isset($_POST['visitor_message'])) {
				$visitor_message = htmlspecialchars($_POST['visitor_message']);
		}
	
		$subject = "NEW SUBMIT от $email";
	
		$headers  = 'MIME-Version: 1.0' . "\r\n"
		.'Content-type: text/html; charset=utf-8' . "\r\n";
	
		$message = "
			<html>
				<head>
					<title>SUBMIT</title>
				</head>
				<body>
					<p>🔔 New Submit! 🔔</p>
					<p>Name: $name</p>
					<p>Mail: $email</p>
					<p>Phone: $phone</p>
					<p>Message: <br> $visitor_message</p>
				</body>
			</html>
		";
		 
		if(mail($recipient, $subject, $message, $headers)) {
				echo "<p>Thanks for submiting, $name. We will be back!</p>";
		} else {
				echo '<p>Sorry, we cant submit your form.. :(</p>';
		}
		 
	} else {
		echo '<p>Something went wrong</p>';
	}
} else {
	exit('Sorry, we cant submit your form :( <br> Maybe you are a spamer 😬'); // spamer's text
}

?>
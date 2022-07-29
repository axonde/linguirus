<?php

if($_POST) {
	$name = "";
	$email = "";
	$phone = "";
	$message = "";
	$recipient = "alex.chpak@gmail.com";
	 
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
	 
	if(isset($_POST['message'])) {
			$visitor_message = htmlspecialchars($_POST['message']);
			// не стал проверять через filter var так как в этом нет необходимости
	}

	$headers  = 'MIME-Version: 1.0' . "\r\n"
	.'Content-type: text/html; charset=utf-8' . "\r\n"
	.'From: ' . $email . "\r\n"
	.'Phone: ' . $phone . "\r\n"
	."Name: " . $name . "\r\n";
	 
	if(mail($recipient, $message, $headers)) {
			echo "<p>Спасибо, что отсавили заявку, $name. Скоро мы с Вами свяжемся!</p>;
	} else {
			echo '<p>Извините, но мы не можем отправить Вашу форму :( <br> Переотправьте форму.</p>';
	}
	 
} else {
	echo '<p>Something went wrong</p>';
}

?>
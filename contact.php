<?php

if($_POST) {
	$name = "";
	$email = "";
	$phone = "";
	$visitor_message = "";
	$recipient = "linguirus@yandex.ru";
	 
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

    $subject = "НОВАЯ ЗАЯВКА от $email";

	$headers  = 'MIME-Version: 1.0' . "\r\n"
	.'Content-type: text/html; charset=utf-8' . "\r\n";

	$message = "
		<html>
			<head>
				<title>ЗАЯВКА</title>
			</head>
			<body>
				<p>🔔 Новая заявка! 🔔</p>
				<p>Имя: $name</p>
				<p>Mail: $email</p>
				<p>Телефон: $phone</p>
				<p>Сообщениe: <br> $visitor_message</p>
			</body>
		</html>
	";
	 
	if(mail($recipient, $subject, $message, $headers)) {
			echo "<p>Спасибо, что отсавили заявку, $name. Скоро мы с Вами свяжемся!</p>";
	} else {
			echo '<p>Извините, но мы не можем отправить Вашу форму :( <br> Переотправьте форму.</p>';
	}
	 
} else {
	echo '<p>Something went wrong</p>';
}

?>
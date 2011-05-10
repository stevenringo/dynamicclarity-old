<?php
	
	$name = trim($_POST['name']);
	$email = $_POST['email'];
	$comments = $_POST['comments'];
	$subject = $_POST['subject'];
	
	$site_owners_email = $_POST['to'];
	//$site_owners_name = 'Your Name'; // replace with your name
	
	if (strlen($name) < 2) {
		$error['name'] = "Please enter your name";	
	}
	
	if (!preg_match('/^[a-z0-9&\'\.\-_\+]+@[a-z0-9\-]+\.([a-z0-9\-]+\.)*+[a-z]{2}/is', $email)) {
		$error['email'] = "Please enter a valid email address";	
	}
	
	if (strlen($comments) < 3) {
		$error['comments'] = "Please leave a comment.";
	}
	
	if (!$error) {
		
		require_once('phpMailer/class.phpmailer.php');
		$mail = new PHPMailer();
		
		$mail->From = $email;
		$mail->FromName = $name;
		$mail->Subject = $subject; //pre-defined subject
		$mail->AddAddress($site_owners_email);
		//$mail->AddAddress('youremail@site.com', 'Your Name'); //replace with your email and name
		$mail->Body = $comments;
		
		// GMAIL STUFF
		
		//$mail->Mailer = "smtp";
		//$mail->Host = "smtp.gmail.com";
		//$mail->Port = 587;
		//$mail->SMTPSecure = "tls"; 
		
		//$mail->SMTPAuth = true; // turn on SMTP authentication
		//$mail->Username = "themeForestTest@gmail.com"; // SMTP username
		//$mail->Password = "passwordTF"; // SMTP password
		
		$mail->Send();
		
		echo "<li class='success'> Congratulations, " . $name . ". We've received your email. We'll be in touch as soon as we possibly can! </li>";
		
	} # end if no error
	else {

		$response = (isset($error['name'])) ? "<li>" . $error['name'] . "</li> \n" : null;
		$response .= (isset($error['email'])) ? "<li>" . $error['email'] . "</li> \n" : null;
		$response .= (isset($error['comments'])) ? "<li>" . $error['comments'] . "</li>" : null;
		
		echo $response;
	} # end if there was an error sending


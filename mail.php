<?php
// Contact	
	if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['message'])){
		$name= $_POST['name'];
		$email= $_POST['email'];
		$subject= $_POST['subject'];
		$message= $_POST['message'];
	
		if($name == '' or $email == '' or $subject == '' or $message == ''){
			echo "
				<div class='alert alert-dismissible fade show' role='alert'>
					<span>You can not leave any field empty</span>
				</div>
			";
			exit();
		}elseif (strlen($name) < 3) {
			echo "
				<div class='alert alert-dismissible fade show' role='alert'>
					<span>Name should be at least 3 characters. </span>
				</div>
			";
			exit();
		}elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			echo "
				<div class='alert alert-dismissible fade show' role='alert'>
					<span>Email is Not Valid! Please try again. </span>
				</div>
			";
		}
		else{
			// message body
			$body="<table><tr><td>Full Name</td><td>: $name</td></tr><tr><td>Email</td><td>: $email</td></tr><tr><td>subject</td><td>: $subject</td></tr><tr><td>Message</td><td>: $message</td></tr></table>";	
						
			$headers = "From: PixNer <no-reply@pixner.net> \r\n";
			$headers .= "Reply-To: PixNer <no-reply@pixner.net> \r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=utf-8\r\n";
			$sendTo = 'pixeltheme96@gmail.com';
			$subject = 'Xmiro - Gaming Studio HTML Template';
			$message = '<b>'.$email.'</b> has send message!! </b>'.$body;
			
			@mail($sendTo, $subject, $message, $headers);

			$success = "
				<div class='alert alert-dismissible fade show' role='alert'>
					<span>Thank you for contacting us and will be in touch with you very soon.</span>
				</div>
			";
				
		}
		if (isset($success)) {
			echo $success;
		} 
		if (isset($fail)) {
			echo $fail;
		} 
		
	exit;
	}
	
	
	// subscriber
	if(isset($_POST['subscribes'])){
	$subscriber =  $_POST['emailSubscribe'];
	
	
		if(trim($subscriber) == ''){
			echo "
				<div class='alert alert-danger alert-dismissible fade show' role='alert'>
					<span>Your email address is required.</span>
				</div>
			";
			exit();
		}
		
		if (!filter_var($subscriber, FILTER_VALIDATE_EMAIL)) {
			echo "
				<div class='alert alert-danger alert-dismissible fade show' role='alert'>
					<span>Email is Not Valid! Please try again. </span>
				</div>
			";
			exit();
		}
		
			$headers = "From: PixNer <no-reply@pixner.net> \r\n";
			$headers .= "Reply-To: PixNer <no-reply@pixner.net> \r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=utf-8\r\n";
			$sendTo = 'pixeltheme96@gmail.com';
			$subject = 'Xmiro - Gaming Studio HTML Template';
			$message = '<b>'.$subscriber.'</b> has been subscribed!!';
			
			@mail($sendTo, $subject, $message, $headers);
	
			echo "
				<div class='alert alert-success alert-dismissible fade show' role='alert'>
					<span>Thanks for Subscribed.</span>
						<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
				</div>
			";
	
		exit;
	}
?>













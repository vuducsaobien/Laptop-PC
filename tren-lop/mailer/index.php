<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
	require_once 'define.php';
	require_once 'functions.php';
	require_once DIR_HTML .'head.php';
    ?>
</head>
<body>

<?php
	// Import PHPMailer classes into the global namespace
	// These must be at the top of your script, not inside a function
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;

	// Load Composer's autoloader
	require 'vendor/autoload.php';

	$email			= '';
	$title			= '';
	$content		= '';
	$errorEmail		= '';
	$errorTitle		= '';
	$errorContent	= '';

	if(isset($_POST['submit'])){

		if( isset($_POST['title']) && isset($_POST['email']) && isset($_POST['content'])) {
		$title   = $_POST['title'];
		$email 	 = $_POST['email'];
		$content = $_POST['content'];

		//Error Email
		$errorEmail		= '';
		$extensionEmail = 'gmail.com';
		if (checkEmail($email)) 				$errorEmail = '<p class="error">Email phải dạng @gmail.com</p>';
		if (checkLength($email, 10, 50))		$errorEmail .= '<p class="error">Email phải dài từ 10 - 50 ký tự</p>';

		//Error Title
		$errorTitle				= '';
		if (checkEmpty($title)) 				$errorTitle = '<p class="error">Hãy nhập Title vào</p>';
		if (checkLength($title, 5, 100))		$errorTitle .= '<p class="error">Title dài từ 5 -100 ký tự</p>';
		
		//Error Content
		$errorContent			= '';
		if (checkEmpty($content)) 				$errorContent = '<p class="error">Hãy nhập Content vào</p>';
		if (checkLength($content, 3, 100))		$errorContent .= '<p class="error">Content dài từ 3 -100 ký tự</p>';
		

			// Instantiation and passing `true` enables exceptions
			$mail = new PHPMailer(true);

			try {
				//Server settings
				$mail->isSMTP();                                            // Send using SMTP
				$mail->Host       = 'smtp.gmail.com';                    	// Set the SMTP server to send through
				$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
				$mail->Username   = 'vuducsaobien95@gmail.com';             // SMTP username
				$mail->Password   = 'eamebfnacckryzyk';                     // SMTP password
				$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
				$mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

				//Recipients
				$mail->setFrom('example@gmail.com', 'setForm');
				$mail->addAddress($email, 'addAddress');     // Add a recipient

				// Content
				$mail->isHTML(true);                                  // Set email format to HTML
				$mail->Subject = $title;
				$mail->Body    = '<b>'.$content.'</b>';
				
				// $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
				$mail->send();
					if($errorEmail = '' && $errorTitle = '' && $errorContent = ''){
				echo 'Message has been sent';
			} catch (Exception $e) {
				echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
			}
		}
	}
?>

<div class="container-contact100">

	<div class="wrap-contact100">
		<form class="contact100-form validate-form" method = "post">
			<span class="contact100-form-title">
				Send Mail Message PHPMailer Created By Vũ Văn Đức
			</span>

			<div class="wrap-input100 validate-input" data-validate = "Please enter your email: e@a.x" >
				<input class="input100" type="text" name="email" placeholder="Send To (Gmail)" value = <?php echo $email;?> >
				<span class="focus-input100"></span>
				<p><?php echo $errorEmail; ?></p>
			</div>

			<div class="wrap-input100 validate-input" data-validate="Please enter your name">
				<input class="input100" type="text" name="title" placeholder="Title" value = <?php echo $title;?>>
				<span class="focus-input100"></span>
			</div>

			<div class="wrap-input100 validate-input" data-validate = "Please enter your message">
				<textarea class="input100" name="content" placeholder="Your Content"><?php echo $content;?></textarea >
				<span class="focus-input100"></span>
			</div>

			<div class="container-contact100-form-btn">
				<button class="contact100-form-btn"  name="submit">
					<span>
						<i class="fa fa-paper-plane-o m-r-6" aria-hidden="true"></i>
						Send
					</span>
				</button>
			</div>
		</form>
	</div>
</div>

<div id="dropDownSelect1"></div>
<?php require_once DIR_HTML . 'script.php'; ?>
</body>
</html>

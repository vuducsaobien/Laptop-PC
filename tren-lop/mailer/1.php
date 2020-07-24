<div class="container-contact100">

<div class="wrap-contact100">
	<form class="contact100-form validate-form" method = "post">
		<span class="contact100-form-title">
			Send Mail Message PHPMailer Created By Vũ Văn Đức
		</span>

		<div class="wrap-input100 validate-input" data-validate = "Please enter your email: e@a.x">
			<input class="input100" type="text" name="email" placeholder="Send To (Gmail)" value = >
			<span class="focus-input100"></span>
			<p><?php echo $errorEmail; ?></p>
		</div>

		<div class="wrap-input100 validate-input" data-validate="Please enter your name">
			<input class="input100" type="text" name="title" placeholder="Title">
			<span class="focus-input100"></span>
		</div>

		<div class="wrap-input100 validate-input" data-validate = "Please enter your message">
			<textarea class="input100" name="content" placeholder="Your Content"></textarea>
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

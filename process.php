<?php
if (($_SERVER['REQUEST_METHOD'] == 'POST') && (!empty($_POST['action']))):

	if (isset($_POST['name'])) { $name = $_POST['name']; }
	if (isset($_POST['phone'])) { $phone = $_POST['phone']; }
	if (isset($_POST['message'])) {
			$message = filter_var($_POST['message'], FILTER_SANITIZE_STRING ); 
	}

	$formerrors = false;

	if ($name === '') :
		$err_name = '<div class="error">Sorry, your name is a required field</div>';
		$formerrors = true;
	endif; // input field empty

	if (strlen(phone) <= 6):
		$err_passlength = '<div class="error">Sorry, the password must be at least six characters</div>';
		$formerrors = true;
	endif; //password not long enough


	if ( !(preg_match('/[A-Za-z]+, [A-Za-z]+/', $name)) ) :
		$err_patternmatch = '<div class="error">Sorry, the name must be in the format: Last, First</div>';
		$formerrors = true;
	endif; // pattern doesn't match

  $formdata = array (
    'name' => $name,
    'phone' => $phone,
    'message' => $message,
  );

	if (!($formerrors)) :
		$to				= 	"jislocum78@gmail.com";
		$subject	=		"From $name -- Signup Page";
		$message	=		json_encode($formdata);

		$replyto	=		"From: fromprocessor@iviewsource.com \r\n".
									"Reply-To: donotreply@iviewsource.com \r\n";

		if (mail($to, $subject, $message)):
			$msg = "Thanks for filling out our form";
		else:
			$msg = "Problem sending the message";
		endif; // mail form data

	endif; // check for form errors

endif; //form submitted
?>
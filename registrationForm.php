<?php

	$emailTo = "info@jakboxexpress.com";//change this to the email address which should receive the form data
    $emailFrom = "<registro@jakboxexpress.com>";
    $headers = "From: Formulario de Registro " . $emailFrom . "\r\n";

	/*
		NOTE: do not change anything below this
	*/

	if( isset($_POST['maximus']) ) {

		//honey pot detection

		if( $_POST['maximus'] != '' ) {

			die('Bad spam bot!!');

		}

		$message = "";

		foreach( $_POST as $field => $val ) {

			if( $field != 'maximus' && $field != 'g-recaptcha-response' && $field != 'theSubject') {

				$message .= $field . ": ". $val . "\n";

			}

		}

		$subject = $_POST['theSubject'];

		//send the email

		if( mail($emailTo, $subject, $message, $headers) ) {

			echo "Message sent!";

		} else {

			echo "Could not send message";

		}

	}

?>

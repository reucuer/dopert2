<?php

// define("WEBMASTER_EMAIL", 'themesflat.com');
//$address = "example@themeforest.net";
$address = "themesflat.com";
if (!defined("PHP_EOL")) define("PHP_EOL", "\r\n");

$error = false;
$fields = array('name','progam','time-ship' );

foreach ( $fields as $field ) {
	if ( empty($_POST[$field]) || trim($_POST[$field]) == '' )
		$error = true;
}

if ( !$error ) {

	$name = stripslashes($_POST['name']);
	$program = stripslashes($_POST['progam']);	
	$time_ship = stripslashes($_POST['time-ship']);

	$e_subject = 'You\'ve been contacted by ' . $email . '.';
	

	// Configuration option.
	// You can change this if you feel that you need to.
	// Developers, you may wish to add more fields to the form, in which case you must be sure to add them here.

	$e_body = "You have been contacted by: $email" . PHP_EOL . PHP_EOL;
	$e_phone = "\r\nPhone: $phone" . PHP_EOL . PHP_EOL;

	$msg = wordwrap( $e_body  , 70 );

	$headers = "From: $name" . PHP_EOL;
	$headers .= "Name: $program" . PHP_EOL;
	$headers .= "Phone: $time_ship" . PHP_EOL;
	$headers .= "Content-type: text/plain; charset=utf-8" . PHP_EOL;
	$headers .= "Content-Transfer-Encoding: quoted-printable" . PHP_EOL;

	if(mail($address, $msg, $headers  )) {

		// Email has sent successfully, echo a success page.
	
		echo 'Success';

	} else {

		echo 'ERROR!';

	}

}

?>
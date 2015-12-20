<?php

	// GuestBook Processing PHP Script
	date_default_timezone_set('America/New_York');	// Set your timezone here
	$file = file_get_contents("gbentries.txt");	// Get the text file contents
	//Form POST variables to capture the GuestBook data
	$name = "<h2><strong>" . $_POST["gbname"] . "</strong></h2>"; 
	$date = " <strong><i>" . date("l F d, Y, h:i:s") . "</i></strong><br>";
	$email = "<strong> Email: " . $_POST["gbemail"] . "</strong><br>";
	$comments = "<strong> Comments: " . $_POST["gbmessage"] . "</strong></br><br><hr />";
	$content .= $name. $date. $email. $comments. $file;
	file_put_contents("gbentries.txt", $content); // Save the POST data into the text file

	// Sending an email from PHP
	$to = "yourname@domain.com\r\n";	//Add To email address here 
	$subject = "GuestBook Comments";
	$headers = "From: " . strip_tags($_POST['gbemail']) . "\r\n";
	$headers .= "Reply-To: ". strip_tags($_POST['gbemail']) . "\r\n";
	$headers .= "CC: yourname@domain.com\r\n";	// Add email CC here if required
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	$msgHTML = '<html><body>';
	$msgHTML .= $name. $date. $email. $comments;
	$msgHTML .= '</body></html>';
	mail($to, $subject, $msgHTML, $headers);
	header("Location: thankyou.php"); // Page redirection to a Thank You page after sending the email.
	exit;

?>
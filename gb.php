<?php
	if((isset($_POST["gbname"]) && $_POST["gbname"] !== "") 
		&& (isset($_POST["gbmessage"]) && $_POST["gbmessage"] !== "")) {
		// GuestBook Processing PHP Script
		date_default_timezone_set('America/New_York');	// Set your timezone here
		$file = file_get_contents("gbentries.txt");	// Get the text file contents
		//Form POST variables to capture the GuestBook data
		$name = "<h2>" . strip_tags($_POST["gbname"]) . "</h2>"; 
		$date = " <i>" . date("l F d, Y, h:i:s") . "</i><br>";
		// $email = "<p> Email: " . strip_tags($_POST["gbemail"]) . "</p>";
		$comments = "<p>" . strip_tags($_POST["gbmessage"]) . "</p><br /><hr />";
		$content .= $name.$date.$comments.$file; //$email. -> removed 
		file_put_contents("gbentries.txt", $content); // Save the POST data into the text file

		// Sending an email from PHP (optional)
		// $to = "yourname@domain.com\r\n";	//Add To email address here 
		// $subject = "GuestBook Comments";
		// $headers = "From: " . strip_tags(['gbemail']) . "\r\n";
		// $headers .= "Reply-To: ". strip_tags(['gbemail']) . "\r\n";
		// $headers .= "CC: yourname@domain.com\r\n";	// Add email CC here if required
		// $headers .= "MIME-Version: 1.0\r\n";
		// $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
		// $msgHTML = '<html><body>';
		// $msgHTML .= $name. $date. $email. $comments;
		// $msgHTML .= '</body></html>';
		// mail($to, $subject, $msgHTML, $headers);
		
		// header("Location: thankyou.php"); // Page redirection to a Thank You page after sending the email.
		exit;
	} else {
		echo("ERROR");
		die();
	}
?>
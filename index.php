<!DOCTYPE HTML>
<html>
	<head>
		<title>Guest Book</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body>
			<!-- Guest Book -->
			<section id="guestbook" class="four">
				<div class="container  extrablk">
					<header>
						<h2>Guest Book</h2>
					</header>

					<p>Thank you for visiting my website! Feel free to leave a message in my guestbook, I am always pleased to read your comments.</p>

					<form method="post" action="gb.php">
						<div class="row">
							<div class="6u 12u$(mobile)"><input type="text" name="gbname" placeholder="Name" required/></div>
							<div class="6u$ 12u$(mobile)"><input type="text" name="gbemail" placeholder="Email (Never Published)" required/></div>
							<div class="12u$">
								<textarea name="gbmessage" placeholder="Message" required></textarea>
							</div>
							<div class="12u$">
								<input type="submit" value="Send Message" /> &nbsp;&nbsp;&nbsp;
								<input type="reset" value="Reset">
							</div>
						</div>
					</form>
				</div>
				<div class="gb-container">
					<?php 
						readfile("gbentries.txt");
					?>
				</div>
			</section>
	</body>
</html>
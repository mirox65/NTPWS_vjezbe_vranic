<?php
	print '<p style="text-align:center; padding: 10px; background-color: #d7d6d6;border-radius: 5px;">We recieved your question. We will answer within 24 hours.</p>';
	$EmailHeaders  = "MIME-Version: 1.0\r\n";
	$EmailHeaders .= "Content-type: text/html; charset=utf-8\r\n";
	$EmailHeaders .= "From: <mvranic@tvz.hr>\r\n";
	$EmailHeaders .= "Reply-To:<mrisolav.vranic@gmail.com>\r\n";
	$EmailHeaders .= "X-Mailer: PHP/".phpversion();
	$EmailSubject = 'Example page - Contact Form';
	$EmailBody  = '
	<html>
	<head>
		<title>'.$EmailSubject.'</title>
		<style>
		body {
			background-color: #ffffff;
			font-family: Arial, Helvetica, sans-serif;
			font-size: 16px;
			padding: 0px;
			margin: 0px auto;
			width: 500px;
			color: #000000;
		}
		p {
			font-size: 14px;
		}
		a {
			color: #00bad6;
			text-decoration: underline;
			font-size: 14px;
		}
		
		</style>
		</head>
	<body>
		<p>First name: ' . $_POST['firstname'] . '</p>
		<p>Last name: ' . $_POST['lastname'] . '</p>
		<p>E-mail: <a href="mailto:' . $_POST['email'] . '">' . $_POST['email'] . '</a></p>
		<p>Country: ' . $_POST['country'] . '</p>
		<p>Subject: ' . $_POST['subject'] . '</p>
	</body>
	</html>';
	print '<p>First name: ' . $_POST['firstname'] . '</p>
	<p>Last name: ' . $_POST['lastname'] . '</p>
	<p>E-mail: ' . $_POST['email'] . '</p>
	<p>Country: ' . $_POST['country'] . '</p>
	<p>Subject: ' . $_POST['subject'] . '</p>';
	mail($_POST['email'], $EmailSubject, $EmailBody, $EmailHeaders);
?>
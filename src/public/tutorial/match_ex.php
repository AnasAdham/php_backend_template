<?php

declare(strict_types=1);
$testing = 2;


// Examples for heredocs and nowdocs
$text = <<<HTML
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Document</title>
	</head>
	<body>
			<h1 style="color:red">Hi there</h1>

HTML;

echo $text;

$paymentStatus = 12;
try {
	$result = match ($paymentStatus) {
		1 =>  'Paid',
		2 =>  'Not',
		3 =>  'Failed',
		4 =>  'Pending',
	};
} catch (UnhandledMatchError $ex) {
	$alert = <<<HTML
	<script>
		alert('Error occured');
	</script>
	HTML;
	$result = 'Oops';
	echo $alert;
}

echo $result;
$alert = <<<HTML
	</body>
	</html>
HTML;

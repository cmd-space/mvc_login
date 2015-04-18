<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Welcome</title>
	<link rel="stylesheet" href="/assets/stylesheets/style.css">
</head>
<body>
	<a href="logout">log off</a>
	<p>Welcome <?= $first_name ?>!</p>
	<div>
		<p>User Information</p>
		<p>First Name: <?= $first_name ?></p>
		<p>Last Name: <?= $last_name ?></p>
		<p>Email Address: <?= $email ?></p>
	</div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registration</title>
	<link rel="stylesheet" href="/assets/stylesheets/style.css">
</head>
<body>
	<div>
		<p>Log In</p>
<?php
	if($login_errors)
	{
		echo '<span class="error">'.$login_errors.'</span>';
	}
?>
		<form action="login/welcome" method="post">
			<label for="email">Email: </label>
			<input type="text" name="email"><br>
			<label for="password">Password: </label>
			<input type="password" name="password"><br>
			<input type="hidden" name="login" value="submit">
			<input type="submit" value="Login">
		</form> 
	</div>
	<div>
		<p>Or Register</p>
<?php 
	if($register_errors)
	{
		echo '<span class="error">'.$register_errors.'</span>';
	}
?>
		<form action="login/welcome" method="post">
			<label for="first_name">First Name: </label>
			<input type="text" name="first_name"><br>
			<label for="last_name">Last Name: </label>
			<input type="text" name="last_name"><br>
			<label for="email">Email Address: </label>
			<input type="text" name="email"><br>
			<label for="password">Password: </label>
			<input type="password" name="password"><br>
			<label for="confirm">Confirm Password: </label>
			<input type="password" name="confirm"><br>
			<input type="hidden" name="register" value="submit">
			<input type="submit" value="Register">
		</form>
	</div>
</body>
</html>
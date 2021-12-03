<?php
session_start();

$username = $email = $nameErr = $emailErr = $passErr = "";

$db = mysqli_connect('localhost', 'root', '', 'videogame');

if (isset($_POST['reg_user'])) {
	$username = $_POST['username'];
	$email = $_POST['email'];
	$pass1 = $_POST['pass1'];
	$pass2 = $_POST['pass2'];

	if (empty($username)) { 
		$nameErr = "Username is required";
	}
	if (empty($email)) {
		$emailErr = "Email is required";
	}
	if (empty($pass1)) {
		$passErr = "Password is required";
	} 
	else if ($pass1 != $pass2) {
		$passErr = "Passwords must match";
	}
	$name_email_query = "SELECT * FROM member WHERE username = '$username' OR email = '$email' LIMIT 1";
	$result = mysqli_query($db, $name_email_query);
	$user = mysqli_fetch_assoc($result);
	if ($user) {
		if ($user['username'] === $username) {
			$nameErr = "Username already exists";
		}

		if ($user['email'] === $email) {
			$emailErr = "Email already exists";
		}
	}

	if ($emailErr == "" && $nameErr == "" && $passErr == "") {
		$query = "INSERT INTO member (username, email, password) VALUES ('$username', '$email', '$pass1')";
		mysqli_query($db, $query);
		$_SESSION['username'] = $username;
		$_SESSION['success'] = "You are now logged in";
		header('location: index.php');
	}
}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>REGISTER</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>

	<body>
		<div>
			<h2>REGISTER</h2>
		</div>

		<form action="register.php" method="post">
			<label>Email</label>
			<input type="text" name="email" placeholder="Email">
			<span class="error"><?php echo $emailErr ?></span> 
			<br>

			<label>User Name</label>
			<input type="text" name="username" placeholder="User Name">
			<span class="error"><?php echo $nameErr ?></span> 
			 <br>

			<label>Password</label>
			<input type="password" name="pass1" placeholder="Password">
			<span class="error"><?php echo $passErr ?></span> 
			 <br>

			<label>Confirm Password</label>
			<input type="password" name="pass2" placeholder="Password"> <br>
			<button type="submit" name="reg_user">Register</button>
		</form>
	</body>
</html>

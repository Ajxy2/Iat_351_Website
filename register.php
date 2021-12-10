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
<<<<<<< Updated upstream
<<<<<<< Updated upstream
=======
	} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$emailErr = "Invalid email format";
>>>>>>> Stashed changes
=======
	} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$emailErr = "Invalid email format";
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream
<<<<<<< Updated upstream
		$query = "INSERT INTO member (username, email, password) VALUES ('$username', '$email', '$pass1')";
=======
		$pass_secure = md5($pass1);
		$query = "INSERT INTO member (username, email, password) VALUES ('$username', '$email', '$pass_secure')";
>>>>>>> Stashed changes
=======
		$pass_secure = md5($pass1);
		$query = "INSERT INTO member (username, email, password) VALUES ('$username', '$email', '$pass_secure')";
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream
<<<<<<< Updated upstream
		<link rel="stylesheet" type="text/css" href="style.css">
=======
		<link rel="stylesheet" type="text/css" href="css/style.css">
>>>>>>> Stashed changes
=======
		<link rel="stylesheet" type="text/css" href="css/style.css">
>>>>>>> Stashed changes
	</head>

	<body>
		<div>
			<h2>REGISTER</h2>
		</div>

		<form action="register.php" method="post">
			<label>Email</label>
			<input type="text" name="email" placeholder="Email">
<<<<<<< Updated upstream
<<<<<<< Updated upstream
			<span class="error"><?php echo $emailErr ?></span> 
=======
			<span style="color:red"><?php echo $emailErr ?></span> 
>>>>>>> Stashed changes
=======
			<span style="color:red"><?php echo $emailErr ?></span> 
>>>>>>> Stashed changes
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

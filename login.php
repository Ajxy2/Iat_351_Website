<?php
session_start();

$nameErr = $passErr = $authentErr = "";

$db = mysqli_connect('localhost', 'root', '', 'videogame');

if (isset($_SESSION['username'])) {
	header('location: index.php');	
}

if (isset($_POST['login_user'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	if (empty($username)) {
		$nameErr = "Username is missing";
	}
	if (empty($password)) {
		$passErr = "Password is missing";
	}

	if ($nameErr == "" && $passErr == "") {
<<<<<<< Updated upstream
<<<<<<< Updated upstream
		$query = "SELECT * FROM member WHERE username='$username' AND password = '$password'";
=======
		$pass_secure = md5($password);
		$query = "SELECT * FROM member WHERE username='$username' AND password = '$pass_secure'";
>>>>>>> Stashed changes
=======
		$pass_secure = md5($password);
		$query = "SELECT * FROM member WHERE username='$username' AND password = '$pass_secure'";
>>>>>>> Stashed changes
		$result = mysqli_query($db, $query);
		if (mysqli_num_rows($result) == 1) {
			$_SESSION['username'] = $username;
			$_SESSION['success'] = "You are now logged in";
			header('location: index.php');
		} else {
			$authentErr = "Username and password do not match";
		}
	}
}

?>
<<<<<<< Updated upstream

=======
>>>>>>> Stashed changes
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>LOGIN</title>
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
			<h2>LOGIN</h2>
		</div>
		<form action="login.php" method="post">
			<label>User Name</label>
			<input type="text" name="username" placeholder="User Name">
			<span class="error"><?php echo $nameErr ?></span>  
			<br>

			<label>Password</label>
			<input type="password" name="password" placeholder="Password"> 
			<span class="error"><?php echo $passErr ?></span> <br>
			<span class="error"><?php echo $authentErr ?></span>  <br>
			<button type="submit" name="login_user">Sign In</button>
			<a href="register.php">Sign up</a>
		</form>
	</body>
</html>

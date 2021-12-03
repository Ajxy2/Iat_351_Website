<?php 

	session_start();

	$birth_date = $gender = $bio = "";

	$db = mysqli_connect('localhost', 'root', '', 'videogame');

	if (!isset($_SESSION['username'])) {
		header('location: login.php');	
	}

	if (isset($_POST['save'])) {
		if (isset($_post['gender'])) {
			$birth_date = $_POST['birth_date'];
		}
		if (isset($_post['gender'])) {
			$gender = $_POST['gender'];
		}
		if (isset($_post['gender'])) {
			$bio = $_POST['biography'];
		}

		if (!empty($birth_date)) { 
			$query = "UPDATE member SET birth_date = '$birth_date' WHERE username = 'a'";
			mysqli_query($db, $query);
		}
		if (!empty($gender)) { 
			$query = "UPDATE member SET gender = '$gender' WHERE username = 'a']'";
			mysqli_query($db, $query);
		}
		if (!empty($bio)) { 
			$query = "UPDATE member SET biography = '$bio' WHERE username = 'a']'";
			mysqli_query($db, $query);
		}
	}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>SETTINGS</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<div>
			<h2>SETTINGS</h2>
		</div>

		<form action="settings.php" method="post">
			<label>Date of Birth</label>	
			<input type="date" name="birth_date">
			<br>	
			<label>Gender</label>
			<input type="radio" name="gender" value="female">Female
			<input type="radio" name="gender" value="male">Male
			<input type="radio" name="gender" value="other">Other
			<br>		
			<label>Biography</label>	
			<br>	
			<textarea name="biography"></textarea>
			<br>	
			<input type="submit" name="save">
		</form>

		<form action='index.php' method='get'>
			<button type='submit' name='logout'>Logout</button>
		</form>

	</body>
</html>
<?php 

	session_start();

<<<<<<< Updated upstream
	$birth_date = $gender = $bio = "";
=======
	$birth_date = $gen = $bio = "";
>>>>>>> Stashed changes

	$db = mysqli_connect('localhost', 'root', '', 'videogame');

	if (!isset($_SESSION['username'])) {
		header('location: login.php');	
	}

<<<<<<< Updated upstream
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
=======
	if (isset($_POST['logout'])) {
		session_unset();
		session_destroy();
		header('location: index.php'); 
	}

	if (isset($_POST['save'])) {
		$birth_date = $_POST['birth_date'];	
		$bio = $_POST['biography'];
		$user = $_SESSION['username'];

		if (!empty($birth_date)) { 
			$query = "UPDATE member SET birth_date = '$birth_date' WHERE username = '$user'";

			mysqli_query($db, $query);
		}
		if (!empty($_POST['gender'])) {
			$gen = $_POST['gender'];
			$query = "UPDATE member SET gender = '$gen' WHERE username = '$user'";
		}
		if (!empty($bio)) { 
			$query = "UPDATE member SET biography = '$bio' WHERE username = '$user'";
>>>>>>> Stashed changes
			mysqli_query($db, $query);
		}
	}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>SETTINGS</title>
<<<<<<< Updated upstream
		<link rel="stylesheet" type="text/css" href="style.css">
=======
		<link rel="stylesheet" type="text/css" href="css/style.css">
>>>>>>> Stashed changes
	</head>
	<body>
		<div>
			<h2>SETTINGS</h2>
		</div>

<<<<<<< Updated upstream
		<form action="settings.php" method="post">
=======
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
>>>>>>> Stashed changes
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

<<<<<<< Updated upstream
		<form action='index.php' method='get'>
=======
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method='post'>
>>>>>>> Stashed changes
			<button type='submit' name='logout'>Logout</button>
		</form>

	</body>
</html>
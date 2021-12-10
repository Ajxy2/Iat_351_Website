<?php 

	session_start();

<<<<<<< Updated upstream
<<<<<<< Updated upstream
	$birth_date = $gender = $bio = "";
=======
	$birth_date = $gen = $bio = "";
>>>>>>> Stashed changes

=======
	$birth_date = $gen = $bio = "";
>>>>>>> Stashed changes
	$db = mysqli_connect('localhost', 'root', '', 'videogame');

	if (!isset($_SESSION['username'])) {
		header('location: login.php');	
<<<<<<< Updated upstream
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
=======
	} else {
		$user = $_SESSION['username'];	
	}

>>>>>>> Stashed changes
	if (isset($_POST['logout'])) {
		session_unset();
		session_destroy();
		header('location: index.php'); 
	}

<<<<<<< Updated upstream
	if (isset($_POST['save'])) {
		$birth_date = $_POST['birth_date'];	
		$bio = $_POST['biography'];
		$user = $_SESSION['username'];
=======
	if (isset($_POST['upload'])) {
		$filename = $_FILES["profile_pic"]["name"];
		$tempname = $_FILES["profile_pic"]["tmp_name"];
		$folder = getcwd() . "/images/" . $filename;

		if (!empty($filename)) {			
			$query = "UPDATE member SET avatar = '$filename' WHERE username = '$user'";
			mysqli_query($db, $query);
		}

		if (move_uploaded_file($tempname, $folder)) {
			$msg = "Image uploaded";
		} else {
			$msg = "Failed to upload";
		}
	}

	if (isset($_POST['save'])) {
		$birth_date = $_POST['birth_date'];	
		$bio = $_POST['biography'];
>>>>>>> Stashed changes

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
<<<<<<< Updated upstream
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes
			mysqli_query($db, $query);
		}
	}

<<<<<<< Updated upstream
=======
	// Code for displaying avatar
	// $result = mysqli_query($db, "SELECT avatar FROM member WHERE username = '$user'");
	// $avatar = "";
	// if (mysqli_num_rows($result) > 0) {
	// 	while ($row = mysqli_fetch_assoc($result)) {
	// 		$avatar = $row['avatar'];
	// 	}
	// }

	// <img src="images/<?php 
	// 	echo $avatar; 
	// ? >">




>>>>>>> Stashed changes
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>SETTINGS</title>
<<<<<<< Updated upstream
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
=======
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<div>
			<h2>Settings</h2>
		</div>

		<h3>Update Profile</h3>
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
<<<<<<< Updated upstream
		<form action='index.php' method='get'>
=======
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method='post'>
>>>>>>> Stashed changes
			<button type='submit' name='logout'>Logout</button>
		</form>
=======
		<h3>Upload Profile Picture</h3>

		<form method="post" action="" enctype="multipart/form-data">
			<input type="file" name="profile_pic" value="">
			<input type="submit" name="upload">
		</form>

		<h3>Update Preferences</h3>

		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method='post'>
			<button type='submit' name='logout'>Logout</button>
		</form> 	
>>>>>>> Stashed changes

	</body>
</html>
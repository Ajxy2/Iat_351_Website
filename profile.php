<?php 

	session_start();	
	$db = mysqli_connect('localhost', 'root', '', 'videogame');

	$user = $gender = $birth_date = $bio = "";

	if (!isset($_SESSION['username'])) {
		header('location: login.php');	
	} else {
		$user = $_SESSION['username'];
	}

	$user_details = "SELECT gender, birth_date, biography FROM member WHERE username = '$user'";
	$result = mysqli_query($db, $user_details);

	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			$gender = $row['gender'];
			$bio = $row['biography'];
			$birth_date = $row['birth_date'];
		}
	}

	$result = mysqli_query($db, "SELECT avatar FROM member WHERE username = '$user'");
	$avatar = "";
	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			$avatar = $row['avatar'];
		}
	}


?>



<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Profile</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<div>
			<h2>Profile</h2>
		</div>

		<div>
			<img src="images/<?php echo $avatar; ?>">
			<h4>Username: <?php echo $user; ?></h4>
			<h4>Gender: <?php echo $gender; ?></h4>
			<h4>Date of Birth: <?php echo $birth_date; ?></h4>
			<h4>Biography:</h4>
			<p><?php echo $bio; ?></p>
		</div>
		<form action="settings.php">
			<button type="submit" name="edit">Edit</button>
		</form>

	</body>
</html>
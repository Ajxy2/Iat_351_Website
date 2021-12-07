<?php


  $dbhost = "localhost"; 
  $dbuser = "USER_NAME"; 
  $dbpass = ""; 
  $dbname = "videogame"; 



$connection = @mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);


// Test if connection succeeded
if(mysqli_connect_errno()) {
  die("Database connection failed: " .
       mysqli_connect_error() .
       " (" . mysqli_connect_errno() . ")"
  );
}



// ----------- END OF TASK 1 ----------- //
?>

<html lang="en">
  <head>
    <title>Video Game Review</title>
	 <link  rel="stylesheet"  href="css/style.css">
  </head>
  <header>
  <h1>Website Review<h1>
  <nav>
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="searchGame.php">Games</a></li>
			<li><a href="login.php">Login</a></li>
			<li><a href="register.php">Sign Up</a></li>
			<li><a href="settings.php">Settings</a></li>
		</ul>
	</nav>
	</header>
	
  </header>
  <body class="bodynew">


	<div class="gameList">
    <?php
			
            
	$genre = $_POST['genre'] ?? 'Any';
	 
	$publisher = $_POST['publisher'] ?? 'Any';
	$developer = $_POST['developer'] ?? 'Any';
       
		
		if(isset($_POST['genre'], $_POST['publisher'], $_POST['developer'])) {	
		
		 $sql  = "SELECT game.title, game.genre, game.critic_rating
		   FROM game WHERE genre = '".$genre."' AND publisher = '".$publisher."' AND developer = '".$developer."' LIMIT 15";
		   
		}
		
		if(empty($_POST['genre']) && empty($_POST['publisher']) && empty($_POST['developer'])) {	
		
		   
		 $sql  = "SELECT game.title, game.genre, game.critic_rating
		   FROM game LIMIT 15";
		}
		

		if(isset($_POST['genre']) && empty($_POST['publisher']) && empty($_POST['developer'])) {	
		
		 $sql  = "SELECT game.title, game.genre, game.critic_rating
		   FROM game WHERE genre = '".$genre."' LIMIT 15";
		}
		
		if(isset($_POST['publisher']) && empty($_POST['genre']) && empty($_POST['developer'])) {	
		
		 $sql  = "SELECT game.title, game.genre, game.critic_rating
		   FROM game WHERE genre = '".$publisher."' LIMIT 15";
		}
		
		if(isset($_POST['genre'], $_POST['publisher'])  && empty($_POST['developer'])) {	
		
		 $sql  = "SELECT game.title, game.genre, game.critic_rating
		   FROM game WHERE genre = '".$genre."' AND publisher = '".$publisher."' LIMIT 15";
		}
		
		if(isset($_POST['genre']) && empty($_POST['publisher']) && isset($_POST['developer'])) {	
		
		 $sql  = "SELECT game.title, game.genre, game.critic_rating
		   FROM game WHERE genre = '".$genre."' AND pdeveloper = '".$developer."' LIMIT 15";
		}
		
			if(empty($_POST['genre']) && isset($_POST['publisher']) && isset($_POST['developer'])) {	
		
		 $sql  = "SELECT game.title, game.genre, game.critic_rating
		   FROM game WHERE publisher = '".$publisher."' AND developer = '".$developer."' LIMIT 15";
		}
		 
		   $result = mysqli_query($connection,$sql);
	
		 $resultCheck = mysqli_num_rows($result);
		
		
			 ?>
			 
			 <p>Search a review</p>
			  
			   <form action ="searchGame.php" method="post">
			  
			   <select name="genre">
				<?php
            $genre_choices = ['', 'Simulation', 'Puzzle', 'Shooter', 'Racing', 'Action', 'Platform', 
			'Role-Playing', 'Misc'];
            foreach($genre_choices as $genre_choice) {
              echo "<option value=\"{$genre_choice}\"";
              if($genre == $genre_choice) {
                echo " selected";
              }
              echo ">{$genre_choice}</option>";
            }
			
			echo $sql;
          ?>
		   </select>
		  
		   <select name="publisher">
				<?php
				
			
            $publisher_choices = ['', 'Nintendo', 'Activision', 'Sony Computer Entertainment', 'Take-Two Interactive', 'Microsoft Game Studios' 
			];
            foreach($publisher_choices as $publisher_choice) {
              echo "<option value=\"{$publisher_choice}\"";
              if($publisher == $publisher_choice) {
                echo " selected";
              }
              echo ">{$publisher_choice}</option>";
            }
			
			echo $sql;
          ?>
		   </select>
		   
		    <select name="developer">
				<?php
            $developer_choices = ['', 'Nintendo', 'Treyarch', 'Infinity Ward', 'Polyphony Digital', 'Rockstar North', 'Bungie Software', 
			'Retro Studios'];
			
			
			
            foreach($developer_choices as $developer_choice) {
              echo "<option value=\"{$developer_choice}\"";
              if($developer == $developer_choice) {
                echo " selected";
              }

              echo ">{$developer_choice}</option>";
            }
			
			echo $sql;
          ?>
		   </select>
			   
	<input type="submit" name="submit" value="Submit">
  </form>
    
	<?php
	
	
	  				
			 if ($resultCheck > 0) {
			 
			 	echo "<table>
                   <td>
				   <tr>
         	 ";
			 
			   while ($row = mysqli_fetch_assoc($result)) {
				 //  echo "<td>" ."<a href='index.php" . $row["title"] . $row['genre'] ."</a>" ."</td>" ;
				    echo "<td>" ;
				    echo   "<a href='game.php" . $row["title"] . "'>". "<h2>" . $row["title"] . "</h2>" . "<p>". $row['genre'] . "<br>" ."Critic Rating ". $row['critic_rating']. "</p>". "</a>"  ;
					echo "</td>" ;
			   }
			   
			     echo "  
				 </tr>
				 </td>
                     </table>";
					 
			 }				
	
	
	
	?>
	
	
	
	
	</div>
<br>




  </body>
  

</html>
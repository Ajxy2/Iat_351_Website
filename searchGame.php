<?php
   $dbhost = "localhost"; 
   $dbuser = "USER_NAME"; 
   $dbpass = ""; 
   $dbname = "videogame"; 
   
   
   
   $connection = @mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
   
   function format_model_name_as_link($title,$critic_rating,$page) {
    	echo "<a href=\"$page?title=$title\">$title, Critic Rating: $critic_rating</a> ";
    	}
   
   
   if(mysqli_connect_errno()) {
   die("Database connection failed: " .
        mysqli_connect_error() .
        " (" . mysqli_connect_errno() . ")"
   );
   }
   
   
   ?>
<html lang="en">
   <head>
      <title>Video Game Review</title>
      <link  rel="stylesheet"  href="css/style.css">
   </head>
   <header>
      <h1>
      Website Review
      <h1>
      <nav>
         <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="searchGame.php">Games</a></li>
            <li><a href="login.php">Login</a></li>
            <li><a href="register.php">Sign Up</a></li>
            <li><a href="settings.php">Settings</a></li>
			<li><a href="addgame.php">Add Game</a></li>
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
			$platform = $_POST['platform'] ?? 'Any';
			$lscore = $_POST['lowscore'] ?? 'Any';
			$hscore = $_POST['highscore'] ?? 'Any';
			
		if(empty($_POST['genre']) && empty($_POST['publisher']) && empty($_POST['developer'])) {	
                  
				  $sql  = "SELECT game.title, game.genre, game.critic_rating
           	   FROM game";
		}
			else 
			
			if($genre != "" || $publisher != "" || $developer !=  "" || $platform !=  "" || $lscore !=  "" || $hscore !=  "" ) {
				$sql = "SELECT * FROM game WHERE genre = '$genre' OR publisher = '$publisher' OR developer = '$developer' OR platform = '$platform' OR critic_rating >= '$lscore' 
				AND critic_rating <= '$hscore'";
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
			
			  <select name="platform">
            <?php
               $platform_choices = ['', '3DS', 'DS', 'GB', 'GBA', 'N64', 'PS2', 
               'PS4', 'SNES', 'WII', 'X360'];
               
               
               
               foreach($platform_choices as $platform_choice) {
                 echo "<option value=\"{$platform_choice}\"";
                 if($platform == $platform_choice) {
                   echo " selected";
                 }
               
                 echo ">{$platform_choice}</option>";
               }
               
               echo $sql;
               ?>
            </select>
			
			<br>
			   <label for="lowscore">Rating Greater than</label>
         <input type="text" id="lowscore" name="lowscore" value=" ">
		 
		  <label for="highscore">Rating Less than</label>
         <input type="text" id="highscore" name="highscore" value=" ">
			
			<br>
            <input type="submit" name="submit" value="Submit">
         </form>
         <?php
            if ($resultCheck > 0) {
            
            	echo "<table>
                           <td>
               <tr>
                 	 ";
            
              while ($row = mysqli_fetch_assoc($result)) {
            				  echo "<td>" ;
            	  format_model_name_as_link($row['title'], $row['critic_rating'],"game.php" );
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
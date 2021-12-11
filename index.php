<?php
   include('functions.php');
     $dbhost = "localhost"; 
     $dbuser = "USER_NAME"; 
     $dbpass = ""; 
     $dbname = "db_videogame"; 
   
   $connection = @mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
   
   function format_model_name_as_link($title,$name,$page) {
   	echo "<a href=\"$page?title=$title\">$title</a> ";
   	}
   
   ?>
<html lang="en">
   <head>
      <title>Video Game Review</title>
      <link  rel="stylesheet"  href="css/style.css">
   </head>
   <header>
      <h1>
      Video Game Reviews
      <h1>
      <nav>
         <ul>
            <li><a  href="index.php">Home</a></li>
            <li><a href="searchGame.php">Games</a></li>
            <li><a  href="login.php">Login</a></li>
            <li><a  href="register.php">Sign Up</a></li>
            <li><a  href="settings.php">Settings</a></li>
			<li><a href="addgame.php">Add Game</a></li>
         </ul>
      </nav>
   </header> 
   <body class="bodynew">
      <div class="gameList">
         <?php
            $sql  = "SELECT game.title, game.genre, game.critic_rating
              FROM game WHERE critic_rating > 70 LIMIT 10";
              
              $result = mysqli_query($connection,$sql);
            $resultCheck = mysqli_num_rows($result);
            
            if ($resultCheck > 0) {
             
             	echo "<table>     	 ";
               
               while ($row = mysqli_fetch_assoc($result)) {
            	         		 ?>
         <img src="videogame.jpg" alt="Game Image" style="width:400px;height:400px;">
         <?php
            echo "<tr>" ;
            echo "<td>";
            
            format_model_name_as_link($row['title'], $row['genre'],"game.php" );
            
            $row["title"];
            }
		    echo "</td>" ;
            echo "</tr>" ;
            
              echo "		
			</table>";
            }
                     
            ?>
      </div>
      <br>
   </body>
</html>
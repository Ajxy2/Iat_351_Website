<?php

  $dbhost = "localhost"; 
  $dbuser = "USER_NAME"; 
  $dbpass = ""; 
  $dbname = "videogame"; 

$connection = @mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);



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
	 <link  rel="stylesheet"  href="style5.css">
  </head>
  <header>
  <h1>Video Game Reviews<h1>
  <nav>
		<ul>
			<li><a  href="index.php">Home</a></li>
			<li><a href="searchGame.php">Games</a></li>
			<li><a  href="game.php">Login</a></li>
			<li><a  href="game.php">Sign Up</a></li>
		</ul>
	</nav>
	</header>
	
  </header>
  <body class="bodynew">


	<div class="gameList">
    <?php
	
	
		 $sql  = "SELECT game.title, game.genre, game.critic_rating
		   FROM game WHERE critic_rating > 70 LIMIT 10";
		   
		   $result = mysqli_query($connection,$sql);
		 $resultCheck = mysqli_num_rows($result);
		 
		 if ($resultCheck > 0) {
			 
			 	echo "<table>
                  
				 
         	 ";
			   echo "<tr>" ;
			  
			 
			   
			   while ($row = mysqli_fetch_assoc($result)) {
				
				  
					 ?>
			  <img src="videogame.jpg" alt="Girl in a jacket" style="width:400px;height:400px;">
			  <?php
					

				    echo   "<a href='game.php" . $row["title"] . "'>". "<h2>" . $row["title"] . "</h2>" . "<p>". $row['genre'] . "<br>" ."Critic Rating ". $row['critic_rating']. "</p>". "</a>"  ;
					
			   }
			   echo "</tr>" ;
			     echo "		
                     </table>";
		 }
               
    ?>
	
	</div>
<br>
  </body>
  

</html>
<?php
   $dbhost = "localhost"; 
   $dbuser = "USER_NAME"; 
   $dbpass = ""; 
   $dbname = "videogame"; 
   
   
   
   $connection = @mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
   
   
   
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
      <link  rel="stylesheet"  href="style5.css">
   </head>
   <header>
      <h1>
      Video Game Reviews
      <h1>
      <nav>
         <ul>
            <li><a  href="index.php">Home</a></li>
            <li><a href="searchGame.php">Games</a></li>
            <li><a  href="game.php">Login</a></li>
            <li><a  href="game.php">Sign Up</a></li>
         </ul>
      </nav>
   </header>
   </header>
   <body class="bodynew">
      <div class="gameList">
         <?php
            $sql  = "SELECT game.title, game.genre, game.critic_rating
              FROM game WHERE critic_rating > 70 LIMIT 10";
              
              $result = mysqli_query($connection,$sql);
            $resultCheck = mysqli_num_rows($result);
            
            if ($resultCheck > 0) {
             
             	echo "<table>
                           
            	 
                  	 ";
               echo "<tr>" ;
              
             
               
               while ($row = mysqli_fetch_assoc($result)) {
            	
            	  
            		 ?>
         <img src="videogame.jpg" alt="Girl in a jacket" style="width:400px;height:400px;">
         <?php
            echo   "<a href='game.php" . $row["title"] . "'>". "<h2>" . $row["title"] . "</h2>" . "<p>". $row['genre'] 
			. "<br>" ."Critic Rating ". $row['critic_rating']. "</p>". "</a>"  ;            
            }
            echo "</tr>" ;
            echo "		
                         </table>";
            
            }
               
            ?>
      </div>
      <br>
   </body>
</html>

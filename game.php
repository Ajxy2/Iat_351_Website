<?php
   include('functions.php');
   
   	    function format_model_name_as_link($title,$name,$page) {
   	echo "<a href=\"$page?title=$title\">$title</a> ";
   	}
	
   $code = trim($_GET['title']);
   
   $query_str = "SELECT * 
   			  FROM game
   			  WHERE title = ?"; 
			  
   			  
   $stmt = $db->prepare($query_str);
   $stmt->bind_param('s',$code);
   $stmt->execute();
   $stmt->bind_result($title,$platform,$release_date,$genre,$publisher,$critic_rating,$developer,$site_rating,$average_rating,$image);;
   

   ?>
<html lang="en">
    <head>
    <body>
   
  
      <?php
	  
         if($stmt->fetch()) {
         echo "<h3>$title</h3>\n";
         echo "<p>Genre: $genre, Platform: $platform, Release Date: $release_date, Developer: $developer, Critic Rating: $critic_rating, User Rating: $site_rating  </p>\n";
         }
		
		  	echo "<a href=\"discussion_thread.php?title=$title\">General Discussion</a> ";
		 ?>
		
    </body>
    </head>
</html>
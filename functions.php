<?php

session_start();
$db =  connectToDB('localhost', 'USER_NAME', '', 'videogame');



if(!empty($_SESSION['valid_user']))  {
    $current_user = $_SESSION['valid_user'];

}

function connectToDB($dbhost, $dbuser, $dbpass, $dbname) {
    $connection = @mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    //did connection occur database?
    if (mysqli_connect_errno()) {
        //quit and display error and error number
        die("Database connection failed:" .
            mysqli_connect_error() .
            " (" . mysqli_connect_errno() . ")"
        );
    }
    return $connection;
}


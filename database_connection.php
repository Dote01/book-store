<?php
//connection variables
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "books";


$db = new mysqli($hostname, $username, $password, $dbname);

if(!$db){
    echo "There was a problem with the database connection please try again later";
}

?>

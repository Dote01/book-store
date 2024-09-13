<?php
//database connection
include("database_connection.php");

$isbn = $_GET['isbn'];

$query = "DELETE FROM books WHERE isbn = $isbn";
$result = $db->query($query);

if(!$result){
    echo "There was an error with removing the book from the store, please try again later";
} else {
    header("Location:books.php");
}

?>
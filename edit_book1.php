<?php
//database connection
include("database_connection.php");

//capturing details and assign to variables
$isbn = $_POST['isbn'];
$author = $_POST['author'];
$title = $_POST['title'];
$price = $_POST['price'];
$old_isbn = $_POST['old_isbn'];

//exeting update query
$query = "UPDATE books SET isbn = '".$isbn."', author = '".$author."', title = '".$title."', price = '".$price."' WHERE isbn = '".$old_isbn."'";
$result = $db->query($query);

if(!$result){
    echo "There was a problem with updating the book details, please try again later";
} else{
    header("Location:books.php");
}



?>
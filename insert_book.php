<!DOCTYPE html>
<head>
<title>Book-O-Rama Book Entry Results</title>
</head>
<body>
    <h1>Book-O-Rama Book Entry Results</h1>

<?php

//database connection
include("database_connection.php");



//storing form details into variables
$isbn = $_POST["isbn"];
$author = $_POST["author"];
$title = $_POST["title"];
$price = $_POST["price"];



//query execution
$query = "INSERT INTO books(isbn, author, title, price) VALUES ('".$isbn."', '".$author."', '".$title."', '".$price."')";
$result = $db->query($query);

//ensurint query execution
if(!$result){
    echo "$db->error";
    echo "</br>There was an error with inserting new book to the database, please try again later";
} else {

echo "<p>Data inserted succsessfully</p>";
}
?>
</body>
</html>
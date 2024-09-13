<?php
//database connection
include("database_connection.php");

//getting the isbn
$isbn = $_GET["isbn"];

$query = "SELECT isbn, author, title, price FROM books WHERE isbn = $isbn";
$result = $db->query($query);

if (!$result) {
    echo "$db->error";
    echo "</br>There was an error with fetching the book details, please try again later";
}

$fetchedData = array();
while ($row = $result->fetch_assoc()) {
    $fetchedData[] = $row;
    $new_isbn = $row['isbn'];
    $author = $row['author'];
    $title = $row['title'];
    $price = $row['price'];
}


?>

<h1>Book-O-Rama Edit Book Details</h1>

<form action="edit_book1.php" method="POST">
    <label for="isbn">ISBN</label>
    <input type="number" name="isbn" value="<?php echo $new_isbn; ?>">
    <br><br>
    <label for="author">Author</label>
    <input type="text" name="author" value="<?php echo $author; ?>">
    <br><br>
    <label for="title">Title</label>
    <input type="text" name="title" value="<?php echo $title; ?>">
    <br><br>
    <label for="price">Price $</label>
    <input type="text" name="price" value="<?php echo $price; ?>">
    <br><br>
    <input type="hidden" name="old_isbn" value="<?php echo $new_isbn; ?>">
    <button type="submit">Update</button>
</form>
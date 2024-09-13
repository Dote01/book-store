<?php
//database connection
include("database_connection.php");

//query to select all books at the database
$query = "SELECT isbn, author, title, price FROM books";
$result = $db->query($query);

if(!$result){
    echo "There was a problem with fetching the list of the books please try again later";
}

//knowing the number of books at the store 
$num_rows = $result->num_rows;

if($num_rows > 0){
    $fetchedData = array();
    while($row = $result->fetch_assoc()){
    $fetchedData[] = $row;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book-O-Rama Books Store</title>
    <style>
        thead, tr, td{
            border: 1px solid black;
            padding: 10px;
        }
        table{
            border-collapse: collapse;
        }
        thead{
            font-weight: bolder;
            text-align: center;
        }
        a{
            text-decoration: none;
        }
    </style>
</head>
<body>
    <p>We have <?php echo $num_rows;  ?> books in the store</p>
<br><hr>
<table>
    <thead>
        <td>ISBN</td>
        <td>Author</td>
        <td>Title</td>
        <td>Price</td>
        <td colspan="2">Action</td>
    </thead>
    <?php foreach($fetchedData as $row): ?>
    <tr>
        <td><?php echo $row["isbn"] ?></td>
        <td><?php echo $row["author"] ?></td>
        <td><?php echo $row["title"] ?></td>
        <td><?php echo $row["price"] ?></td>
        <td><a href="edit_book.php?isbn=<?php echo $row['isbn']; ?>">Edit</a></td>
        <td><a href="delete_book.php?isbn=<?php echo $row['isbn']; ?>">Delete</a></td>
    </tr>
    <?php endforeach ?>
</table>
</body>
</html>
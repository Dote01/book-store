<?php
//database connection
include("database_connection.php");

//getting the isbn
$isbn = $_GET["isbn"];

//query to get the book details
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book Details</title>
    <style>
        /* General Styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h1 {
            text-align: center;
            font-size: 2em;
            color: #343a40;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        label {
            font-size: 1.1em;
            color: #343a40;
        }

        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            font-size: 1em;
            box-sizing: border-box;
        }

        button {
            padding: 12px 20px;
            background-color: #007bff;
            color: white;
            font-size: 1.1em;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }

        /* Responsive */
        @media (max-width: 600px) {
            .container {
                padding: 15px;
            }

            h1 {
                font-size: 1.8em;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Edit Book Details</h1>
        <form action="edit_book1.php" method="POST">
            <label for="isbn">ISBN</label>
            <input type="number" name="isbn" value="<?php echo $new_isbn; ?>" required>

            <label for="author">Author</label>
            <input type="text" name="author" value="<?php echo $author; ?>" required>

            <label for="title">Title</label>
            <input type="text" name="title" value="<?php echo $title; ?>" required>

            <label for="price">Price $</label>
            <input type="text" name="price" value="<?php echo $price; ?>" required>

            <input type="hidden" name="old_isbn" value="<?php echo $new_isbn; ?>">
            <button type="submit">Update</button>
        </form>
    </div>

</body>
</html>

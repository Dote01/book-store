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
      
               /* General Styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            font-size: 2.5em;
            color: #343a40;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        /* Table Styling */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-size: 16px;
        }

        table, th, td {
            border: 1px solid #dee2e6;
        }

        th, td {
            padding: 12px 15px;
            text-align: center;
        }

        th {
            background-color: #007bff;
            color: white;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #e2e6ea;
        }

        td {
            color: #495057;
        }

        /* Button Styling */
        .action-btn {
            text-decoration: none;
            color: white;
            padding: 8px 12px;
            border-radius: 4px;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .edit-btn {
            background-color: #28a745;
        }

        .edit-btn:hover {
            background-color: #218838;
        }

        .delete-btn {
            background-color: #dc3545;
        }

        .delete-btn:hover {
            background-color: #c82333;
        }

        /* Responsive */
        @media screen and (max-width: 768px) {
            table, th, td {
                display: block;
                width: 100%;
            }

            th, td {
                box-sizing: border-box;
            }

            th {
                text-align: left;
                background-color: #f8f9fa;
                color: #212529;
                border: none;
                font-weight: bold;
            }

            td {
                margin-bottom: 10px;
                padding-left: 20px;
                padding-right: 20px;
                position: relative;
            }

            td:before {
                content: attr(data-label);
                position: absolute;
                left: 0;
                padding-left: 10px;
                color: #6c757d;
                font-weight: bold;
            }

            .container {
                padding: 15px;
            }
        }
    </style>
</head>
<body>
<div class="container">
        <h1>Book Store</h1>
        <p>We have <strong><?php echo $num_rows; ?></strong> books in the store</p>

        <table>
            <thead>
                <tr>
                    <th>ISBN</th>
                    <th>Author</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($fetchedData as $row): ?>
                <tr>
                    <td data-label="ISBN"><?php echo $row["isbn"]; ?></td>
                    <td data-label="Author"><?php echo $row["author"]; ?></td>
                    <td data-label="Title"><?php echo $row["title"]; ?></td>
                    <td data-label="Price">$<?php echo $row["price"]; ?></td>
                    <td data-label="Edit">
                        <a href="edit_book.php?isbn=<?php echo $row['isbn']; ?>" class="action-btn edit-btn">Edit</a>
                    </td>
                    <td data-label="Delete">
                        <a href="delete_book.php?isbn=<?php echo $row['isbn']; ?>" class="action-btn delete-btn" onclick="return confirm('Are you sure you want to delete this book?')">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
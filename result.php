<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book-O-Rama Search Result</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }

        .result-item {
            background-color: #f9f9f9;
            padding: 15px;
            margin-bottom: 20px;
            border-left: 5px solid #007bff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        }

        .result-item strong {
            color: #007bff;
        }

        p {
            line-height: 1.6;
            font-size: 16px;
        }

        .back-btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .back-btn:hover {
            background-color: #0056b3;
        }

    </style>
</head>

<body>
    <div class="container">
        <h1>Book-O-Rama Search Result</h1>

        <?php
        // Create short variable names
        $searchtype = $_POST["searchtype"];
        $searchterm = $_POST["searchterm"];

        if (!$searchtype || !$searchterm) {
            echo '<p>You have not entered search details. Please <a href="javascript:history.back()">go back</a> and try again.</p>';
            exit;
        }

        // Escape special characters
        $searchterm = addslashes($searchterm);
        $searchtype = addslashes($searchtype);

        // Connect to the database
        $db = new mysqli('localhost', 'root', '', 'books');

        if ($db->connect_error) {
            echo "<p>Error: Could not connect to database. Please try again later.</p>";
            exit;
        }

        // Query the database
        $query = "SELECT * FROM BOOKS WHERE $searchtype LIKE '%$searchterm%'";
        $result = $db->query($query);

        // Get number of results
        $num_results = $result->num_rows;

        // Check if there are results
        if ($num_results > 0) {
            for ($i = 0; $i < $num_results; $i++) {
                $row = $result->fetch_assoc();
                echo '<div class="result-item">';
                echo "<p><strong>" . ($i + 1) . ". Title: " . htmlspecialchars(stripslashes($row['title'])) . "</strong><br />";
                echo "Author: " . htmlspecialchars(stripslashes($row['author'])) . "<br>";
                echo "ISBN: " . htmlspecialchars(stripslashes($row['isbn'])) . "<br>";
                echo "Price: $" . htmlspecialchars(stripslashes($row['price'])) . "</p>";
                echo '</div>';
            }
        } else {
            echo '<p>No results found for your search.</p>';
        }

        $result->free();
        $db->close();
        ?>
        
        <a href="javascript:history.back()" class="back-btn">Go Back</a>
    </div>
</body>
</html>

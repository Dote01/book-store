<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book-O-Rama - New Book Entry</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
            font-size: 24px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
            font-size: 16px;
        }

        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }

        button {
            width: 100%;
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <div class="form-container">
        <h1>Book-O-Rama - New Book Entry</h1>
        <form action="insert_book.php" method="POST">
            <label for="isbn">ISBN</label>
            <input type="number" name="isbn" placeholder="Enter ISBN" required>

            <label for="author">Author</label>
            <input type="text" name="author" placeholder="Enter Author Name" required>

            <label for="title">Title</label>
            <input type="text" name="title" placeholder="Enter Book Title" required>

            <label for="price">Price ($)</label>
            <input type="number" name="price" placeholder="Enter Book Price" required>

            <button type="submit">Add New Book</button>
        </form>
    </div>

</body>
</html>

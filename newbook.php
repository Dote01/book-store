<html>
    <head>
        <title>Book-O-Rama - New Book Entry</title>
    </head>
    <h1>Book-O-Rama - New Book Entry</h1>
    <body>
        <form action="insert_book.php" method="POST">
            <label for="isbn">ISBN</label>
            <input type="number" name="isbn">
            <br><br>
            <label for="author">Author</label>
                <input type="text" name="author">
                <br><br>
                <label for="title">Title</label>
                <input type="text" name="title">
                <br><br>
                <label for="price">Price $</label>
                <input type="number" name="price">
                <br><br>
                <button type="submit">Add New Book</button>
        </form>
    </body>
</html>
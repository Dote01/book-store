<html>
    <head>
        <title>Book-O-Rama Search Result</title>
    </head>

    <body>
        <h1>Book-O-Rama Search Result</h1>

        <?php
//create short variable names 
$searchtype = $_POST["searchtype"];
$searchterm = $_POST["searchterm"];


if(!$searchtype || !$searchterm){
    echo 'You have not entered search details. Please go back and try again';
}

    $searchterm = addslashes($searchterm);
    $searchtype = addslashes($searchtype);

$db = new mysqli('localhost', 'root', '', 'books');

if(!$db){
echo "Error: Could not connect to database please try again later"; 
}

$query = "SELECT * FROM BOOKS WHERE ".$searchtype." LIKE '%".$searchterm."%'";
$result = $db->query($query);

$num_results = $result->num_rows;

for ( $i = 0; $i < $num_results; $i++){
    $row = $result->fetch_assoc();
    echo "<p><strong>".($i+1).". Title: ";
    echo htmlspecialchars(stripslashes($row['title']));
    echo "</strong><br />Author: ";
    echo stripslashes($row['author']);
    echo "<br> ISBN: ";
    echo stripslashes(($row['isbn']));
    echo "<br>Price: ";
    echo stripslashes($row['price']);
    echo "</p>"; 
}

$result->free();
$db->close();


?>

    </body>
</html>





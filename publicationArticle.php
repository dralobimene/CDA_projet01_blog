
<?php

// Connect to the database
$db = new mysqli('localhost', 'root', 'rootmdp', 'CDABlog');

// Fetch the record from the tableAdm table where name = 'laurent'
$query = "SELECT * FROM tableAdm WHERE name = 'laurent'";
$result = $db->query($query);
$row = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Publication Article</title>
</head>
<body>
    <h1>Publication Article</h1>

    <p>
<?php

//
session_start();

//
if(isset($_SESSION['name'])) {
    echo "Welcome, " . $_SESSION['name'];
    echo "<br>";
} else {
    echo "You are not logged in.";
    echo "<br>";
}

if ($conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {

    //
    if($row['name'] === "laurent") {
        echo "Bonjour ".$row['name'];
        echo "<br>";
        echo "Vs pvez publier";
        echo "<br>";

        echo "<form method='post' action='publicationArticle02.php'>";
        echo "<label for='title'>Title</label>";
        echo "<br>";
        echo "<input type='text' id='title' name='title'>";
        echo "<br>";

        echo "<label for='content'>Content</label>";
        echo "<br>";
        echo "<input type='text' id='content' name='content'>";
        echo "<br>";
        echo "<input type='submit' value='Submit'>";
        echo "</form>";                

        mysqli_close($conn);


    } else {
        echo "Vs ne pvez pas publier";
        echo "<meta http-equiv='refresh' content='2; url=index.php' />";
    }
}

?>
    </p>

</body>
</html>

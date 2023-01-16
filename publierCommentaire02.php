

<?php

// Connect to the database
$conn = new mysqli('localhost', 'root', 'rootmdp', 'CDABlog');

?>

<!DOCTYPE html>
<html>
<head>
    <title>Publication commentaire 02</title>
</head>
<body>
    <h1>Publication commentaire 02</h1>

    <p>
<?php

//
$date = new DateTime();
$date = $date->format('Y-m-d H:i:s');

//
$content = $_POST["content"];
echo "valeur de Scontent: ".$content;
echo "<br>";
echo "c'est le contenu du commentaire qui va etre publié";
echo "<br>";

//
$id = $_POST["id"];
echo "valeur de Sid: ".$id;
echo "<br>";
echo "c'est l'id de l'article";
echo "<br>";

/*
// Insert the data into the database
$sql = "INSERT INTO tableComentary (content, createdAt)
    VALUES ('$content', '$date')";
 */
// 1° = id de l'user
// 2° = id du commentaire
// 3° = id de l'article
// $sql = "INSERT INTO tableRelationUserComentary (tableUserId, tableComentaryId, tableArticleId) VALUES (2, 4, 5)";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
    echo "<br>";
    echo "<a href='index.php'>retour index</a>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>

</body>

</html>



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
$idArticle = $_POST['id'];
echo "valeur de l'id de l'article concerné. l'id doit etre inséré ds la table associative:";
echo "<br>";
echo $idArticle;
echo "<br>";

//
$content = $_POST["content"];
echo "valeur de Scontent: ".$content;
echo "<br>";
echo "c'est le contenu du commentaire qui va etre publié";
echo "<br>";
echo "<br>";

//
$date = new DateTime();
$date = $date->format('Y-m-d H:i:s');
echo "valeur de la date pr la colonne createdAt de la table tableComentary: ".$date;
echo "<br>";

// Retrieve the nameComenter values from the $_POST array
$nameComenters = $_POST['nameComenter'];

// Check if the nameComenter values were passed through the form
if(isset($nameComenters)) {
    // Loop through each value and display it
    foreach($nameComenters as $nameComenter) {
        echo "Commenter name: ".$nameComenter."<br>";
    }
} else {
    echo "No nameComenter values were passed through the form.";
}

// obtenir la valeur de $data['id'] issue de la page
// publierCommentaire01.php
$idArticle = $_POST['idArticle'];
echo "Affiche l'id de l'article qui est concerné par la future publication de ce commentaire";
echo "<br>";
echo "The id of the article is: " . $idArticle;
echo "<br>";

// Retrieve the idComenter values from the $_POST array
$idComenters = $_POST['idComenter'];

// Check if the idComenter values were passed through the form
if(isset($idComenters)) {
    // Loop through each value and display it
    foreach($idComenters as $idComenter) {
        echo "Commenter ID: ".$idComenter."<br>";
    }
} else {
    echo "No idComenter values were passed through the form.";
}


/*
//
$id = $_POST["id"];
echo "valeur de Sid: ".$id;
echo "<br>";
echo "c'est l'id de l'article";
echo "<br>";
 */

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

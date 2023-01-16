<?php

// Connect to the database

// format MySQL
$dsn = 'mysql:host=localhost;dbname=CDABlog;charset=utf8mb4';

// format PostGreSQL
// $dsn = 'pgsql:host=localhost;port=5432;dbname=mydatabase;user=dbuser;password=dbpass';

// format SQLite
// $dsn = 'sqlite:/path/to/mydatabase.sqlite';

// format oracle
// $dsn = 'oci:dbname=//hostname:port/sid';

// format MS SQL Server (Using ODBC):
// $dsn = 'odbc:Driver={SQL Server};Server=localhost;Database=mydatabase';

$username = "root";
$password = "rootmdp";
$db = "CDABlog";

try {
    $pdo = new PDO($dsn, $username, $password);
} catch (PDOException $except) {
    echo 'Connection failed: ' . $except->getMessage();
    exit;
}

//
$answers = array();

?>

<!DOCTYPE html>
<html>
<head>
    <title>liste des articles</title>
</head>
<body>
    <h1>liste des articles</h1>

<?php

// Prepare the SELECT statement
$stmt = $pdo->prepare('SELECT * FROM tableArticle WHERE isPublished = true;');

// Execute the statement
$stmt->execute();

// Fetch the data
$data = $stmt->fetchAll();

// Iterate through the data and display the values

// =================================================================================
//
echo '<form method="post">';
// Assume $data is an array containing the rows of data
foreach ($data as $row) {
    echo "<br>";
    echo $row['title'];
    echo "<br>";
    echo "Content: " . $row['content'] . "<br>";
    echo "Created At: " . $row['createdAt'] . "<br>";
    echo "Published At: " . $row['publishedAt'] . "<br>";
    echo "Is Published: " . $row['isPublished'] . "<br>";
    echo "<br>";

    // =================================================================================
    // Afficher le nbre de commentaires d'1 article particulier
    
    //
    $articleId = $row['id'];
    
    //
    echo "l'id de cet article est: ";
    echo "<br>";
    echo $articleId;
    echo "<br>";

    // Prepare the SELECT statement
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM tableRelationUserComentary WHERE tableArticleId = :articleId");
    $stmt->bindParam(':articleId', $articleId);

    // Execute the statement
    $stmt->execute();

    // Get the number of rows returned
    $count = $stmt->fetchColumn();

    // Afficher le nbre de commentaires d'1 article particulier
    if ($count > 0) {
        echo "Article has comments. Exactly: ".$count;
        echo "<br>";
    } else {
        echo "Article has no comments.";
    }

    // ====================================================================================

    /*
    $stmt = $pdo->prepare("SELECT tableRelationUserComentary.tableComentaryId, tableComentary.content FROM tableRelationUserComentary INNER JOIN tableComentary ON tableRelationUserComentary.tableComentaryId = tableComentary.id WHERE tableArticleId = :articleId");
    $stmt->bindParam(':articleId', $articleId);
    $stmt->execute();
    $comments = $stmt->fetchAll();

    foreach ($comments as $comment) {
        echo "Comment ID: " . $comment['tableComentaryId'] . "<br>";
        echo "Comment Content: " . $comment['content'] . "<br>";
    }
     */

    $stmt = $pdo->prepare("SELECT tableRelationUserComentary.tableComentaryId, tableComentary.content FROM tableRelationUserComentary INNER JOIN tableComentary ON tableRelationUserComentary.tableComentaryId = tableComentary.id WHERE tableRelationUserComentary.tableArticleId = :articleId");
    $stmt->bindParam(':articleId', $articleId);
    $stmt->execute();
    $comments = $stmt->fetchAll();

    foreach ($comments as $comment) {
        echo "Comment ID: " . $comment['tableComentaryId'] . "<br>";
        echo "Comment Content: " . $comment['content'] . "<br>";
    }
    // ====================================================================================
    /*
    $stmt = $pdo->prepare('SELECT tableComentary.content FROM tableComentary INNER JOIN tableRelationUserComentary ON tableComentary.id = tableRelationUserComentary.tableComentaryId WHERE tableRelationUserComentary.tableComentaryId = :articleId');
    $stmt->bindParam(':articleId', $articleId);
    $stmt->execute();

    $contents= $stmt->fetchAll();

    //
    foreach ($contents as $content) {
        echo "Comentary content: " . $content['tableComentaryContent'];
        echo "<br>";
    }

    echo "<br>";
     */
    // =================================================================================
    echo "<br>";
    echo "<a href='publierCommentaire01.php?id=".$row['id']."'>Publiez 1 commentaire</a>";
    echo "<br>";
    echo "<br>";
    echo "<hr>";
    echo "<hr>";
    echo "<hr>";
}

?>

</body>

</html>

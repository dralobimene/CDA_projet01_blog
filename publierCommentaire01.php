

<!DOCTYPE html>
<html>
<head>
    <title>Publier commentaire</title>
</head>
<body>
    <h1>Publier commentaire</h1>

    <p>
<?php

// Connect to the database
$dsn = 'mysql:host=localhost;dbname=CDABlog;charset=utf8mb4';
$username = "root";
$password = "rootmdp";

try {
    $pdo = new PDO($dsn, $username, $password);
} catch (PDOException $except) {
    echo 'Connection failed: ' . $except->getMessage();
    exit;
}

if(isset($_GET['id'])){
    $id = $_GET['id'];
    echo "Vs vs apprêtez à publier 1 commentaire pr l'article: ".$id;
    echo "<br>";
    echo "Le rédacteur de l'article est: ";
    echo "<br>";

    // ==============================================================================================
    // Prepare the SELECT statement to get the author
    // Presente 1 probleme.
    // Fonctionne correctement car on a qu'1 seul administrateur qui publie les articles
    // ms si on doit en avoir 2, la valeur "1" devra etre 1 parametre... Lequel?
    $stmt = $pdo->prepare('SELECT tableAdm.name FROM tableRelationAdmArticle INNER JOIN tableAdm ON tableRelationAdmArticle.tableAdmId = tableAdm.id WHERE tableRelationAdmArticle.tableAdmId = 1');
    $stmt->execute();

    $author = $stmt->fetchColumn();
    echo $author;

    echo "<br>";
    
    // ==============================================================================================
    // Prepare the SELECT statement to get the title of the article
    $stmt = $pdo->prepare('SELECT title FROM tableArticle WHERE id = :id');
    $stmt->execute(['id' => $id]);

    $title = $stmt->fetchColumn();
    echo "Article title: ";
    echo "<br>";
    echo $title;
    echo "<br>";

    // ==============================================================================================
    // Prepare the SELECT statement to get the content of the article
    $stmt = $pdo->prepare('SELECT content FROM tableArticle WHERE id = :id');
    $stmt->execute(['id' => $id]);

    $content = $stmt->fetchColumn();
    echo "Article content: ";
    echo "<br>";
    echo $content;
    echo "<br>";
    
    // ==============================================================================================
    // Prepare the SELECT statement to get the createdAt of the article
    $stmt = $pdo->prepare('SELECT createdAt FROM tableArticle WHERE id = :id');
    $stmt->execute(['id' => $id]);

    $createdAt = $stmt->fetchColumn();
    echo "Article createdAt: ";
    echo "<br>";
    echo $createdAt;
    echo "<br>";
    
    // ==============================================================================================
    // Prepare the SELECT statement to get the publishedAt of the article
    $stmt = $pdo->prepare('SELECT publishedAt FROM tableArticle WHERE id = :id');
    $stmt->execute(['id' => $id]);

    $publishedAt = $stmt->fetchColumn();
    echo "Article publishedAt: ";
    echo "<br>";
    echo $publishedAt;
    echo "<br>";
    
    // ==============================================================================================
    // Prepare the SELECT statement to get the isPublished of the article
    $stmt = $pdo->prepare('SELECT isPublished FROM tableArticle WHERE id = :id');
    $stmt->execute(['id' => $id]);

    $isPublished = $stmt->fetchColumn();
    echo "Article isPublished: ";
    echo "<br>";
    echo $isPublished;
    echo "<br>";

    // ==============================================================================================
    echo "<br>";
    echo "<br>";
    echo "<form method='post' action='publierCommentaire02.php'>";

    echo "<label for='content'>Content</label>";
    echo "<br>";
    echo "<input type='text' id='content' name='content'>";
    echo "<br>";

    echo "<label for='createdAt'>CreatedAt</label>";
    echo "<br>";
    echo "<input type='text' id='createdAt' name='createdAt'>";
    echo "<br>";

    echo "<br>";
    echo "<br>";
    echo "<input type='submit' value='Submit'>";
    echo "</form>";
}else{
    echo "No id passed";
}

?>
    </p>

</body>
</html>

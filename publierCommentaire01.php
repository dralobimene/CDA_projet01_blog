

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

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $pdo->prepare("SELECT tableArticle.* FROM tableArticle WHERE id = ?");
    $stmt->execute([$_GET['id']]);
    $data = $stmt->fetch();
    if ($data){
        echo "Article title: " . $data['title'] . "<br>";
        echo "Article content: " . $data['content'] . "<br>";
        echo "Article createdAt: " . $data['createdAt'] . "<br>";
        echo "Article publishedAt: " . $data['publishedAt'] . "<br>";
        echo "Article isPublished: " . $data['isPublished'] . "<br>";

        // Check for comments
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM tableRelationUserComentary WHERE tableArticleId = ?");
        $stmt->execute([$_GET['id']]);
        $commentsCount = $stmt->fetchColumn();

        if($commentsCount > 0){
            // display comments here
            echo "There are ".$commentsCount." comments for this article";
        }else{
            echo "There is no comment for this article";
        }
    } else {
        echo "No article found with this ID";
    }

} else {
    echo "No id passed";
}

?>
    </p>

</body>
</html>

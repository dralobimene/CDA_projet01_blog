

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

    // ===============================================================================================

    // trouver quel id donné à ce nouveau commentaire.
    // ce sera le dernier ergt de la table tableComentary
    $stmt = $pdo->prepare("SELECT * FROM tableComentary ORDER BY id DESC LIMIT 1");
    $stmt->execute();
    $lastRecord = $stmt->fetchColumn();

    // afficher l'id du dernier commentaire de la table table Comentary
    // ns servira qd on devra inserer cette valeur ds la table associative
    echo "<br>";
    echo "la valeur du dernier id de la table tableComentary est: ".$lastRecord; 
    echo "<br>";
    echo "<br>";

    // ===============================================================================================
    
    // 
    $stmt = $pdo->prepare("SELECT tableArticle.* FROM tableArticle WHERE id = ?");
    $stmt->execute([$_GET['id']]);
    $data = $stmt->fetch();
    if ($data){
        echo "Article id: " . $data['id'] . "<br>";
        echo "Article title: " . $data['title'] . "<br>";
        echo "Article content: " . $data['content'] . "<br>";
        echo "Article createdAt: " . $data['createdAt'] . "<br>";
        echo "Article publishedAt: " . $data['publishedAt'] . "<br>";
        echo "Article isPublished: " . $data['isPublished'] . "<br>";

        // Check for comments
        // 01 $stmt = $pdo->prepare("SELECT COUNT(*) FROM tableRelationUserComentary WHERE tableArticleId = ?");
        // $stmt = $pdo->prepare("SELECT * FROM tableRelationUserComentary WHERE tableArticleId = ?");
        // $stmt = $pdo->prepare("SELECT tableRelationUserComentary.*, tableComentary.* FROM tableRelationUserComentary JOIN tableComentary ON tableRelationUserComentary.tableComentaryId = tableComentary.id WHERE tableRelationUserComentary.tableArticleId = ?");
        $stmt = $pdo->prepare("SELECT tableRelationUserComentary.*, tableComentary.*, tableUser.* FROM tableRelationUserComentary JOIN tableComentary ON tableRelationUserComentary.tableComentaryId = tableComentary.id JOIN tableUser ON tableRelationUserComentary.tableUserId = tableUser.id WHERE tableRelationUserComentary.tableArticleId = ?");

        $stmt->execute([$_GET['id']]);
        // 01 $commentsCount = $stmt->fetchColumn();
        $commentsCount = $stmt->fetchAll();

        // ===============================================================================================

        if(count($commentsCount) > 0) {
            // display comments here
            echo "There are ".count($commentsCount)." comments for this article";
            echo "<br>";

            // tableau pr enregistrer le nom des commentateurs
            $tabNameComenters = array();
            // tableau pr enregistrer l'id des commentateurs
            $tabIdComenters = array();

            // ===============================================================================================

            // boucle qui
            // 1 - affiche les infos
            // -- id de chaque commentaire deja publié et lié à cet article
            // -- nom et id du commentateur de chaque commentaire deja publie et lié a cet article
            // -- le contenu de chaque commentaire deja publie et lie à cet article
            foreach($commentsCount as $comment) {
                echo "Comment ID: ".$comment['tableComentaryId']."<br>";
                echo "Commenter name: ".$comment['name'].", and id: ".$comment['id']."<br>";
                echo "Comment Content: ".$comment['content']."<br>";

                // on ajoute le nom et l'id de chaque commentateur des commentaires déja publiés
                // pr cet article. Le nom a servi de test ms l'id des commentateurs est necessaire
                // pr etre inséré ds la table associative

                // ne sert que de test
                // on ajoute le nom des commentateurs au tableau $tabNameComenters
                array_push($tabNameComenters, $comment['name']);
                // on ajoute l'id des commentaeurs au tableau $tabIdComenters
                array_push($tabIdComenters, $comment['id']);
            }

            echo "<br>";
            echo "valeur de Sdata[id]: ".$data['id'];
            echo "<br>";

            // =================================================================================

            // Afficher 1 formulaire pr inserer ds la DB 1 commentaire
            echo '<form action="publierCommentaire02.php" method="post">';
            echo '<label for="content">Your comment:</label>';
            echo "<br>";
            echo '<textarea name="content" id="content"></textarea>';
            echo "<br>";

            // chatGPT dit, ok bonne syntaxe
            // 1 hidden input field pr passer l'id de l'article concerné à la prochaine page
            echo "<input type='hidden' name='idArticle' value='".$data['id']."'>";

            // ne sert que de test
            // boucle pr creer des hidden input fields pr passer le $tabNameComenters en POST
            foreach($tabNameComenters as $nameComenter) {
                echo '<input type="hidden" name="nameComenter[]" value="'.$nameComenter.'">';
            }

            // boucle pr creer des hidden input fields pr passer le $tabIdComenters en POST
            foreach($tabIdComenters as $idComenter) {
                echo '<input type="hidden" name="idComenter[]" value="'.$idComenter.'">';
            }

            echo '<input type="submit" value="Submit Comment">';
            echo '</form>';
            
            // =================================================================================
        
        } else {
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

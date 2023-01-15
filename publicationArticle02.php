
<?php

// Connect to the database
$conn = new mysqli('localhost', 'root', 'rootmdp', 'CDABlog');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Publication Article 02</title>
</head>
<body>
    <h1>Publication Article 02</h1>

    <p>
<?php

// =============================================================================================
function checkInputFields() {
    $inputs = [
        'title' => $_POST['title'],
        'content' => $_POST['content'],
        // 'createdAt' => $_POST['createdAt'],
        // 'publishedAt' => $_POST['publishedAt'],
        // 'isPublished' => $_POST['isPublished']
    ];

    /*
    echo "var_dump";
    echo "<br>";
    var_dump($inputs);
    echo "<br>";
    */

    foreach ($inputs as $input) {
        if (empty($input)) {
            return false;
        }
    }
    return true;
}
// =============================================================================================

//
$date = new DateTime();
$date = $date->format('Y-m-d H:i:s');

// Get the form data
$title = $_POST["title"];
$content = $_POST["content"];
$createdAt = $date;
$publishedAt = $date;
$isPublished = 1;

//
$sql = "SELECT * FROM tableArticle;";

if (mysqli_query($conn, $sql)) {
    // 
    if(checkInputFields()) {
        // Insert the data into the database
        $sql02 = "INSERT INTO tableArticle (title, content, createdAt, publishedAt, isPublished)
            VALUES ('$title', '$content', '$date', '$date', '$isPublished')";

        if(mysqli_query($conn, $sql02)) {
            echo "<br>";
            echo " nvel ergt cree avec succés";
            echo "<br>";
        } else {
            echo "erreur prog 03";
        }
    } else {
        echo "<br>";
        echo "Au - 1 des champs est vide";
        echo "<br>";
        echo "Aucun ergt effectué";
        echo "<br>";
        if($title == "" || !isset($title) || $title == null) {
            echo "<br>";
            echo "Stitle n'existe pas";
            echo "<br>";
        }
        if($content == "" || !isset($content) || $content == null) {
            echo "<br>";
            echo "Scontent n'existe pas";
            echo "<br>";
        }
        if($createdAt == "" || !isset($createdAt) || $createdAt == null) {
            echo "<br>";
            echo "ScreatedAt n'existe pas";
            echo "<br>";
        }
        if($publishedAt == "" || !isset($publishedAt) || $publishedAt == null) {
            echo "<br>";
            echo "SpublishedAt n'existe pas";
            echo "<br>";
        }
        if($isPublished == "" || !isset($isPublished) || $isPublished == null) {
            echo "<br>";
            echo "SisPublished n'existe pas";
            echo "<br>";
        }

    }
} else {
    echo "Erreur prog 02: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>

</body>

</html>

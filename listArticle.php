<?php

// Connect to the database

// format MySQL
$dsn = 'mysql:host=localhost;dbname=CDABlog;charset=utf8mb4';

// format PostGressSQL
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
            // echo "<a href='publierCommentaire01.php'>Publiez 1 commentaire</a>";
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

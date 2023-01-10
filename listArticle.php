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
        // TEST 01
        /* 
        foreach ($data as $row) {
            
            echo "<form method='post'>";
            echo '<input type="checkbox" name="answer" value="' . $row['id'] . '">';
            echo "<br>";
            // echo '</form>';

            echo "Title: " . $row['title'] . "<br>";
            echo "Content: " . $row['content'] . "<br>";
            echo "Created At: " . $row['createdAt'] . "<br>";
            echo "Published At: " . $row['publishedAt'] . "<br>";
            echo "Is Published: " . $row['isPublished'] . "<br><br>";
            // echo "</form>";
                        
        }

        echo '<br>';
        echo '<input type="submit" name="submit" value="Submit">';
        echo "</form>";

        if(isset($_POST['submit'])){
            if(isset($_POST['answer'])){
                array_push($answers, $_POST['answer']);
            }
            echo '<br>';
            echo 'Answers: ' . count($answers);
        }
        */
        // =================================================================================
        // TEST 02
        echo '<form method="post">';
        // Assume $data is an array containing the rows of data
        foreach ($data as $row) {
            echo "<br>";
            echo $row['title'];
            echo "<br>";
            echo "Content: " . $row['content'] . "<br>";
            echo "Created At: " . $row['createdAt'] . "<br>";
            echo "Published At: " . $row['publishedAt'] . "<br>";
            echo "Is Published: " . $row['isPublished'] . "<br><br>";

        }
        
        /*
        echo '<br>';
        echo '<input type="submit" name="submit" value="Submit">';
        echo '</form>';

        if(isset($_POST['submit'])){
            $selected_ids = $_POST['id'];
            echo 'Selected ids: ' . implode(',', $selected_ids);
        }
         */

        // =================================================================================
        
        /*
        echo '<br>';
        echo 'Answers: ';
        print_r($answers);
         */

        ?>

</body>

</html>

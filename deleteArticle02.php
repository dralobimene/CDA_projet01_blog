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

echo "page deleteArticle02.php";
echo "<br>";

                // Get the form data
                /*
                $array = $_POST["answers"];
                echo "nbre d'elts ds le tableau answers";
                echo "<br>";
                echo count($array);
                 */
                
                if(isset($_POST['submit'])){
                    $selected_ids = $_POST['id'];
                    //Do something with the selected ids
                    echo "<br>";
                    echo "nbre d'elts ds le tableau";
                    echo "<br>";
                    echo count($selected_ids);
                    echo "<br>";
                    echo 'Selected ids: ' . implode(',', $selected_ids);

                    $stmt = $pdo->prepare("DELETE FROM tableArticle WHERE id = ?");
                    for($i= 0; $i < count($selected_ids); $i++){
                        $stmt->execute([$selected_ids[$i]]);
                    }

                    echo "<br>";
                    echo "Rows with the selected ids have been deleted";

                    }
?>

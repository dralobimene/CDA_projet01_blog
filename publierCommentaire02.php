

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

                // Get the form data
               
                $content = $_POST["content"];
                echo $content;
                echo "<br>";
                
                $createdAt = $_POST["createdAt"];
                echo $createdAt;
                echo "<br>";
              
                // Insert the data into the database
                $sql = "INSERT INTO tableComentary (content, createdAt)
                VALUES ($content', '$createdAt')";

                if (mysqli_query($conn, $sql)) {
                    echo "New comentary created successfully";
                    echo "<br>";
                    echo "<a href='index.php'>retour index</a>";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
                
                mysqli_close($conn);
?>

</body>

</html>
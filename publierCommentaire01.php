

<?php

// Connect to the database
$db = new mysqli('localhost', 'root', 'rootmdp', 'CDABlog');

// Fetch the record from the tableAdm table where name = 'laurent'
$query = "SELECT * FROM tableComentary";
$result = $db->query($query);
$row = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Publication Article</title>
</head>
<body>
	<h1>Publication Article</h1>

    <p>
        <?php

        if ($conn) {
            die("Connection failed: " . mysqli_connect_error());
        } else {
            /*
            if($row['name'] === "laurent") {
                echo "Bonjour ".$row['name'];
                echo "<br>";
                echo "Vs pvez publier";
                echo "<br>";
            */
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
                } else {
                  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
                
                mysqli_close($conn);
                
            /*
            } else {
                echo "Vs ne pvez pas publier";
                // echo "<meta http-equiv='refresh' content='1; url=index.php' />
            }
             */
        }

            ?>
    </p>

</body>
</html>

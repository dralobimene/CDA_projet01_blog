
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

                 // Get the form data
                $title = $_POST["title"];
                echo $title;
                echo "<br>";
                
                $content = $_POST["content"];
                echo $content;
                echo "<br>";
                
                $createdAt = $_POST["createdAt"];
                echo $createdAt;
                echo "<br>";
                
                $publishedAt = $_POST["publishedAt"];
                echo $publishedAt;
                echo "<br>";
                
                $isPublished = $_POST["isPublished"];
                echo $isPublished;
                echo "<br>";

                
                // Insert the data into the database
                $sql = "INSERT INTO tableArticle (title, content, createdAt, publishedAt, isPublished)
                VALUES ('$title', '$content', '$createdAt', '$publishedAt', '$isPublished')";

                if (mysqli_query($conn, $sql)) {
                  echo "New record created successfully";
                } else {
                  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
                
                mysqli_close($conn);
?>

</body>

</html>

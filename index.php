
<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
</head>
<body>
	<h1>Welcome to our website!</h1>
	<?php
		echo "MENU";
    ?>
    <div class="menu">
        <?php
			$pages = ['publicationArticle.php', 'deleteArticle.php'];
			foreach ($pages as $page) {
				echo "<a href='$page'>$page</a> | ";
			}
		?>
    </div>
</body>
</html>

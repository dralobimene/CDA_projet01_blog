
<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
</head>
<body>
    <h1>Welcome to our website!</h1>
<?php


session_start();
if(isset($_SESSION['name'])){
    echo "Welcome ".$_SESSION['name']."!<br>";
}else{
    echo "You are not connected!<br>";
}
echo "MENU";
?>
    <div class="menu">
<?php
$pages = [
    'connexionAdm.php',
    'listArticle.php',
    'publicationArticle.php',
    'deleteArticle.php',
];

foreach ($pages as $page) {
    echo "<a href='$page'>$page</a> | ";
}

?>
    </div>
</body>
</html>

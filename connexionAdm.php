
<!DOCTYPE html> 
<html> 
<body> 

<?php 
session_start();
if(isset($_SESSION['name'])){
    echo "Welcome ".$_SESSION['name']."!<br>";
    echo "<br>";
    echo "Vs êtes déjà connectés, attendez 3 secs.";
    echo "Si vous n'êtes pas redirigé, veuillez cliquer sur le lien suivant:";
    echo "<br>";
    
    header("refresh:3;url=index.php");

}else{
    echo "You are not connected!<br>";
    //
    echo "<form action='connexionAdm02.php' method='post'>"; 
    echo "Email: <input type='text' name='email'><br>"; 
    echo "Password: <input type='password' name='password'><br>"; 
    echo "<input type='submit' value='Submit'>"; 
    echo "</form>";

}

?> 

</body> 
</html>

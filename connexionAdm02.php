
<?php

//
$email = $_POST["email"];
$password = $_POST["password"];


session_start();
function connectToDb(){
    $host = 'localhost';
    $user = 'root';
    $password = 'rootmdp';
    $dbname = 'CDABlog';
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch(PDOException $e) {
        die("ERROR: Could not connect. " . $e->getMessage());
    }
}

if(isset($_SESSION['name'])){
    echo "Welcome ".$_SESSION['name']."!<br>";
    echo "<br>";
    echo "Vs êtes déjà connectés, attendez 3 secs.";
    echo "<br>";
    echo "Si vous n'êtes pas redirigé, veuillez cliquer sur le lien suivant:";
    echo "<br>";

    header("refresh:3;url=index.php");

}else{
    $pdo = connectToDb();
    $sql = "SELECT * FROM tableAdm WHERE email = :email AND password = :password";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':password', $password);
    $stmt->execute();
    $result = $stmt->fetch();
    if($result){
        echo "Connected to the database successfully";
        echo "<br>";
        echo "Email: ".$result['email'];
        echo "<br>";
        // echo "Password: ".$result['password']."<br>";
        echo "Name: ".$result['name'];
        echo "<br>";

        //
        $_SESSION['name'] = $result['name'];

        //
        header("refresh:3;url=index.php");
    }else{
        echo "Invalid Email or Password";
    }
}

/*
$pdo = connectToDb();
$sql = "SELECT * FROM tableAdm WHERE email = :email AND password = :password";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':email', $email);
$stmt->bindValue(':password', $password);
$stmt->execute();
$result = $stmt->fetch();
if($result){
    echo "Connected to the database successfully <br>";
    echo "Email: ".$result['email']."<br>";
    echo "Password: ".$result['password']."<br>";
    echo "Name: ".$result['name']."<br>";
    $_SESSION['name'] = $result['name'];
    header("refresh:3;url=index.php");
}else{
    echo "Invalid Email or Password";
}
 */

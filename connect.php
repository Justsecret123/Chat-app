<?php
    $host = 'localhost';
    $dbname = 'projet2';
    $username = 'root';
    $password = 'Eyeshield 21';
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // echo "Connexion à la base de données " . $dbname . " réussie";
} catch (PDOException $pe) {
    die("Impossible de se connecter à $dbname :" . $pe->getMessage());
}


$login = $_POST["login"];
$pass = $_POST["pass"];
$req = $conn->prepare( "SELECT * from compte WHERE login = :login AND password = :pass;");
$req->bindParam(':login', $login);
$req->bindParam(':pass', $pass);
$req->execute();
$rows = $req->fetch();
if($rows) { session_start(); $_SESSION['login'] = $login; $_SESSION['id'] = $rows["ID_COMPTE"]; exit(header("Location: pages/accueil/indexMessages.php"));}?>

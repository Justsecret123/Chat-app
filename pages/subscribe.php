	<?php
    $host = 'localhost';
    $dbname = 'projet2';
    $username = 'root';
    $password = 'Eyeshield 21';

try {
    $conn = new PDO("mysql:host=$host; port=3306;dbname=$dbname", $username, $password);
    // echo "Connexion à la base de données " . $dbname . " réussie";
	// echo date("Y-m-d");
} catch (PDOException $pe) {
    die("Impossible de se connecter à $dbname :" . $pe->getMessage());
}

//Insertion
$prepare = $conn->prepare("INSERT into compte (email,login,password, nom, prenom, inscription)
VALUES (:email, :login, :password, :nom, :prenom, :inscription)");
$prepare->bindParam(':email', $email);
$prepare->bindParam(':login', $login);
$prepare->bindParam(':password', $password);
$prepare->bindParam(':nom', $nom);
$prepare->bindParam(':prenom', $prenom);
$prepare->bindParam(':inscription', $inscription);
$email = $_GET["email"];
$login = $_GET["login"];
$prenom = $_GET["prenom"];
$nom = $_GET["nom"];
$password = $_GET["password"];
$inscription = date('Y-m-d');
$stauts = '1';
$prepare->execute();
$prepare = $conn->prepare("commit");
$prepare->execute();
$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
session_start();
$_SESSION['login'] = $_GET['login'];

setcookie('login',$login,time()+365*24*3600,null,null,false,true);
$extra = 'new/subscribe';
exit(header("Location: http://$host$uri/$extra"));?>
<?php 
$host = "localhost";
$dbname = "projet2"; 
$username = "root";
$password = "Eyeshield 21";

try {$conn = new PDO("mysql:host=$host; port=3306;dbname=$dbname",$username,$password);}
catch (PDOexception $pe) {die ("Impossible de se connecter à la base de données. " . $pe->getMessage());}
$login = $_GET["login"];
$pass = $_GET["pass"];
$req = $conn->prepare( "SELECT * from compte WHERE login = :login AND password = :pass;");
$req->bindParam(':login', $login);
$req->bindParam(':pass', $pass);
$req->execute();
$rows = $req->fetch();
if ($rows == false) {echo "Ce nom d'utilisateur n'existe pas.";} ?>
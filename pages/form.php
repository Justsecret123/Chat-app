<?php 
$host = "localhost";
$dbname = "projet2"; 
$username = "root";
$password = "Eyeshield 21";

try {$conn = new PDO("mysql:host=$host; port=3306;dbname=$dbname",$username,$password);}
catch (PDOexception $pe) {die ("Impossible de se connecter àa la base de données. " . $pe->getMessage());}
$request = $conn->prepare ("SELECT login from compte 
WHERE lower(login)= lower('" . $_GET["login"] . "');");
$request->execute();
$rows = $request->fetch();
if($_GET["login"] == "")
{echo "Nom d'utilisateur invalide.";}
else
{if ($rows) {echo "Ce nom d'utilisateur est déjà pris.";}
else { echo "Nom d'utilisateur valide ✔ ";}} ?>
<?php 
$host = "localhost";
$dbname = "projet2"; 
$username = "root";
$password = "Eyeshield 21";

try {$conn = new PDO("mysql:host=$host; port=3306;dbname=$dbname",$username,$password);}
catch (PDOexception $pe) {die ("Impossible de se connecter àa la base de données. " . $pe->getMessage());}
$request = $conn->prepare ("SELECT email from compte 
WHERE lower(email)= lower('" . $_GET["email"] . "');");
$request->execute();
$rows = $request->fetch();
if ($rows) {echo "Cette adresse email est déjà prise.";} 
else {echo "Adresse email libre ✔";}?>
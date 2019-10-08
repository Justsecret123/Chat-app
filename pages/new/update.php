<?php 
$host="localhost";
$username="root";
$password="Eyeshield 21";
$dbname="projet2";

try
{
    session_start();
    $conn = new PDO("mysql:host=$host;port=3306;dbname=$dbname",$username,$password);
    $req=$conn->prepare('UPDATE compte SET PROFILE_PICTURE = :file WHERE id = 1;');
    $req->bindParam(':file', $file);
    $file = $_POST['file'];
    $req->execute();
}
catch (Exception $pe)
{ die("Impossible de se connecter à la base de données " . $pe->getMessage());
}


?>
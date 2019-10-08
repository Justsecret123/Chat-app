<?php


$host="localhost";
$username="root";
$password="Eyeshield 21";
$dbname="projet2";


    $conn = new PDO("mysql:host=$host;port=3306;dbname=$dbname",$username,$password);
    $req=$conn->prepare("UPDATE compte SET BIRTH_DATE = :date WHERE LOGIN = '" . $_SESSION["login"] . "' ;");
    $req->execute(array("date")=>$_POST["date"]);
     $host  = $_SERVER['HTTP_HOST'];
     $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
     $extra = '../accueil/home';
     exit(header("Location: http://$host$uri/$extra"));


?>
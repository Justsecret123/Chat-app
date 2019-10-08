<?php

$conn =  new PDO('mysql:host=localhost;dbname=projet2', 'root', 'Eyeshield 21');
session_start();
$req = $conn->prepare("INSERT into message(ID_COMPTE,ID_COMPTE_REC,LIBELLE,TIME) values(".$_SESSION["id"]."," .$_POST["rec"]. ",'" . $_POST["text"]."',NOW());");
$req->execute();
$req2 = $conn->prepare("COMMIT");
$req2->execute();


?>
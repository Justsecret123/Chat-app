<?php
$conn =  new PDO('mysql:host=localhost;dbname=projet2', 'root', 'Eyeshield 21');
session_start();
$req = $conn->prepare("SELECT ID_COMPTE from compte where login=:login");
$req->bindParam(":login",$_POST["user"]);
$req->execute();
$data = $req->fetch();
$req2 = $conn->prepare("INSERT into message(ID_COMPTE,ID_COMPTE_REC,LIBELLE,TIME) values(".$_SESSION["id"]."," .$data["ID_COMPTE"]. ",'" . $_POST["message"]."',NOW());");
$req2->execute();
$req3 = $conn->prepare("COMMIT");
$req3->execute();
?>
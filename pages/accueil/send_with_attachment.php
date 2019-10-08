<?php
$name= "-".$_SESSION["id"].$_FILES['file']['name'];  
$temp_name= $_FILES['file']['tmp_name'];  
$targetDir = "uploads/";
$img_blob = file_get_contents ($targetFilePath);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
$conn =  new PDO('mysql:host=localhost;dbname=projet2', 'root', 'Eyeshield 21');
session_start();
$req = $conn->prepare("INSERT into message(ID_COMPTE,ID_COMPTE_REC,LIBELLE,TIME,attachment) values(".$_SESSION["id"]."," .$_POST["rec"]. ",'" . $_POST["text"]."',NOW()), attachment = " . addslashes($img_blob) . ";");
$req->execute();
$req2 = $conn->prepare("COMMIT");
$req2->execute();
?>
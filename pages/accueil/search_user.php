<?php
include "model.php";
$conn = connect();
session_start();
$req = $conn->prepare("SELECT ID_COMPTE from compte where LOGIN=:login");
$req->bindParam(":login",$_POST["user"]);
$req->execute();
$data = $req->fetch();
if(isset($data["ID_COMPTE"]))
{echo "Ok";}
else
{echo "Cet utilisateur n'existe pas.";}
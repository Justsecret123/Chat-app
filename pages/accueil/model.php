<?php


function connect()
{
    $host = 'localhost';
    $dbname = 'projet2';
    $username = 'root';
    $password = 'Eyeshield 21';
    
    try
{$conn = new PDO("mysql:host=$host; port=3306;dbname=$dbname", $username, $password);
return $conn;}
    
    catch (PDOException $pe) 
    {die("Impossible de se connecter à $dbname :" . $pe->getMessage());}
    
}

function connect_ftp()
{
    $ftp_server = "localhost";
    $ftp_conn=ftp_connect($ftp_server) or die ("Problème de connexion au serveur");
    $login= ftp_login($ftp_conn,'hibou','hibou');
    return ($ftp_conn);
}





?>
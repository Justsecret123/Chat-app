<?php
ob_start();
 session_start();
include_once 'index.html';
if(isset($_SESSION['login']))
{
   
    //Création d'une nouvelle session utilisateur.
    /*echo ($_SESSION['login']);*/
    if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
  if (is_uploaded_file($_FILES['file']['tmp_name'])) 
  { 
  	//First, Validate the file name
  	if(empty($_FILES['file']['name']))
  	{
  		echo "Le nom de l'image ne peut être vide";
  		exit;
  	}
 
  	$upload_file_name = $_FILES['file']['name'];
  	//Too long file name?
  	if(strlen ($upload_file_name)>100)
  	{
  		echo "Trop long nom d'image";
  		exit;
  	}
 
  	
  	$upload_file_name = preg_replace("/[^A-Za-z0-9 \.\-_]/", '', $upload_file_name);
 
  
  	/*if ($_FILES['file']['size'] > 1000000) 
  	{
		echo " Image trop grande ";
  		exit;        
    }*/
 
    //Sauvegarde
    $dest=__DIR__.'/../../uploads/'.$upload_file_name;
    if (move_uploaded_file($_FILES['file']['tmp_name'], $dest))  {/*echo 'Image chargée';*/}
      
$host="localhost";
$username="root";
$password="Eyeshield 21";
$dbname="projet2";
$targetDir = "C:/wamp64/www/web/uploads/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
$date = $_POST['date'];

try
   {$img_blob = file_get_contents ($targetFilePath);
    $conn = new PDO("mysql:host=$host;port=3306;dbname=$dbname",$username,$password);
    $req=$conn->prepare("UPDATE compte SET PROFILE_PICTURE = '"  . addslashes($img_blob) .  "' , BIRTH_DATE = '" . $date . "' WHERE LOGIN = '" . $_SESSION["login"] . "' ;");
    $req->bindParam(':file', $file);
    $req->execute();
    
       
        if($req){$statusMsg = "Image ".$fileName. " chargée avec succès";}
        else{$statusMsg = "Erreur lors du chargement de l'image. Veuillez réessayer.";}
        $host  = $_SERVER['HTTP_HOST'];
        $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        $extra = '../../index.html';
       exit(header("Location: http://$host$uri/$extra"));
       ob_end_flush();
        

   /* echo $statusMsg;*/
   }
      
catch (Exception $pe) {exit(header("Location: http://$host$uri/$extra")); 
    die("Une erreur est survenue: " . $pe->getMessage());
                       }   
print_r($_FILES);
  }
}
     
}
else {echo 'Accès interdit !';} ?>
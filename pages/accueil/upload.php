<?php
function upload_ftp($file)
{$conn = connect_ftp();
$fp = fopen($file,"r");
$remote_file_path = "/".$file;
 if (ftp_put($conn, $remote_file_path,$file,FTP_BINARY)) // right
 {echo "Le fichier a été uploadé avec succès";}
 else
 { echo "Erreur d'envoi de fichier";}
 ftp_close($conn);   
fclose($fp);
}

function upload()
{
    session_start();
    $name= "-".$_SESSION["id"].$_FILES['file']['name'];  
    $temp_name= $_FILES['file']['tmp_name'];  
    if(isset($name)){
        if(!empty($name))
        {      
            $location = 'uploads/';      
            if(move_uploaded_file($temp_name, $location.$name))
            {
                        $targetDir = "uploads/";
                        $fileName = basename($name);
                        $targetFilePath = $targetDir . $fileName;
                        $img_blob = file_get_contents ($targetFilePath);
                        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
                        $conn =  new PDO('mysql:host=localhost;dbname=projet2', 'root', 'Eyeshield 21');
                        $req = $conn->prepare("INSERT into message(ID_COMPTE,ID_COMPTE_REC,LIBELLE,TIME,attachment) values(:sender,:rec, :text,NOW(),'". addslashes($img_blob)."');");
                        $req->bindparam(':sender', $_SESSION["id"]);
                        $req->bindparam(':rec', $_POST["rec"]);
                        $req->bindparam(':text', $_POST["text"]);
                        $req->execute();
                        $req2 = $conn->prepare("COMMIT");
                        $req2->execute();
            }
            
        }       
    }  else {
        echo 'You should select a file to upload !!';
    }
}

function upload_db()
{
    
}
?>


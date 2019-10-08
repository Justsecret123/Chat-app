 <div class="attachment-div">
                 <form name = "form_file"  method="post" enctype="multipart/form-data" action="#" >
                 <input type = "text"/ >
                 <input type="file" name="file" id="file"  class="inputfile" accept=".jpg, .jpeg, .png" unique/>
                <label for="file">
                    <i class='fas fa-paperclip' style='font-size:25px;color: grey'></i> <i class='fas fa-trash-alt' style='font-size:12px;color: grey;' id="trash-icon"></i>
                </label>
                <input type="submit" value="submit" />
                </form>
</div>

<?php
session_start();
if($_SERVER["REQUEST_METHOD"]=="POST")
{
   
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
                        $req = $conn->prepare("INSERT into message(ID_COMPTE,ID_COMPTE_REC,LIBELLE,TIME,attachment) values(44,45,'Upload',NOW(),'". addslashes($img_blob)."');");
                        $req->execute();
                        $req2 = $conn->prepare("COMMIT");
                        $req2->execute();
                    }

                }       
            }  else {
                echo 'You should select a file to upload !!';
            }
}

?>
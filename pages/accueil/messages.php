<?php

include "model.php";

function getConversationsUsersInfos()
{
    $conn = connect();
    $req= $conn->prepare('SELECT ID_MESSAGE,
CONCAT(GREATEST(ID_COMPTE,ID_COMPTE_REC)," ",LEAST(ID_COMPTE,ID_COMPTE_REC)) AS DISC, 
MAX(CONCAT(TIME,"||",LIBELLE)) as TEXT, 
MAX(TIME) AS last_message, 
GREATEST(ID_COMPTE,ID_COMPTE_REC) AS LAST_REC, LEAST(ID_COMPTE,ID_COMPTE_REC) AS LAST_SENDER, attachment
     FROM message
     WHERE ID_COMPTE = :id || ID_COMPTE_REC = :id GROUP BY DISC ORDER BY last_message DESC;');
    $req->execute(array("id"=>$_SESSION["id"]));
    
    return $req;
}

function getNewConversationsUsersInfos($id)
{
    $conn = connect();
    $req= $conn->prepare('SELECT ID_MESSAGE,
CONCAT(GREATEST(ID_COMPTE,ID_COMPTE_REC)," ",LEAST(ID_COMPTE,ID_COMPTE_REC)) AS DISC, 
MAX(CONCAT(TIME,"||",LIBELLE)) as TEXT, 
MAX(TIME) AS last_message, 
GREATEST(ID_COMPTE,ID_COMPTE_REC) AS LAST_REC, LEAST(ID_COMPTE,ID_COMPTE_REC) AS LAST_SENDER, attachment
     FROM message
     WHERE (ID_COMPTE = :id || ID_COMPTE_REC = :id) AND ID_MESSAGE >' .$id. ' GROUP BY DISC ORDER BY last_message DESC;');
    $req->execute(array("id"=>$_SESSION["id"]));
    
    return $req;
}


function getMessagesUsersAll()
{
    $conn = connect();
    $req= $conn->prepare('SELECT LIBELLE, ID_COMPTE AS ID from message where ID_COMPTE=:id OR ID_COMPTE_REC= :id;');
    $req->execute(array("id"=>$_SESSION["id"]));
    return $req;
}

function getMessagesUsersOne()
{                      
    if(isset ($_POST["id"]))
    {
    $conn = connect();
    $ids = $_SESSION["id"];
    $id = $_POST["id"];
    $req = $conn->prepare('SELECT attachment, LIBELLE, ID_MESSAGE, ID_COMPTE AS ID from message where (ID_COMPTE = :ids AND ID_COMPTE_REC=:id) OR (ID_COMPTE = :id AND ID_COMPTE_REC = :ids);');
    $req->bindParam(':ids', $ids);
    $req->bindParam(':id', $id);
    $req->execute();
    return $req;}
}

function getNewMesagesUsersOne()
{
    if(isset($_POST["idMessage"]) && isset($_POST["idUser"]))
    {
        $conn = connect();
        $message = $_POST["idMessage"];
        $current = $_SESSION["id"];
        $user = $_POST["idUser"];
        $req = $conn->prepare('SELECT LIBELLE, ID_MESSAGE, ID_COMPTE AS ID, attachment from message where (ID_COMPTE = :current AND ID_COMPTE_REC = :user AND ID_MESSAGE > :message) OR (ID_COMPTE = :user AND ID_COMPTE_REC = :current AND ID_MESSAGE > :message);');
        $req->bindParam(':current', $current);
        $req->bindParam(':message', $message);
        $req->bindparam(':user', $user);
        $req->execute();
        return $req;
    }
}

function getUserInfos($id)
{
      $conn = connect();
      $req= $conn->prepare('SELECT LOGIN,PROFILE_PICTURE from compte where ID_COMPTE = ' .$id. ';');
      $req->execute();
      return $req;
}

function getMessageId($data)
{
     $conn = connect();
     $text = $data;
      $req= $conn->prepare('SELECT ID_MESSAGE from message where LIBELLE = :text');
      $req->execute(array("text"=>$text));
      return $req;
}


function displayConversationsAll()
{
    $req= getConversationsUsersInfos();
    while($data = $req->fetch())
    {
        if($data["LAST_SENDER"] !=$_SESSION["id"])
        { $id = $data["LAST_SENDER"]; }
        else
        { $id = $data["LAST_REC"];}
        $req2 = getUserInfos($id);
        $data2 = $req2->fetch();
        if($data["LAST_SENDER"] != $_SESSION["id"])
        {$infos2 = $data["LAST_SENDER"];}
        else
        {$infos2 = $data["LAST_REC"];}
        
       
        if($data["LAST_SENDER"] == $_SESSION["id"])
            {$LAST = "Vous: ";}
        else
            {$LAST = ($data2["LOGIN"].": ");}
            $text = substr ($data["TEXT"],21);
            $req3 = getMessageID($text);
            $data3 = $req3->fetch();
            echo '<div class="conversation" id="d_'. $data3["ID_MESSAGE"]. '">
                     <div class="conversation-photo">
                     <img src="data:image/jpeg;base64,'.base64_encode( $data2["PROFILE_PICTURE"] ).' "/>
                     </div>
                     <div class="conversation-user" id= "'. $infos2. '">' . $data2["LOGIN"].
                     '</div>
                     <div class="conversation-message"> <p>' .$LAST. "" . substr ($data["TEXT"],21) .
                     '</p></div>
                      <div class="conversation-time">' .substr($data["TEXT"],11,10).
                     '</div>
                 </div>'; 
    }
}

function displayMessagesUsers()
{
    
    $req = getMessagesUsersAll();
    while($data = $req->fetch())
    {
       if($data["ID"] == $_SESSION["id"])
       {echo ' <p class="message-r">' .$data["LIBELLE"]. '</p>';}
        else
        {echo ' <p class="message">' .$data["LIBELLE"]. '</p>';}
    }
    
}


function newMessageSent($text)
{
    echo ' <p class="message-r">' .$text. '</p>';
}

function displayMessagesOne()
{
    
    $req = getMessagesUsersAll();
    while($data = $req->fetch())
    {
       if($data["ID"] == $_SESSION["id"])
       {echo ' <p class="message-r">' .$data["LIBELLE"]. '</p>';
       /*Si la pièce existe, faire*/}
        else
        {echo ' <p class="message">' .$data["LIBELLE"]. '</p>';
        /*Si la pièce jointe existe, faire*/}
    }
    
}




?>
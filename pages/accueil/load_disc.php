<?php
include "messages.php";
$conn = connect();
session_start();

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
        if(isset($data2["PROFILE_PICTURE"]))
        {
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
        else
        {
            echo '<div class="conversation" id="d_'. $data3["ID_MESSAGE"]. '">
                     <div class="conversation-photo">
                     <img src="logo3.png" style = "transform: rotate(0deg); !important;" />
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
?>

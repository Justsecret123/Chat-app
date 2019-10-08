<?php

include "messages.php";
$conn = connect();
session_start();

$req = getMessagesUsersOne();
    while($data = $req->fetch())
    {
       if($data["ID"] == $_SESSION["id"])
       {
       if($data["attachment"] !=NULL)
        {   echo '<img src="data:image/jpeg;base64,'.base64_encode( $data["attachment"] ).'  " style="position: relative; left: 60%;"/>
                     </div>
            <p class="message-r" id="p-' . $data["ID_MESSAGE"]. '">' .$data["LIBELLE"]. '</p>';
        }
           else
           {
               echo ' <p class="message-r" id="p-' . $data["ID_MESSAGE"]. '">' .$data["LIBELLE"]. '</p>';
           }
       }
        else
        {if($data["attachment"] != "")
        {   echo '<img src="data:image/jpeg;base64,'.base64_encode( $data["attachment"] ).' "/>
                     </div>
            <p class="message" id="p-' . $data["ID_MESSAGE"]. '">' .$data["LIBELLE"]. '</p>';
        }
           else
           {
               echo ' <p class="message" id="p-' . $data["ID_MESSAGE"]. '">' .$data["LIBELLE"]. '</p>';
           }
       }
    }
?>
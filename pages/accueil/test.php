<?php 
    include_once "model.php";
    include_once "messages.php";
    session_start();
    displayMessagesUsers();
    displayMessagesGroups($_SESSION["id"]);

?>
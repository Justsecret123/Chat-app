<?php 
session_start();
require "messages.php";
require "conversations.php";
require "indexMessagesView.php";
require "upload.php";

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET["file"]))
{
    upload($_GET["file"]);
}
<?php
   include("config.php");
   include("functions.php");
   session_start();

   $user_check = $_SESSION["login_email"];

  if(!isset($_SESSION["login_email"])){
      redirect("index");
   }
?>

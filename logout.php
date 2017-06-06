<?php

  include("functions.php");
  session_start();

  if(session_destroy()) {
    redirect("index");
  }
 ?>

<?php
  if(session_status()===PHP_SESSION_NONE) session_start();
  unset($_SESSION['item_list']);
  unset($_SESSION['username']);
  $url="./BarrieGroceshippers.php";
  header( 'Location: ' . $url);
  exit();

<?php
    if(session_status()===PHP_SESSION_NONE) session_start();
    if(!isset($_SESSION['username'])){
      $url='./NotLoggedin.php';
      header('location:' . $url);
      exit();
    }

   echo "Running function";
   $item= $_GET['id'];
$_SESSION['item_list'][]=$item;

   // if(count($_SESSION['item_list'])>2){
   //   foreach ($_SESSION['item_list'] as $items){
   //   echo $items;
   // }
   // }
   if($_GET['click']="submit"){
     $url='./viewcart.php';
     header('location:' . $url);
     exit();
   }
   else if($_GET['pg']= 'do'){
     $url='./DailyOffers.php';
     header('location:' . $url);
     exit();
   }else if($_GET['pg']= 'ho'){
     $url='./BarrieGroceshippers.php';
     header('location:' . $url);
     exit();
   }

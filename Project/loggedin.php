<?php
  include_once("./admin/connect.php");

    if(session_status()===PHP_SESSION_NONE) session_start();

// if(!isset($_SESSION['username'])){
//   $url='BarrieGroceshippers.php';
//   header('location:' . $url);
//   exit();
// }

$username=$_POST['username'];
$userkey=$_POST['userkey'];
$userkey = password_hash($_POST['userkey'], PASSWORD_DEFAULT);
$sql="select * from signup where userName = '$username'";
$stmt=$conn->prepare($sql);
$stmt->execute();
$user=$stmt->fetch();

echo $user['userKey'];


if(strcmp($user['userKey'],"") !==0 ){
  echo "user exists";
  if(strcmp($user['userKey'],$userkey) == 0){
      echo "Found";
      $_SESSION['username']=$username;
      $url="./BarrieGroceshippers.php";
      header( 'Location: ' . $url);
      exit();
  }else{
      echo "Lost!! no password match";
      $_SESSION['username']=$username;
      $url="./BarrieGroceshippers.php";
      header( 'Location: ' . $url);
      exit();
  }

}else{
  echo "not found this user";
}

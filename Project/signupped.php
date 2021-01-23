<?php
  include_once("./admin/connect.php");

    if(session_status()===PHP_SESSION_NONE) session_start();

$errors=[];
//
// if(!isset($_SESSION['username'])){
//   $url='BarrieGroceshippers.php';
//   header('location:' . $url);
//   exit();
// }

$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$username=$_POST['username'];
$userkey=$_POST['userkey'];
$userkey2=$_POST['userkey2'];

if($firstname == "" && $lastname == ""){
  $errors[]="First And Last name must not be empty!!";
}
if(preg_match("/^[A-Za-z]{1,9}$/",$firstname) && preg_match("/^[A-Za-z]{1,9}$/",$lastname)){

}else{
  $errors[]="First & Last name must contains characters only";
}
if(!preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/", $username)){
  $errors[]="Username must contains a valid email format only!!";
}
if($userkey!=$userkey2){
  $errors[]="PAssword and password conifrmation must be same";
}

$sql="select * from signup where userName = '$username'";
$stmt=$conn->prepare($sql);
$stmt->execute();

if($stmt->fetch()){
  $errors[]="This email already exists";
}


if(count($errors) > 0){
 foreach ($errors as $error) {
   echo "$error";
 }
 exit;
}




$userkey = password_hash($_POST['userkey'], PASSWORD_DEFAULT);

$sql="Insert into signup values('$firstname','$lastname','$username','$userkey')";
 $stmt= $conn->prepare($sql);





    if($stmt->execute()){
        echo "done bro";
        $_SESSION['username']=$username;
        $url="./BarrieGroceshippers.php";
        header( 'Location: ' . $url);
        exit();
      }
      else echo "sry";

function LogoutFunction(){
  unset($_SESSION['username']);
}

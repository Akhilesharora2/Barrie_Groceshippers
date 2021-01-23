<?php  include_once("../head.php") ?>
<?php  include_once("./connect.php") ?>

<article id="admin_login_art1">
<form  method="post" id="login_form">
<h1>Admin Login </h1><br><br>
<label for="username">Username</label>
<input type="text" name="username" id="username" autofocus>
<br><br>
<label for="userkey">Password</label>
<input type="password" name="userkey" id="userkey" >
<br>
<input type="submit" id="submit_btn">

</form>
</article>
<?php
  session_start();

  $uname=$_POST['username'];
  $ukey=$_POST['userkey'];

  $sql= "SELECT * from AdminLogin where username = '$uname' and userkey= '$ukey' ";
$stmt= $conn->prepare($sql);
$stmt->execute();
$exists = $stmt->fetch();

if($exists){

  if(isset($_POST['username'])){

    $username=$_POST['username'];
    $_SESSION['usernameadmin']=$username;
    $url="admin_loggedin.php?sort_id=0&delete=0";
    header( 'Location: ' . $url);
    exit();
  }
}

 ?>
</body>
</html>

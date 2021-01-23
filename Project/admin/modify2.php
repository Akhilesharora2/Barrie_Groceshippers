<?php  include_once("../head.php") ?>
<?php
  if(session_status()===PHP_SESSION_NONE) session_start();
  $_SESSION['flash']=[];
  $errors=[];


  if(isset($_GET['Logout'])){
    unset($_SESSION['usernameadmin']);
  }


  if(!isset($_SESSION['usernameadmin'])){
    $url='login.php';
    header('location:' . $url);
    exit();
  }
 ?>
 <header>

   <nav class="navbar navbar-expand-lg navbar-light bg-light">
     <a class="navbar-brand" href="./admin_loggedin.php?sort_id=0&delete=0"><img src="../BGLogo.png" alt="Logo" width="220px"></a>
     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
       <span class="navbar-toggler-icon"></span>
     </button>

     <div class="collapse navbar-collapse" id="navbarSupportedContent">


       <ul class="navbar-nav ml-auto">

         <li class="nav-item">
           <a class="nav-link" href="?Logout=true" name="Logout">Logout</a>
         </li>
       </ul>


     </div>
   </nav>
 </header>

 <?php include_once("./connect.php");

 $value = $_GET['modify'];

 $sql="SElect * from products where id= '$value' ";
 $stmt=$conn->prepare($sql);
 $stmt->execute();
 $user=$stmt->fetch();

// $image1=$_POST['image'];
$check = false;
if ($_FILES['image']['size'] > 0) $check=getimagesize($_FILES['image']['tmp_name']);

if($check){
  $image = $_FILES['image']['tmp_name'];
  $imgContent = addslashes(file_get_contents($image));
  $image= base64_encode(file_get_contents(addslashes($image)));
}

 $name1=$_POST['name'];
 $price1=$_POST['price'];
 $quantity1=$_POST['qty'];
 $desc=$_POST['Description'];

 if(empty($_POST['name'])) $errors[]= "Name can'nt be empty";
 if(empty($_POST['price'])) $errors[]= "Price can'nt be empty";
 if(empty($_POST['qty'])) $errors[]= "Quantity can'nt be empty";

//check duplicate names;

// $sql="SElect * from products ";
// $stmt=$conn->prepare($sql);
// $stmt->execute();
// $users=$stmt->fetchAll();


// foreach ($users as $key => $value):
//   // echo "$user";
//   if(in_array($name1, $value)){
//     $errors[]= "This name Already exists_____________________";
//   }else{
//
//   }
// endforeach;

// echo "$name1";
if(count($errors) > 0){
 foreach ($errors as $error) {
   echo "$error";
 }
 exit;
}
// Updating fields
if($check !== false){
$sql= "update products set image='$image' , Name='$name1',Description=$desc, price=$price1, quantity=$quantity1 where id= '".$_GET['modify']."'"; }
else{
  $sql= "update products set Name='$name1',Description='$desc', price=$price1, quantity=$quantity1 where id= '".$_GET['modify']."'";
}


$mysqlicon=mysqli_connect("localhost","root","","project");
  if(mysqli_query($mysqlicon , $sql)){
  echo "File uploaded Successfully";
}else{
  echo "Sorry :(";
}

echo "End";
  ?>




</body>
</html>

<?php  include_once("../head.php") ?>
<?php  include_once("./connect.php") ?>
<header>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="BarrieGroceshippers.php"><img src="../BGLogo.png" alt="Logo" width="220px"></a>
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
<?php
  session_start();
  if(isset($_GET['Logout'])){
    unset($_SESSION['usernameadmin']);
  }


  if(!isset($_SESSION['usernameadmin'])){
    $url='login.php';
    header('location:' . $url);
    exit();
  }
try{
        // if(getimagesize($_FILES['image']['tmp_name']) !== true) throw new Exception("Error Processing Request", 1);
        $check=getimagesize($_FILES['image']['tmp_name']);

        if($check !== false){
          $image = $_FILES['image']['tmp_name'];
          $imgContent = addslashes(file_get_contents($image));
          $image= base64_encode(file_get_contents(addslashes($image)));

        }

$price=$_POST['price'];
$quantity=$_POST['qty'];
$name=$_POST['name'];
$desc=$_POST['Description'];
    }catch(Exception $ex){
      echo "Image is not inserted or image size must be greater than 0" .$ex->getMessage();
    }
if($price == true && $quantity == true && $name == true){
        $sql= "Insert into products (image,Name,Description,price,quantity) values ('$image','$name', '$desc', $price, $quantity )";
        // $stmt=mysqli_query($conn,$sql);
        // $stmt= $conn->prepare($sql);
        // $stmt->bindParam(':images', $image, PDO::PARAM_INT);
        // $stmt->bindParam(':prices', $price, PDO::PARAM_INT);
        // $stmt->bindParam(':quantitys', $quantity, PDO::PARAM_INT);
        // $stmt->execute();
        $mysqlicon=mysqli_connect("localhost","root","","project");
          if(mysqli_query($mysqlicon , $sql)){
          echo "File uploaded Successfully";
        }else{
          echo "Sorry :(";
        }
}else{
  echo "All Fields must contain some value";
}
?>
</br>
<a href="./form.php">Go Back</a>
</body>
</html>

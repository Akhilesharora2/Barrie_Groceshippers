<?php  include_once("../head.php") ?>
<?php
  if(session_status()===PHP_SESSION_NONE) session_start();
  if(isset($_GET['Logout'])){
    unset($_SESSION['username']);
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

$name1=$user['Name'];
$price1=$user['price'];
$quantity1=$user['quantity'];
 ?>

 <main>

<div class="container">
  <div class="row">
    <div class="col">

      <form action="modify2.php?modify=<?= $_GET['modify'] ?>" method="post" enctype="multipart/form-data">
        <h1>Modify Product!!</h1>
    </div>
  </div>
  <div class="row">
    <?php echo  '<img src=data:image;base64,'.$user['image'].' alt="image" height="150px" width="150px"/>';  ?>
  </div>
  <div class="row">
        <label for="image">Change product image</label>
        <input type="file" name="image">
  </div>
  <div class="row">
        <label for="name">Name:</label>
        <input type="text" name="name" value="<?= $user['Name'] ?>" >
  </div>
  <div class="row">
    <label for="Description">Description</label>
    <textarea name="Description" rows="6" cols="50"> <?= $user['Description'] ?> </textarea>
  </div>
  <div class="row">
        <label for="price">Price:</label>
        <input type="number" name="price" step=".01" placeholder= "Ex: 123.45" value="<?= $user['price'] ?>">
  </div>
  <div class="row">
        <label for="qty">Quantity:</label>
        <input type="number" name="qty" value="<?= $user['quantity'] ?>">
  </div>
  <div class="row">
        <input type="submit" name="submit">

      </form>
  <div>
      <a href="admin_loggedin.php?sort_id=0&delete=0">Back.....</a>
    </div>
  </div>
</div>


</main>
</body>
</html>

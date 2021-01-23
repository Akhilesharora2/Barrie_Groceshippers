<?php  include_once("../head.php") ?>
<?php
  session_start();
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

<div class="container">
  <div class="row">
    <div class="col">

      <form action="upload.php" method="post" enctype="multipart/form-data">
        <h1>Add new Product!!</h1>
    </div>
  </div>
  <div class="row">
        <label for="image">Choose your product image</label>
        <input type="file" name="image" required>
  </div>
  <div class="row">
        <label for="name">Name:</label>
        <input type="text" name="name" required>
  </div>
  <div class="row">
    <label for="Description">Description</label>
    <textarea name="Description" rows="6" cols="50"></textarea>
  </div>
  <div class="row">
        <label for="price">Price:</label>
        <input type="number" name="price" placeholder="Ex: 123.45" step=".01" required>
  </div>
  <div class="row">
        <label for="qty">Quantity:</label>
        <input type="number" name="qty" required>
  </div>
  <div class="row">
        <input type="submit" name="submit">

      </form>
  <div>
      <a href="admin_loggedin.php?sort_id=0&delete=0">Back.....</a>
    </div>
  </div>
</div>


</body>
</html>

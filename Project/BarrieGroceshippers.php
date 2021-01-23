<?php include_once("./head.php") ;
include_once("./admin/connect.php");
$_SESSION['item_list']=[];
// include_once("./shoppingCart.php");
// session_start();
  if(session_status()===PHP_SESSION_NONE) session_start();


$sql="SElect * from products";
$stmt=$conn->prepare($sql);
$stmt->execute();
$users=$stmt->fetchAll();
$counter=0;
?>
<header>

 <nav class="navbar navbar-expand-lg navbar-light bg-light">
   <a class="navbar-brand" href="BarrieGroceshippers.php"><img src="./BGLogo.png" alt="Logo" width="220px"></a>
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
     <span class="navbar-toggler-icon"></span>
   </button>

   <div class="collapse navbar-collapse" id="navbarSupportedContent">

     <form action="./searchresult.php" class="form-inline my-2 my-lg-0 ml-auto" method="get">
       <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="name">
       <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
     </form>

     <ul class="navbar-nav ml-auto">
       <li class="nav-item active font-weight-bold">
         <a class="nav-link " href="./BarrieGroceshippers.php">Home</a>
       </li>
       <li class="nav-item">
         <a class="nav-link" href="./DailyOffers.php?sort=1">Daily offers</a>
       </li>
       <li class="nav-item dropdown">
         <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           Shop by categories
         </a>
         <div class="dropdown-menu" aria-labelledby="navbarDropdown">
           <a class="dropdown-item" href="./fandv.php?sort=1">Fruits & vegetables</a>
           <a class="dropdown-item" href="./dandp.php?sort=1">Dairy Products</a>
           <a class="dropdown-item" href="./aandp.php?sort=1">Asian Products</a>
         </div>
       </li>
       <li class="nav-item">
         <a class="nav-link" href="./help&support.php">Help & support</a>
       </li>
       <li class="nav-item">
         <a class="nav-link" href="./viewcart.php">Cart</a>
       </li>
       <?php if(!isset($_SESSION['username'])) { ?>
       <li class="nav-item">
         <a class="nav-link" href="#" onclick="logIN()">Login</a>
       </li>
       <li class="nav-item">
         <a class="nav-link" href="#" onclick="signUP()">Sign up</a>
       </li>
     </ul>
   <?php }else{ ?>

     <li class="nav-item">
       <a class="nav-link"  href="./logoutfn.php"  name="Logout" style="background: transparent;border: transparent;" >Logout</a>
     </li>

   <?php } ?>
   </div>
 </nav>
</header>

<main>

<article id="log">
  <div id="login_form">
    <a href="#" onclick="loginClose()">X</a>
    <h2 class="ml-5">Login</h2></br>

    <form action="./loggedin.php" method="post">
      <label for="username">User email</label></br>
      <input type="textbox" name="username" required></br></br>
      <label for="userkey">Userkey</label></br>
      <input type="password" name="userkey" required></br></br>
      <button type="submit">Submit</button>
    </form>
  </div>
</article>


<article id="sign">
  <div id="signup_form">
    <a href="#" onclick="signupClose()">X</a>
    <h2 class="ml-5">Signup</h2></br>

    <form action="./signupped.php" method="post">
      <label for="firstname">First Name</label></br>
      <input type="textbox" name="firstname" required></br></br>
      <label for="lastname">Last Name</label></br>
      <input type="textbox" name="lastname" required></br></br>
      <label for="username">Username</label></br>
      <input type="textbox" name="username" required></br></br>
      <label for="userkey">Password</label></br>
      <input type="password" name="userkey" required></br></br>
      <label for="userkey2">Password Confirmation</label></br>
      <input type="password" name="userkey2" required></br></br>
      <button type="submit">Submit</button>
    </form>
  </div>
</article>


  <div id="demo" class="carousel slide" data-ride="carousel">
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="./img1.jpg" alt="Los Angeles">
      <div class="carousel-caption">
        <h3>Barrie Groceshippers</h3>
        <p>Grocery at your door step.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="./img2.jpg" alt="Chicago">
      <div class="carousel-caption">
        <h3>Buy Online</h3>
        <p>Anytime, anywhere buy grocery online.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="./img3.jpeg" alt="New York">
      <div class="carousel-caption">
        <h3>Fast delivery</h3>
        <p>Grocery delivered within 24hrs of yours purchase.</p>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>
<!-- ================================================================================================================================ -->
<article>
<div class="container-fluid art2">
  <fieldset>
    <legend> Our Products</legend>
  <div class="row">
    <ul class="card_horz">

      <?php  foreach ($users as $user) {
        $counter = $counter+1; ?>

    <li>
<form action="./shoppingCart.php" method="post">
      <div class="card">
      <?php
      echo '<img class="card-img-top" src=data:image;base64,'.$user['image'].' alt="image" height="150px" width="150px"/>'  ?>
      <!-- <img class="card-img-top" src="./img1.jpg" alt="Card image" style="width:100%"> -->
      <div class="card-body">
        <h4 class="card-title"><?= $user['Name'] ?></h4>
        <p class="card-text">Price: $<?= $user['price'] ?></br> Description: <?= $user['Description'] ?></p>
        <a href="#" class="btn btn-primary" onclick="buynowfn(event);">Buy Now</a>
        <a id="btn_submit" href="./shoppingCart.php?id=<?= $user['id'] ?>&pg=do&click=submit"></a>

        <a href="./shoppingCart.php?id=<?= $user['id'] ?>&pg=do&click=cart" class="btn btn-primary">
          <i class="fa fa-shopping-cart ml-3">cart</i>
        </a>

        <!-- <a class="btn_cart" href="./shoppingCart.php?id=<?= $user['id'] ?>&pg=do&click=cart"></a> -->
<!--
        <abbr title="Add To Favourites">
          <button onclick="favfn(event);" href="#" style="color: #ff913c">
            <i class="fa fa-star ml-3"></i>
          </button>
        </abbr> -->
        <a id="btn_fav" href="./shoppingCart.php?id=<?= $user['id'] ?>&pg=do&click=fav"></a>
      </div></div>
</form>
    </li>
    <?php
    if($counter>10) break;
   }?>
          </ul>
</div></fieldset>
</div>
</article>
<!-- =============================================================================================================================== -->
<article class="art3">
  <div class="container-fluid">
    <div class="row">

      <div class="col">
        <img src="./art3_1.png">
        <h4>No minimum order</h4>
        <p>Order in for yourself or for the group, with no restrictions on order value</p>
      </div>
      <div class="col">
        <img src="./art3_2.png">
        <h4>Live order tracking</h4>
        <p>Know where your order is at all times, from the inventory to your doorstep</p>
      </div>
      <div class="col">
        <img src="./art3_3.png">
        <h4>Super Fast delivery</h4>
        <p>Experience our's superfast delivery for grocery fresh & on time</P>
      </div>

    </div>
    </div>
</article>
<!-- ================================================================================================================================ -->
<article>

  <div class="container-fluid">
     <div class="row card_margins">
       <div class="col-md-4 cards">
         <img src="./card1.jpg" alt="Image" class="card_image">
       <a class="card_btn" href="./DailyOffers.php?sort=1">click here</a>
     </div>
     <div class="col-md-4 cards">
       <img src="./card2.jpg" alt="Image" class="card_image">
      <a class="card_btn" href="./fandv.php?sort=2" >click here</a>
   </div>
   <div class="col-md-4 cards">
     <img src="./card3.jpg" alt="Image" class="card_image">
    <a class="card_btn" href="help&support.php">click here</a>
 </div>
   </div>
 </div>

</article>

</main>

<footer>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-4 foot">
      <h2>About us</h2>
      <hr>
      <p>This website is created by Akhilesh Arora</p>
    </div>

    <div class="col-md-4 foot">
    <h2>Contact us</h2>
    <hr>
    <P>Akhilarora002@gmail.com</p>

    </div>
</div>
</footer>

<script>
function logIN(){
  // alert("cdihcic");
  document.getElementById("log").style.display = "block";
  document.getElementById("sign").style.display = "none";
}
function signUP(){
  document.getElementById("log").style.display = "none";
  document.getElementById("sign").style.display = "block";
}
function loginClose(){
  document.getElementById("log").style.display = "none";
  document.getElementById("sign").style.display = "none";
}
function signupClose(){
  document.getElementById("log").style.display = "none";
  document.getElementById("sign").style.display = "none";
}
</script>

</body>
</html>

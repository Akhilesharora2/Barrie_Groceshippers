<?php include_once("./head.php") ?>
<?php include_once("./admin/connect.php") ?>
<?php
if(session_status()===PHP_SESSION_NONE) session_start();

if($_GET['sort'] == 1){
  $sql="SElect * from products where id between 94 and 108 order by price";
}else if($_GET['sort']==2){
  $sql="SElect * from products where id between 94 and 108 order by id";
}else{
  $sql="SElect * from products where id between 94 and 108 order by quantity";
}

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
        <li class="nav-item">
          <a class="nav-link " href="./BarrieGroceshippers.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./DailyOffers.php?sort=1">Daily offers</a>
        </li>
        <li class="nav-item dropdown  active font-weight-bold">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Shop by categories
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="./fandv.php?sort=1">Fruits & vegetables</a>
            <a class="dropdown-item" href="./dandp.php?sort=1">Dairy Products</a>
            <a class="dropdown-item" href="./aandp.php?sort=1">Animal Products</a>
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
        <label for="username">Username</label></br>
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

  <aside>
    <div class="container-fluid side_bar">
      <div class="row">
        <div class="col-md-12">
          <p>Asian Products: </p>

          <ul>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Sort by:
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="?sort=1">Price</a>
              <a class="dropdown-item" href="?sort=2">Newest</a>
              <a class="dropdown-item" href="?sort=3">Popularity</a>
            </div>
          </li>
        </ul>

        </div>
      </div>
    </div>

  </aside>
  <article>
  <div class="container-fluid">
    <fieldset>
      <legend> Our Products</legend>
    <div class="row">
      <ul class="DOCards">
        <?php foreach($users as $user): ?>
      <li>
<!-- <form action="./shoppingCart.php?id=<?= $user['id'] ?>&pg=do&click=" method="post"> -->
        <div class="card">
        <!-- <img class="card-img-top" src="./img1.jpg" alt="Card image" style="width:100%"> -->
        <?php
        echo '<img class="card-img-top" src=data:image;base64,'.$user['image'].' alt="image" height="150px" width="150px"/>'  ?>

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
        </div>
      </div>
<!-- </form> -->
    </li>
      <?php endforeach ?>
      </ul>
</div></fieldset>
</div>
</article>

</main>
<footer>
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

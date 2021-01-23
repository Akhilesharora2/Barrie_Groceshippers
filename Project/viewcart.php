<?php
include_once("./head.php") ;
include_once("./admin/connect.php");

  if(session_status()===PHP_SESSION_NONE) session_start();
  if(!isset($_SESSION['username'])){
    $url='./NotLoggedin.php';
    header('location:' . $url);
    exit();
  }
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
       <li class="nav-item active font-weight-bold">
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



                 <h1>Your cart has the following items!!</h1>
                 <div  style="float:right;">
                 <button class="btn btn-danger mr-5 mt-5" onclick="purchase();">Check Out</button>
                 <p class="mr-5 mt-5">you can buy you items by clicking Check Out.</p>
               </div>
<?php  if(count($_SESSION['item_list'])>0){
       foreach ($_SESSION['item_list'] as $items){
         $sql="SElect * from products where id = $items";
         $stmt=$conn->prepare($sql);
         $stmt->execute();
         $user=$stmt->fetch();  ?>
               <div class="row">
                 <ul class="card_horz">

                   <?php  if(isset($user)) { ?>

                 <li>
             <form action="./shoppingCart.php" method="post">
                   <div class="card">
                   <?php
                   echo '<img class="card-img-top" src=data:image;base64,'.$user['image'].' alt="image" height="150px" width="150px"/>'  ?>
                   <!-- <img class="card-img-top" src="./img1.jpg" alt="Card image" style="width:100%"> -->
                   <div class="card-body">
                     <h4 class="card-title"><?= $user['Name'] ?></h4>
                     <p class="card-text"><?= $user['Description'] ?></p>
                     <!-- <a href="#" class="btn btn-primary">Buy Now</a> -->
                     <!-- <abbr title="Add To Cart"> <button ><i class="fa fa-shopping-cart ml-3"></i></button></abbr> -->
                     <!-- <abbr title="Add To Favourites"> <a href="#" style="color: #ff913c"><i class="fa fa-star ml-3"></i></a></abbr> -->
                   </div></div>
             </form>
                 </li>
                 <?php } ?>
                       </ul>
             </div>
<?php } }else{
  echo "if is not working";
} ?>


<small style="background:yellow;" class="ml-5 mb-5">*NOTE:You're items in cart are no longer available after you logout</small>
</main>
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
function purchase(){
  alert("Further is the link to payment prrprocessors!!, which I have'nt don yet!");
}
</script>
</body>
</html>

<?php include_once("./head.php") ;
include_once("./admin/connect.php");
// include_once("./shoppingCart.php");
// session_start();
  if(session_status()===PHP_SESSION_NONE) session_start();
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

<h2 class="ml-3">You can't use this function because you have not logged in</h2>
<p class="ml-5">Fore more help and support <a href="./help&support.php"> click here</a></p>


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
</script>
</body>

</html>

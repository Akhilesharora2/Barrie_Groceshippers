<?php  include_once("../head.php") ?>
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

<main>
  <div class="container-fluid">
    <div class="row">
      <div class="col">


    <a href="form.php">+ Add Product...</a>
    <ul id="sort">
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Sort by:-
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="?sort_id=0&delete=0" id="id01">Id</a>
        <a class="dropdown-item" href="?sort_id=1&delete=0" id="id02">Name</a>
        <a class="dropdown-item" href="?sort_id=2&delete=0" id="id03">Price</a>
        <a class="dropdown-item" href="?sort_id=3&delete=0" id="id04">Quantity</a>
    </li>
  </ul>
    <?php
    include_once("./connect.php");
    include_once("./sort.php");
    $sql = $sort;
      // $stmt = $conn->prepare($sql);
      // $stmt->execute();
      // $users = $stmt->fetchAll();
$mysqlicon=mysqli_connect("localhost","root","","project");

$stmt=mysqli_query($mysqlicon,$sql);

    ?>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Id</th>
          <th>Image</th>
          <th>Name</th>
          <th>Description</th>
          <th>Price</th>
          <th>Quantity</th>
          <th>Edit</th>
        </tr>
      </thead>

      <tbody>
        <!-- Iterate over the users and display their details -->
        <?php  while ($user=mysqli_fetch_assoc($stmt)){ ?>
          <tr>
            <td>
              <p><?= $user['id'] ?></p>
            </td>
            <td>
              <?php
              echo '<img src=data:image;base64,'.$user['image'].' alt="image" height="150px" width="150px"/>'  ?>
            </td>
            <td>
              <p><?= $user['Name'] ?></p>
            </td>
            <td>
              <p><?= $user['Description'] ?></p>
            </td>
            <td>
              <p><?= $user['price'] ?></p>
            </td>
            <td>
              <p><?= $user['quantity'] ?></p>
            </td>
            <td>
              <a   href="./modify.php?modify=<?= $user['id'] ?>"> <button  style="color: black;"><i class="fa fa-pencil"></i>Modify</button> </a>
              <button style="color: red;"  onclick="func(event)"><i class="fa fa-pencil"></i>Delete</button>  <a id="myCheck" href="?sort_id=<?= $_GET['sort_id'] ?>&delete=<?= $user['id'] ?>"></a>
            </td>
          </tr>


        <?php } ?>
        </tbody>
      </table>

      <!-- <?php
      echo "<div id='pagination' >";
      echo pagination($_SESSION[startpointno] , $_SESSION['limitno'] , $_SESSION['pageno']);
      echo "</div>";
       ?> -->

      </div>
    </div>
</div>
</main>
<footer>

</footer>

<script>
function func(event){
  const eleInteractedWith = event.target;
  const checkLink = eleInteractedWith.parentElement.querySelector('a#myCheck');
  var ans=confirm("Are you sure?");
  if(ans==true){
      checkLink.click();
  }
}
</script>

</body>
</html>


<?php
// include("pagination/function.php");




$sort = (function(){
  //   if(session_status()===PHP_SESSION_NONE) session_start();
  //
  // $page=(int) (!isset($_GET["page"]) ? 1: $_GET["page"]);
  // $limit=5;
  // $startpoint = ($page * $limit) - $limit;
  //
  // $_SESSION['pageno']=$page;
  // $_SESSION['limitno']=$limit;
  // $_SESSION['startpointno']=$startpoint;





if($_GET['sort_id'] == 1){ $sql = "SELECT * FROM products order by name";
echo "<style>
#id02{
  color: blue;
}
</style>";
}

if($_GET['sort_id'] == 2){ $sql = "SELECT * FROM products order by price";
  echo "<style>
  #id03{
    color: blue;
  }
  </style>";
}
if($_GET['sort_id'] == 3){ $sql = "SELECT * FROM products order by Quantity";
  echo "<style>
  #id04{
    color: blue;
  }
  </style>";
}

if($_GET['sort_id'] == 0) {
$sql = "SELECT * FROM products order by id";
echo "<style>
#id01{
  color: blue;
}
</style>";
 }


return $sql;
})();

$delete_func= (function(){

  $conn =mysqli_connect("localhost","root","","project");
  if($_GET['delete'] !=0){
    $id_value=$_GET['delete'];
  $sql_dlt="delete from products where id = '$id_value'";
  $stmt2= $conn->query($sql_dlt);
  // $stmt2->bindParam(':id', $sql_id ,PDO::PARAM_INT);
  // $stmt2->execute();
}

})();

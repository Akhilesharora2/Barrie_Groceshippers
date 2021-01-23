<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="device-width=width, initial-sacle=1">

  <title>Barrie Grocshipers</title>

  <!-- bootstrap css link -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
  rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<!-- bootstrap jquery link -->
  <script
    src="https://code.jquery.com/jquery-1.12.4.min.js"
    integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
    crossorigin="anonymous"></script>
</head>
<body>
  <?php
// define variables and set to empty values
$first_name =$last_name= $email =$contact_number=$address = $password = $confirm_password = "";
$first_nameErr = $last_nameErr = $emailErr =$contact_numberErr= $addressErr = $passwordErr = $confirm_passwordErr = "";

// validation for each variable
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["fname"])) {
    $first_nameErr = "First Name is required";
  } else {
    $first_name = test_input($_POST["fname"]);
  }

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["lname"])) {
      $last_nameErr = "Last Name is required";
    } else {
      $last_name = test_input($_POST["lname"]);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (empty($_POST["e-Mail"])) {
        $emailErr = "E-Mail is required";
      } else {
        $email = test_input($_POST["e-Mail"]);
      }

      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["contact_Number"])) {
          $contact_numberErr = "phone number is required";
        } else {
          $contact_number = test_input($_POST["address_"]);
        }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (empty($_POST["address_"])) {
        $addressErr = "Address is required";
      } else {
        $address = test_input($_POST["address_"]);
      }

      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["password"])) {
          $passwordErr = "Password is required";
        } else {
          $password = test_input($_POST["password"]);
        }

       if ($_SERVER["REQUEST_METHOD"] == "POST") {
          if (empty($_POST["confirm_password"])) {
            $confirm_passwordErr = "Password confirmation is required";
          } else {
            $confirm_password = test_input($_POST["confirm_password"]);
          }
          // matching both the password
        if($_POST['password'] != $_POST['confirm_password']){
          echo "Oops! password does not match try again";
        }

// function that trims , removing all the slashes and using htmlspecialchars to avoid hacking of form
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<div class="conatiner">
  <h2>Barrie Grocshipers</h2>
  <div class="panel panel-default">
    <div class="panel-body">
      <!-- //building a form -->
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="form-group">
          First Name :<input type="text" name="fname">
          <span class="error"> <?php echo $first_nameErr;?></span>
        </div>
        <br><br>
        <div class="form-group">
          Last Name :<input type="text" name="lname">
          <span class="error"> <?php echo $last_nameErr;?></span>
        </div>
        <br><br>
        <div class="form-group">
          E-Mail :<input type="text" name="e-Mail">
          <span class="error"> <?php echo $emailErr;?></span>
        </div>
        <br><br>
        <div class="form-group">
        Contact Number :<input type="text" name="contact_Number">
          <span class="error"> <?php echo $confirm_passwordErr;?></span>
          <br><br>
        <div class="form-group">
          Address :<input type="text" name="address_">
          <span class="error"> <?php echo $addressErr;?></span>
        </div>
        <br><br>
        <div class="form-group">
          Password :<input type="text" name="password" autocomplete="off">  <!-- used autocomplete so that user should the password again-->
          <span class="error"> <?php echo $passwordErr;?></span>
        </div>
        <br><br>
        <div class="form-group">
          Confirm Password :<input type="text" name="confirm_password" autocomplete="off">    <!-- used autocomplete so that user should the password again-->
          <span class="error"> <?php echo $confirm_passwordErr;?></span>
        </div>
        <br><br>
        <div class="checkbox">
          <label><input type="checkbox"> Remember me</label>
        </div>
          <input type="submit" name="submit" value="Create a New Account">
      </form>
    </div>
  </div>
</div>
</body>
</html>

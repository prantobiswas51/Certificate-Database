<?php
session_start();
if (isset($_SESSION['username'])) {
echo "<script>location.href = 'https://uqsr.world/admin/add/add.php';</script>";
}


$servername = "localhost";
$username = "applyiso_certificateUser";
$password = "!bu^_ZdIhvcA";
$dbname = "applyiso_comCertificates";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);


if(isset($_POST['submit_btn'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];



  //query the database for user

  $result = $conn->query("SELECT * FROM `admin` WHERE email = '$username' and password = '$password'");


if ($result->num_rows==1) {
echo "logged In";

$_SESSION['username']=$username;
echo "<script>location.href = 'https://uqsr.world/admin/add/add.php';</script>";
exit();

}elseif ($result->num_rows==0) {
echo "Wrong Email and Password Combination! Please try again.";
}elseif ($result->num_rows>1) {
echo "multiple user found with same name";
} else {
echo "error";
}

}

?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="login.css">
</head>
<body>

<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->
    <h2 class="active"> LogIn </h2>


    <!--<img src="../../files/UQSR.png" alt="Logo">-->
    <!-- Login Form -->
    <form method="post" action="" class="login">
      <input type="email" id="login" class="fadeIn second" name="username" placeholder="Email">
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="Password">
      <input type="submit" class="fadeIn fourth" value="LogIn" name="submit_btn">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="https://uqsr.world/admin/login/pr-ask-email.php">Forgot Password?</a>
    </div>

  </div>
</div>





</body>
</html>

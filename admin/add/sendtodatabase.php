<?php

session_start();
if (!isset($_SESSION['username'])) {
echo "<script>location.href = 'https://uqsr.world/admin/login/login.php';</script>";
die();
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="textshow.css">
    <style>
        body{
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    margin: 0px;
    padding: 0px;
}

p{
    text-align: center;
    color:rgb(9, 255, 0);
    background-color: black;
    padding: 10px;
    font-weight: 700;
}

.bkbtn{
    height: 40px;
    width: 100px;
    color: #04d17c;
    background-color: #292925;
    border-radius: 30px;
    border-style: none;
    box-shadow: 1px 1px 7px;
    font-weight: 700;
}

.btn-con{
    text-align: center;
}
    </style>
    <title>UQSR</title>
</head>
<body>
    <p><?php

    $servername = "localhost";
    $username = "applyiso_certificateUser";
    $password = "!bu^_ZdIhvcA";
    $dbname = "applyiso_comCertificates";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    if(isset($_POST['submit']))
    {
        $certificateNumber = $_POST['cern']; //name value of input form
        $companyName = filter_data($_POST['comn']);
        $address = filter_data($_POST['address']);
        $standard = filter_data($_POST['standard']);
        $issueDate = filter_data($_POST['issdate']);
        $expiryDate = filter_data($_POST['expdate']);
        $currentStatus = filter_data($_POST['currentstatus']);
        $comment = filter_data($_POST['comment']);


    $result = $conn->query("SELECT * FROM `cernum` WHERE certificateNumber = '$certificateNumber'");
    if($result->num_rows == 0) {



       $insert = mysqli_query($conn,"INSERT INTO `cernum`(`certificateNumber`, `companyName`, `address`, `standard`, `issueDate`, `expiryDate`, `currentStatus`, `comment`) VALUES ('$certificateNumber','$companyName','$address','$standard','$issueDate','$expiryDate','$currentStatus','$comment')");

        if(!$insert)
        {
            echo "Error submiting data! Check the problems below.";
            echo "Error: " . $insert . "<br>" . $conn->error;
        }
        else
        {
        echo "Data Submitted Successfully. Press Back Button to Go Back.";

        }


    } else {
      echo "$certificateNumber is already a existing value";
    }


    }

    function filter_data($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }




    mysqli_close($conn); // Close Connection ?></p>
  <a href="add.php"><div class="btn-con"><button class="bkbtn">Back</button></div></a>
</body>
</html>

<?php
$servername = "sdb-p.hosting.stackcp.net";
$username = "certificateNum-31393885e3";
$password = "FIh,FG.e~Q|j";
$dbname = "certificateNum-31393885e3";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully.<br>";

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

    $insert = mysqli_query($conn,"INSERT INTO `cernum`(`certificateNumber`, `companyName`, `address`, `standard`, `issueDate`, `expiryDate`, `currentStatus`, `comment`) VALUES ('$certificateNumber','$companyName','$address','$standard','$issueDate','$expiryDate','$currentStatus','$comment')");

    if(!$insert)
    {
        echo "Error submiting data! Check the problems below.";
        echo "Error: " . $insert . "<br>" . $conn->error;
    }
    else
    {
        echo "Records added successfully.<br>";
        header( "refresh:5; url=add.html" );

    }
}

function filter_data($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

mysqli_close($conn); // Close Connection
?>
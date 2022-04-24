<?php
session_start();
if (!isset($_SESSION['username'])) {
echo "<script>location.href = 'https://uqsr.world/admin/login/login.php';</script>";
die();
}
 ?>










 <!DOCTYPE html>
 <html lang='en'>
 <head>
     <meta charset='UTF-8'>
     <meta http-equiv='X-UA-Compatible' content='IE=edge'>
     <meta name='viewport' content='width=device-width, initial-scale=1.0'>
     <link rel='stylesheet' href='textshow.css'>
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



     include_once 'connection.php';
     $no=$_GET['no'];
     if ($no=="") {
       header('Location: ' . $_SERVER['HTTP_REFERER']);
       exit;
       die();
     }else {
       $sql = "DELETE FROM `cernum` WHERE `cernum`.`no` = $no";
       $insert = mysqli_query($conn, $sql);

       if (!$insert)
       {
           echo "Error submiting data! Check the problems below.";
           echo "Error: " . $insert . "<br>" . $conn->error;
       }
       else
       {
           echo "Records deleted successfully";
           header('Location: ' . $_SERVER['HTTP_REFERER']);
    
       }


     }


      ?></p>
     <a href='pre-edit.php'> <div class='btn-con'><button class='bkbtn'>Back</button></div> </a>
 </body>
 </html>

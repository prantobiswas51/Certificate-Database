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
    <link rel="stylesheet" href="add.css">
    <link rel="stylesheet" href="dlt.css">
    <title>Document</title>
</head>
<body>

   <div class="headerLink">
      <ul>
          <li><a href="https://uqsr.world/admin/add/pre-edit.php">Search</a></li>
          <li><a href="https://uqsr.world/admin/add/add.php">Add</a></li>
          <li><a href="https://uqsr.world/admin/login/logout.php">Logout</a></li>
      </ul>
   </div>

    <div class="logo"><img src="../../files/UQSR.png" alt=""></div>

    <h1>Edit Existing Credential</h1>
    <div class="form-container">
        <form action="update_data_in_database.php" method="post">
          <?php
          include 'connection.php';
          $no=$_GET['no'];
          if ($no=="") {
        echo "<script>location.href = 'https://uqsr.world/admin/add/pre-edit.php';</script>";
          }
          //get the data from database
          $sql = "SELECT * FROM `cernum` WHERE no = '$no'";
          $result = mysqli_query($conn, $sql);
          while($row = mysqli_fetch_assoc($result)){

          echo "
          <input type='text' placeholder='Certificate Number' name='cern' value='". $row['certificateNumber'] ."' required>
          <input type='text' placeholder='Company Name' name='comn' value='". $row['companyName'] ."' required> <br>
          <input type='text' placeholder='Address' name='address' value='". $row['address'] ."' required>
          <input type='text' placeholder='Standard' name='standard' value='". $row['standard'] ."' required> <br>
          <input type='date' placeholder='Issue Date' name='issdate' value='". $row['issueDate'] ."' required>
          <input type='date' placeholder='Expiry Date' name='expdate' value='". $row['expiryDate'] ."' required> <br>
          <select name='currentstatus' id=''>
              <option value='". $row['currentStatus'] ."' >". $row['currentStatus'] ."</option>
              <option value='Active' >Active</option>
              <option value='Suspended'>Suspended</option>
              <option value='Withdrawn'>Withdrawn</option>
          </select> <br>


          <textarea placeholder='Scope' name='comment' value=''>". $row['comment'] ."</textarea> <br>

          <input type='hidden' value='".$no."' name='no'/>
          <input type='submit' name='submit' value='UPDATE' id='addbtn'>";



          }

           ?>

        </form>

        <div class="deletebtn"><a href="https://uqsr.world/admin/add/delete-cirtificate.php?no=<?php echo $_GET['no']; ?>">  <button style="background-color: red; color:white;"> Delete </button></a></div>




    </div>



</body>
</html>

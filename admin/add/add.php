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
    <title>UQSR Add Certificates</title>
</head>
<body>

   <div class="headerLink">
      <ul>
          <li><a href="https://uqsr.world/admin/add/pre-edit.php">Search</a></li>
          <li><a href="https://uqsr.world/admin/add/pre-edit.php">Edit</a></li>
          <li><a href="https://uqsr.world/admin/login/logout.php">Logout</a></li>
      </ul>
   </div>

    <div class="logo"><img src="../../files/UQSR.png" alt=""></div>

    <h1>Add New Credential</h1>
    <div class="form-container">
        <form action="sendtodatabase.php" method="post">
            <input type="text" placeholder="Certificate Number" name="cern" required>
            <input type="text" placeholder="Company Name" name="comn" required> <br>
            <input type="text" placeholder="Address" name="address" required>
            <input type="text" placeholder="Standard" name="standard" required> <br>
            <input type="date" placeholder="Issue Date" name="issdate" required>
            <input type="date" placeholder="Expiry Date" name="expdate" required> <br>
            <select name="currentstatus" id="">
                <option value="Active">Active</option>
                <option value="Suspended">Suspended</option>
                <option value="Withdrawn">Withdrawn</option>
            </select> <br>
            <!--<input type="text" placeholder="Scope (Optional)" name="commentex"> <br>-->
            <textarea placeholder="Scope(Optional) 200 Word Max" name="comment"></textarea> <br>
            <input class="scopeField" type="submit" name="submit" value="Add" id="addbtn">
        </form>
    </div>

</body>
</html>

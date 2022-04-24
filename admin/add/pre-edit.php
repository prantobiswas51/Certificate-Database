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
    <script src="https://kit.fontawesome.com/2aee2ea5d2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="preedit.css">
    <title>UQSR Edit</title>
</head>
<body>

    <div class="headerLink">
      <ul>
          <li><a href="https://uqsr.world/admin/add/add.php">Add</a></li>
          <li><a href="#">Edit</a></li>
          <li><a href="https://uqsr.world/admin/login/logout.php">Logout</a></li>
      </ul>
   </div>

    

    <div class="logo"><img src="../../files/UQSR.png" alt="" width="20%"></div>

    <div class="editexisting">Edit Existing Certificate Credentials</div>
    
    

    <div class="table-container">
        
        <form action="" method="get">
            <input type="text" placeholder="Certificate Number" name ="search" value = "<?php echo $_GET['search']; ?>" required>
            <input type="submit" value="Search">
            <a href="pre-edit.php"><input type="button" value="Reset"></a>
            </form>

        <table>
            
        <thead>
            <th>Certificate Number</th>
            <th>Company Name</th>
            <th>Address</th>
            <th>Standard</th>
            <th>Issue Date</th>
            <th>Expiry Date</th>
            <th>Current Status</th>
            <th>Scope</th>
            <th>Edit</th>
        </thead>

            <tbody>
                <?php
                include 'connection.php';

                if ($_GET['search']=="") {
                  $sql = "SELECT * FROM `cernum`";
                }else {
                  $searchedthing = $_GET['search'];
                    $sql = "SELECT * FROM `cernum` WHERE certificateNumber like '%".$searchedthing."%'";
                }

                $result = mysqli_query($conn, $sql);

                  while($row = mysqli_fetch_assoc($result)){


                            echo "<tr>
                                  <td>". $row['certificateNumber'] ."</td>
                                  <td>". $row['companyName'] ."</td>
                                  <td>". $row['address'] ."</td>
                                  <td>". $row['standard'] ."</td>
                                  <td>". $row['issueDate'] ."</td>
                                  <td>". $row['expiryDate'] ."</td>
                                  <td>". $row['currentStatus'] ."</td>
                                  <td>". $row['comment'] ."</td>
                                  <td><a href='edit.php?no=". $row['no'] ."'><i class='fas fa-user-edit'></i></a></td>
                                  </tr>";

                      }
                ?>
            </tbody>

        </table>

    </div>

</body>
</html>

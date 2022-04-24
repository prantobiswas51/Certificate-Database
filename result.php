<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="result.css">
    <title>Data Search</title>

    <style>

        body{
            margin: 0px;
            padding: 0px;
            background-image: url(files/result.jpg);
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            font-family: roboto;
        }

        .title{
          text-align: center;
          margin: 30px;
        }

        .table-container{
          margin: 0 auto;
        }

        table{
          margin: 0 auto;
          width: 50%;
          background-color: rgb(253, 253, 253);
          padding: 10px;
          border-radius: 10px 10px 10px 10px;
        }

        .logo{
          text-align: center;
          padding: 40px;
        }

        img{
          width:20%;
          }

        .searchagain{
          text-align: center;
          margin: 0 auto;
        }

        a{
          list-style: none;
          background-color: rgb(0, 214, 161);
          padding: 20px;
          text-align: center;
          align-items: center;
          border-radius: 30px;
          font-weight: 700;
        }

        a:link {
          text-decoration: none;
          color: #000000;
        }

        th{
          text-align: left;
          margin: 20px;
        }

        td th{
          height: 50px;
        }

        table, th, td {
          padding: 10px;
        }

        tr:nth-child(even) {
          background-color: #f2f2f2;
        }
        
        .discl{
        	margin: 0 auto;
        	/*color: white;*/
        	padding: 5px;
        	box-shadow: 2px 2px 10px;
        	max-width: 50%;
        	margin-top: 20px;
        	border-radius: 10px;
        	font-size: 12px;
        }



        @media only screen and (max-width: 600px) {
          table{
            background-color: rgb(253, 253, 253);
            width: 98%;
            max-width: 98%;
          }

          img{
          width:70%;
          }
          
          .discl{
        	max-width: 90%;

         }


        }
    </style>

</head>
<body>

    <div class="logo"><img src="files/UQSR.png" alt="logo"></div>
    <div class="searchagain"><a href="index.html">Search again</a></div>
    <h1 class="title">Certificate Details</h1>

    <div class="table-container">
    <table>
      <tbody>
        <?php


        include 'files/connection.php';
        
        $searchedthing = $_GET['q'];

        //get the data from database
        $sql = "SELECT * FROM `cernum` WHERE certificateNumber like '%".$searchedthing."%'";
        $result = mysqli_query($conn, $sql);

        // Find the number of records returned
        $num = mysqli_num_rows($result);
        if($num> 0){

            while($row = mysqli_fetch_assoc($result)){

            if ($row['certificateNumber'] ==$searchedthing) {
              echo "  <tr>
                      <th>Certificate Number</th>
                      <td>". $row['certificateNumber'] ."</td>
                      </tr>

                      <tr>
                      <th>Company Name</th>
                      <td>". $row['companyName'] ."</td>
                      </tr>

                      <tr>
                      <th>Address</th>
                      <td>". $row['address'] ."</td>
                      </tr>

                      <tr>
                      <th>Standard</th>
                      <td>". $row['standard'] ."</td>
                      </tr>

                      <tr>
                      <th>Issue Date</th>
                      <td>". $row['issueDate'] ."</td>
                      </tr>

                      <tr>
                      <th>Expiry Date</th>
                      <td>". $row['expiryDate'] ."</td>
                      </tr>

                      <tr>
                      <th>Current Status</th>
                      <td>". $row['currentStatus'] ."</td>
                      </tr>

                      <tr>
                      <th>Scope</th>
                      <td>". $row['comment'] ."</td>
                      </tr>";
              }else {
                include 'error.html';
                exit();
              }
            }
        }else {
          include 'error.html';
          exit();
        }
        ?>
      </tbody>

    </table>
    </div>
    
    <div class="discl">Disclaimer: For any kind of mistake in certification details, please inform us at info@uqsr.org Though we try to keep this database updated, the actual status of the certificate may vary in certain cases, as this database is updated manually.</div>

</body>
</html>

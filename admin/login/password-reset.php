<?php
include 'connection.php';
$emeil = $_GET['email'];

if ($emeil != "")
{
    $random = generateRandomString();
    $sql = "SELECT * FROM `admin`";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result))
    {

        if ($row['email'] == $emeil)
        {
            $no = $row['no'];
            echo "</br>We Sent you a Password Reset Link in your Email." . $row['email'];
            $insert = mysqli_query($conn, "UPDATE `admin` SET `token` = '$random' WHERE `admin`.`no` = $no");
            if (!$insert)
            {
                echo "Error submiting data! Check the problems below.";
                echo "Error: " . $insert . "<br>" . $conn->error;
            }
            else
            {
                echo "Records added successfully.<br>";
                sendMailToUser($emeil, $random);

            }
        }
    }

}
elseif ($_GET['token'] != "")
{
    $token_email = $_GET['token_email'];
    $sql = "SELECT * FROM `admin` WHERE email = '$token_email'";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result))
    {
        if ($row['token'] == $_GET['token'] && $row['email'] == $token_email)
        {
            $no = $row['no'];
            echo "Please Enter New Password ";
            echo "<!DOCTYPE html>
      <html lang='en'>
      <head>
        <meta charset='UTF-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Password Reset</title>
      </head>
      <body class='body'>

        <h2>UQSR Password Reset Form</h2>
        <form action='https://uqsr.world/admin/login/password-reset.php' method='post'>
          <input type='password' placeholder='New Password' name='newpassword' required><br>
          <input type='hidden' value='" . $no . "' name='no'/>
          <input type='submit' value='Save Changes' name='submit'>
        </form>

      </body>
      </html>
";
        }
        else
        {
            echo "token expired";

        }

    }

}
elseif ($_POST['submit'] != "")
{
    $newpassword = $_POST['newpassword'];
    $no = $_POST['no'];

    $insert = mysqli_query($conn, "UPDATE `admin` SET `password` = '$newpassword' WHERE `admin`.`no` = $no");
    if (!$insert)
    {
        echo "Error submiting data! Check the problems below.";
        echo "Error: " . $insert . "<br>" . $conn->error;
    }
    else
    {
        echo "Password Changed Successfully.<br>";

    }
}

function sendMailToUser($email, $rand)
{

    $subject = 'UQSR Password Reset';
    $message = 'To Reset your Password, Please Click this Link <a href="https://uqsr.world/admin/login/password-reset.php?token=' . $rand . '&token_email=' . $email . '">RESET</a>';
    $headers = 'From: PasswordReset@UQSR.WORLD' . "\r\n" . 'Reply-To: webmaster@example.com' . "\r\n" . 'X-Mailer: PHP/' . phpversion();

    mail($email, $subject, $message, $headers);
    echo "<br>Mail Sent Successfully";
}

function generateRandomString($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0;$i < $length;$i++)
    {
        $randomString .= $characters[rand(0, $charactersLength - 1) ];
    }
    return $randomString;
}

?>

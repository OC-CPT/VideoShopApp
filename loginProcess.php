<?php

// Added for user error message
session_start();

// Process login credentials from index.php and then redirect to the Vdeioshop form
require_once('connection.php');

$email = $password = $pwd = '';
$email = $_POST['username'];
$pwd = $_POST['password'];
$password = MD5($pwd);
$sql = "SELECT * FROM user WHERE USERNAME='$email' AND PASSWORD='$password'";
    $result = mysqli_query($mysqli, $sql);

    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_assoc($result))
        {
            $userkey = $row["USER_KEY"];
            $username = $row["USERNAME"];
            session_start();
            $_SESSION['USER_KEY'] = $userkey;
            $_SESSION['email'] = $email;
        }
        header("Location: videoForm.php");
    }
    else
    {
        $incorrectPassword = "Invalid email or password";
        
        $_SESSION['wmessage'] = "Wrong password has been entered";
        $_SESSION['msg_type'] = "danger";

        header("location: index.php");
    }
?>
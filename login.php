<?php

// Process login credentials from index.php and then redirect to the Vdeioshop form

require_once('connection.php');
$email = $password = $pwd = '';

$email = $_POST['username'];
$pwd = $_POST['password'];
$password = MD5($pwd);
$sql = "SELECT * FROM user WHERE USERNAME='$email' AND PASSWORD='$password'
    ";
    $result = mysqli_query($conn, $sql);

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
        echo "Invalid email or password";
    }
?>
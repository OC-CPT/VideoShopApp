<?php

// Register new users and then re-direct them to the login page

require_once('connection.php');
$firstname = $surname = $username = $password = $pwd = '';

$firstname = $_POST['firstname'];
$surname = $_POST['surname'];
$username = $_POST['username'];
$pwd = $_POST['password'];
$password = MD5($pwd);

$sql = "INSERT INTO user (FIRSTNAME, SURNAME,USERNAME,PASSWORD) VALUES ('$firstname', '$surname', '$username', '$password')";
$result = mysqli_query($conn, $sql);

if($result)
{
    header("Location: index.php");
}
else
{
    echo "Error :".$sql;
}


?>
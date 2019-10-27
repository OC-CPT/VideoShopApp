<?php

session_start();

require_once('connection.php'); 

// Set default values
$video_key = 0;
$update = false;
$title = '';
$genre = '';

// Check if the save button has been pressed

if (isset($_POST['save'])){
    $title = $_POST['title'];
    $genre = $_POST['genre'];

    $mysqli->query("INSERT INTO video (title, genre) VALUES('$title','$genre')") or 
    die($mysqli->error);

    $_SESSION['message'] = "Record has been saved!";
    $_SESSION['msg_type'] = "success";

    header("location: videoForm.php");
}

// Check if the delete button has been pressed

if (isset($_GET['delete'])){
    $video_key = $_GET['delete'];
    $mysqli->query("DELETE FROM video WHERE video_key=$video_key") or die($mysqli->error());

    $_SESSION['message'] = "Record has been deleted!";
    $_SESSION['msg_type'] = "danger";

    header("location: videoForm.php");
}

// Check if the edit button has been pressed

if (isset($_GET['edit'])){
    $video_key = $_GET['edit'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM video WHERE video_key=$video_key") or die($mysqli->error());
    if (count($result)==1){
        $row = $result->fetch_array();
        $title = $row['title'];
        $genre = $row['genre'];
    }
}

// Check if the update button has been pressed

if (isset($_POST['update'])){
    $video_key = $_POST['video_key'];
    $title = $_POST['title'];
    $genre = $_POST['genre'];

    $mysqli->query("UPDATE video SET title='$title', genre='$genre' WHERE video_key='$video_key'") 
    or die($mysqli->error);

    $_SESSION['message'] = "Record has been updated!";
    $_SESSION['msg_type'] = "warning";

    header('location: videoForm.php');
}

?>
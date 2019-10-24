<?php

// Connection details for the database


$conn = mysqli_connect("localhost:3306", "videoshop_user","video$$", "videoshopdb" );

if(!$conn)
{
    echo "Database connection failed...";
}

?>
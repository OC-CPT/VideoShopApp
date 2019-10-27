<form method="POST" action="">
    <input type="search" name="keyword" placeholder="Keyword" />
    <input type="submit" name="searchbtn" value="Search" />
</form>

<?php

require_once('connection.php');

// When the search button gets clicked

if (isset($_POST['searchbtn'])) {
    $keyword = $_POST['keyword'];
    $sql = "SELECT * FROM video WHERE title LIKE '%$keyword%'";
    $query = mysqli_query($mysqli,$sql);

    //Check if result exists and print error if not

    if (mysqli_num_rows($query) < 1) {
        echo "Sorry we did not find any search results!!!";
    } else {

        // Fetch data and print results

        while ($fetch = mysqli_fetch_assoc($query)){
            $video_key = $fetch['video_key'];
            $title = $fetch['title'];

            echo  " " . $title . "<br>";
        }
    }
}

?>
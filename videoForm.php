<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Video Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="style.css">
</head>
<body>
<?php require_once('videoFormProcess.php'); ?>
<?php

  if (isset($_SESSION['message'])): ?>
  <div class="alert alert-<?=$_SESSION['msg_type']?>">
  <?php
    echo $_SESSION['message'];
    unset($_SESSION['message']);
    ?>
</div>
<?php endif ?>

<div class="container">
<?php 

$result = $mysqli->query("SELECT * FROM video") or die($mysqli->error);
?>
<div class="row"  id="new">
  <div class="col-sm-4">

  <!-- Button trigger modal, Modal -->
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalLong">
  New
</button>

<!-- Modal for New video form  -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add new video</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="videoFormProcess.php" method="POST">
    <input type="hidden" name="video_key" value="<?php echo $video_key; ?>">
  <div class="form-group">
    <label>Title</label>
    <input type="text" name="title" class="form-control" value="<?php echo $title; ?>" placeholder="Enter your title">
  </div>
  <div class="form-group">
    <label>Genre</label>
    <input type="text" name="genre" class="form-control" value="<?php echo $genre; ?>" placeholder="Enter your genre">
  </div>
  <div class="form-group">
    <?php 
    if ($update == true):
    ?>
    <button type="submit" class="btn btn-warning" name="update">Update</button>
    <button type="submit" class="btn btn-secondary" id="cancelbtn" name="update"><a href="http://localhost:8000/videoForm.php">Cancel</a></button>
    <?php else: ?>
    <button type="submit" class="btn btn-primary" name="save">Save</button>
    <?php endif; ?>
  </div>
  </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Search
</button>

<!-- Modal for search box -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Search for videos by title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
 

      <form method="POST" action="">
  <input type="submit" name="searchbtn" value="Search" class="btn btn-primary"/>
    <input type="search" name="keyword" placeholder="Keyword" />

</form>

      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>

  </div>
  <div class="col-sm/8"></div>
</div>
<div class="row">
  <div class="col-sm-">
  </div>
  <div class="col-sm-10">

</div>
</div>
  <div class="row justify-content-center">
    <div class="col-6 border border-secondary" id="table">
  <table class="table">
      <thead>
          <tr>
            <th>Title</th>
            <th>Genre</th>
            <th colspan="2">Action</th>
          </tr>
      </thead> 
      <?php // print video results into a table
        while ($row = $result->fetch_assoc()): ?>
        <tr>
          <td><?php echo $row['title']; ?></td>
          <td><?php echo $row['genre']; ?></td>
          <td>
              <a  href="videoForm.php?edit=<?php echo $row['video_key']; ?>"
              class="btn btn-info">Edit</a>
              <a href="videoFormProcess.php?delete=<?php echo $row['video_key']; ?>"
              class="btn btn-danger">Delete</a>
          </td>
        </tr>
<?php endwhile; ?>
  </table>
  
  </div>

  <div class="col-6 border" id="searchResults">
  <?php

require_once('connection.php');

// When the search button gets clicked

if (isset($_POST['searchbtn'])) {
    $keyword = $_POST['keyword'];
    $sql = "SELECT * FROM video WHERE title LIKE '%$keyword%'";
    $query = mysqli_query($mysqli,$sql);

    //Check more then one result
    if (mysqli_num_rows($query) < 1) {
        echo "<h4>Search Results for Video titles: <br><br>" . "Sorry we did not find any search results!!!";
    } else {

        // Fetch data
        while ($fetch = mysqli_fetch_assoc($query)){
            $video_key = $fetch['video_key'];
            $title = $fetch['title'];

            echo  "<h4>Search Results: <br><br>" . " " . $title . "<br>";
        }
    }
}

?>

</div>
  </div>

<?php

function pre_r( $array ) {
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}

?>

<div class="container">
<div class="row justify-content-center">
  <col-sm-4></div>
  <form action="videoFormProcess.php" method="POST">
    <input type="hidden" name="video_key" value="<?php echo $video_key; ?>">
  <div class="form-group">
    <label>Title</label>
    <input type="text" name="title" class="form-control" value="<?php echo $title; ?>" placeholder="Enter your title">
  </div>
  <div class="form-group">
    <label>Genre</label>
    <input type="text" name="genre" class="form-control" value="<?php echo $genre; ?>" placeholder="Enter your genre">
  </div>
  <div class="form-group">
    <?php 
    if ($update == true):
    ?>
    <button type="submit" class="btn btn-warning" name="update">Update</button>
    <button type="submit" class="btn btn-secondary" id="cancelbtn" name="update"><a href="http://localhost:8000/videoForm.php">Cancel</a></button>
    <?php else: ?>
    <button type="submit" class="btn btn-primary" name="save">Save</button>
    <?php endif; ?>
  </div>
  </form>
  </col-sm-8>
  </div>
</div>
</div>

<div class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="videoFormProcess.php" method="POST">
    <input type="hidden" name="video_key" value="<?php echo $video_key; ?>">
  <div class="form-group">
    <label>Title</label>
    <input type="text" name="title" class="form-control" value="<?php echo $title; ?>" placeholder="Enter your title">
  </div>
  <div class="form-group">
    <label>Genre</label>
    <input type="text" name="genre" class="form-control" value="<?php echo $genre; ?>" placeholder="Enter your genre">
  </div>
  <div class="form-group">
    <?php 
    if ($update == true):
    ?>
    <button type="submit" class="btn btn-warning" name="update">Update</button>
    <button type="submit" class="btn btn-secondary" id="cancelbtn" name="update"><a href="http://localhost:8000/videoForm.php">Cancel</a></button>
    <?php else: ?>
    <button type="submit" class="btn btn-primary" name="save">Save</button>
    <?php endif; ?>
  </div>
  </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
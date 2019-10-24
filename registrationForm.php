<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Registration Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container text-center">
<div class="row">
<div class="col-sm"></div>

    <div class="col-sm" >
            <form class="form-signin"  method="post" action="registration.php">
                <img class="mb-4" src="images\movie.svg" alt="" width="100px" height="100px">
                <h1 class="h3 mb-3 font-weight-normal">User Registration</h1>
                <label for="inputEmail" class="sr-only">First Name</label>
                <input type="text" name="firstname" class="form-control" placeholder="First Name" required autofocus>

                <input type="text" name="surname" class="form-control" placeholder="Surname" required autofocus>

                <input type="text" name="username" class="form-control" placeholder="Username" required autofocus>

                <input type="password" name="password" class="form-control" placeholder="Password" required autofocus>

                <input class="btn btn-lg btn-warning btn-block" type="submit" value="SignUp">
            </form>
    </div>

<div class="col-sm"></div>
</div>
</div>



<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>

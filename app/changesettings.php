<?php
session_start();

if(!$_SESSION['email'])
{

    header("Location: index.php");//redirect to login page to secure the welcome page without login access.
}

?>

<!doctype html>

<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Change Settings</title>
</head>

<body class="text-center">

  <body class="text-center">
    <!-- NAVBAR -->
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Welcome <?php echo $_SESSION['name'];?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="welcome.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="purchase.php">Purchase</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="addtoproducts.php">Add</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="changesettings.php">User Settings</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="logout.php">Logout</a>
            </li>
          </ul>
          <!-- <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form> -->
        </div>
      </nav>
    </div>
    <div class="container">
      <!--  Jumbotron is the header that you see, you can change its color-->
      <div style="background:#02474d; color: #EEEEEE; !important; border-radius: 0px 0px 5px 5px;" class="jumbotron">
        <!-- Title  -->
        <h1 class="display-3">CS 425 App</h1>
        <!-- About Your App -->
        <p class="lead">Small webapp for uploading products to a database.</p>
      </div>

      <div class="container">
        <div class="row">
          <div class="col-sm"></div>
            <div class="col-sm">
              <!-- Below form action needs to be changed based on the php script. -->
              <form name="input" autocomplete="off" method="post" action="changesettings.php" >
                <form>
                <h2>Change Details</h2>
                <div class="container">
                  <p>Enter Old Password
                  <label for="oldpass" class="sr-only">Email address</label>
                  <input type="password" name="oldpass" class="form-control" placeholder="Old Password" required autofocus></p>
                </div>
                <div class="container">
                  <p>Enter New Password
                  <label for="newpass" class="sr-only">Password</label>
                  <input type="password" name="newpass" class="form-control" placeholder="New Password" required></p>
                </div>
                <div class="container">
                  <p>Confirm New Password
                  <label for="conpass" class="sr-only">Confirm Password</label>
                  <input type="password" name="conpass" class="form-control" placeholder="Confirm New Password" required></p>
                </div>
                <div class="container">
                  <p>Change Address By Entering
                  <label for="newadd" class="sr-only">New Address</label>
                  <input type="text" name="newadd" class="form-control" placeholder="Change Address"></p>
                </div>

                  <button style="background:#4d0225; border:#4d0225; active: background:#4d0225; border:#4d0225;" class="btn btn-lg btn-success btn-block" type="submit" value="login" name="login">Submit</button>
              </form>
            </div>
          <div class="col-sm"></div>
        </div>
      </div>
    </div>
  <div class="row">
    <p> </p>
  </div>

      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
      <link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.min.js"></script>
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
  </html>

 <?php
 include("db_connection.php");//make connection here
 if(isset($_POST['register']))
 {
     $oldpass=$_POST['oldpass'];
     $newpass=$_POST['newpass'];
     $conpass=$_POST['conpass'];
     $newadd=$_POST['newadd'];
     $email=$_SESSION['email'];

     if($oldpass=='' or $newpass=='' or $conpass=='' or $newpass!=$conpass)
     {
       echo"<script>alert('missing field')</script>";
       exit();
     }

 //insert the user into the database.
     $update_user="UPDATE 'customer' SET 'account_password'='$newpass' WHERE 'customer'.'email'='$email'";
     if(mysqli_query($dbcon,$update_user))
     {
         echo"<script>window.open('welcome.php','_self')</script>";
     }
     else{
       echo "Error: Unable to connect to MySQL." . PHP_EOL;
       printf("Connect failed: %s\n", mysqli_errno($dbcon));

       exit;
     }
 }
 ?>

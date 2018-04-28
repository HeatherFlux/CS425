<?php
session_start();//session starts here

?>



<!doctype html>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>CS 425 App</title>
  </head>

  <body class="text-center">

    <div class="container">
      <!--  Jumbotron is the header that you see, you can change its color-->
      <div style="background:#02474d; color: #EEEEEE; !important" class="jumbotron">
        <!-- Title  -->
        <h1 class="display-3">CS 425 App</h1>
        <!-- About Your App -->
        <p class="lead">Small webapp for uploading products to a database.</p>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-sm"></div>
          <div class="col-sm">
            <!-- Below form action needs to be changed based on the php script. -->
            <form name="input" autocomplete="off" method="post" action="index.php" >
              <form>
              <h1 class="h3 mb-3 font-weight-normal">Sign in</h1>

              <label for="email" class="sr-only">Email address</label>
              <input type="email" name="email" class="form-control" placeholder="Email address" required autofocus>
              <label for="pass" class="sr-only">Password</label>
              <input type="password" name="pass" class="form-control" placeholder="Password" required>

              <div class="checkbox mb-3">
                <label>
                  <input type="checkbox" value="remember-me"> Remember me
                </label>
              </div>

                <button style="background:#4d0225; border:#4d0225; active: background:#4d0225; border:#4d0225;" class="btn btn-lg btn-success btn-block" type="submit" value="login" name="login">Sign in</button>
                <p>New User? <a href="registration.php">Create your account</a></p>
            </form>
          </div>
        <div class="col-sm">
      </div>
    </div>
  </body>

</html>


<?php

include("db_connection.php");
if(isset($_POST['login']))
{
    $user_email=$_POST['email'];
    $user_pass=$_POST['pass'];

    $check_user="select * from users WHERE user_email='$user_email'AND user_pass='$user_pass'";

    $run=mysqli_query($dbcon,$check_user);

    if(mysqli_num_rows($run))
    {
        echo "<script>window.open('welcome.php','_self')</script>";

        $_SESSION['email']=$user_email;//here session is used and value of $user_email store in $_SESSION.
    }
    else
    {
      echo "<script>alert('Email or password is incorrect!')</script>";
    }
    while($row=mysqli_fetch_array($run))//while look to fetch the result and store in a array $row.
    {
        $user_id=$row[0];
        $first_name=$row[1];
        $last_name=$row[4];
        $_SESSION['fname']=$first_name;
        $_SESSION['lname']=$last_name;
        $_SESSION['id']=$user_id;

    }

}
?>

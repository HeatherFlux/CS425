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
            <form name="input" autocomplete="off" method="post" action="registration.php" >
              <form>
              <h1 class="h3 mb-3 font-weight-normal">Register</h1>

              <label for="inputEmail" class="sr-only">Email address</label>
              <input type="email" class="form-control" name="inputEmail" placeholder="Email address" required autofocus>

              <label for="nameFull" class="sr-only">Name</label>
              <input type="text" name="nameFull" class="form-control" placeholder="Name" required>

              <label for="phone" class="sr-only">Phone Number</label>
              <input type="text" name="phone" class="form-control" placeholder="Phone Number" required>

              <label for="address" class="sr-only">Address</label>
              <input type="text" name="address" class="form-control" placeholder="Address" required>

              <label for="region" class="sr-only">Choose A Region</label>
              <select class="form-control" name="region" placeholder="Region">
                <option value="" selected disabled>Region</option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
              </select>
              <label for="accName" class="sr-only">Account Name</label>
              <input type="text" name="accName" class="form-control" placeholder="Account Name" required>

              <label for="inputPassword" class="sr-only">Password</label>
              <input type="password" name="inputPassword" class="form-control" placeholder="Password" required>

              <label for="inputPasswordC" class="sr-only">PasswordC</label>
              <input type="password" name="inputPasswordC" class="form-control" placeholder="Confirm Password" required>
              <br>
                <button style="background:#4d0225; border:#4d0225; active: background:#4d0225; border:#4d0225;" class="btn btn-lg btn-success btn-block" type="submit" name="register">Sign in</button>
                <p>Have an Account? <a href="index.php">Login</a></p>
            </form>
          </div>
        <div class="col-sm">
      </div>
    </div>
  </body>

</html>

<?php


// FIX ME, This section needs to be filled

include("db_connection.php");//make connection here
if(isset($_POST['register']))
{
    $name=$_POST['nameFull'];
    $email=$_POST['inputEmail'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];
    $wallet=0;
    $accName=$_POST['accName'];
    $pass=$_POST['inputPassword'];
    $con_pass=$_POST['inputPasswordC'];
    $pCount=0;
    $region=$_POST['region'];



    if($name=='' or $email=='' or $phone=='' or $address=='' or $accName=='' or $pass=='' or $con_pass=='' or $region=='' or $pass!=$con_pass)
    {
      echo"<script>alert('missing field')</script>";
      exit();
    }


//here query check whether the user already registered so can't register again.
    $check_email_query="select * from customer WHERE email='$user_email'";
    $run_query=mysqli_query($dbcon,$check_email_query);

    if(mysqli_num_rows($run_query)>0)
    {
      echo "<script>alert('Email $user_email is already exist in our database, Please try another one!')</script>";
      exit();
    }
//insert the user into the database.
    $insert_user="insert into customer(name, email, phone_number, address, wallet, account_name, account_password, product_count, customer_region ) VALUE ('$name','$email','$phone','$address','$wallet','$accName','$pass','$pCount','$region')";
    if(mysqli_query($dbcon,$insert_user))
    {
        echo"<script>window.open('welcome.php','_self')</script>";
    }
    else{
      echo "Error: Unable to connect to MySQL." . PHP_EOL;
      printf("Connect failed: %s\n", mysqli_errno($dbcon));
      echo "Debugging error: " . mysqli_error($insert_user) . PHP_EOL;
      exit;
    }



}

?>

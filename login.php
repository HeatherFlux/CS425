<?php

$bodyID = "";
if (isset($classes)){
$bodyID .= " class=\"";
foreach($classes as $class){
    $bodyID .= "$class ";
}
$bodyID .= "\" ";
}
if (isset($body)) {
$bodyID .= " id=\"$body\"";
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
    <link href="signin.css" rel="stylesheet">
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
            <form class="form-signin">
              <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
              <label for="inputEmail" class="sr-only">Email address</label>
              <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
              <label for="inputPassword" class="sr-only">Password</label>
              <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
              <div class="checkbox mb-3">
                <label>
                  <input type="checkbox" value="remember-me"> Remember me
                </label>
              </div>
              <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
            </form>
          </div>
        <div class="col-sm">
      </div>
    </div>
  </body>



  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
  <link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
</html>

<!-- This is where you will populate your upcoming events. -->
<!-- <div class=row marketing>
  <?php
    include "datadata.php";
    $connect = new mysqli($host, $username, $password, $db_name);
      if($connect != null){
      }
      else{
        echo "failed to connect ";
      }
    $sqlQuery = "SELECT * FROM events";
    $qry = $connect->query($sqlQuery);

    while($row = $qry->fetch_assoc()){
      echo "<div class=col-lg-6>
        <h4>".$row["name"]."</h4>
        <p>".$row["addr"]."</p>
        <p>".$row["date"]."</p>
        <p>".date('h:i:A',strtotime($row["time"]))."</p>
        <p>".$row["details"]."</p>
        </div>";
    };
  ?> -->

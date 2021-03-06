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

    <title>CS 425 App</title>
  </head>

  <!-- This is the section you will adjust the most. -->
  <body>
    <div class="container">

      <!--  Jumbotron is the header that you see, you can change its color-->
      <div style="background:#02474d; color: #EEEEEE;!important" class="jumbotron">
         <!-- Title  -->
         <h1 class="display-3">CS 425 App</h1>
         <!-- About Your App -->
         <p class="lead">Small webapp for uploading products to a database.</p>
         <p><a style="background:#4d0225; border:#4d0225; active: background:#4d0225; border:#4d0225;"class="btn btn-lg btn-success" href="../index.php" role="button">Home</a></p>
       </div>

<!--  This is where the form starts-->
    <div class="row marketing">

        <div class="col-lg-6">
          <form name="input" method="post" action="CreateUser.php">

            <form>
            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" class="form-control" name="username"  placeholder="Enter Username">
            </div>
          </div>

          <div class="col-lg-6">
             <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" name="password" placeholder="Enter Password">
             </div>
           </div> 
		   
		   <div class="col-lg-6">
             <div class="form-group">
              <label for="address">Address</label>
              <input type="text" class="form-control" name="address" placeholder="Enter Address">
             </div>
           </div> 
		   
		   <div class="col-lg-6">
             <div class="form-group">
              <label for="region">Region</label>
              <input type="number" class="form-control" name="region" placeholder="Enter Region">
             </div>
           </div>
		   
		   <div class="col-lg-6">
             <div class="form-group">
              <label for="email">Email</label>
              <input type="text" class="form-control" name="email" placeholder="Enter Email">
             </div>
           </div> 
		   
		   <div class="col-lg-6">
             <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" name="name" placeholder="Enter Name">
             </div>
           </div> 
		   
		   <div class="col-lg-6">
             <div class="form-group">
              <label for="phone_number">Phone Number</label>
              <input type="text" class="form-control" name="phone_number" placeholder="Enter Phone Number">
             </div>
           </div> 

          <br>
        <div class="container">
          <input type="submit">   <input type="reset"></center>
        </form>
      </div>
    </div>
  </div>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>

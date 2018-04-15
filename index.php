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

    <title>Von Steuben Cares</title>
  </head>

  <!-- This is the section you will adjust the most. -->
  <body>
    <div class="container">

      <!--  Jumbotron is the header that you see, you can change its color-->
      <div class="jumbotron">
         <!-- Title  -->
         <h1 class="display-3">Von Steuben Cares</h1>
         <!-- About Your App -->
         <p class="lead">Von Steuben Cares is a website dedicated to providing students at the school an updated list of volunteer opportunities around campus.</p>
         <p><a class="btn btn-lg btn-success" href="form.php" role="button">Post An Event</a></p>
       </div>

       <!-- This is where you will populate your upcoming events. -->
       <div class=row marketing>
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
         ?>
        </div>
      </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>

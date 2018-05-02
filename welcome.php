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

    <title>CS 425 App</title>
  </head>

  <body class="text-center">
    <!-- NAVBAR -->
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Welcome <?php echo $_SESSION['name'];?> $<?php echo $_SESSION['wallet'];?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="welcome.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="purchase.php">Purchase</a>
            </li>
            <li class="nav-item">
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
    </div>

    <!-- List all owned products -->
    <div class="container">
        <!-- the table starts here -->
        <div class="table-scroll">
          <h1 align="center">All Products Owned By You</h1>
          <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped">
              <thead class="thead-dark">
                <tr>
                  <th>Product Id</th>
                  <th>Product Owner</th>
                  <th>Product Name</th>
                  <th>Product Weight</th>
                  <th>Product Category</th>
                  <th>Product Quantity</th>
                  <th>Product Color</th>
                  <th>Product Cost</th>
                  <th>Product Description</th>
                  <th>Product Image</th> 
                </tr>
              </thead>
              <tbody>

            <?php
              include("db_connection.php");

          		$view_products_query="select * from product where owner = '$_SESSION[uid]'"; //select query for viewing products.
          		$run=mysqli_query($dbcon,$view_products_query);//here run the sql query

              while($row=mysqli_fetch_array($run))//while look to fetch the result and store in a array $row.
              {
                $product_id=$row[0];
                $product_owner=$row[1];
                $product_name=$row[2];
                $product_weight=$row[3];
                $product_category=$row[4];
                $product_quantity=$row[5];
                $product_color=$row[6];
                $product_cost=$row[7];
                $product_description=$row[8];
                $product_image_link=$row[9];
            ?>

            <tr>
              <!--here showing results in the table -->
        			<td><?php echo $product_id;  ?></td>
        			<td><?php echo $product_owner;  ?>
        			<td><?php echo $product_name;  ?></td>
        			<td><?php echo $product_weight;  ?></td>
        			<td><?php echo $product_category;  ?></td>
        			<td><?php echo $product_quantity;  ?></td>
        			<td><?php echo $product_color;  ?></td>
        			<td><?php echo $product_cost;  ?></td>
        			<td><?php echo $product_description;  ?></td>
        			<td><?php echo $product_image_link;  ?></td>
        		</tr>
           <?php } ?>
          </tbody>
        </table>
      </div>
      </div>
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

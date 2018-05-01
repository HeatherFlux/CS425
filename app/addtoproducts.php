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

    <title>View Products</title>
</head>

<body class="text-center">

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


    <div class="table-scrol">
        <h1 align="center">All Current Products</h1>
        <div class="table-responsive">
            <!--this is used for responsive display in mobile and other devices-->
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
                        <th>Delete User</th>
                    </tr>
                </thead>                <?php
                include("db_connection.php");
                $view_products_query="select * from product"; //select query for viewing users.
                $run=mysqli_query($dbcon,$view_products_query);//here run the sql query.
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
                    <td><?php echo $product_owner;  ?></td>
                    <td><?php echo $product_name;  ?></td>
                    <td><?php echo $product_weight;  ?></td>
                    <td><?php echo $product_category;  ?></td>
                    <td><?php echo $product_quantity;  ?></td>
                    <td><?php echo $product_color;  ?></td>
                    <td><?php echo $product_cost;  ?></td>
                    <td><?php echo $product_description;  ?></td>
                    <td><?php echo $product_image_link;  ?></td>
                    <td><a href="delete.php?del=<?php echo $product_id ?>"><button class="btn btn-danger">Delete</button></a></td> <!--btn btn-danger is a bootstrap button to show danger-->
                </tr><?php } ?>

            </table>
        </div>
    </div>


</body>

</html>

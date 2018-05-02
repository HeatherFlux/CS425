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

    <title>Purchase Products</title>
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
              <a class="nav-link" href="welcome.php">Home<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
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
          <form class="form-inline my-2 my-lg-0" name="input" method="post" action="purchase.php">
            <label for="p_name" class="sr-only">Search</label>
            <input class="form-control mr-sm-2" type="text" name="p_name" placeholder="Search Product Name" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
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

      <!-- the table starts here -->
      <div class="table-scroll">
        <h1 align="center">All Current Products</h1>
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
                <th>Purchase Amount</th>
                <th></th>
              </tr>
            </thead>
            <tbody>

                <?php
            include("db_connection.php");

            /*
              Hey Laura, I fixed the code so that it passes the quantity and
              product id of what was bought, and then update the quantity
              number as well as the users wallet. Can you implement a
              check for things like negative quantity etc etc.
            */

            //testing: adding $100 to wallet
            $wallet=$_SESSION['wallet'];
            $wallet = $wallet + 100;

            //update wallet
            if (isset($_POST['quantity']))
            {
              $quant=$_POST['quantity'];
              $pid=$_POST['productid'];
              // echo 'Quant:'.$quant;
              // echo ' Pid:'.$pid;

              //testing: adding $100 to wallet
              $wallet=$_SESSION['wallet'];
              // get price and convert to int.
              $get_price_query = "select product_cost from product where product_id like '%".$pid."%'";
              $product_price = mysqli_query($dbcon, $get_price_query);//gets result
              $row=mysqli_fetch_assoc($product_price); //converts result to int array
              // echo ' product cost:'.$row["product_cost"]; // pulls int from array
              $product_price=$row["product_cost"];

              // get quant and convert
              $get_quantity_query = "select product_quantity from product where product_id like '%".$pid."%'";
              $product_quantity = mysqli_query($dbcon, $get_quantity_query);
              $row=mysqli_fetch_assoc($product_quantity);
              //echo ' product quant:'.$row["product_quantity"];
              $product_quantity=$row["product_quantity"];

              // update quant
              // echo ' quant before:'.$product_quantity;
              $product_quantity = $product_quantity-$quant;

              //update wallet
              // echo ' wallet before:'.$wallet;
              $wallet = $wallet - ($product_price * $quant); //update current wallet

              if($product_quantity >= 0 && $wallet >= 0)
              {
                  // echo ' quant after:'.$product_quantity;
                  $update_quantity_query = "UPDATE product SET product_quantity=$product_quantity WHERE product_id like '%".$pid."%'";
                  mysqli_query($dbcon, $update_quantity_query);

                  // echo ' wallet after:'.$wallet;
                  $_SESSION['wallet'] = $wallet;
                  $uid=$_SESSION['uid'];
                  $update_wallet_query = "UPDATE customer SET wallet=$wallet WHERE customer_id like '%".$uid."%'";
                  mysqli_query($dbcon, $update_wallet_query);
                  header("Refresh:0"); // refreshes page to update wallet in the navbar
              }
              else
              {

                  echo "<script type='text/javascript'>alert('Insufficient funds or quantity to complete purchase.');</script>";
                  header("Refresh:0");

              }

            }

            //Search product name
            if (isset($_POST['p_name']))
            {
                //$view_selected_search="select * from product where product_name like '%".$search_product."%'";
                $view_selected_search="select * from product where product_name like '%".$_POST['p_name']."%'";
            	$run=mysqli_query($dbcon,$view_selected_search);
          	}
          	else
          	{
          		$view_products_query="select * from product"; //select query for viewing products.
          		$run=mysqli_query($dbcon,$view_products_query);//here run the sql query
          	}

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
      			<td>
              <form class="form-inline my-2 my-lg-0" name="input" method="post" action="purchase.php">
              <label for="quantity" class="sr-only">Quantity</label>
              <input type="hidden" name="productid" type="int"  value="<?= $product_id ?>"/>
              <input class="form-control mr-sm-2" type="int" name="quantity" placeholder="Quantity" aria-label="Quantity"/>
            </td>
            <td>
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Purchase</button>
              </form>
            </td>
      		</tr>
         <?php } ?>
        </tbody>
      </table>
    </div>
  </body>
</html>

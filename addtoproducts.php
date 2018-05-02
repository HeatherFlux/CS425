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

      <div class="container">
        <div class="row">
          <div class="col-sm"></div>
            <div class="col-sm">
              <!-- Below form action needs to be changed based on the php script. -->
              <form name="input" autocomplete="off" method="post" action="addtoproducts.php" >
                <h2>Add Product</h2>
                <form>

                <div class="container">
                  <label for="oldpass" class="sr-only">Product Name</label>
                  <input type="text" name="product_name" class="form-control" placeholder="Product Name" required autofocus></p>
                </div>

                <div class="container">
                  <label for="newpass" class="sr-only">Product Weight</label>
                  <input type="text" name="product_weight" class="form-control" placeholder="Product Weight"></p>
                </div>

                <div class="container">
                  <label for="conpass" class="sr-only">Product Category</label>
                  <input type="text" name="product_category" class="form-control" placeholder="Product Category"></p>
                </div>

                <div class="container">
                  <label for="newadd" class="sr-only">Product Quantity</label>
                  <input type="text" name="product_quantity" class="form-control" placeholder="Product Quantity"></p>
                </div>

                <div class="container">
                  <label for="newadd" class="sr-only">Product Color</label>
                  <input type="text" name="product_color" class="form-control" placeholder="Product Color"></p>
                </div>

                <div class="container">
                  <label for="newadd" class="sr-only">Product Cost</label>
                  <input type="text" name="product_cost" class="form-control" placeholder="Product Cost"></p>
                </div>

                <div class="container">
                  <label for="newadd" class="sr-only">Product Description</label>
                  <input type="text" name="product_description" class="form-control" placeholder="Product Description"></p>
                </div>

                <div class="container">
                  <label for="newadd" class="sr-only">Product Image</label>
                  <input type="text" name="product_image" class="form-control" placeholder="Product Image"></p>
                </div>

                <button style="background:#4d0225; border:#4d0225; active: background:#4d0225; border:#4d0225;" class="btn btn-lg btn-success btn-block" type="submit" value="change" name="change">Submit</button>
              </form>

              <p> </p>
            </div>
          <div class="col-sm"></div>
        </div>
      </div>


</body>
</html>

<?php
include("db_connection.php");//make connection here
if(isset($_POST['change']))
{
  //SQL data
  $powner=$_SESSION['uid'];
  $pname=$_POST['product_name'];
  $pweight=$_POST['product_weight'];
  $pcat=$_POST['product_category'];
  $pquan=$_POST['product_quantity'];
  $pcol=$_POST['product_color'];
  $pcost=$_POST['product_cost'];
  $pdesc=$_POST['product_description'];
  $pimg=$_POST['product_image'];

  //Create new category
  $newcat = "INSERT INTO category(category_name) VALUES('$pcat')";
  mysqli_query($dbcon,$newcat);

  //Obtain category ID
  $getcid = "SELECT category_id FROM category WHERE category_name = '$pcat'";
  $getcid = mysqli_query($dbcon, $getcid);
  if(!$getcid) {
    printf("Failed to obtain category: %s\n", mysqli_errno($dbcon));
    exit;
  }
  $pcat = mysqli_fetch_array($getcid);
  $pcat = $pcat[0];

  //Upload product
  $upload = "
  INSERT INTO product(owner, product_name, product_weight, product_category,
  product_quantity, product_color, product_cost, product_description, image_link)
  VALUES ('$powner', '$pname', '$pweight', '$pcat', '$pquan', '$pcol', '$pcost', '$pdesc', '$pimg')
  ";
  if(!mysqli_query($dbcon,$upload))
  {
    printf("Failed to submit product: %s\n", mysqli_errno($dbcon));
    exit;
  }

  //Done!
  echo "Uploaded the product";
}
?>

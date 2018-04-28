<!doctype html>

<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>View Users</title>
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
    <div class="table-scrol">
        <h1 align="center">All the Users</h1>
        <div class="table-responsive">
            <!--this is used for responsive display in mobile and other devices-->
            <table class="table table-bordered table-hover table-striped" style="table-layout: fixed">
                <thead>

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

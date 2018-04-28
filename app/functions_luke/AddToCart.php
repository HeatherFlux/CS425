<html>
  <body>
    <?php
	
	  //Open user-level connection
      include "CurrentUser.php";
	  
	  if($user == 0)
		  return;
	  
      $conn = new mysqli($host, $user['username'], $user['password'], $db_name);
        if($conn != null){
        }
        else{
          echo "failed to connect ";
		  return;
        }
		
		//Get the product with the specified product id
		$sql="SELECT * FROM product WHERE product_id = $_POST['id']";
		$product = $conn->query($sql);
          if ($product->num_rows > 0) {
          } else {
              echo "Error: " . $sql . "<br>" . $conn->error;
			  return;
          }
		  
		//Append the product to the cart
		$cart[] = $product
		
        $conn->close();
    ?>
  </body>
</html>

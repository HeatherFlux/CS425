<html>
  <body>
    <?php
      include "datadata.php";
      $conn = new mysqli($host, $_POST['username'], $_POST['password'], $db_name);
        if($conn != null){
        }
        else{
          echo "failed to connect ";
        }
		
		//Find the product with that id and display it
		$sql="SELECT * FROM product WHERE product_name is $_POST['name']";
		$product = $conn->query($sql);
          if ($user === TRUE) {
              echo "Login successful";
          } else {
              echo "Error: " . $sql . "<br>" . $conn->error;
          }
		  
		//Select the product?
		  
        $conn->close();
    ?>
  </body>
</html>

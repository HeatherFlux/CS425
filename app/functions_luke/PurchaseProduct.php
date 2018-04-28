<html>
  <body>
    <?php
	
	  //Open an admin-level connection
      include "datadata.php";
      $conn = new mysqli($host, $username, $password, $db_name);
        if($conn != null){
        }
        else{
          echo "failed to connect ";
		  return;
        }
		
		//Customer pays (iterate through cart)
		$sum = 0;
		if($sum <= $user['wallet']) {
			$user['wallet'] -= $sum;
		}
		else {
			echo "Insufficient funds to complete transaction";
			$conn->clos();
			return;
		}
		
		//Seller gets paid
		
        $conn->close();
    ?>
  </body>
</html>

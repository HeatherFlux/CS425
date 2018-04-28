<html>
  <body>
    <?php
	
		//Open admin-level connection
		include "RootUser.php";
		$conn = new mysqli($host, $username, $password, $db_name);
		if($conn != null) {
		}
		else {
			echo "failed to connect ";
		}

		//Register user
		$sql = "CREATE USER '$_POST[username]'@'$host' IDENTIFIED BY '$_POST[password]'";
		if ($conn->query($sql) === TRUE) { 
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
			return;
		}
		
		//Create user entry in the customers table 
		$sql = "INSERT INTO customer 
				(account_name, account_password, address, customer_region, email, name, phone_number, product_count) 
				VALUES
				('$_POST[username]', '$_POST[password]', '$_POST[address]', '$_POST[region]', 
				'$_POST[email]', '$_POST[name]', '$_POST[phone_number]', 0)";
		if ($conn->query($sql) === TRUE) {
			echo "New user created successfully";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		} 
		
        $conn->close();
    ?>
  </body>
</html>

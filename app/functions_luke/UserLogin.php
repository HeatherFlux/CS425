<html>
  <body>
    <?php
	
	//Open user-level connection
	include "RootUser.php";
	$conn = new mysqli($host, $_POST['username'], $_POST['password'], $db_name);
	if($conn != null){
	}
	else{
		echo "failed to connect ";
		return;
	}

	//Load the customer's information into memory
	$sql = "SELECT * FROM customer WHERE account_name = '$_POST[username]'";
	$user = $conn->query($sql);
	if ($user->num_rows > 0) {
		echo "Login successful";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
		return;
	}
	
	//Log user into session
	session_start();
	$_SESSION['user'] = $user;
	$_SESSION['cart'] = array();
	
	$conn->close();
    ?>
  </body>
</html>

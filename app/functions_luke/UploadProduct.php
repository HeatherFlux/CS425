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
		
		$sql="SELECT * FROM customer WHERE account_name = $_POST['username']";
		$user = $conn->query($sql);
          if ($user === TRUE) {
              echo "Login successful";
          } else {
              echo "Error: " . $sql . "<br>" . $conn->error;
          }
		  
        $conn->close();
    ?>
  </body>
</html>

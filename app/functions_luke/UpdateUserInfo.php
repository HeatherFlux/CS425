<html>
  <body>
    <?php
      include "datadata.php";
      $conn = new mysqli($host, $username, $password, $db_name);
        if($conn != null){
        }
        else{
          echo "failed to connect ";
        }

        $sql="INSERT INTO customer (name, addr, details, time, date) VALUES ($user)";
          if ($conn->query($sql) === TRUE) {
              echo "New record created successfully";
          } else {
              echo "Error: " . $sql . "<br>" . $conn->error;
          }
        $conn->close();
    ?>
  </body>
</html>

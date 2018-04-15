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

        $sql="INSERT INTO events (name, addr, details, time, date) VALUES ('$_POST[event]','$_POST[addr]','$_POST[detail]','$_POST[time]','$_POST[date]')";
          if ($conn->query($sql) === TRUE) {
              echo "New record created successfully";
          } else {
              echo "Error: " . $sql . "<br>" . $conn->error;
          }
        $conn->close();
    ?>
  </body>
</html>

<html>
  <body>
    <?php
      include "CurrentUser.php";
	  $user['wallet'] = $user['wallet'] + $_POST['funds'];
    ?>
  </body>
</html>

<?php
   // Create connection with parameters
   $dbConn = new mysqli('localhost', 'username', 'password', 'unn_w20007431');
   //check connection
   if ($dbConn->connect_error) {
      echo "<p>Connection failed: ".$dbConn->connect_error."</p>\n";
      exit;
   }
?>


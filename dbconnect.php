<?php
 error_reporting( ~E_DEPRECATED & ~E_NOTICE );
 
 define('DBHOST', '$DB_HOST');
 define('DBUSER', '$DB_USER');
 define('DBPASS', '$DB_PASS');
 define('DBNAME', '$DB_NAME');
 
 $conn = mysqli_connect(DBHOST,DBUSER,DBPASS);
 $dbcon = mysqli_select_db($conn,DBNAME);
 
 if ( !$conn ) {
  die("Connection failed : " . mysqli_error());
 }
 
 if ( !$dbcon ) {
  die("Database Connection failed : " . mysqli_error());
 }
?>

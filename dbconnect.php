<?php
 error_reporting( ~E_DEPRECATED & ~E_NOTICE );
 
$DB_HOST = getenv('DB_HOST');
$DB_USER = getenv('DB_USER');
$DB_PASS = getenv('DB_PASS');
$DB_NAME = getenv('DB_NAME');

 define('DBHOST', '$DB_HOST');
 define('DBUSER', '$DB_USER');
 define('DBPASS', '$DB_PASS');
 define('DBNAME', '$DB_NAME');
 
 $conn = mysqli_connect(DBHOST,DBUSER,DBPASS);
 $dbcon = mysqli_select_db($conn,DBNAME);
 echo DBHOST;
echo DBUSER;
 if ( !$conn ) {
  die("Connection failed : " . mysqli_error());
 }
 
 if ( !$dbcon ) {
  die("Database Connection failed : " . mysqli_error());
 }
?>

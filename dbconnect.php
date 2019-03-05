<?php
 error_reporting( ~E_DEPRECATED & ~E_NOTICE );
 
$DBHOST = getenv("DB_HOST");
$DBUSER = getenv("DB_USER");
$DBPASS = getenv("DB_PASS");
$DBNAME = getenv("DB_NAME");

 $conn = mysqli_connect($DBHOST,$DBUSER,$DBPASS);
 $dbcon = mysqli_select_db($conn,$DBNAME);
 if ( !$conn ) {
  die("Connection failed : " . mysqli_error());
 }
 
 if ( !$dbcon ) {
  die("Database Connection failed : " . mysqli_error());
 }
?>

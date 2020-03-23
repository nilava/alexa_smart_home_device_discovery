<?php
 error_reporting( ~E_DEPRECATED & ~E_NOTICE );
 
$DBHOST = getenv("DB_HOST");
$DBUSER = getenv("DB_USER");
$DBPASS = getenv("DB_PASS");
$DBNAME = getenv("DB_NAME");
$DBPORT = getenv("DB_PORT");

$conn = mysqli_init();
$ctx = $conn->real_connect($DBHOST,$DBUSER,$DBPASS,$DBNAME,$DBPORT);
 if ( !$ctx ) {
  die("Connection failed : " . mysqli_error());
 }
?>

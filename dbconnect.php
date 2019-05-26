<?php
 error_reporting( ~E_DEPRECATED & ~E_NOTICE );
 
$DBHOST = getenv("DB_HOST");
$DBUSER = getenv("DB_USER");
$DBPASS = getenv("DB_PASS");
$DBNAME = getenv("DB_NAME");
$DBPORT = getenv("DB_PORT");

$conn = mysqli_init();
$conn->ssl_set('client.pem', 'client.pem', 'caa.pem', NULL, NULL);
$ctx = $conn->real_connect($DBHOST,$DBUSER,$DBPASS,$DBNAME,$DBPORT,null,MYSQLI_CLIENT_SSL_DONT_VERIFY_SERVER_CERT);
 if ( !$ctx ) {
  die("Connection failed : " . mysqli_error());
 }
?>

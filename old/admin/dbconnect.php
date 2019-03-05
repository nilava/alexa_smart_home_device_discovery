<?php
 error_reporting( ~E_DEPRECATED & ~E_NOTICE );
 
 define('DBHOST', 'eu-cdbr-west-02.cleardb.net');
 define('DBUSER', 'b6c77e36927837');
 define('DBPASS', '37c17096');
 define('DBNAME', 'heroku_e9d1e71990bb024');
 
 $conn = mysqli_connect(DBHOST,DBUSER,DBPASS);
 $dbcon = mysqli_select_db($conn,DBNAME);
 
 if ( !$conn ) {
  die("Connection failed : " . mysqli_error());
 }
 
 if ( !$dbcon ) {
  die("Database Connection failed : " . mysqli_error());
 }
?>

<?php
include_once('dbconnect.php');
if (isset($_GET['rfid'])) {
    $rfid = $_GET['rfid'];
    $qr = "SELECT * FROM users WHERE RFID = $rfid ";
    $query = mysqli_query($conn,$qr); 
    //echo $_GET['rfid'];
    $count = mysqli_num_rows($query);
	if($count == "0"){
		echo "Unauthorized RFID";
	}else{
        $row = mysqli_fetch_array($query);
        if($row['Enabled'] == "0"){
            echo "RFID Disabled";
        }
        else{
        $name = $row['Name'];
                echo($name);   
        }
    }
             
}
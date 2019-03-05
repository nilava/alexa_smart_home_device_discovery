<?php
include_once('../../dbconnect.php');
    $tablename = $_POST['name'];
   $sql = "DROP TABLE $tablename;";
   if ($conn->query($sql) === TRUE) {
    echo "Deleted successfully";
} else {
    echo "Error:" . $conn->error;
}
?>
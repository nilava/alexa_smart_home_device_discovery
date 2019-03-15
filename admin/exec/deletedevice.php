<?PHP
include_once('../../dbconnect.php');

    $sql = "DELETE FROM " .$_POST['room']. " WHERE endpointId=".$_POST['endpointId'];
    //echo $sql;
    if ($conn->query($sql) === TRUE) {
        echo "Deleted successfully";
       
    }
   else {
        echo "Error: <br>" . $conn->error;
    
    }

?>
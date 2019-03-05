<?PHP
include_once('../../dbconnect.php');

if($_POST['friendlyname']){
$name = $_POST['friendlyname'];
$description = $_POST['description'];
$category = $_POST['category'];
$token = $_POST['authtoken'];   
$switchkey = $_POST['skey'];
$bkey = $_POST['bkey'];
$bsupport = $_POST['bsupport'];
$csupport = $_POST['csupport'];
$ret = $_POST['retrievable'];

$sql = "INSERT INTO " .$_POST['room']. " (friendlyName, description, device_category, Auth_Token, Switch_Virtual_Key, brightness_virtual_key, brightness_support, color_support, retrievable)
 VALUES ('$name', '$description', '$category', '$token', '$switchkey', '$bkey', '$bsupport', '$csupport', '$ret');";

 if ($conn->multi_query($sql) === TRUE) {
    echo "New records created successfully";
} else {
    echo "Error: <br>" . $conn->error;
}

}
?>
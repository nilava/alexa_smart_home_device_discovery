<?PHP
include_once('../../dbconnect.php');

if($_POST['endpointId']){
$endpointId = $_POST['endpointId'];    
$name = $_POST['friendlyname'];
$description = $_POST['description'];
$category = $_POST['category'];
$token = $_POST['authtoken'];   
$switchkey = $_POST['skey'];
$bkey = $_POST['bkey'];
$bsupport = $_POST['bsupport'];
$csupport = $_POST['csupport'];
$ret = $_POST['retrievable'];

$sql = "UPDATE " .$_POST['room']. " SET friendlyName='$name', description='$description', device_category='$category', Auth_Token='$token', Switch_Virtual_Key='$switchkey', brightness_virtual_key='$bkey',
brightness_support='$bsupport', color_support='$csupport',retrievable='$ret' WHERE endpointId=".$endpointId;
$stmt = $conn->prepare($sql);
//$stmt->execute();

if ($stmt->execute() === TRUE) {
    echo "Updated successfully";
} else {
    echo "Error: <br>" . $conn->error;
}
}

?>
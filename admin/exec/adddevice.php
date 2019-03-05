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
$endpointid = generateRandomString();
$sql = "INSERT INTO " .$_POST['room']. " (endpointId, friendlyName, description, device_category, Auth_Token, Switch_Virtual_Key, brightness_virtual_key, brightness_support, color_support, retrievable)
 VALUES ('$endpointid', '$name', '$description', '$category', '$token', '$switchkey', '$bkey', '$bsupport', '$csupport', '$ret');";

 if ($conn->multi_query($sql) === TRUE) {
    echo "New Device Added successfully";
} else {
    echo "Error: <br>" . $conn->error;
}
}



function generateRandomString($length = 8) {
    $characters = '0123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

?>
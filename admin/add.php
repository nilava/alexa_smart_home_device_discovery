<!DOCTYPE html>
<html>
    <head>
       <title>Add Device</title> 
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
<body>
<div id="loader"></div>
<div style="display:none;" id="myDiv" class="animate-bottom">
<div class="topnav" id="myTopnav">
  <a href="./index.php">Home</a>
  <a href="./add.php" class="active">Add Device</a>
  <a href="./rooms.php">Manage Rooms</a>
  <a class="icon" onclick="topNav()">
    <i class="fa fa-bars"></i>
  </a>
</div>
<?PHP
include_once('dbconnect.php');
if($_GET['friendlyname']){
$name = $_GET['friendlyname'];
$description = $_GET['description'];
$category = $_GET['category'];
$token = $_GET['authtoken'];   
$switchkey = $_GET['skey'];
$bkey = $_GET['bkey'];
$bsupport = $_GET['bsupport'];
$csupport = $_GET['csupport'];
$ret = $_GET['retrievable'];

$sql = "INSERT INTO " .$_GET['room']. " (friendlyName, description, device_category, Auth_Token, Switch_Virtual_Key, brightness_virtual_key, brightness_support, color_support, retrievable)
 VALUES ('$name', '$description', '$category', '$token', '$switchkey', '$bkey', '$bsupport', '$csupport', '$ret');";

 if ($conn->multi_query($sql) === TRUE) {
    //echo "New records created successfully";
    $success = "true";
    header( "refresh:1;url=./index.php" );
} else {
    echo "Error: <br>" . $conn->error;
   // header( "refresh:1;url=./add.php" );
}
// echo $sql;
}




echo "
<div class=\"form\">
<center><br><br></center>";
if($success == "true"){
echo "<br><br><div class=\"alert\">
  <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span> 
  <center>Successfully Added</center>
</div><br>";
}
if($success != "true"){
echo "<form action=\"./add.php\">
   Friendly Name:<br>
  <input type=\"text\" name=\"friendlyname\" >
  <br>
  Description:<br>
  <input type=\"text\" name=\"description\" >
  <br>
  Device Category:<br>
  <select name=\"category\">
  <option value=\"LIGHT\">Light</option>
  <option value=\"SWITCH\">Switch</option>
  </select>
  <br>
  Auth Token:<br>
  <input type=\"text\" name=\"authtoken\" >
  <br>
  Switch Virtual Key:<br>
  <input type=\"text\" name=\"skey\">
  <br>
  Brightness Virtual Key:<br>
  <input type=\"text\" name=\"bkey\" >
  <br>
  Brightness Support:<br>
  <select name=\"bsupport\">
  <option value=\"Yes\">Yes</option>
  <option value=\"No\">No</option>
  </select>
  <br>
  Color Support:<br>
  <select name=\"csupport\">
  <option value=\"Yes\">Yes</option>
  <option value=\"No\">No</option>
  </select>
  <br>
  Retrievable:<br>
  <select name=\"retrievable\">
  <option value=\"true\">true</option>
  <option value=\"false\">false</option>
  </select>
  <br>
  Room:<br>
  <select name=\"room\">";
  $listdbtables = array_column(mysqli_fetch_all($conn->query('SHOW TABLES')),0);
  $i=0;
  while($listdbtables[$i] != NULL){
  $sql = "SELECT * FROM " . $listdbtables[$i];
  $currenttable = $listdbtables[$i];
  $i++;
  echo"<option value=\"$currenttable \">$currenttable </option>";
  }
  echo" </select>
  <br><br>
  <input type=\"submit\" value=\"Submit\" id=\"submit\">
</form> 
</div>

";
}
$conn->close();
?>
</div>
</body>
<link rel="stylesheet" href="CSS/main.css" type="text/css">
<script src="js/sidenav.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</html>
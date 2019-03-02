<!DOCTYPE html>
<html>
    <head>
       <title>Update Device</title> 
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
<body>
<div id="loader"></div>
<div style="display:none;" id="myDiv" class="animate-bottom">
<div class="topnav" id="myTopnav">
  <a href="./index.php">Home</a>
  <a href="./add.php">Add Device</a>
  <a href="#" class="active">Update Device</a>
  <a href="./rooms.php">Manage Rooms</a>
  <a class="icon" onclick="topNav()">
    <i class="fa fa-bars"></i>
  </a>
</div>
<?PHP
include_once('dbconnect.php');
if($_GET['endpointId']){
    $endpointId = $_GET['endpointId'];
    $name = $_GET['friendlyname'];
    $description = $_GET['description'];
    $category = $_GET['category'];
    $token = $_GET['authtoken'];   
    $switchkey = $_GET['skey'];
    $bkey = $_GET['bkey'];
    $bsupport = $_GET['bsupport'];
    $csupport = $_GET['csupport'];
    $ret = $_GET['retrievable'];
 $sql = "UPDATE " .$_GET['room']. " SET friendlyName='$name', description='$description', device_category='$category', Auth_Token='$token', Switch_Virtual_Key='$switchkey', brightness_virtual_key='$bkey',
 brightness_support='$bsupport', color_support='$csupport',retrievable='$ret' WHERE endpointId=".$endpointId;
 // Prepare statement
 $stmt = $conn->prepare($sql);

 // execute the query
 $stmt->execute();
 $success = "true";
 header( "refresh:1;url=./index.php" );
}

if($success == "true"){
    echo "<br><br><div class=\"alert\">
      <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span> 
      <center>Successfully Updated</center>
    </div><br>";
    }




if($_GET['update']){
$endpointId = $_GET['update'];    
$table = $_GET['table'];  
$sql = "SELECT * FROM " .$table.  " WHERE endpointId = " . $_GET['update'];
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);
$name = $row['friendlyName'];
$description = $row['description'];
$category = $row['device_category'];
$token = $row['Auth_Token'];   
$switchkey = $row['Switch_Virtual_Key'];
$bkey = $row['brightness_virtual_key'];
$bsupport = $row['brightness_support'];
$csupport = $row['color_support'];
$ret = $row['retrievable'];
$room = $_GET['table'];
echo "
<div class=\"form\">
<center><br><br></center>
<form action=\"./update.php\">
<input type=\"hidden\" name=\"endpointId\" value=\"$endpointId\">
   Friendly Name:<br>
  <input type=\"text\" name=\"friendlyname\" value=\"$name\">
  <br>
  Description:<br>
  <input type=\"text\" name=\"description\" value=\"$description\">
  <br>
  Device Category:<br>
  <select name=\"category\" value=\"$category\">
  <option value=\"LIGHT\">Light</option>
  <option value=\"SWITCH\">Switch</option>
  </select>
  <br>
  Auth Token:<br>
  <input type=\"text\" name=\"authtoken\" value=\"$token\">
  <br>
  Switch Virtual Key:<br>
  <input type=\"text\" name=\"skey\" value=\"$switchkey\">
  <br>
  Brightness Virtual Key:<br>
  <input type=\"text\" name=\"bkey\" value=\"$bkey\">
  <br>
  Brightness Support:<br>
  <select name=\"bsupport\">
  <option value=\"$bsupport\" selected hidden>$bsupport</option>
  <option value=\"Yes\">Yes</option>
  <option value=\"No\">No</option>
  </select>
  <br>
  Color Support:<br>
  <select name=\"csupport\">
  <option value=\"$csupport\" selected hidden>$csupport</option>
  <option value=\"Yes\">Yes</option>
  <option value=\"No\">No</option>
  </select>
  <br>
  Retrievable:<br>
  <select name=\"retrievable\">
  <option value=\"$ret\" selected hidden>$ret</option>
  <option value=\"true\">true</option>
  <option value=\"false\">false</option>
  </select>
  <br>
  Room:<br>
  <input type=\"text\" name=\"room\" value=\"$room\" readonly>
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
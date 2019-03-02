<!DOCTYPE html>
<html>
    <head>
       <title>Home</title> 
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
<body>
<div id="loader"></div>
<div style="display:none;" id="myDiv" class="animate-bottom">
<div class="topnav" id="myTopnav">
  <a href="./index.php" class="active">Home</a>
  <a href="./add.php">Add Device</a>
  <a href="./rooms.php">Manage Rooms</a>
  <a class="icon" onclick="topNav()">
    <i class="fa fa-bars"></i>
  </a>
</div>
<div class="row">

  <div class="columnc">
    <div class="card">
      <p><i class="fa fa-cogs"></i></p>
      <h3 id="tdevices">0</h3>
      <p>Total Devices</p>
    </div>
  </div>
  <div class="columnc">
    <div class="card">
      <p><i class="fa fa-toggle-on"></i></p>
      <h3 id="tswitches">0</h3>
      <p>Switches</p>
    </div>
  </div>
  <div class="columnc">
    <div class="card">
      <p><i class="fa fa-lightbulb-o"></i></p>
      <h3 id="tlights">0</h3>
      <p>Lights</p>
    </div>
  </div>

</div>

<div class="searchbar">
<input type="text" id="searchbar" onkeyup="search()" placeholder="Search..">
</div>
<?PHP
include_once('dbconnect.php');

if($_GET['delete']){
    $sql = "DELETE FROM " .$_GET['table']. " WHERE endpointId=".$_GET['delete'];
    //echo $sql;
    if ($conn->query($sql) === TRUE) {
        //echo "Record deleted successfully";
        $success = "true";
        header( "refresh:1;url=./index.php" );
    }
   else {
        echo "Error: <br>" . $conn->error;
        header( "refresh:5;url=./index.php" );
    }
}


if($_GET['deleteconf']){
    echo "<br><br><div class=\"warning\">
      <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span> 
      <center>Are you sure you want to delete ";
    echo $_GET['name']." from table ".$_GET['table']."?";
    echo "<br><br><br><a class=\"yesbox\" href=\"./index.php?delete=".$_GET['deleteconf']."&table=".$_GET['table']."\">Yes</a><a class=\"nobox\" href=\"./index.php\">No</a></center></div><br>";
}


if($success == "true"){
    echo "<br><br><div class=\"alert\">
      <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span> 
      <center>Successfully Deleted</center>
    </div><br>";
    }

$listdbtables = array_column(mysqli_fetch_all($conn->query('SHOW TABLES')),0);
$j=0;
while($listdbtables[$j] != NULL){
$sql = "SELECT * FROM " . $listdbtables[$j];
$currenttable = $listdbtables[$j];
$j++;
//echo "<button class=\"accordion\">Section 1</button>";
}


if(!$_GET['delete'] && !$_GET['deleteconf']){
$listdbtables = array_column(mysqli_fetch_all($conn->query('SHOW TABLES')),0);
$i=0;
while($listdbtables[$i] != NULL){
$sql = "SELECT * FROM " . $listdbtables[$i];
$currenttable = $listdbtables[$i];
$i++;
$result = mysqli_query($conn,$sql);
echo "<button class=\"accordion\">$currenttable</button>";
echo "<div class=\"panel\">";
while($row = mysqli_fetch_array($result))
{
$totaldevices++;
if($row['device_category']  == "LIGHT"){$lights++;}elseif($row['device_category'] == "SWITCH"){$switches++;};
echo "<div class=\"columns\">";    
echo "<ul class=\"price\">";    
echo "<li class=\"header\">" . $row['friendlyName'] . "</li>";
echo "<li class=\"grey\">Description: " . $row['description'] . "</li>";
echo "<li>Device Category: " . $row['device_category'] . "</li>";
echo "<li>Switch Virtual Key: " . $row['Switch_Virtual_Key'] . "</li>";
echo "<li>Brightness Support: " . $row['brightness_support'] . "</li>";
echo "<li>Color Support: " . $row['color_support'] . "</li>";
echo "<li>Retreivable: " . $row['retrievable'] . "</li>";
echo "<li class=\"grey\"><a class=\"update\" href=\"./update.php?update=".$row['endpointId']."&table=".$currenttable."\">Update</a> / <a class=\"delete\" href=\"./index.php?deleteconf=".$row['endpointId']."&table=".$currenttable."&name=".$row['friendlyName']."\">Delete</a></li>";
echo "</ul></div>";
}
echo "</div>";
}
echo"<p id=\"divtotaldevices\" style=\"display: none;\">$totaldevices</p>";
echo"<p id=\"divlights\" style=\"display: none;\">$lights</p>";
echo"<p id=\"divswitches\" style=\"display: none;\">$switches</p>";
$conn->close();
}

?>

</div>
</body>
<link rel="stylesheet" href="CSS/main.css" type="text/css">
<script src="js/sidenav.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
</html>
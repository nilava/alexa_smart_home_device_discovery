<!DOCTYPE html>
<html>
    <head>
       <title>Home</title> 
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
<body>
<div class="topnav">
    <a onclick="openNav()">☰</a>
  <a href="./index.php" class="active">Home</a>
  <a href="./add.php">Add Device</a>
  <a href="#contact">Contact</a>
</div>


<?PHP
include_once('dbconnect.php');

if($_GET['delete']){
    $sql = "DELETE FROM " .$_GET['table']. " WHERE endpointId=".$_GET['delete'];
    //echo $sql;
    if ($conn->query($sql) === TRUE) {
        //echo "Record deleted successfully";
        $success = "true";
        header( "refresh:2;url=./index.php" );
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


echo "<div id=\"mySidebar\" class=\"sidebar\"><center><font color=\"white\"><h1>Rooms</h1></font>
  <a class=\"closebtn\" onclick=\"closeNav()\">×</a>";
  
while($listdbtables[$j] != NULL){
$sql = "SELECT * FROM " . $listdbtables[$j];
$currenttable = $listdbtables[$j];
$j++;
if($j == '1'){
    echo "<a onclick=\"openCity(event, '$currenttable')\" id=\"defaultOpen\">$currenttable</a>";
}
else{
    echo "<a onclick=\"openCity(event, '$currenttable')\">$currenttable</a>";
}
}

echo "</center></div>";

$listdbtables = array_column(mysqli_fetch_all($conn->query('SHOW TABLES')),0);
$i=0;
while($listdbtables[$i] != NULL){
$sql = "SELECT * FROM " . $listdbtables[$i];
$currenttable = $listdbtables[$i];
$i++;
$result = mysqli_query($conn,$sql);
echo "<div id=\"$currenttable\" class=\"tabcontent\">";
echo "<center>";
echo"<h1>".$currenttable."</h1>";
echo "<table border='1' id=\"devices\">
<tr>
<th>Friendly Name</th>
<th>Description</th>
<th>Device Category</th>
<th>Auth Token</th>
<th>Switch Virtual Key</th>
<th>Brightness Virtual Key</th>
<th>Brightness Support</th>
<th>Color Support</th>
<th>Retrievable</th>
<th>Operations</th>
</tr>";    
while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['friendlyName'] . "</td>";
echo "<td>" . $row['description'] . "</td>";
echo "<td>" . $row['device_category'] . "</td>";
echo "<td>" . $row['Auth_Token'] . "</td>";
echo "<td>" . $row['Switch_Virtual_Key'] . "</td>";
echo "<td>" . $row['brightness_virtual_key'] . "</td>";
echo "<td>" . $row['brightness_support'] . "</td>";
echo "<td>" . $row['color_support'] . "</td>";
echo "<td>" . $row['retrievable'] . "</td>";
echo "<td><a class=\"update\" href=\"./update.php?update=".$row['endpointId']."&table=".$currenttable."\">Update</a> / <a class=\"delete\" href=\"./index.php?deleteconf=".$row['endpointId']."&table=".$currenttable."&name=".$row['friendlyName']."\">Delete</a></td>";
echo "</tr>";
}
echo "</table></center></div>";

}

$conn->close();
?>


</body>
<link rel="stylesheet" href="CSS/main.css" type="text/css">
<script src="js/sidenav.js"></script>
</html>
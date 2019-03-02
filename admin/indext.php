<!DOCTYPE html>
<html>
    <head>
       <title>Home</title> 
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
<body>
<div class="topnav">
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
}
$conn->close();
?>


</body>
<link rel="stylesheet" href="CSS/main.css" type="text/css">
<script src="js/sidenav.js"></script>
</html>
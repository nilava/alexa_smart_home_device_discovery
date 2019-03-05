<!DOCTYPE html>
<html>
    <head>
       <title>Manage Rooms</title> 
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
<body>
<div id="loader"></div>
<div style="display:none;" id="myDiv" class="animate-bottom">
<div class="topnav" id="myTopnav">
  <a href="./index.php">Home</a>
  <a href="./add.php">Add Device</a>
  <a href="./rooms.php" class="active">Manage Rooms</a>
  <a class="icon" onclick="topNav()">
    <i class="fa fa-bars"></i>
  </a>
</div>

<?PHP
include_once('dbconnect.php');

if($_GET['delete']){
    echo "success";
}

if($_GET['deleteconf']){
    echo "<br><br><div class=\"warning\">
      <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span> 
      <center>Are you sure you want to delete ";
    echo $_GET['deleteconf']."?";
    echo "<br><br><br><a class=\"yesbox\" href=\"./index.php?delete=".$_GET['deleteconf']."&table=".$_GET['table']."\">Yes</a><a class=\"nobox\" href=\"./index.php\">No</a></center></div><br>";
}


echo "<div class=\"w3-container\">
  <h2>Rooms</h2>
  <ul class=\"w3-ul w3-card-4\">";
$listdbtables = array_column(mysqli_fetch_all($conn->query('SHOW TABLES')),0);
$j=0;
while($listdbtables[$j] != NULL){
$sql = "SELECT * FROM " . $listdbtables[$j];
$currenttable = $listdbtables[$j];
$j++;
echo "<li class=\"w3-display-container\">$currenttable<a href=\"rooms.php?deleteconf=1\" onclick=\"this.parentElement.style.display='none'\" class=\"w3-button w3-transparent w3-display-right\">&times;</a></li>";
}


echo "</ul></div>";























$conn->close();
?>
</div>
</body>
<link rel="stylesheet" href="CSS/main.css" type="text/css">
<script src="js/sidenav.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</html>
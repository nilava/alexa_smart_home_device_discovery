<!DOCTYPE html>
<html>
    <head>
       <title>Manage Rooms</title> 
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
<body>
<div id="loader"></div>
<div style="display:none;" id="myDiv" class="animate-bottom">

<?PHP
include_once('../dbconnect.php');

if($_GET['delete']){
    echo "success";
}


echo "<div>
  <h2><center>Rooms</center></h2>
  <ul>";
$listdbtables = array_column(mysqli_fetch_all($conn->query('SHOW TABLES')),0);
$j=0;
while($listdbtables[$j] != NULL){
$sql = "SELECT * FROM " . $listdbtables[$j];
$currenttable = $listdbtables[$j];
$j++;
echo "<li value=\"$currenttable\">$currenttable<span class=\"close\">&times;</span></li>";
}


echo "</ul><center><button class=\"button\" id=\"addroom\" onclick=\"addRoom()\">Add Room</button></center></div>";

$conn->close();
?>
</div>
</body>
<script>
window.onload = showPage();

function showPage() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("myDiv").style.display = "block";
}
var closebtns = document.getElementsByClassName("close");
var i;

for (i = 0; i < closebtns.length; i++) {
  closebtns[i].addEventListener("click", function() {
    var tablename = this.parentElement.getAttribute("value");
    if (confirm('Are you sure you want to delete this?')) {
      this.parentElement.style.display = 'none';
        $.ajax({
            url: 'exec/deleteroom.php',
            type: "POST",
            data: {
                name: tablename
            },
            success: function (data) {
              alert(data);
                // does some stuff here...
            }
        });
    }
  });
}


function addRoom(){
  $("#content").load("exec/addroom.php");
}
</script>




<style>
* {
  box-sizing: border-box;
}

ul {
  list-style-type: none;
  padding: 10px;
  margin: 0;
}

ul li {
  border: 1px solid #ddd;
  margin-top: -1px; /* Prevent double borders */
  background-color: #f6f6f6;
  padding: 12px;
  text-decoration: none;
  font-size: 18px;
  color: black;
  display: block;
  position: relative;
}

ul li:hover {
  background-color: #eee;
}

.close {
  cursor: pointer;
  position: absolute;
  top: 50%;
  right: 0%;
  padding: 12px 16px;
  transform: translate(0%, -50%);
}

.close:hover {background: #bbb;}
</style>
</html>
<!DOCTYPE html>
<html>
    <head>
       <title>Update Device</title> 
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
<body>
<div id="loader"></div>
<div style="display:none;" id="myDiv" class="animate-bottom">
<?PHP
include_once('../dbconnect.php');

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
<form action=\"javascript:void(0);\" method=\"post\">
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
  <input type=\"submit\" value=\"Submit\" id=\"submit\" onclick=\"updateDevice()\">
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
<script>
window.onload = showPage();

function showPage() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("myDiv").style.display = "block";
}


function updateDevice(){
   var endpointId = document.getElementsByName("endpointId")[0].value 
   var name = document.getElementsByName("friendlyname")[0].value;
   var description = document.getElementsByName("description")[0].value;
   var category = document.getElementsByName("category")[0].value;
   var authtoken = document.getElementsByName("authtoken")[0].value;
   var skey = document.getElementsByName("skey")[0].value;
   var bkey = document.getElementsByName("bkey")[0].value;
   var bsupport = document.getElementsByName("bsupport")[0].value;
   var csupport = document.getElementsByName("csupport")[0].value;
   var retrievable = document.getElementsByName("retrievable")[0].value;
   var room = document.getElementsByName("room")[0].value;
   
   $.ajax({
            url: 'exec/updatedevice.php',
            type: "POST",
            data: {
               endpointId: endpointId,
               friendlyname: name,
               description: description,
               category: category,
               authtoken: authtoken,
               skey: skey,
               bkey: bkey,
               bsupport: bsupport,
               csupport: csupport,
               retrievable: retrievable,
               room: room
            },
            success: function (data) {
               alert(data);
               $("#content").load("admin.php");
            }
        });
}
</script>
</html>
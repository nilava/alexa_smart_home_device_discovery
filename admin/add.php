<!DOCTYPE html>
<html>
    <head>
       <title>Add Device</title> 
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
<body>
<div id="loader"></div>
<div style="display:none;" id="myDiv" class="animate-bottom">
<?PHP
include_once('../dbconnect.php');





echo "
<div class=\"form\">
<center><br><br></center>";
echo "<form action=\"javascript:void(0);\" method=\"post\">
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
  <input type=\"submit\" value=\"Submit\" onclick=\"addDevice()\" id=\"submit\">
</form> 
</div>

";
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

function addDevice(){
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
            url: 'exec/adddevice.php',
            type: "POST",
            data: {
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
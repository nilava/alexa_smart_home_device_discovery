<!DOCTYPE html>
<html>
    <head>
       <title>Add Rooms</title> 
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
<body>
<div id="loader"></div>
<div style="display:none;" id="myDiv" class="animate-bottom">
<?php
include_once('../../dbconnect.php');
    

if($_POST['name']){
$roomname = $_POST['name'];
$sql = "CREATE TABLE $roomname (
    `endpointId` int(10) NOT NULL,
    `friendlyName` varchar(20) NOT NULL,
    `description` varchar(20) NOT NULL,
    `device_category` varchar(20) NOT NULL DEFAULT 'SWITCH',
    `Auth_Token` varchar(40) NOT NULL,
    `Switch_Virtual_Key` varchar(4) NOT NULL,
    `brightness_virtual_key` varchar(4) NOT NULL,
    `brightness_support` varchar(3) NOT NULL,
    `color_support` varchar(3) NOT NULL,
    `retrievable` varchar(5) NOT NULL DEFAULT 'true',
    PRIMARY KEY (`endpointId`) USING BTREE
  )";

if ($conn->query($sql) === TRUE) {
    echo "Room created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

}


echo"<div class=\"form\"><br>
<form action=\"javascript:void(0);\" method=\"post\">
Room Name: <input type=\"text\" id=\"roomname\"><br>
<input type=\"submit\" value=\"Submit\" id=\"submit\" onclick=\"formSubmit()\">
</form>
</div>";
?>
</div>
</body>
<script>
window.onload = showPage();

function showPage() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("myDiv").style.display = "block";
}

function formSubmit(){
    var roomname =  document.getElementById("roomname").value;
    $.ajax({
            url: 'exec/addroom.php',
            type: "POST",
            data: {
                name: roomname
            },
            success: function (data) {
            $("#content").load("rooms.php");
                // does some stuff here...
            }
        });
}
</script>
</html>
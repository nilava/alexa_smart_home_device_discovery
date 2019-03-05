<!DOCTYPE html>
<html>
    <head>
       <title>Home</title> 
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
<body>
<div id="mainloader"></div>
<div style="display:none;" id="mainmyDiv" class="animate-bottom">
<div class="topnav" id="myTopnav">
  <a href="#" id="home"  onclick="openHome()">Home</a>
  <a href="#" id="adddevice" onclick="openAddDevice()">Add Device</a>
  <a href="#" id="managerooms" onclick="openManageRooms()">Manage Rooms</a>
  <a class="icon" onclick="topNav()">
    <i class="fa fa-bars"></i>
  </a>
  </div>

<div id="content"></div>
</div>
</body>
<link rel="stylesheet" href="CSS/main.css" type="text/css">
<script src="js/sidenav.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
<script>
    window.onload = openHome();
</script>
</html>

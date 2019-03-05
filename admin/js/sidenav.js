window.onload = showPage();

function showPage() {
  document.getElementById("mainloader").style.display = "none";
  document.getElementById("mainmyDiv").style.display = "block";
}


function topNav() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}

function openHome(){
  var a = document.getElementById("home");
  var b = document.getElementById("adddevice");
  var c = document.getElementById("managerooms");
  a.className = "active";
  b.className = "";
  c.className = "";
      $("#content").load("admin.php");
}
function openAddDevice(){
  var a = document.getElementById("home");
  var b = document.getElementById("adddevice");
  var c = document.getElementById("managerooms");
  a.className = "";
  b.className = "active";
  c.className = "";
  $("#content").load("add.php");
}
function openManageRooms(){
  var a = document.getElementById("home");
  var b = document.getElementById("adddevice");
  var c = document.getElementById("managerooms");
  a.className = "";
  b.className = "";
  c.className = "active";
  $("#content").load("rooms.php");
}
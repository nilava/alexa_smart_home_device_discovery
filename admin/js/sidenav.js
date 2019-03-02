var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("activee");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight){
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}

var myVar;

window.onload = showPage();

function showPage() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("myDiv").style.display = "block";
  updateCounters();
}


function topNav() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}



function search() {
  // Declare variables
  var input, filter, ul, li, a, i, txtValue;
  input = document.getElementById('searchbar');
  filter = input.value.toUpperCase();
  li = document.getElementsByClassName("accordion");


  //Loop through all list items, and hide those who don't match the search query
  for (i = 0; i < li.length; i++) {
    a = li[i];
    txtValue = a.textContent || a.innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      li[i].style.display = "";
    } else {
      li[i].style.display = "none";
    }
  } 
}



function updateCounters() {
  var tdevices = document.getElementById('divtotaldevices').textContent;
  var tlights = document.getElementById('divlights').textContent;
  var tswitches = document.getElementById('divswitches').textContent;
  document.getElementById("tdevices").innerHTML = tdevices;
  document.getElementById("tlights").innerHTML = tlights;
  document.getElementById("tswitches").innerHTML = tswitches;
}
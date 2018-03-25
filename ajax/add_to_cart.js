var xmlHttp = new XMLHttpRequest();

function add(pid){

  xmlHttp.onreadystatechange = showresponse();
  xmlHttp.open("GET","ajax/after_addition.php?i="+pid,true);
  xmlHttp.send();
}

function showresponse() {
  if (xmlHttp.readyState==4 && xmlHttp.status==200) {
   alert("The product has been added to your cart!");
  }
}

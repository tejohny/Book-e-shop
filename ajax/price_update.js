var xmlHttp = new XMLHttpRequest();

function update(price,pid){

  var qty = document.getElementById("spinner"+pid).value;
  var prc = qty*price;

  document.getElementById("price"+pid).innerHTML=prc+" $";

  xmlHttp.onreadystatechange = showresponse(pid);

  xmlHttp.open("GET","ajax/oe.php?q="+qty+"&i="+pid,true);
  xmlHttp.send();
}

function showresponse(pid) {
  if (xmlHttp.readyState==4 && xmlHttp.status==200) {
   // document.getElementById("price"+pid).innerHTML = xmlHttp.responseText;
  }
}

var xmlHttp = new XMLHttpRequest();

function update2(price,pid){



  xmlHttp.onreadystatechange = showresponse(pid);

  xmlHttp.open("GET","ajax/.php?q=",true);
  xmlHttp.send();
}

function showresponse(pid) {
  if (xmlHttp.readyState==4 && xmlHttp.status==200) {
   // document.getElementById("price"+pid).innerHTML = xmlHttp.responseText;
  }
}

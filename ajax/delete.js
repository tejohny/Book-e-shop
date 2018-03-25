$( document ).ready(function() {
 
  $('.dltbtn').click(function(){
      var pid = $(this).val();
      deletetodes(pid);
    });

  	
});

function deletetodes(pid){
	 $.ajax('ajax/delete_element.php?i='+pid, {success: suucc });
}

 function suucc(){

   alert("Item has been deleted");
   location.reload();
 }
 

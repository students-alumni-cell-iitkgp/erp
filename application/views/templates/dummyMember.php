<?php
echo $result;
?>

<script type="text/javascript">
	var xhr;
  if(window.XMLHttpRequest){
    xhr = new XMLHttpRequest();
  }
  else{
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
  }
	var link = document.getElementsByClassName("lookfor");
	for (var i = link.length - 1; i >= 0; i--) {
    	link[i].onclick = EventHandler;
  	}
  	
  var notif= document.getElementById('notif');

function EventHandler(){
	//this.cells[2].innerHTML = '<a href="<?php echo site_url()?>/coordinator/verifyPayment/'+this.cells[0].innerHTML+'">Verify Payment</a>';
	//this.onmouseover=null;
	var id = this.cells[1].innerHTML;
	var ref = this.cells[4];
	 xhr.onreadystatechange = function(){
    if(xhr.readyState==4 && xhr.status==200){
      notif.innerHTML = parseInt(notif.innerHTML)-1;

     ref.innerHTML = "Seen";
    
    }
  };

  xhr.open("GET","<?php echo site_url()?>/member/notificationStatus?id="+id,true);
  xhr.send();
}

</script>
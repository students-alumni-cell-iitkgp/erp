<?php
echo $data;
?>
<script type="text/javascript">
var xhr;
  if(window.XMLHttpRequest){
    xhr = new XMLHttpRequest();
  }
  else{
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
  }
var rows = document.getElementsByClassName('lookfor');
for (var i = 0;i<rows.length; i++) {
	var alumid = rows[i].cells[0].innerHTML;
	
	var func = "Javascript:verifyRegistration("+alumid+","+i+")";
	//console.log(rows[i].innerHTML);
    //rows[i].innerHTML = '<td><button class="btn btn-success" onclick="Javascript:verifyRegistration('+this.cells[0].innerHTML+')" ><span class="glyphicon glyphicon-ok"></span></button></td>';
 	rows[i].setAttribute('id',i);
 	rows[i].innerHTML = rows[i].innerHTML+'<td><button class="btn btn-success" onclick="'+func+'" ><span class="glyphicon glyphicon-ok"></span></button></td>';
 	
 	
 }

  /*var xhr;
  if(window.XMLHttpRequest){
    xhr = new XMLHttpRequest();
  }
  else{
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
  }
*/
  function verifyRegistration(alumid,tagid){
 	
  xhr.onreadystatechange = function(){
    if(xhr.readyState==4 && xhr.status==200){

 		document.getElementById(tagid).parentNode.removeChild(document.getElementById(tagid));   	
      
      
    }
  };
  xhr.open("GET","<?php echo site_url()?>/coordinator/verifyRegistration/"+alumid,true);
  xhr.send();
}



</script>
<div class="modal fade" id="update"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" id="cross_button" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Details</h4>
      </div>
      <div class="modal-body" id="updateform">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" id = "cancel_button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>	
<div style="float:left">
<ul>
<li>
<a href="<?php echo site_url() ?>/member/year/<?php echo $year ?>">Full List</a>
</li>
<ol>
<li>
<a href="<?php echo site_url() ?>/member/positive/<?php echo $year ?>">Positive</a>
</li>
<li>
<a href="<?php echo site_url() ?>/member/negative/<?php echo $year ?>">Negative</a>
</li>
<li>
<a href="<?php echo site_url() ?>/member/neutral/<?php echo $year ?>">Neutral</a>
</li>
</ol>
<li>
<a href="<?php echo site_url() ?>/member/registered/<?php echo $year ?>">Registered</a>
</li>
<li>
<a href="<?php echo site_url() ?>/member/uncontacted/<?php echo $year ?>">Yet to be contacted</a>
</li>
<li>
<a href="<?php echo site_url() ?>/member/unsearched/<?php echo $year ?>">Net to be searched</a>
</li>
<li>
<a href="<?php echo site_url() ?>/member/notFound/<?php echo $year ?>">Not Found</a>
</li>
</ul>

</div>
<div >
<?php
if($table!=-1)
echo $table;
else
echo "Nothing here.. move along";

?>
</div>
<script type="text/javascript">
window.onload = function (){
	var link = document.getElementsByClassName("lookfor");
	//var headers = document.getElementsByClassName("heading");
	
//window.alert(link.length);
//window.alert(link[1].cells[0].id);
for (var i = link.length - 1; i >= 0; i--) {
	link[i].onclick = EventHandler;
}
/*for (var i = headers.length - 1; i >= 0; i--) {
	headers[i].onclick = AnotherEventHandler;
}*/
};

function EventHandler() {
var dom = document.getElementById('update');
dom.setAttribute('class','modal fade in');
dom.setAttribute('aria-hidden','false');
dom.setAttribute('style','display:block');
var dom2 = document.getElementById('cancel_button');
dom2.onclick = function(){
dom.setAttribute('class','modal fade ');
dom.setAttribute('aria-hidden','true');
dom.setAttribute('style','display:hidden');
}
var dom3 = document.getElementById('cross_button');
dom3.onclick = function(){
dom.setAttribute('class','modal fade ');
dom.setAttribute('aria-hidden','true');
dom.setAttribute('style','display:hidden');
}
	//w.onclick = window.alert(this.cells[0].id);
getdetails(this.cells[0].id);
}


function getdetails(id){
var xhr;
if(window.XMLHttpRequest){
xhr = new XMLHttpRequest();
}
else{
xhr = new ActiveXObject("Microsoft.XMLHTTP");
}

xhr.onreadystatechange = function(){
	if(xhr.readyState==4 && xhr.status==200){
		var obj = JSON.parse(xhr.responseText);
		document.getElementById("updateform").innerHTML=obj.name;
		//alert(JSON.parse(xhr.responseText));
		//console.log();
	}
}

xhr.open("GET","<?php echo site_url()?>/member/getProfile?id="+id,true);
xhr.send();
}

</script>

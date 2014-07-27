<div class="modal fade" id="update"  tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" id="cross_button" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Details</h4>
      </div>
      <div class="modal-body" id="updateform">
        <span id="name"></span>
        <span id="hall"></span>
        <span id="year"></span>
        <span id="department"></span>
        <?php echo form_open('member/call');?>
        <input type="button" name="call" value="Call Now">
        </form>
        <div id="callHistory"></div>
        
        <!-- tabs-->
        <div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
          Call History
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in">
      <div class="panel-body">
       <div id="call"></div>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
          Profile
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse">
      <div class="panel-body">
        <div id="profile"></div>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
          Searching Status
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse">
      <div class="panel-body">
        <div id="callstatus"></div>
      </div>
    </div>
  </div>
   <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
          Response/Calling Status
        </a>
      </h4>
    </div>
    <div id="collapseFour" class="panel-collapse collapse">
      <div class="panel-body">
        <div id="responsestatus"></div>
      </div>
    </div>
  </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive">
          Payment Status
        </a>
      </h4>
    </div>
    <div id="collapseFive" class="panel-collapse collapse">
      <div class="panel-body">
        <div id="paymentstatus"></div>
      </div>
    </div>
  </div>

        <!-- tabs-->
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
<ul>
<li>
<a href="<?php echo site_url() ?>/member/positive/<?php echo $year ?>">Positive</a>
</li>
<li>
<a href="<?php echo site_url() ?>/member/negative/<?php echo $year ?>">Negative</a>
</li>
<li>
<a href="<?php echo site_url() ?>/member/neutral/<?php echo $year ?>">Neutral</a>
</li>
</ul>
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
};
var dom3 = document.getElementById('cross_button');
dom3.onclick = function(){
dom.setAttribute('class','modal fade ');
dom.setAttribute('aria-hidden','true');
dom.setAttribute('style','display:hidden');
};
	//w.onclick = window.alert(this.cells[0].id);
//getdetails(this.cells[0].innerHTML);
console.log(this.cells[0]);
console.log(this.cells[0].getAttribute('alumid'));
getdetails(this.cells[0].getAttribute('alumid'));
}
function codeStatusValues(){
  var element = document.getElementById('status').children[0];
}

function getdetails(id){
//window.alert(id);
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
		document.getElementById("name").innerHTML=obj.name;
    document.getElementById("hall").innerHTML=obj.hall;
    document.getElementById("year").innerHTML=obj.year;
    document.getElementById("call").innerHTML = obj.callhistory|| "nothing to show";
   document.getElementById("profile").innerHTML = obj.profile;
    document.getElementById("callstatus").innerHTML = obj.searchstatus;
    document.getElementById("responsestatus").innerHTML = obj.responsestatus;
    document.getElementById("paymentstatus").innerHTML = obj.paymentstatus;

   
  
   // console.log(obj.callhistory);
    /*var calltable = document.getElementById("call");
    
    calltable.innerHTML="<tr><th>Id</th><th>Date</th><th>Time</th><th>Remarks</th><th>Next Date</th><th>NextTime</th></tr>";
    
    for(var i=0;i<obj.callid.length;i++){
      var row = document.createElement('tr');
      var id = document.createElement('td');
      var date = document.createElement('td');
      var time = document.createElement('td');
      var remarks = document.createElement('td');
      var nextdate = document.createElement('td');
      var nexttime = document.createElement('td');
      row.appendChild(id);
      row.appendChild(date);
      row.appendChild(time);
      row.appendChild(remarks);
      row.appendChild(nextdate);
      row.appendChild(nexttime);
      calltable.appendChild(row);

      id.innerHTML = obj.callid[i];
      date.innerHTML = obj.date[i];
      time.innerHTML = obj.time[i];
      remarks.innerHTML = obj.remarks[i];
      nextdate.innerHTML = obj.nextdate[i];
      nexttime.innerHTML = obj.nexttime[i];

    }
		//alert(JSON.parse(xhr.responseText));
		//console.log();
          calltable.setAttribute('class','table table-striped table-bordered table-hover');
*/
	}
};

xhr.open("GET","<?php echo site_url()?>/member/getProfile?id="+id,true);
xhr.send();
}

</script>

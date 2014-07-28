<div class="modal fade" id="update"  tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog" id="content">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" id="cross_button" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Details</h4>
      </div>
      <div class="modal-body" id="updateform">
        <table class="class=table table-striped table-bordered table-hover">
<tr><td><span id="name"></span></td><span id="hall"></span><td></td></tr>
<tr><td><span id="year"></span></td><td></td> <span id="department"></span></td></tr>


        </table>
        
        
        
       
        
        <button type="button"  class="btn btn-primary btn-lg" name="call" id="callButton" value="Call Now">Call</button>
       
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
  var alumid;
window.onload = function (){

	var link = document.getElementsByClassName("lookfor");

	var dom4 = document.getElementById('callButton');
  dom4.onclick = addCallDetails;

  for (var i = link.length - 1; i >= 0; i--) {
    link[i].onclick = EventHandler;
  }
};

function EventHandler() {
  var dom = document.getElementById('update');
  dom.setAttribute('class','modal fade in');
  dom.setAttribute('aria-hidden','false');
  dom.setAttribute('style','display:block');
  document.getElementById('content').setAttribute('style','width:90%');

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

	
  console.log(this.cells[0]);
  console.log(this.cells[0].getAttribute('alumid'));
  alumid = this.cells[0].getAttribute('alumid');
  getdetails(this.cells[0].getAttribute('alumid'));
}

function addCallDetails(){
  var xhr;
  if(window.XMLHttpRequest){
    xhr = new XMLHttpRequest();
  }
  else{
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
  }

  xhr.onreadystatechange = function(){
    if(xhr.readyState==4 && xhr.status==200){

      var callDiv = document.getElementById('call');
      callDiv.innerHTML = callDiv.innerHTML + xhr.responseText;
    
    }
  };

  xhr.open("GET","<?php echo site_url()?>/member/addCallDetail?alumid="+alumid,true);
  xhr.send();
}
function updateCall(){
  var xhr;
  if(window.XMLHttpRequest){
    xhr = new XMLHttpRequest();
  }
  else{
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
  }
  
      var remarks = form1.remarks.value;
      var nextdate = form1.nextdate.value;
      var nexttime = form1.nexttime.value;
      var callid = form1.callid.value;
      var alumid = form1.alumid.value;
  xhr.onreadystatechange = function(){
    if(xhr.readyState==4 && xhr.status==200){
      var callDiv = document.getElementById('call');
        callDiv.innerHTML = xhr.responseText;
      
    }
  };
console.log("remarks="+remarks+"&nextdate="+nextdate+"&nexttime="+nexttime+"callid="+callid+"alumid="+alumid);
  xhr.open("GET","<?php echo site_url()?>/member/updateCall?remarks="+remarks+"&nextdate="+nextdate+"&nexttime="+nexttime+"&callid="+callid+"&alumid="+alumid,true);
  xhr.send();
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


	}
};

xhr.open("GET","<?php echo site_url()?>/member/getProfile?id="+id,true);
xhr.send();
}

</script>

<div class="modal fade" id="update"  tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog" id="content">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" id="cross_button" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h2 class="modal-title" id="myModalLabel">Details</h2>
      </div>
      <div class="modal-body" id="updateform">
       
        
        
        
       
        
        <button type="button"  class="btn btn-primary btn-lg" name="call" id="callButton" value="Call Now">Call</button>
       
        <div id="callHistory"></div>
        
        <!-- tabs-->
        
  
      <h2>
        <a >
          Call History
        </a>
      </h2>
    
      
       <div id="call"></div>
     <hr>
      <h2>
        <a >
          Profile
        </a>
      </h2>
    
        <div id="profile"></div>
    <hr>
      
      <hr>
  <div class="row">
  <div class="col-md-6">
      <h2>
        <a >
          Response/Calling Status
        </a>
      </h2>
    
        <div id="responsestatus"></div>
     </div>

<div class="col-md-6">
      <h2>
        <a >
          Payment Status
        </a>
      </h2>
    
        <div id="paymentstatus"></div>
     
</div>

        <!-- tabs-->
      </div>
      <hr><hr>
      <div class="row">
        <div class="col-md-6">
      <h2 >
        <a >
          Searching Status
        </a>
      </h2>
        <div id="searchstatus"></div>
      </div>
      <div class="col-md-6">
         <h2 >
        <a >
          Register Status
        </a>
      </h2>
        <div id="registerstatus"></div>
      </div>
    </div>
    <hr><hr>
    <div class="row">
      <div class="col-md-12">
 <h2 >
        <a >
          Remarks
        </a>
      </h2>
        <div id="remarks"></div>


    </div>
  </div>
    <hr>
    </div>

      <div class="modal-footer">
        <button type="button" id = "cancel_button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>	

<div class="pull-left" style="width:30%">

<ul class="nav nav-pills nav-stacked">
<li>
<button type="button" style="width:180px;height:40px" class="btn btn-lg btn-success"><a style="color:white" href="<?php echo site_url() ?>/member/year/<?php echo $year ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Full List&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></button>
</li>

<li>
<button type="button" style="width:180px;height:40px" class="btn btn-lg btn-success"><a style="color:white" href="<?php echo site_url() ?>/member/positive/<?php echo $year ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Positive&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></button>
</li>
<li>
<button type="button" style="width:180px;height:40px" class="btn btn-lg btn-success"><a style="color:white" href="<?php echo site_url() ?>/member/negative/<?php echo $year ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Negative&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></button>
</li>
<li>
<button type="button" style="width:180px;height:40px" class="btn btn-lg btn-success"><a style="color:white" href="<?php echo site_url() ?>/member/neutral/<?php echo $year ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Neutral&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></button>
</li>

<li>
<button type="button" style="width:180px;height:40px" class="btn btn-lg btn-success"><a style="color:white" href="<?php echo site_url() ?>/member/registered/<?php echo $year ?>">&nbsp;&nbsp;&nbsp;&nbsp;Registered&nbsp;&nbsp;&nbsp;&nbsp;</a></button>
</li>
<li>
<button type="button" style="width:180px;height:40px" class="btn btn-lg btn-success"><a style="color:white" href="<?php echo site_url() ?>/member/uncontacted/<?php echo $year ?>">Yet to be contacted</a></button>
</li>
<li>
<button type="button" style="width:180px;height:40px" class="btn btn-lg btn-success"><a style="color:white" href="<?php echo site_url() ?>/member/unsearched/<?php echo $year ?>">Yet to be searched</a></button>
</li>
<li>
<button type="button" style="width:180px;height:40px" class="btn btn-lg btn-success"><a style="color:white" href="<?php echo site_url() ?>/member/notFound/<?php echo $year ?>">&nbsp;&nbsp;&nbsp;&nbsp;Not Found &nbsp;&nbsp; &nbsp; &nbsp;         </a></button>
</li>

</ul>

</div>
<div class="pull-left" style="width:70%">
<?php
if($table!=-1)
echo $table;
else
echo "<h2>Nothing here.. move along</h2>";

?>
</div>
<script type="text/javascript">
var xhr;
  if(window.XMLHttpRequest){
    xhr = new XMLHttpRequest();
  }
  else{
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
  }

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

	
  
  console.log(this.cells[0].innerHTML);
  alumid = this.cells[0].innerHTML;
    getdetails(alumid);
}

function addCallDetails(){
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
function updatePayment(){ 
      var payment = form2.payment.value;
      var alumid = form2.alumid.value;
      var dateofpayment = form2.dateofpayment.value;
      var referenceNo = form2.referenceNo.value;
      var paymentAmt = form2.paymentAmt.value;
  xhr.onreadystatechange = function(){
    if(xhr.readyState==4 && xhr.status==200){
      var payDiv = document.getElementById('paymentstatus');
        payDiv.innerHTML =  xhr.responseText;
      
    }
  };
  xhr.open("GET","<?php echo site_url()?>/member/updatePayment?payment="+payment+"&alumid="+alumid+"&dateofpayment="+dateofpayment+"&referenceNo="+referenceNo+"&paymentAmt="+paymentAmt,true);
  xhr.send();
}
function updateSearch(){      
      var alumid = form3.alumid.value;
      
      var search = form3.search.value;
  xhr.onreadystatechange = function(){
    if(xhr.readyState==4 && xhr.status==200){
      var searchDiv = document.getElementById('searchstatus');
        searchDiv.innerHTML =  xhr.responseText;
      
    }
  };
  xhr.open("GET","<?php echo site_url()?>/member/updateSearch?alumid="+alumid+"&search="+search,true);
  xhr.send();
}
function updateResponse(){
  
      
      var alumid = form4.alumid.value;
      
      var response = form4.response.value;
  xhr.onreadystatechange = function(){
    if(xhr.readyState==4 && xhr.status==200){
      var responseDiv = document.getElementById('responsestatus');
        responseDiv.innerHTML =  xhr.responseText;
      
    }
  };
  xhr.open("GET","<?php echo site_url()?>/member/updateResponse?alumid="+alumid+"&response="+response,true);
  xhr.send();
}
function updateRegister(){
  
  
      
      var alumid = form5.alumid.value;
      
      var register = form5.register.value;
  xhr.onreadystatechange = function(){
    if(xhr.readyState==4 && xhr.status==200){
      var registerDiv = document.getElementById('registerstatus');
        registerDiv.innerHTML =  xhr.responseText;
      
    }
  };
  xhr.open("GET","<?php echo site_url()?>/member/updateRegister?alumid="+alumid+"&register="+register,true);
  xhr.send();
}
function updateRemarks(){
 
      var alumid = form6.alumid.value;
      
      var remark = form6.remark.value;
  xhr.onreadystatechange = function(){
    if(xhr.readyState==4 && xhr.status==200){
      var remarkDiv = document.getElementById('remarks');
        remarkDiv.innerHTML =  xhr.responseText;
      
    }
  };
  xhr.open("GET","<?php echo site_url()?>/member/updateRemark?alumid="+alumid+"&remark="+remark,true);
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
        console.log(JSON.parse(xhr.responseText));

		var obj = JSON.parse(xhr.responseText);
		/*document.getElementById("name").innerHTML=obj.name;
    document.getElementById("hall").innerHTML=obj.hall;
    document.getElementById("year").innerHTML=obj.year;*/
    document.getElementById("call").innerHTML = obj.callhistory|| "nothing to show";
   document.getElementById("profile").innerHTML = obj.profile;
    document.getElementById("searchstatus").innerHTML = obj.searchstatus;
    document.getElementById("responsestatus").innerHTML = obj.responsestatus;
    document.getElementById("paymentstatus").innerHTML = obj.paymentstatus;
    document.getElementById("registerstatus").innerHTML = obj.registerstatus;
    document.getElementById("remarks").innerHTML = obj.remarks;



	}
};

xhr.open("GET","<?php echo site_url()?>/member/getProfile?id="+id,true);
xhr.send();
}

</script>

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
      
          Call History
      
      </h2>
    
      
       <div id="call"></div>
     <hr>
      <h2>
      
          Profile
     
      </h2>
    
        <div id="profile"></div>
    <hr>
      
      <hr>
  <div class="row">
  <div class="col-md-4">
      <h2>
       
          Response/Calling Status
       
      </h2>
    
        <div id="responsestatus"></div>
     </div>

<div class="col-md-8">
      <center><h2>
        
          Payment Status
   
      </h2></center>
    
        <div id="paymentstatus"></div>
     
</div>

        <!-- tabs-->
      </div>
      <hr><hr>
      <div class="row">
        <div class="col-md-6">
      <h2 >
       
          Searching Status
     
      </h2>
        <div id="searchstatus"></div>
      </div>
      <div class="col-md-6">
         <h2 >
       
          Register Status
       
      </h2>
        <div id="registerstatus"></div>
      </div>
    </div>
    <hr><hr>
    <div class="row">
      <div class="col-md-6">


    </div>
    <div class="col-md-6">
 <h2 >
      
          Accompaniants
      
      </h2>
        <div id="accompany"></div>


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
<a class="btn btn-success" style="color:white" href="<?php echo site_url() ?>/member/year/<?php echo $year ?>">Full List</a>
</li>

<li>
<a style="color:white" class="btn btn-success" href="<?php echo site_url() ?>/member/positive/<?php echo $year ?>">Positive</a>
</li>
<li>
<a style="color:white" class="btn btn-success" href="<?php echo site_url() ?>/member/negative/<?php echo $year ?>">Negative</a>
</li>
<li>
<a  class="btn btn-success" style="color:white" href="<?php echo site_url() ?>/member/neutral/<?php echo $year ?>">Neutral</a>
</li>

<li>
<a class="btn btn-success" style="color:white" href="<?php echo site_url() ?>/member/registered/<?php echo $year ?>">Registered</a>
</li>
<li>
<a class="btn btn-success" style="color:white" href="<?php echo site_url() ?>/member/uncontacted/<?php echo $year ?>">Yet to be contacted</a>
</li>
<li>
<a class="btn btn-success" style="color:white" href="<?php echo site_url() ?>/member/unsearched/<?php echo $year ?>">Yet to be searched</a>
</li>
<li>
<a class="btn btn-success" style="color:white" href="<?php echo site_url() ?>/member/notFound/<?php echo $year ?>">Not Found</a>
</li>
<li>
<a class="btn btn-success" style="color:white" href="<?php echo site_url() ?>/member/Paid/<?php echo $year ?>">Paid</a>
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
      doAjax("<?php echo site_url()?>/member/updateCall?remarks="+remarks+"&nextdate="+nextdate+"&nexttime="+nexttime+"&callid="+callid+"&alumid="+alumid,call);

}
function addMember(){
  var name = form7.name.value;
      var age = form7.age.value;
      var gender = form7.gender.value;
      var relationship = form7.relationship.value;
      var alumid = form7.alumid.value;
      doAjax("<?php echo site_url()?>/member/updateMember?name="+name+"&age="+age+"&gender="+gender+"&relationship="+relationship+"&alumid="+alumid,accompany);

}
function removeAccompaniant(id,alumid){
    doAjax("<?php echo site_url()?>/member/removeAccompaniant?id="+id+"&alumid="+alumid,accompany);
}
function updatePayment(){ 
      var alumid = form2.alumid.value;
      var dateofpayment = form2.dateofpayment.value;
      var referenceNo = form2.referenceNo.value;
      var paymentAmt = form2.paymentAmt.value;
      var remarks = form2.remarks.value;
      doAjax("<?php echo site_url()?>/member/updatePayment?alumid="+alumid+"&dateofpayment="+dateofpayment+"&referenceNo="+referenceNo+"&paymentAmt="+paymentAmt+"&remarks="+remarks,paymentstatus);

}
function updateSearch(){      
      var alumid = form3.alumid.value;
      var search = form3.search.value;
      doAjax("<?php echo site_url()?>/member/updateSearch?alumid="+alumid+"&search="+search,searchstatus);

}
function updateResponse(){
      var alumid = form4.alumid.value;
      var response = form4.response.value;
      doAjax("<?php echo site_url()?>/member/updateResponse?alumid="+alumid+"&response="+response,responsestatus);

}
function updateRegister(){
      var alumid = form5.alumid.value;
      var register = form5.register.value;
      doAjax("<?php echo site_url()?>/member/updateRegister?alumid="+alumid+"&register="+register,registerstatus);

}
function updateRemarks(){
      var alumid = form6.alumid.value;
      var remark = form6.remark.value;
      doAjax("<?php echo site_url()?>/member/updateRemark?alumid="+alumid+"&remark="+remark,remarks);
}

function getdetails(id){
// function responsible for getting details into the popup
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
    document.getElementById("call").innerHTML = obj.callhistory|| "nothing to show";
    document.getElementById("profile").innerHTML = obj.profile;
    document.getElementById("searchstatus").innerHTML = obj.searchstatus;
    document.getElementById("responsestatus").innerHTML = obj.responsestatus;
    document.getElementById("paymentstatus").innerHTML = obj.paymentstatus;
    document.getElementById("registerstatus").innerHTML = obj.registerstatus;
    document.getElementById("remarks").innerHTML = obj.remarks;
    document.getElementById("accompany").innerHTML = obj.accompaniants;



	}
};

xhr.open("GET","<?php echo site_url()?>/member/getProfile?id="+id,true);
xhr.send();
}

function doAjax(request,div){
xhr.onreadystatechange = function(){
    if(xhr.readyState==4 && xhr.status==200){
      var reference = document.getElementById(div);
        div.innerHTML =  xhr.responseText;
      
    }
  };
xhr.open("GET",request,true);
  xhr.send();
}

</script>

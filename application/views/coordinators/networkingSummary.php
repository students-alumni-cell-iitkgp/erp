<h2>Networking Summary</h2>
<div id="overall">
	<ul class='nav nav-pills nav-justified' role='tablist'>

		<?php
		$year = 0;
		echo '<button type="button" class="btn btn-primary btn-lg" onclick = "Javascript:getNetworkingSummary('.$year.')" style="width:180px;height:40px !important">All Years</button>';
		foreach ($years as $year) {
			$data = $year['alumSince'];
	echo '<button type="button"  class="btn btn-primary btn-lg" onclick = "Javascript:getNetworkingSummary('.$data.')" style="width:180px;height:40px !important"><li>'.$data.'</li></button>';
}

		?>
	</ul>


</div>

<h3> Total Number of Alumni Allocated: <span id="total"></span> </h3>

	<h3 style="text-decoration: underline;"> Searching Status </h3>

	<table class="table table-bordered">

		<thead>

			<tr class='active'>
				<th> Found
				</th>
				<th> Yet to be searched
				</th>
				<th> Not Found
				</th>
			</tr>

		</thead>

		<tbody>

			<tr>
				<td id="found"> 
				</td>
				
				<td id="yettobesearched"> 
				</td>
				<td id="notfound"> 
				</td>
			</tr>

		</tbody>

	</table>

	<h3 style="text-decoration: underline;"> Response Status </h3>

	<table class="table table-bordered">

		<thead>

			<tr class='active'>
				<th> Called (2-way)
				</th>
				<th> Neutral
				</th>
				<th> Positive
				</th>
				<th> Negative
				</th>
			</tr>

		</thead>

		<tbody>

			<tr>
				<td id="called2way"> 
				</td>
				<td id="neutral"> 
				</td>
				<td id="positive"> 
				</td>
				<td id="negative" > 
				</td>
			</tr>

		</tbody>

	</table>
	<div class="row">
	<h3 class="col-md-6" style="text-decoration: underline;"> Registered </h3><h3 class="col-md-6" style="text-decoration:underline;"> Paid</h3></div>
	<div class="row"><div class="col-md-6" style="background-color:white;height:60px" id="register"> </div><div class="col-md-6" style="background-color:white;height:60px" id="paid"></div></div>
<hr><hr>
<a href="<?php echo site_url('coordinator/assignWork')?>"><h2>Assign work to the student members<h2></a>
<script type="text/javascript">

function getNetworkingSummary(year){
	var xhr;
  if(window.XMLHttpRequest){
    xhr = new XMLHttpRequest();
  }
  else{
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
  }
  var total = document.getElementById('total');
  var found = document.getElementById('found');
  var yettobesearched = document.getElementById('yettobesearched');
  var notfound = document.getElementById('notfound');
  var called2way = document.getElementById('called2way');
  var neutral = document.getElementById('neutral');
  var positive = document.getElementById('positive');
  var negative = document.getElementById('negative');
  var register = document.getElementById('register');
  var paid = document.getElementById('paid');    
  xhr.onreadystatechange = function(){
    if(xhr.readyState==4 && xhr.status==200){
    	console.log(JSON.parse(xhr.responseText));
    			var obj = JSON.parse(xhr.responseText);
    			found.innerHTML = obj.found;
    			yettobesearched.innerHTML = obj.yettobesearched;
    			notfound.innerHTML = obj.notfound;
    			called2way.innerHTML = obj.called2way;
    			neutral.innerHTML = obj.neutral;
    			positive.innerHTML = obj.positive;
    			negative.innerHTML = obj.negative;
      			total.innerHTML = obj.total;
      			register.innerHTML = obj.register;
    			paid.innerHTML = obj.paid;
    }
  };
  xhr.open("GET","<?php echo site_url()?>/coordinator/getNetworkingSummary/"+year,true);
  xhr.send();
}

</script>
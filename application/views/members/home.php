<div class="navbar navbar-default" id ="topPane">
	<ul class="nav navbar-nav">
<?php


foreach ($years as $year) {
	echo '<button type="button" class="btn btn-primary btn-lg"><li><a style="color:white" href="'.site_url().'/member/year/'.$year['alumSince'].'">'.$year['alumSince'].'</a></li></button>';
}




?>
</ul>
</div>
<div id="summary">



</div>
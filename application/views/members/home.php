<div id ="topPane">
<?php


foreach ($years as $year) {
	echo '<a style="padding:5px" href="'.site_url().'/member/year/'.$year['alumSince'].'">'.$year['alumSince'].'</a>';
}




?>
</div>

<h2>View workspace of student members</h2>
<ul style="background-color:white">
<?php
 foreach ($memberList as $member) {
 	echo '<li class="btn btn-primary" style="width:120px"><a style="color:white" href="'.site_url().'/coordinator/viewAs/'.$member.'">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$member.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>';
 }

?>
</ul>
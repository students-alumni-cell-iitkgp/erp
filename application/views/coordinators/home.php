
<h2>View workspace of student members</h2>
<ul class="list-inline" style="background-color:white">
<?php
 foreach ($memberList as $member) {
 	echo '<li ><a class="btn btn-primary " style="color:white ;width:100px" href="'.site_url().'/coordinator/viewAs/'.$member.'">'.$member.'</a></li>';
 }

?>
</ul>
<hr><hr>

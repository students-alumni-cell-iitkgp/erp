
<h2>View workspace of student members</h2>
<ul>
<?php
 foreach ($memberList as $member) {
 	echo '<li><a href="'.site_url().'/coordinator/viewAs/'.$member.'">'.$member.'</a></li>';
 }

?>
</ul>
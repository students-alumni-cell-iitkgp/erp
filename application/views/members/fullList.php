<div style="float:left">
<ul>
<li>
<a href="<?php echo site_url() ?>/member/year/<?php echo $year ?>">Full List</a>
</li>
<ol>
<li>
<a href="<?php echo site_url() ?>/member/positive/<?php echo $year ?>">Positive</a>
</li>
<li>
<a href="<?php echo site_url() ?>/member/negative/<?php echo $year ?>">Negative</a>
</li>
<li>
<a href="<?php echo site_url() ?>/member/neutral/<?php echo $year ?>">Neutral</a>
</li>
</ol>
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
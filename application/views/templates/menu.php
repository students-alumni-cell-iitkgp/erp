<div class="navbar navbar-default">
	<ul class="nav navbar-nav">
<li><button type="button" class="btn btn-primary btn-lg navbar-btn"><a style="color:white"  href="<?php echo base_url();?>index.php/member/index"  target="_blank">Home</a></button></li>

<li><button type="button" class="btn btn-primary btn-lg navbar-btn"><a style="color:white"  href="<?php echo base_url();?>index.php/member/search"  target="_blank">Search</a></button></li>

<li><button type="button" class="btn btn-primary btn-lg navbar-btn"><a style="color:white"  href="<?php echo base_url();?>index.php/login/logout" >Logout</a></button></li>

<li><button type="button" class="btn btn-primary btn-lg navbar-btn"><a style="color:white"  href="#">Logged in as <?php echo $this->session->userdata('username');?>&nbsp;<?php if($this->session->userdata('alias')) echo ",Viewing as ".$this->session->userdata('alias'); ?></a></button>
</li>

<li id="notifications">

<?php if($this->session->userdata('privilege')==2) echo '<button type="button" class="btn btn-lg btn-primary navbar-btn"><a style="color:white"  href="'.site_url().'/coordinator/getNotifications">Notifications</a></button>'?>
</li>
<li>
<?php if($this->session->userdata('alias')){
	echo '<button type="button" class="btn btn-primary navbar-btn"><a style="color:white"  href="'.site_url().'/coordinator/viewAsSelf"> View as self</a></button>';
} 
?>
</li>
</ul>

</div>
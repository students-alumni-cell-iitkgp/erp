<div class="navbar navbar-default">
	<ul class="nav navbar-nav">
		<?php 
		if($this->session->userdata('privilege')==1)
			$homeUrl = site_url('member/index');
		elseif($this->session->userdata('privilege')==2)
			$homeUrl = site_url('coordinator/index');


		?>
<li><a   href="<?php echo $homeUrl ?>" >Home</a></li>

<li><a   href="<?php echo base_url();?>index.php/member/search"  target="_blank">Search</a></li>

<li><a   href="<?php echo base_url();?>index.php/login/logout" >Logout</a></li>

<li><a   href="#">Logged in as <?php echo $this->session->userdata('username');?>&nbsp;<?php if($this->session->userdata('alias')) echo ",Viewing as ".$this->session->userdata('alias'); ?></a>
</li>

<li id="notifications">

<?php if($this->session->userdata('privilege')==2) {echo '<a   href="'.site_url().'/coordinator/getNotifications">Notifications  ';}
if(isset($notifications)) echo $notifications .'</a>';?> 
</li>
<li>
<?php if($this->session->userdata('alias')){
	echo '<a   href="'.site_url().'/coordinator/viewAsSelf"> View as self</a>';
} 
?>
</li>
</ul>

</div>
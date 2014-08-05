<div class="navbar navbar-default" id="menu">
	<ul class="nav navbar-nav">
		<?php 
		if($this->session->userdata('privilege')==1){
			$homeUrl = site_url('member/index');
			$notificationUrl = site_url('member/getNotifications');
		}
		elseif($this->session->userdata('privilege')==2){
			$homeUrl = site_url('coordinator/index');
			$notificationUrl = site_url('coordinator/getNotifications');
		}
			$notifications = $this->session->userdata('notifications');

		?>
<li><a   href="<?php echo $homeUrl ?>" >Home</a></li>

<li><a   href="<?php echo base_url();?>index.php/member/search"  target="_blank">Search</a></li>

<li><a   href="<?php echo base_url();?>index.php/login/logout" >Logout</a></li>

<li><a   href="#">Logged in as <?php echo $this->session->userdata('username');?>&nbsp;<?php if($this->session->userdata('alias')) echo ",Viewing as ".$this->session->userdata('alias'); ?></a>
</li>

<li id="notifications">

<?php echo '<a   href="'.$notificationUrl.'" ><span id="notif">'.$notifications.'</span> Notifications  </a>';?>
</li>
<li>
<?php if($this->session->userdata('alias')){
	echo '<a   href="'.site_url().'/coordinator/viewAsSelf"> View as self</a>';
} 
?>
</li>
<li > <?php if($this->session->userdata('privilege')=='2') echo '<a href="'.site_url().'/coordinator/showVerifyPayment" >Verify Payment</a>' ?>
</li>
<li > <?php if($this->session->userdata('privilege')=='2') echo '<a href="'.site_url().'/coordinator/showVerifyRegistration" >Verify Registration</a>' ?>


</li>
<li>
 <?php if($this->session->userdata('privilege')=='2') echo '<a href="'.site_url().'/coordinator/registerMember" >Member Registration </a>' ?>

</li>
</ul>

</div>
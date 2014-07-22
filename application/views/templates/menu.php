<div class="row ">
<span class="col-md-3"><a href="<?php echo base_url();?>index.php/member/search"  target="_blank">Search</a></span>
<span class="col-md-3"></span>
<span class="col-md-3"><a href="<?php echo base_url();?>index.php/login/logout" >Logout</a></span>

<span class="col-md-3">Logged in as <?php echo $this->session->userdata('username');?>&nbsp;<?php if($this->session->userdata('alias')) echo ",Viewing as ".$this->session->userdata('alias'); ?></span>
</div>
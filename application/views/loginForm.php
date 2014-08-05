<div class="row">
<div class="col-md-3">

		</div>

<?php
echo form_open('login');
?>


		<div class="col-md-6">
<div class="container-fluid jumbotron" style="text-align: center;">
	
	<span style="color:red"><?php echo validation_errors(); ?></span>
	<span><?php if(isset($message)){echo $message;}?></span>
	
	<input type="text" name="username" placeholder="Username" class="form-control" value="<?php echo set_value('username'); ?>"><br/>
	
	
	
	<input type="password" name="password" placeholder="Password" class="form-control"><br/>
	
	<button class="btn btn-large btn-success" name="submit">Log In</button>
</div>

	<span style="float:right"><a href="<?php echo site_url('login/register')?>" class="btn btn-lg btn-primary">New User Register</a></span>

</div>
</form>
<div class="col-md-3">

		</div>
</div>
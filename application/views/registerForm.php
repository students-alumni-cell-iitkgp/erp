<div class="row">
<div class="col-md-3">

		</div>

<?php
echo form_open('login/register');
?>


		<div class="col-md-6">
<div class="container-fluid jumbotron" style="text-align:center">
	<span class="row" style="color:red"><?php echo validation_errors(); ?></span>
	<span><?php if(isset($message)){echo $message;}?></span>

	<input type="text" name="name" placeholder="Full Name" class="form-control" value="<?php echo set_value('name'); ?>"><br/>
	<input type="text" name="email" placeholder="Email id" class="form-control" value="<?php echo set_value('email'); ?>"><br/>

	<input type="text" name="username" placeholder="Username" class="form-control" value="<?php echo set_value('username'); ?>"><br/>
	
	
	
	<input type="password" name="password" placeholder="Password, atleast 8 character long" class="form-control"><br/>
	<input type="password" name="repassword" placeholder="Reenter your password" class="form-control" ><br/>

	<button class="btn btn-large btn-success" name="submit">Register</button>
</div>

	<span style="float:right"><a href="<?php echo site_url('login')?>" class="btn btn-lg btn-primary">Already a member? Login</a></span>

</div>
</form>
<div class="col-md-3">

		</div>


</div>
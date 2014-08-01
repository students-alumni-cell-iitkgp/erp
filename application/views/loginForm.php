<h3 style="color:red"><?php echo validation_errors(); ?></h3>
<div>
<?php if(isset($message)){
echo $message;}?>
</div>
<div class="col-md-3">

		</div>
<div >
<?php
echo form_open('login');
?>


		<div class="col-md-6">
<div class="container-fluid jumbotron" style="text-align: center;">
	
	
	<input type="text" name="username" placeholder="Username" class="form-control" value="<?php echo set_value('username'); ?>"><br/>
	
	
	
	<input type="password" name="password" placeholder="Password" class="form-control"><br/>
	
	<button class="btn btn-large btn-success" name="submit">Log In</button>
</div>



</div>
</form>
<div class="col-md-3">

		</div>
</div>
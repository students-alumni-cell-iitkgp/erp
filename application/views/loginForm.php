<h3 style="color:red"><?php echo validation_errors(); ?></h3>
<div>
<?php if(isset($message)){
echo $message;}?>
</div>
<div >
<?php
echo form_open('login');
?>
	<div class="form-group">
	<label for="username" class="form-control">Username</label>
	<input type="text" name="username" class="form-control" value="<?php echo set_value('username'); ?>"><br/>
	</div>
	<div class="form-group">
	<label for="password" class="form-control">Password</label>
	<input type="password" name="password" class="form-control"><br/>
	</div>
	<input type="submit" value="Login" name="submit" class="form-control">
</form>
</div>
<h2>Assign work to the members</h2>

<h3 style="color:red"><?php echo validation_errors(); ?></h3>
<?php
if(isset($msg))
	echo $msg;

?>
<div class="row">
<div class="col-md-3"></div>
<div class="col-md-6  jumbotron">
<?php echo form_open('coordinator/assignWork');?>
<label for="from" class="form-control">From </label>
<select name="from" class="form-control">
<?php foreach ($fromid as $id) {
	echo '<option class="form-control" value="'.$id.'">'.$id.'</option>';
}?>
</select><br>
<label for="to" class="form-control">To </label>

<select name="to" class="form-control">
<?php foreach ($toid as $id) {
	echo '<option class="form-control" value="'.$id.'">'.$id.'</option>';
}?>
</select><br>
<label for="member" class="form-control">Member </label>

<select name="member" class="form-control">
<?php foreach ($members as $member) {
	echo '<option class="form-control" value="'.$member.'">'.$member.'</option>';
}?>
</select><br>
<center><input type="submit" class="btn btn-success" name="submit" value="Assign">
</center></form>
</div>
<div class="col-md-3"></div>
</div>
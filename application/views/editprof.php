<html>

<head>

	<link rel="stylesheet" href="<?php echo base_url().'bootstrap/bootstrap.min.css'; ?>">
	<script src="<?php echo base_url().'bootstrap/bootstrap.min.js'; ?>"></script>

	<style>

	tr td.field{
		width: 50%;
	}

	</style>

</head>

<body style="margin-left: 20px; margin-right: 20px;">

	<?php 

	// $fields = $data->result_array();
	// $fields = $fields[0];

	$fields = $fieldData;

	// print_r($fields);

	$values = $fieldVal;

	// print_r($fields);

	// print_r($fieldVal);

	// $fields = array_values($fields);

	?>

	<?php

	$name_fields = array('Company ID',
		'User ID',
		'Name of the Company',
		'Description', // contact details begin
		'Name of the Contact',
		'Contact Designation',
		'Contact Phone',
		'Contact Email ID', // calling details begin
		'First Call Date',
		'Latest Call Date',
		'Next Call Date', // proposal data begin
		'Date the Proposal was sent', 
		'Name of the person proposal was sent to',
		'Email ID of person', // auxilliary
		'How to pitch',
		'Final Status',
		'Remarks',
		'Completion Status'
		);

	$contactDetailsBegin = 4;
	$callingDetailsBegin = 8;
	$proposalDetailsBegin = 11;
	$auxDetailsBegin = 14;

	?>

	<div style="text-align: center;">

		<h1 style="color: #777"> Sponsor Profile (<?php echo $values[2]; ?>)</h1>

		<a href="<?php echo site_url('sponscont/showprofile/'.$values[0]); ?>">
			<button class="btn btn-primary">
				Discard Changes
			</button>
		</a>

		<h4 style="color: #888"> All dates must be in YYYY-MM-DD form.</h4>

		<h5 style="color: #888"> That is August 6th, 2014 becomes 2014-08-06 </h5>

	</div>

	<br/>

	<?php echo validation_errors(); ?>

	<?php echo form_open('sponseditprof/editprofile/') ?>

	<table class="table table-bordered table-striped table-hover">		

		<tbody>

			<tr>
				<td>
					<h1>Company Details</h1>
				</td>
			</tr>

			<?php for($i = 2; $i < count($name_fields); $i = $i + 1): ?>

			<?php if($i == $contactDetailsBegin): ?>

			<tr>
				<td>
					<h1>Contact Details</h1>
				</td>
			</tr>

		<?php elseif($i == $callingDetailsBegin): ?>

		<tr>
			<td>
				<h1>Details regarding Calling</h1>
			</td>
		</tr>

	<?php elseif($i == $proposalDetailsBegin): ?>

	<tr>
		<td>
			<h1>Proposal Details</h1>
		</td>
	</tr>

<?php elseif($i == $auxDetailsBegin): ?>

	<tr>
		<td>
			<h1>Auxilliary Details</h1>
		</td>
	</tr>

<?php endif;?>

<tr>

	<td class="field">

		<?php echo $name_fields[$i]; ?>

	</td>

	<td class="field">

		<input type="text" class="form-control" name="<?php echo $fields[$i]; ?>" value="<?php echo $values[$i] ?>"></input>

	</td>

</tr>

<?php endfor; ?>

</tbody>

</table>

<div style="text-align: center;">

	<input type="submit" class="btn btn-success" value="Submit Changes"/>

</div>

</form>

</body>

</html>
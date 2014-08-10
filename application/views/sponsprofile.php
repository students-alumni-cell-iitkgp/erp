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

	// $ent = $data->result_array();
	// $ent = $ent[0];

	$ent = $data;

	// print_r($ent);

	// $ent = array_values($ent);

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

		<h1 style="color: #777"> Sponsor Profile (<?php echo $data[2]; ?>)</h1>

		<a href="<?php echo site_url('sponseditprof/editnow/'.$data[0]); ?>">
			<button class="btn btn-primary">
				Edit Profile
			</button>
		</a>

	</div>

	<br/>

	<table class="table table-bordered table-striped">

		<tbody>

			<tr>
				<td>
					<h1>Company Details</h1>
				</td>
			</tr>

			<?php for($i = 0; $i < count($name_fields); $i = $i + 1): ?>

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

		<?php echo $ent[$i]; ?>

	</td>

</tr>

<?php endfor; ?>

</tbody>


</table>

</body>

</html>
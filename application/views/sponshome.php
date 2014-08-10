<html>

<head>

	<link rel="stylesheet" href="<?php echo base_url().'bootstrap/bootstrap.min.css'; ?>">
	<script src="<?php echo base_url().'bootstrap/bootstrap.min.js'; ?>"></script>

</head>

<body style="margin-left: 20px; margin-right: 20px;">

	<!-- <p> Entered the sponshome view. </p> -->

	<a href="<?php echo site_url('sponscont/addspons'); ?>">
		<button class="btn btn-success"> 
			Add a new sponsor 
		</button>
	</a>

	<table class="table table-striped">

		<thead>

			<th>Name</th>
			<th>Description</th>
			<th>Latest Call Date</th>
			<th>Next Call Date</th>
			<th></th>

		</thead>

		<tbody>

			<?php foreach($data as $row): ?>

			<tr>


				<td><?php echo $row['name']; ?></td>
				<td><?php echo $row['description']; ?></td>
				<td><?php echo $row['latestcalldate']; ?></td>
				<td><?php echo $row['nextcalldate']; ?></td>
				<?php $id = $row['companyid']; ?>
				<td><a href="<?php echo site_url('sponscont/showprofile/'.$id); ?>"><button class="btn btn-success">Profile</button></a></td>

			</tr>

		<?php endforeach ?>

	</tbody>

</table>

</body>

</html>
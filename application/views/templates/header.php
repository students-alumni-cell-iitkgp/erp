<html>
<head>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'styles/bootstrap.min.css' ;?>" >
	<script src="http://code.jquery.com/jquery-2.1.1.js"></script>
 	<script type="text/javascript" src=" <?php echo base_url().'scripts/bootstrap.min.js' ;?>"></script>
 	<style type="text/css">
html{

}
#wrapper{
	min-height: 100%;
	padding-bottom: 5px;
}
body{
	background-color:#c8c7ff;
}
#menu{
	background-color:#6C6CB6;

}
#menu a{
	color:white;
}
h2{
	color:red;
}

 	</style>
 </head>
<body class="container">
	<?php if(isset($heading)) echo '<center><h2>'.$heading.'</h2></center>'?>
	<div id="wrapper">
		<br>


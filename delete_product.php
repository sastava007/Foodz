<?php
	include('conn.php');

	$i_id = $_GET['i_id'];

	$sql="DELETE from menu where i_id='$i_id'";
	$conn->query($sql);

	header('location:product.php');
?>
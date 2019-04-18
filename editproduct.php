<?php
	include('conn.php');

	$i_id=$_GET['i_id'];

	$name=$_POST['name'];
	$category=$_POST['category'];
	$price=$_POST['price'];

	$sql="SELECT * from menu where i_id='$i_id'";
	$query=$conn->query($sql);
	$row=$query->fetch_array();

	$fileinfo=PATHINFO($_FILES["photo"]["name"]);

	if (empty($fileinfo['filename'])){
		$location = $row['photo'];
	}
	else{
		$newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
		move_uploaded_file($_FILES["photo"]["tmp_name"],"upload/" . $newFilename);
		$location="upload/" . $newFilename;
	}

	$sql="UPDATE menu set name='$name', category='$category', price='$price', photo='$location' where i_id='$i_id'";
	$conn->query($sql);

	header('location:product.php');
?>
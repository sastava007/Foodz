<?php
	session_start();
	include('conn.php');
	$pname=$_POST['pname'];
	$price=$_POST['price'];
	$category=$_POST['category'];
	$description=$_POST['description'];
	$email=$_SESSION['email'];
	
	$conn=mysqli_connect("localhost","root","","foodsys");
	$query=mysqli_query($conn,"SELECT r_id from restaurant where email='".$email."'");
	while($row=mysqli_fetch_assoc($query))
		 $r_id=$row['r_id'];
	/*$query1=mysqli_query($conn,"SELECT COUNT(*) from menu");
	$i_id=mysqli_fetch_assoc($query1);
*/


	$fileinfo=PATHINFO($_FILES["photo"]["name"]);

	if(empty($fileinfo['filename'])){
		$location="";
	}
	else{
	$newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
	move_uploaded_file($_FILES["photo"]["tmp_name"],"upload/" . $newFilename);
	$location="upload/" . $newFilename;
	}
	
	$sql="INSERT INTO menu (name, category, price, photo,description,r_id) values ('$pname', '$category', '$price', '$location','$description','$r_id')";
	$conn->query($sql);

	header('location:product.php');

?>
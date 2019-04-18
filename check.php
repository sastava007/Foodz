<?php 
$conn=mysqli_connect("localhost","root","");
if($conn)
{
	$error="";
	$conn=mysqli_connect("localhost","root","","foodsys");
	if (isset($_POST["submit"]))
	{
		$name1=$_POST['name'];
	 	$pass=$_POST['pass1'];
	 	$pass1=$_POST['pass2'];
	 	$email=$_POST['email'];
	 	$phone=$_POST['phone'];
	 	$address=$_POST['address'];

	 	$query1="SELECT email FROM users WHERE email='".$email."' ";
	 	$query2="SELECT phone FROM users_norm WHERE phone='".$phone."' ";
	 	$check1=mysqli_query($conn,$query1);
	 	$check2=mysqli_query($conn,$query2);
	 	if(mysqli_num_rows($check1)!=0 OR mysqli_num_rows($check2)!=0)
	 	{
	 		$error="* Email/Phone already exist!";
	 	}
	 	else
	 	{
	 		if($pass!=$pass1)
 			echo "<script>window.alert('Check Password');</script>";
 			else
 			{
 				$file = $_FILES['image']['name'];
			 	$tmp_file = $_FILES['image']['tmp_name'];
			 	$uploadDir = '/user_details/';
			 	$curDir = getcwd();									// Getting current working directory
				$uploadPath = $curDir.$uploadDir.basename($file);
				move_uploaded_file($tmp_file, $uploadPath);

 				$pass=hash('sha256', $_POST['pass1']);
 				$query1="INSERT INTO users(email,password,phone) VALUES('$email','$pass','$phone')";
 				$query2="INSERT INTO users_norm(phone,name,address) VALUES('$phone','$name1','$address')";
 				$check1=mysqli_query($conn,$query1);
	 			$check2=mysqli_query($conn,$query2);
	 			if($check1 AND $check2)
	 			{
	 				header('Location: Home.html');
	 			}
 			}
	 	}



	}
}


 ?>
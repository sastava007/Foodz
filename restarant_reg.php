<?php
session_start();

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

	 	$query1="SELECT phone FROM restaurant WHERE phone='".$phone."' ";
	 	$query2="SELECT email FROM restaurant_norm WHERE email='".$email."' ";
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
 			
 				$pass=hash('sha256', $_POST['pass1']);
 				/*$query="SELECT MAX(r_id) FROM restaurant";
 				$num=mysqli_query($conn,$query);
 				DECLARE @num_id as (INT)
 				SET @num_id=$num+1
 				$r_id='R'+ convert(varchar(10),@num_id);*/
 				$fileinfo=PATHINFO($_FILES["photo"]["name"]);
 				if(empty($fileinfo['filename'])){
					$location="";
				}
				else{
				$newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
				move_uploaded_file($_FILES["photo"]["tmp_name"],"upload/" . $newFilename);
				$location="upload/" . $newFilename;
				}


 				$query1="INSERT INTO restaurant(email,password,phone,address,photo) VALUES('$email','$pass','$phone','$address','$location')";
 				$query2="INSERT INTO restaurant_norm(email,name) VALUES('$email','$name1')";
 				$check1=mysqli_query($conn,$query1);
	 			$check2=mysqli_query($conn,$query2);
	 			if($check1 AND $check2)
	 			{
	 				header('Location: Restaurant_login.php');

	 			}
	 		}
	 	}
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<link rel="stylesheet" type="text/css" href="style\registration.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">

</head>
<body bgcolor="#F3F3F3">

<div class="res_bg" style="position: relative;">
<img src="img\rest_reg.jpg" style="padding-top:0vw;width:99.7vw;height: 29vw;filter: blur(1px);-webkit-filter: blur(1px); position: relative;">
<div style="position: absolute;top: 2vw; left: 46vw;"><a href="Home.html"><img src="img\foodz_logo.png"></a></div>
<div style="position: absolute; top: 9vw; left:30vw"><h1 style="font-family: 'Righteous', cursive;color:White; font-size: 4vw;"><b>Grow Your Business</b><br>With Foodz</h1>
  </div>
</div>



<div class="card text-white mb-3" style="max-width: 22vw; background-color: white; border: 3px solid #D70F64; margin-left: 70vw; margin-top: 7vw;">
  <div class="card-header" style="background-color:#D70F64; color: white; font-size: 1.1vw;"><b>How It Works?</b></div>
  <div class="card-body">
    <h5 class="card-title"></h5>
    <p class="card-text">
   		 <ul style="font-family:Ubuntu;font-size: 1.12vw; color: black;">
		<li>If you are the owner of a restaurant, or if you are a user who's discovered a place not listed on Foodz, let us know using this form.</li>&nbsp;
		<li>Once you send the information to us, our awesome content team will verify it. To help speed up the process, please provide a contact number or email address.</li>&nbsp;
		<li>That's it! Once verified the listing will start appearing on Foodz</li>
		</ul>
	</p>
  </div>
</div>


<!-- 
	<div class="working" style="left: 69%; top: 75%; position: absolute;">
		<p style="text-align: center;"><b>How it Works?</b></p>
		<ul>
			<li>If you are the owner of a restaurant, or if you are a user who's discovered a place not listed on Foodz, let us know using this form.</li>&nbsp;
			<li>Once you send the information to us, our awesome content team will verify it. To help speed up the process, please provide a contact number or email address.</li>&nbsp;
			<li>That's it! Once verified the listing will start appearing on Foodz</li>
		</ul>
	</div> -->
	<div class="registration_form2">
		<h1 style="text-align: left;">Add a Restaurant</h1><br><br>
		<form name="regform" method="post" action="restarant_reg.php" enctype="multipart/form-data">
			<p>Restaurant Name</p>
			<input type="text" name="name" id="Name" placeholder=" Enter restaurnat name" required>
			<p>Email</p>
			<input type="email" name="email" id="email" placeholder="Enter Email Id" required>
			<p>Password</p>
			<input type="Password" name="pass1" id="password" placeholder="Enter Password" required>
			<p>Confirm Password</p>
			<input type="Password" name="pass2" id="confirm password" placeholder="Confirm Password" required>
			<p>Mobile Number</p>
			<input type="Number" name="phone" id="mobile number" placeholder="Enter Mobile No" required>
			<p>Address</p>
			<textarea name="address" placeholder="Provide Address" required style="height: 3.6vw; width: 33vw; font-family:'Ubuntu' "></textarea>
			<br>
			<input type="file" name="photo" accept="image/*" value="Choose File">
			
			<p style="font-size: 1.1vw; color:red;"> <?php echo $error; ?></p> 
			<br><br>
			<input type="submit" name="submit" value="Sign Up" id="submit">
		</form>		
	</div>

</body>
</html>
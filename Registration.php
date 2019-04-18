<?php 
require 'PHPMailerAutoload.php';

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

	 				$mail = new PHPMailer;

					$mail->SMTPDebug = 4;                               // Enable verbose debug output

					$mail->isSMTP();                                      // Set mailer to use SMTP
					$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
					$mail->SMTPAuth = true;                               // Enable SMTP authentication
					$mail->Username = 'foodz.eatmail@gmail.com';                 // SMTP username
					$mail->Password = 'p@ssword@321';                           // SMTP password
					$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
					$mail->Port = 587;                                    // TCP port to connect to

					$mail->setFrom('foodz.eatmail@gmail.com', 'FOODZ!');
					$mail->addAddress($email);     // Add a recipient
					
					$mail->addReplyTo('foodz.eatmail@gmail.com', 'Information');
					
					$mail->isHTML(true);                                  // Set email format to HTML

					$mail->Subject = 'Registration Successful';
					$mail->Body    = '<b>Welcome to foodz!</b>';
					$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

					if(!$mail->send())
					{
					    echo 'Message could not be sent.';
					    echo 'Mailer Error: ' . $mail->ErrorInfo;
					} 
					else
					    //echo 'Message has been sent';
						header('Location: Home.html');
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
<body>

	<nav class="navbar " style="background-color: white;">
  <a class="navbar-brand col-lg-2" href="home.php" ><img src="img/foodz_logo.png" style="height: 4vw;"></a>
  <ul class="nav nav-pills">
    <li class="nav-item">
      <a class="nav-link active" href="home.php" style="color: white; background-color: #D70F64">Home</a>
    </li> 
    <li class="nav-item">
      <a class="nav-link" href="#" style="color: #D70F64">Link</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#" style="color: #D70F64">Link</a>
    </li>
    <?php
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true)
    echo "<a class='nav-link' href='Logout.php' style='color: #D70F64'>LOGOUT</a>";
    else
    echo "<a class='nav-link' href='login.php' style='color: #D70F64'><i class='far fa-user'></i> SIGN IN</a>";
    
    ?>
  </ul>
</nav>

	<img src="img\registration_bg.jpg" style="width: 98.2vw; position: relative;">

	<div class="registration_form">
		<h1>Registration Form</h1>
		<form name="regform" method="post" action="Registration.php">
			<p>Name</p>
			<input type="text" name="name" id="Name" placeholder=" Enter Your Name" required>
			<p>Email</p>
			<input type="email" name="email" id="email" placeholder="Enter Email Id" required>
			<p>Password</p>
			<input type="Password" name="pass1" id="password" placeholder="Enter Password" required>
			<p>Confirm Password</p>
			<input type="Password" name="pass2" id="confirm password" placeholder="Confirm Password" required>
			<p>Mobile Number</p>
			<input type="Number" name="phone" id="mobile number" placeholder="Enter Mobile No" required>
			<p>Address</p>
			<input type="text" name="address" placeholder="Enter Address" required>
			<br>
			<p>Upload Pic</p>
			<input type="file" name="image" accept="image/*" value="Choose File">
			<p style="font-size: 1.1vw; color:red;"> <?php echo $error; ?></p> 
			<br><br>
			<input type="submit" name="submit" value="Sign Up" id="submit">
		</form>		
	</div>

</body>
</html>
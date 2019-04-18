<?php
/*Connect*/
$conn=mysqli_connect("localhost","root","","foodsys");
if(!$conn)
	echo "<script>window.alert('Connection Faliled');</script>";
mysqli_connect_error();

$error="";
if(isset($_POST["email"], $_POST["password"])) 
    {     

        $email = $_POST["email"]; 
        $password = $_POST["password"];
        $email = stripslashes($_POST["email"]); 
		$email = mysqli_real_escape_string($conn,$_POST["email"]);
		$password = stripslashes($_POST["password"]); 
		$password = mysqli_real_escape_string($conn,$_POST["password"]);
        $password =hash('sha256', $_POST['password']);
        $admin="Admin";
        $query=mysqli_query($conn,"SELECT email, password FROM users WHERE email='".$admin."' AND password= '".$password."' ");
        if(mysqli_num_rows($query)>0)
        {
            session_start();
            $_SESSION["logged_in"] = true; 
            $_SESSION["email"] = $email; 
            header('Location: admin.php');
        }
        else
        {
            $result1 = mysqli_query($conn,"SELECT email, password FROM users WHERE email = '".$email."' AND  password = '".$password."' ");
            if(mysqli_num_rows($result1) > 0 )
            { 
            session_start();
            $_SESSION["logged_in"] = true; 
            $_SESSION["email"] = $email; 
            header('Location: Home.php');
            }
            else
            {
            $error="* Email OR Password is Incorrect";
            }
        }    

        
    }
?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="style\registration.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
</head>
<body>

<nav class="navbar " style="background-color: white;">
  <a class="navbar-brand col-lg-2" href="#" ><img src="img/foodz_logo.png" style="height: 4vw;"></a>
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
    echo "<a class='nav-link' href='Registration.php' style='color: #D70F64'><i class='fas fa-user-plus'></i> SIGN UP</a>";
    
    ?>
  </ul>
</nav>


	<img src="img\registration_bg.jpg" style="width: 98.2vw; position: relative;">

	<div class="loginbox">
        <br>
        <h1>Login Here</h1><br>
        <form name="myform" method="post" action="Login.php">
            
            <p>Email</p>
            <input type="Email" name="email" id="email" placeholder=" Enter Email" required><br>
            <p>Password</p>
            <input type="Password" name="password" id="password" placeholder=" Enter Password" required><br><br><br>
            <input type="submit" name="submit" id="submit" value="Login">
            <br>
            <p id="error" style="color:red; font-family:'Ubuntu'; font-size: 1.1vw;"> <?php echo $error; ?></p>
            <br>
           <a href="Registration.php"><p style="text-align:left; padding-top: 1vw;"><i class="fa fa-user-plus" style="font-size:24px;color:#D70F64;"></i> &nbsp;New user?</p></a>
        </form> 
    </div>
</body>
</html>
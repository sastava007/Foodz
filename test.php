<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style\home.css">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Ubuntu">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
</head>
<body>


<!-- <div class="container">
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="#">HOME</a>
    <a class="navbar-brand" href="#">ABOUT</a>
    <a class="navbar-brand" href="#">RESTURANTS</a>
    <a class="navbar-brand" href="#">Navbar</a>
  </nav>
</div> -->
<nav class="navbar " style="background-color: white;">
  <a class="navbar-brand col-lg-2" href="#" ><img src="img/foodz_logo.png" style="height: 4vw;"></a>
  <ul class="nav nav-pills">
    <li class="nav-item">
      <a class="nav-link active" href="#" style="color: white; background-color: #D70F64">Active</a>
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
    echo "<a class='nav-link' href='login.php' style='color: #D70F64'><i class='far fa-user'></i> LOGIN</a>";
    
    ?>
  </ul>
</nav>


<div class="bd-example">
  <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="img/res_bg.jpg" class="d-block w-100" alt="..." style="height: 30vw; padding-left: 0.6vw;padding-right: 0.6vw;filter: blur(3px);-webkit-filter: blur(3px);"> 
        <div class="carousel-caption d-none d-md-block">
          <h1>GET IN TOUCH</h1>
          <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="img/banner1.jpg" class="d-block w-100" alt="..." style="height: 30vw; padding-left: 1vw;padding-right: 1vw;"> 
        <div class="carousel-caption d-none d-md-block">
          <h1>GOOD FOOD FOR EVERY MOOD</h1>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="img/res_bg.jpg" class="d-block w-100" alt="..." style="height: 30vw; padding-left: 1vw;padding-right: 1vw;"> 
        <div class="carousel-caption d-none d-md-block">
          <h5>Third slide label</h5>
          <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

<center><h1 style=" font-size: 4vw; padding-top: 2vw; color: #D70F64 ;font-family:museo-sans, sans-serif)" ><b>How Foodz Works?</b></h1></center>
	

<div class="card-group" style="padding: 3vw;">
  <div class="card" style="margin: 1vw; box-shadow: 1px 5px 10px rgb(215,15,100);">
    <img src="img\delivery.svg" class="card-img-top" alt="..." style="height: 16vw;margin-top: 1vw;">
    <div class="card-body">
      <h4 class="card-title"><b>Explore restaurants</b> that deliver to your doorstep</h4>
    </div>
  </div>
  <div class="card" style="margin: 1vw; box-shadow: 1px 5px 10px rgb(215,15,100);">
    <img src="img\menu.svg" class="card-img-top" alt="..." style="height: 16vw; margin-top: 1vw;" >
    <div class="card-body">
      <h4 class="card-title">Browse menus and <b>build your order</b> in seconds</h4>
    </div>
  </div>
  <div class="card" style="margin: 1vw; box-shadow: 1px 5px 10px rgb(215,15,100);">
    <img src="img\notification.svg" class="card-img-top" alt="..." style="height: 16vw; margin-top: 1vw;">
    <div class="card-body">
      <h4 class="card-title">Follow the status of your order with <b>real-time alerts</b></h4>
    </div>
  </div>
</div>
	
	<center><h3 style=" font-size: 3vw; padding-top: 2vw; color: #D70F64 ;font-family:museo-sans, sans-serif)" ><b>Choose Your favourite restaurants</b></h3></center>
	<div class="container">
<?php


	$conn=mysqli_connect("localhost","root","","foodsys");
	$query=mysqli_query($conn,"SELECT * FROM restaurant NATURAL JOIN restaurant_norm");
	$i=1;
	echo "<div class='container' style='position:flex; flex-direction:row;'>";

	
	while ($row = $query->fetch_assoc())
	{ 
	echo "

	<div class='card' style='width: 20rem; margin-top:1vw; col-lg-2;'>
	  <img src='".$row['photo']."' class='card-img-top' alt='...'>
	  	<div class='card-body'
		    <b><h2 class='card-title'>".$row['name']."</h2></b>
		     <p class='card-text'><i class='fas fa-map-marker-alt' style='size:1vw;'></i> ".$row['address']."</p>
		    <a href='#' class='btn btn-primary' style='background-color: #D70F64; border-color:none;'>Go somewhere</a>
  		</div>
	</div>";
	}
	echo "</div>";
?>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>
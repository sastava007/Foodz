<?php include('header.php'); 
session_start();
?>
<html>
<head>
	<title>Restaurant</title>
	<link rel="stylesheet" type="text/css" href="home.css">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Ubuntu">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">

	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
<!--?php include('navbar.php'); ?-->

<div class="res_bg" style="position: relative;">
<img src="img\res_bg.jpg" style="width:99.5vw;height: 29vw; filter: blur(7px);-webkit-filter: blur(7px); position: relative;">
<div style="position: absolute;top: 12vw; left: 47vw;"><a href="Home.html"><img src="img\foodz_logo.png"></a></div>
<div style="position: absolute; top: 18.7vw; left:30vw"><b><h1 style="font-family: Roboto,sans-serif ;color:White;">Enjoy the best Dishes and Drinks Around You</h1></b>
  </div>
</div>



<div class="card mb-3" style="width: 100%; padding-top: 3.6vw;padding-left: 5vw;">
  <div class="row no-gutters">
    <div class="col-md-4">
    	<?php
    	$r_id=$_GET['r_id'];
    	$conn=mysqli_connect("localhost","root","","foodsys");
		$query=mysqli_query($conn,"SELECT * FROM restaurant NATURAL JOIN restaurant_norm where r_id= '".$r_id."'  ");
		$row=mysqli_fetch_assoc($query);
      echo "
      <img src='".$row['photo']."' class='card-img' alt='...' style='width:26vw; border-radius:5%;'>
    </div>
    <div class='col-md-8'>
      <div class='card-body'>
        <h1 class='card-title' style='font-size:4vw;font-weight: bold;'>".$row['name']."</h1>
        <p class='card-text'><i class='fas fa-map-marker-alt' style='size:1vw;'></i> ".$row['address']."</p>
        <div class='rating' style='background-color:white; width:6vw; height:3vw; text-align: center; padding: 0.5vw; background-color: #D70F64;color:white; margin-bottom:1vw;font-size:1.5vw;letter-spacing:0.1vw;border-radius:5%;'><b>4.5/<span style='font-size:1.2vw;'>5</span></div>
      </div>
    </div>";
    ?>
  </div>
</div><br><br>



	<?php
	$r_id=$_GET['r_id'];
	$conn=mysqli_connect("localhost","root","","foodsys");
	$sql=mysqli_query($conn,"SELECT * FROM menu where r_id='".$r_id."'");
	$i=1;
	while ($row=mysqli_fetch_assoc($sql)) 
	{
		if($i%3==1)
		echo "<div class='card-group'>";
		echo "<div class='card' style='margin:2vw;'>
		<div style='background-color: #D70F64; padding:0.8vw;'><h2 style='color:white; width:30vw;'>".$row['name']."</h2></div>
    	<img src='".$row['photo']."' class='card-img-top' style='height:19vw; margin:1vw;width:27vw; margin-bottom:0vw;'>
    	<div class='card-body'>
     	 <h2 class='card-title'></h2>
      	<b><h3 class='card-text' style='font-family:Roboto;'>".$row['description']."</h3></b><br>

      	<h3><i class='fas fa-rupee-sign' style='color:#D70F64;font-size:30px;'></i> ".$row['price']."</h3>
    	</div>
    	</div>";
   		 $i++;
		if($i%3==1)
		echo "</div>";
	}
 
    ?>
  </div>

  


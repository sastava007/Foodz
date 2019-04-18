<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<?php
session_start();
$email=$_SESSION["email"];
$conn=mysqli_connect("localhost","root","","foodsys");
$query=mysqli_connect($conn,"SELECT r_id from restaurant where email='."$email".' ");

?>
<form class="form-horizontal">
<fieldset>
<legend style="background-color: #D70F64;height:5.2vw; padding: 1.2vw; color: white;"><h1><center>ADD TO MENU</center></h1></legend>

<form action="addtomenu.php?email=" method="POST">
<div class="form-group" style="padding-top: 2vw;">
  <label class="col-md-4 control-label" for="product_name">PRODUCT NAME</label>  
  <div class="col-md-4">
  <input id="product_name" name="name" placeholder="PRODUCT NAME" class="form-control input-md" required="" type="text">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="product_description">PRODUCT DESCRIPTION</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="product_description" name="description"></textarea>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="product_categorie">PRODUCT CATEGORY</label>
  <div class="col-md-4">
     <select id="product_categorie" name="product_categorie" class="form-control">
    <?php
    $conn=mysqli_connect("localhost","root","","foodsys");
    $query=mysqli_query($conn,"SELECT DISTINCT category FROM menu");
    while($row=mysqli_fetch_assoc($query))
    {
      echo "<option value='".$row['category']."'>'".$row['category']."'</option>";
    }
     
    
    ?>
    </select>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="available_quantity">PRICE</label>  
  <div class="col-md-4">
  <input id="available_quantity" name="price" placeholder="Price" class="form-control input-md" required="" type="text">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="filebutton">Image</label>
  <div class="col-md-4">
    <input id="filebutton" name="photo" class="input-file" type="file" required="">
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton">ADD</label>
  <div class="col-md-4">
    <input id="singlebutton" name="submit" class="btn btn-primary" type="submit" style="background-color: #D70F64; border-color: #D70F64;">
  </div>
  </div>

</fieldset>
</form>

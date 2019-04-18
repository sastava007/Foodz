<?php 
session_start();
$email=$_SESSION["email"];
$conn=mysqli_connect("localhost","root","","foodsys");
$query=mysqli_query($conn,"SELECT name,r_id from restaurant NATURAL JOIN restaurant_norm where email='".$email."' ");
include('header.php'); 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
</head>
<body>

<?php include('navbar.php'); 

while ($row =mysqli_fetch_assoc($query)) 
{
    echo $row['name']."<br>";
    $r_id=$row['r_id'];
}

?>
<div class="container">
	<h1 class="page-header text-center">MENU</h1>
	<div class="row">
		<div class="col-md-12">
			<select id="catList" class="btn btn-default">
			<option value="0">All Category</option>
			<?php
				$sql="select * from category";
				$catquery=$conn->query($sql);
				while($catrow=$catquery->fetch_array()){
					$catid = isset($_GET['category']) ? $_GET['category'] : 0;
					$selected = ($catid == $catrow['categoryid']) ? " selected" : "";
					echo "<option$selected value=".$catrow['categoryid'].">".$catrow['catname']."</option>";
				}
			?>
			</select>
			<a class="btn btn-primary" href="Logout.php" style='background-color:#D70F64; border-color:#D70F64;' ><i class="fas fa-sign-out-alt"></i> LOGOUT</a>
			<?php
			echo "<a href='#addproduct' data-toggle='modal' class='pull-right btn btn-primary' style='background-color:#D70F64; border-color:#D70F64;'><span class='glyphicon glyphicon-plus'></span> Product</a>";?>
		</div>
	</div>
	<div style="margin-top:10px;">
		<table class="table table-striped table-bordered">
			<thead>
				<th>Photo</th>
				<th>Product Name</th>
				<th>Price</th>
				<th>Action</th>
			</thead>
			<tbody>
				<?php
					$where = "";
					if(isset($_GET['category']))
					{
						$catid=$_GET['category'];
						$where = " WHERE product.categoryid = $catid";
					}
					$sql="SELECT * from menu where r_id= '".$r_id."' ";
					$query=$conn->query($sql);
					while($row=$query->fetch_array()){
						?>
						<tr>
							<td><a href="<?php if(empty($row['photo'])){echo "upload/noimage.jpg";} else{echo $row['photo'];} ?>"><img src="<?php if(empty($row['photo'])){echo "upload/noimage.jpg";} else{echo $row['photo'];} ?>" height="30px" width="40px"></a></td>
							<td><?php echo $row['name']; ?></td>
							<td>&#8369; <?php echo number_format($row['price'], 2); ?></td>
							<td>
								<a href="#editproduct<?php echo $row['i_id']; ?>" data-toggle="modal" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-pencil"></span> Edit</a> || <a href="#deleteproduct<?php echo $row['i_id']; ?>" data-toggle="modal" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span> Delete</a>
								<?php include('product_modal.php'); ?>
							</td>
						</tr>
						<?php
					}
				?>
			</tbody>
		</table>
	</div>
</div>
<?php include('modal.php'); ?>
<script type="text/javascript">
	$(document).ready(function(){
		$("#catList").on('change', function(){
			if($(this).val() == 0)
			{
				window.location = 'product.php';
			}
			else
			{
				window.location = 'product.php?category='+$(this).val();
			}
		});
	});
</script>
</body>
</html>
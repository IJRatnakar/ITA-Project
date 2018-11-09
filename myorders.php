<?php include('server.php') ?>

<?php 
 if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
  }
  else
{
  $username=$_SESSION['username'];
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
  <title>NITK MESS MANAGEMENT</title>
  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
</head>
<body>

<?php 
  $query="select * from orders where rollno='$username'";
  $result=mysqli_query($db,$query);
 	
?>

<div class="bg-success text-white"><br><h1 align="center"> MY ORDERS </h1> <br></div>
<table class="table table-dark">
  <thead>
	<tr>
	<th>Food items</th>
	<th>price</th>
	<th>Quantity</th>
	<th>TIME</th>
  </tr>
  </thead>
  <tbody>
    <?php $var = 0; ?>
   <?php while($row=mysqli_fetch_assoc($result)){

      $var = 1; ?>
   	<tr>
   		<th class="bg-warning text-white"><?php echo $row['food'] ;?></th>
   		<th class="bg-danger text-white"><?php echo $row['price'] ;?></th>
   		<th class="bg-success text-white"><?php echo $row['quantity'] ;?></th>
   		<th class="bg-primary text-white"><?php echo $row['tim'] ;?></th>
   	</tr>
   <?php } ?>
   </tbody>
</table>

  <?php if($var == 0) { ?>
    <h1 align="center"> NO DATA </h1>
  <?php } ?>
</body>
</html>




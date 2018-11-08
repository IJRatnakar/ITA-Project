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
</head>
<body>

<?php 
  $query="select * from orders where rollno='$username'";
  $result=mysqli_query($db,$query);
 	
?>
<table>
	<tr>
	<th>Food items</th>
	<th>price</th>
	<th>Quantity</th>
	<th>TIME</th>
  </tr>
   <?php while($row=mysqli_fetch_assoc($result)){ ?>
   	<tr>
   		<th><?php echo $row['food'] ;?></th>
   		<th><?php echo $row['price'] ;?></th>
   		<th><?php echo $row['quantity'] ;?></th>
   		<th><?php echo $row['tim'] ;?></th>
   	</tr>
   <?php } ?>
</table>
</body>
</html>




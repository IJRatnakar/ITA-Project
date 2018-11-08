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

<?php 
	
	if(isset($_POST['CONFIRMORDER'])){

			$address = $_POST['address'];
		 	$phone = $_POST['phone'];
			$final_price = 0;
			$len = count($_SESSION['orderarrayprice']);

			for ($i = 0;$i < $len;$i = $i + 1) {

		 		$food = $_SESSION['orderarrayname'][$i];
		 		$price =  $_SESSION['orderarrayprice'][$i];
		 		$quantity = $_SESSION['orderarrayquantity'][$i];
		 		
			 	$query = "insert into orders values ('$address','$phone','$food','$price','$quantity','$username',NOW())";

			 	if(mysqli_query($db,$query)){

			 	}else {
			 		echo "ERROR";
			 	}

			 } 

			 header('location: nightcanteen.php');
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>CART</title>
</head>
<body>

<form  method="post" action="cart.php">
	
	<table>
		
	<tr>
		<th>NAME</th>
		<th>Price</th>
		<th>Quantity</th>
		<th>Total Price</th>
	</tr>

		<?php

			$final_price = 0;
			$len = count($_SESSION['orderarrayprice']);
			for ($i = 0;$i < $len;$i = $i + 1) {
			 	?>
			 	<tr>
			 		<th><?php echo $_SESSION['orderarrayname'][$i]; ?></th>
			 		<th><?php echo $_SESSION['orderarrayprice'][$i]; ?></th>
			 		<th><?php echo $_SESSION['orderarrayquantity'][$i]; ?></th>
			 		<th><?php echo $_SESSION['orderarrayprice'][$i]*$_SESSION['orderarrayquantity'][$i]; 
			 		$final_price = $final_price + $_SESSION['orderarrayprice'][$i]*$_SESSION['orderarrayquantity'][$i]?></th>
			 	</tr>
			 	<?php
			 } 
		?>

	</table>

	<label>Roll No - <?php echo $_SESSION['username']; ?></label><br>
	<label>Phone - </label><input type="text" name="phone" value="" ><br>
	<label>Address - </label><input type="text" name="address" value="" ><br>
	<label>Total - <?php echo $final_price; ?></label><br>	      

<button type="submit" class="btn" name="CONFIRMORDER">Confirm Order</button> 

</form>

</body>
</html>
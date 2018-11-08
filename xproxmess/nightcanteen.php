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

	$vegquantity = array();
	$vegname = array();
	$vegprice = array();
	$vegtag = array();

?>

<?php

$query = "select distinct(tag) from night_canteen_veg";
$result = mysqli_query($db,$query);


	$varr = 0;
?>

<h1> VEG </h1>
<form method="post" action="nightcanteen.php">
<table>
<?php

    while($row = mysqli_fetch_assoc($result)){

    	$tagg = $row['tag'];
    	?>
    	<tr><th></th><th><?php echo $tagg; ?></th><th></th></tr>
    	<?php
    	$query2 = "select * from night_canteen_veg where tag = '$tagg'";
    	$result1 = mysqli_query($db,$query2);
      ?>

	<tr>
		<th>FOOD ITEM</th>
		<th>PRICE</th>
		<th>AVAILABLE</th>
	</tr>

	<?php 
	while($row1 = mysqli_fetch_assoc($result1)) { ?>

		<?php if( $row1['availability'] == 1){ 

			array_push($vegname,$row1['Food']);
			array_push($vegprice,$row1['price']);
			array_push($vegtag,$row1['tag']);
			array_push($vegquantity,0);
			
			?>
      <tr>
        <th><?php echo $row1['Food']; ?></th>
        <th><?php echo $row1['price']; ?></th>
        <th><?php echo $row1['availability']; ?></th>
        <th><input type="text" name="<?php echo $varr;  $varr = $varr+1; ?>" value="0" >  </th>
        <th>
        
      </tr>    
      <?php 
  }
    }
}
?>
</table>

<?php 
	$query1 = "select distinct(tag) from night_canteen_nonveg";
	$result1 = mysqli_query($db,$query1);
?>

<h1> NON VEG </h1>

<table>
<?php

    while($row = mysqli_fetch_assoc($result1)){

    	$tagg = $row['tag'];
    	?>
    	<tr><th></th><th><?php echo $tagg; ?></th><th></th></tr>
    	<?php
    	$query2 = "select * from night_canteen_nonveg where tag = '$tagg'";
    	$result2 = mysqli_query($db,$query2);
      ?>

	<tr>
		<th>FOOD ITEM</th>
		<th>PRICE</th>
		<th>AVAILABLE</th>
	</tr>

	<?php while($row1 = mysqli_fetch_assoc($result2)) { ?>
	<?php if( $row1['availability'] == 1){ 

			array_push($vegname,$row1['Food']);
			array_push($vegprice,$row1['price']);
			array_push($vegtag,$row1['tag']);
			array_push($vegquantity,0);
		?>
   
      <tr>
        <th><?php echo $row1['Food']; ?></th>
        <th><?php echo $row1['price']; ?></th>
        <th><?php echo $row1['availability']; ?></th>
        <th><input type="text" name="<?php echo $varr; ?>" value="0" >  
        	<?php
          $varr = $varr+1;
          ?>
      </tr>    
      <?php 
    }
}
}
?>
</table>
<button type="submit" class="btn" name="ADDTOCART">ADD TO CART</button> 
</form>
</body>
</html>


<?php 
	
	if(isset($_POST['ADDTOCART'])){
		$arrlen = count($vegquantity);

		$orderarrayname = array();
		$orderarrayquantity = array();
		$orderarrayprice = array();
		$orderarraytag = array();

		for($i = 0;$i<$arrlen;$i = $i+1){
			if($_POST[$i] != 0){
				array_push($orderarrayname,$vegname[$i]);;
				array_push($orderarrayquantity,$_POST[$i]);;
				array_push($orderarrayprice,$vegprice[$i]);;
				array_push($orderarraytag,$vegtag[$i]);;	
			}
		}

		$_SESSION['orderarrayname'] = $orderarrayname;
		$_SESSION['orderarrayquantity'] = $orderarrayquantity;
		$_SESSION['orderarrayprice'] = $orderarrayprice;
		$_SESSION['orderarraytag'] = $orderarraytag;
		
		header('location: cart.php');
	}

?>
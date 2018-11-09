<?php include('server_admin.php') ?>

<?php 
	
    $var = 1; 
  	$varn = 1;
  if (!isset($_SESSION['username1'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login_admin.php');
  }
  else
{
  $username=$_SESSION['username1'];
}

?>


<?php 


if($_SERVER['REQUEST_URI'] != "/xproxmess/order_show.php")
if( $_REQUEST['check'] == 1){
	$idd = $_REQUEST['deleteid'];

	// unset($_SESSION['check']);
	if($idd){
		$quer = "delete from orders where rollno = '$idd'";
		mysqli_query($db,$quer);
	}

	header('location: order_show.php');
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
  <title>NITK MESS MANAGEMENT</title>
</head>
<body>

	<?php

$query = "select distinct(rollno) from orders order by tim";
$result = mysqli_query($db,$query);
if(mysqli_query($db,$query)){

}else {
	echo "E";
}
?>

<form  method="post" action="order_show.php">
	
<table>
  
<?php

    while($row = mysqli_fetch_assoc($result)){

    	$tagg = $row['rollno'];
    	?>
    	<tr><th></th><th><?php echo $tagg; ?></th><th></th></tr>
    	<tr><th></th><th>
    		<a href="order_show.php?deleteid=<?php echo $tagg; ?>&check=1">ORDER COMPLETED</a>
    	</th><th></th></tr>
    	<?php
    	$query2 = "select * from orders where rollno = '$tagg'";
    	$result1 = mysqli_query($db,$query2);

      ?>

	<tr>
		<th>FOOD ITEM</th>
		<th>PRICE</th>
		<th>QUANTITY</th>
	</tr>

	<?php while($row1 = mysqli_fetch_assoc($result1)) { ?>

      <tr>
        <th><?php echo $row1['food']; ?></th>
        <th><?php echo $row1['price']; ?></th>
        <th><?php echo $row1['quantity']; ?> </th>
        

        	
      </tr>    
      <?php 
    }
}
?>
</table>
</form>
</body>
</html>
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

   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
   <style type="text/css">
     
.float{
  position:fixed;
  width:60px;
  height:60px;
  bottom:40px;
  right:40px;
  background-color:#0C9;
  color:#FFF;
  border-radius:50px;
  text-align:center;
  box-shadow: 2px 2px 3px #999;
}

.my-float{
  margin-top:22px;
}
   </style>
</head>
<body>


<div class="bg-success text-white"><br><h1 align="center">NIGHT CANTEEN ORDER</h1> <br></div>
	<?php

$query = "select distinct(rollno) from orders order by tim";
$result = mysqli_query($db,$query);
if(mysqli_query($db,$query)){

}else {
	echo "E";
}
?>

<form  method="post" action="order_show.php">
	
<table class="table">
  
<?php

    while($row = mysqli_fetch_assoc($result)){

    	$tagg = $row['rollno'];
    	?>
    	<tr class="bg-primary text-white"><th></th><th><?php echo $tagg; ?></th><th></th></tr>
    	<tr class = "bg-danger text-white"><th></th><th>
    		<a href="order_show.php?deleteid=<?php echo $tagg; ?>&check=1" class = "text-white">COMPLETED</a>
    	</th><th></th></tr>
    	<?php
    	$query2 = "select * from orders where rollno = '$tagg'";
    	$result1 = mysqli_query($db,$query2);

      ?>
<thead>
	<tr>
		<th>FOOD ITEM</th>
		<th>PRICE</th>
		<th>QUANTITY</th>
	</tr>
</thead>

<tbody>
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
</tbody>
</table>
</form>

<a href="main.php" class="float">
<i class="fa fa-plus my-float text-white" style="text-decoration: none;">Main page</i>
</a>
</body>
</html>


<?php include('server.php'); 
 if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
  }
  else
{
  $username=$_SESSION['username'];
}
?><!DOCTYPE html>
<html lang="en">
  <head>
  <title>NITK MESS MANAGEMENT</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="CSS/style.css">
    <link rel="stylesheet" type="text/css" href="CSS/s.css">
    <link rel="stylesheet" type="text/css" href="CSS/sss.css">
<style type="text/css">
	h2 {
  text-align: center;
}

table caption {
	padding: .5em 0;
}

.p{
  text-align: center;
  padding-top: 140px;
  font-size: 14px;
}
form { 
margin: 0 auto; 
width:	50%;
}
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

@media screen and (max-width: 767px) {
  table caption {
    border-bottom: 1px solid #ddd;
  }
  
form { 
margin: 0 auto; 
width:	100%;
}
</style>

</head>
<body class="bg-inverse">


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

<form method="post" action="nightcanteen.php" align="center">

<br>

<div class="container ">
  <div class="row">
    <div class="col-xs-12">
      <div class="table-responsive">
        <table summary="This table shows how to create responsive tables using Bootstrap's default functionality" class="table table-bordered table-hover" align="center">
          <caption class="text-center">Order from Veg Night Canteen </caption>
          <thead>
<?php

    while($row = mysqli_fetch_assoc($result)){

    	$tagg = $row['tag'];
    	?>
    	<tr class="p-3 mb-2 bg-danger text-white"><th></th><th><?php echo $tagg; ?></th><th></th><th></th></tr>
    	<?php
    	$query2 = "select * from night_canteen_veg where tag = '$tagg'";
    	$result1 = mysqli_query($db,$query2);
      ?>

	<tr class="p-3 mb-2 bg-warning text-dark">
		<th>FOOD ITEM</th>
		<th>PRICE</th>
		<th>AVAILABLE</th>
		<th>QUANTITY</th>
	</tr>
</thead>
	<?php 
	while($row1 = mysqli_fetch_assoc($result1)) { ?>

		<?php if( $row1['availability'] == 1){ 

			array_push($vegname,$row1['Food']);
			array_push($vegprice,$row1['price']);
			array_push($vegtag,$row1['tag']);
			array_push($vegquantity,0);
			
			?>
      <tr class="p-3 mb-2 bg-primary text-white">
        <th><?php echo $row1['Food']; ?></th>
        <th><?php echo $row1['price']; ?></th>
        <th><?php echo $row1['availability']; ?></th>
        <th><input type="text" name="<?php echo $varr;  $varr = $varr+1; ?>" value="0" >  </th>
        
      </tr>    
      <?php 
  }
    }
}
?>
</table>
</div></div></div></div>
<?php 
	$query1 = "select distinct(tag) from night_canteen_nonveg";
	$result1 = mysqli_query($db,$query1);
?>
<br>
<div class="container">
  <div class="row">
    <div class="col-xs-12">
      <div class="table-responsive">
        <table summary="This table shows how to create responsive tables using Bootstrap's default functionality" class="table table-bordered table-hover">
          <caption class="text-center">Order from Non Veg Night Canteen </caption>
          <thead>
<?php
    while($row = mysqli_fetch_assoc($result1)){

    	$tagg = $row['tag'];
    	?>
    	<tr class="p-3 mb-2 bg-danger text-white"><th></th><th><?php echo $tagg; ?></th><th></th><th></th></tr>
    	<?php
    	$query2 = "select * from night_canteen_nonveg where tag = '$tagg'";
    	$result2 = mysqli_query($db,$query2);
      ?>

	<tr class="p-3 mb-2 bg-warning text-dark">
		<th>FOOD ITEM</th>
		<th>PRICE</th>
		<th>AVAILABLE</th>
		<th>QUANTITY</th>
	</tr>
</thead>

	<?php while($row1 = mysqli_fetch_assoc($result2)) { ?>
	<?php if( $row1['availability'] == 1){ 

			array_push($vegname,$row1['Food']);
			array_push($vegprice,$row1['price']);
			array_push($vegtag,$row1['tag']);
			array_push($vegquantity,0);
		?>
   
      <tr class="p-3 mb-2 bg-primary text-white">
        <th><?php echo $row1['Food']; ?></th>
        <th><?php echo $row1['price']; ?></th>
        <th><?php echo $row1['availability']; ?></th>
        <th><input type="text" name="<?php echo $varr; ?>" value="0" > </th> 
        	<?php
          $varr = $varr+1;
          ?>
      </tr>    
      <?php 
    }
}
}
?>
</table></div></div></div>
<button type="submit" class="btn bg-primary pull-right text-white" name="ADDTOCART">ADD TO CART</button> 
</form>


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
</body>

<a href="main.php" class="float">
<i class="fa fa-plus my-float text-white" style="text-decoration: none;">Main page</i>
</a>
</html>


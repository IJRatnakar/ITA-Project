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
margin-left: 35%; 
}
@media screen and (max-width: 767px) {
  table caption {
    border-bottom: 1px solid #ddd;
  }
  
form { 
margin: 0 auto;
}
}
.jumbotron {
background: #358CCE;
color: #FFF;
border-radius: 0px;
}
.jumbotron-sm { padding-top: 24px;
padding-bottom: 24px; }
.jumbotron small {
color: #FFF;
}
.h1 small {
font-size: 24px;
}

</style>

</head>
<body class="bg-inverse">
<div class="jumbotron jumbotron-sm">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <h1 class="h1">
                    ORDERS</small></h1>
            </div>
        </div>
    </div>
</div>


<form  method="post" action="cart.php">
	<div class="container ">
  <div class="row">
    <div class="col-xs-12">
      <div class="table-responsive">
        <table summary="This table shows how to create responsive tables using Bootstrap's default functionality" class="table table-bordered table-hover" align="left">
          <caption class="text-center">Your Orders</caption>
          <thead>
	<tr class="p-3 mb-2 bg-warning text-dark">
		<th>NAME</th>
		<th>Price</th>
		<th>Quantity</th>
		<th>Total Price</th>
	</tr>
</thead>

		<?php

			$final_price = 0;
			$len = count($_SESSION['orderarrayprice']);
			for ($i = 0;$i < $len;$i = $i + 1) {
			 	?>
			 	<tr class="p-3 mb-2 bg-danger text-white">
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
</div></div></div></div>
<div class="col-md-6">
                        <div class="form-group">
	<div class="form-control"><label>Roll No    </label><input class="form-control" type="text" disabled value="<?php echo $_SESSION['username']; ?>"> </input></div>
	<div class="form-control"><label>Phone</label><input type="text" name="phone" value="" class="form-control" ></div>
	<div class="form-control"><label>Address</label><input type="text" name="address" value="" class="form-control"></div>
	<div class="form-control"><label >Total Price</label><input type="text" disabled value="<?php  echo $final_price; ?>" class = "form-control"></input></div>
<button type="submit" class="btn form-control bg-primary text-white" name="CONFIRMORDER">Confirm Order</button><br>
</div></div> 

</form>

</body>
</html>
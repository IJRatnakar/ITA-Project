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
	
	if(isset($_POST['ADDITEMVEG'])){

		$quer = "insert into night_canteen_veg (Food,price,availability,tag) values ('Add Item',0,0,'Add Tag');";
		mysqli_query($db,$quer);
	}

	if(isset($_POST['DELETEITEMVEG'])){

		$bx = mysqli_real_escape_string($db,$_POST["deletes"]);
		$quer = "delete from night_canteen_veg where Food = '$bx';";
		mysqli_query($db,$quer);
	}

	if(isset($_POST['UPDATEITEMVEG'])){

		$quer = "select count(*) as c from night_canteen_veg";

		$res = mysqli_query($db,$quer);
		$vaarr = mysqli_fetch_assoc($res);
		$varr = $vaarr['c'];
		$varr = $varr*5;
		$var2 = 1;

		while ($var2 <= $varr) {
			$item = mysqli_real_escape_string($db,$_POST["$var2"]);
			$var2 = $var2 + 1;
			$price = mysqli_real_escape_string($db,$_POST["$var2"]);
			$var2 = $var2 + 1;
			$avail = mysqli_real_escape_string($db,$_POST["$var2"]);
			$var2 = $var2 + 1;
			$tag = mysqli_real_escape_string($db,$_POST["$var2"]);
			$var2 = $var2 + 1;

			$idd = mysqli_real_escape_string($db,$_POST["$var2"]);
			$var2 = $var2 + 1;

			$query = "update night_canteen_veg set Food = '$item', price = '$price', availability = '$avail', tag = '$tag' where idd = '$idd'";

			if(mysqli_query($db,$query)){

			}	else {
				echo "ERROR";
				break;
			}
		}
	}


	if(isset($_POST['ADDITEMNONVEG'])){

		$quer = "insert into night_canteen_nonveg (Food,price,availability,tag) values ('Add Item',0,0,'Add Tag');";
		mysqli_query($db,$quer);
	}

	if(isset($_POST['DELETEITEMNONVEG'])){

		$bx = mysqli_real_escape_string($db,$_POST["deletes"]);
		$quer = "delete from night_canteen_nonveg where Food = '$bx';";
		mysqli_query($db,$quer);
	}

	if(isset($_POST['UPDATEITEMNONVEG'])){

		$quer = "select count(*) as c from night_canteen_nonveg";

		$res = mysqli_query($db,$quer);
		$vaarr = mysqli_fetch_assoc($res);
		$varr = $vaarr['c'];
		$varr = $varr*5;
		$var2 = 1;

		while ($var2 <= $varr) {
			$item = mysqli_real_escape_string($db,$_POST["$var2"]);
			$var2 = $var2 + 1;
			$price = mysqli_real_escape_string($db,$_POST["$var2"]);
			$var2 = $var2 + 1;
			$avail = mysqli_real_escape_string($db,$_POST["$var2"]);
			$var2 = $var2 + 1;
			$tag = mysqli_real_escape_string($db,$_POST["$var2"]);
			$var2 = $var2 + 1;

			$idd = mysqli_real_escape_string($db,$_POST["$var2"]);
			$var2 = $var2 + 1;

			$query = "update night_canteen_nonveg set Food = '$item', price = '$price', availability = '$avail', tag = '$tag' where idd = '$idd'";

			if(mysqli_query($db,$query)){

			}	else {
				echo "NONERROR";
				break;
			}
		}
	}


?>

<!DOCTYPE html>
<html lang="en">
  <head>
  <title>NITK MESS MANAGEMENT</title>
</head>

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
<body>

<?php

$query = "select distinct(tag) from night_canteen_veg";
$result = mysqli_query($db,$query);
?>



<div class="bg-success text-white"><br><h1 align="center">VEG</h1> <br></div><form method="post" action="nightcanteenmenuupdate.php">

<table style="width:100%">
  
<?php

    while($row = mysqli_fetch_assoc($result)){

    	$tagg = $row['tag'];
    	?>
    	<tr class="bg-warning"><th></th><th><?php echo $tagg; ?></th><th></th><th></th></tr>
    	<?php
    	$query2 = "select * from night_canteen_veg where tag = '$tagg'";
    	$result1 = mysqli_query($db,$query2);
      ?>

	<tr>
		<th>FOOD ITEM</th>
		<th>PRICE</th>
		<th>AVAILABLE</th>
		<th>Tag</th>
	</tr>

	<?php while($row1 = mysqli_fetch_assoc($result1)) { ?>

      <tr>
        <th><input type="text" name="<?php echo $var ?>" value="<?php echo $row1['Food']; ?>"  >  </th>
        <th><input type="text" name="<?php echo $var+1 ?>" value="<?php echo $row1['price']; ?>" >  </th>
        <th><input type="text" name="<?php echo $var+2 ?>" value="<?php echo $row1['availability']; ?>" >  </th>
        <th><input type="text" name="<?php echo $var+3 ?>" value="<?php echo $row1['tag']; ?>" >  </th>
        <th style="display: none;"><input type="text" name="<?php echo $var+4 ?>" value="<?php echo $row1['idd']; ?>" >  </th>
        
        	
      </tr>    
      <?php 
      $var = $var + 5;
    }
}
?>
</table>
<br>
<button type="submit" class="btn" name="ADDITEMVEG">ADD NEW ITEM</button>
<input type="text" name="deletes" value=""> 
<button type="submit" class="btn" name="DELETEITEMVEG">DELETE ITEM</button> 
<button type="submit" class="btn" name="UPDATEITEMVEG">Update</button>
</form>


<?php

$query = "select distinct(tag) from night_canteen_nonveg";
$result = mysqli_query($db,$query);
?>


<div class="bg-success text-white"><br><h1 align="center">NON VEG</h1> <br></div>
<form method="post" action="nightcanteenmenuupdate.php">

<table style="width:100%">
  
<?php

    while($row = mysqli_fetch_assoc($result)){

    	$tagg = $row['tag'];
    	?>
    	<tr class="bg-warning"><th></th><th><?php echo $tagg; ?></th><th></th><th></th></tr>
    	<?php
    	$query2 = "select * from night_canteen_nonveg where tag = '$tagg'";
    	$result1 = mysqli_query($db,$query2);
      ?>

	<tr>
		<th>FOOD ITEM</th>
		<th>PRICE</th>
		<th>AVAILABLE</th>
		<th>Tag</th>
	</tr>

	<?php while($row1 = mysqli_fetch_assoc($result1)) { ?>

      <tr>
        <th><input type="text" name="<?php echo $varn ?>" value="<?php echo $row1['Food']; ?>"  >  </th>
        <th><input type="text" name="<?php echo $varn+1 ?>" value="<?php echo $row1['price']; ?>" >  </th>
        <th><input type="text" name="<?php echo $varn+2 ?>" value="<?php echo $row1['availability']; ?>" >  </th>
        <th><input type="text" name="<?php echo $varn+3 ?>" value="<?php echo $row1['tag']; ?>" >  </th>
        
        <th style="display: none;"><input type="text" name="<?php echo $varn+4 ?>" value="<?php echo $row1['idd']; ?>" >  </th>
        
        	
      </tr>    
      <?php 
      $varn = $varn + 5;
    }
}
?>
</table>

<br>
<button type="submit" class="btn" name="ADDITEMNONVEG">ADD NEW ITEM</button>
<input type="text" name="deletes" value=""> 
<button type="submit" class="btn" name="DELETEITEMNONVEG">DELETE ITEM</button> 
<button type="submit" class="btn" name="UPDATEITEMNONVEG">Update</button>
</form>


</body>

<a href="main.php" class="float">
<i class="fa fa-plus my-float text-white" style="text-decoration: none;">Main page</i>
</a>
</html>
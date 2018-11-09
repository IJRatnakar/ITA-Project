<?php include('server_admin.php') ?>

<?php 

  if (!isset($_SESSION['username1'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login_admin.php');
  }
  else
{
  $username=$_SESSION['username1'];
}
  

?>

<!DOCTYPE html>
<html>
<head>
	<title>Mess Allotment Admin</title>
	<link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" type="text/css" href="style.css">
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
	<div class="header bg-primary text-white">
    <br>
    <h2 align="center">MESS ALLOTMENT</h2>
    <br>
  </div>


<?php 
$query = "select * from mess_count";
$result = mysqli_query($db,$query);
?>	
<table style="width:100%" class="table">
  
  <tr>
    <th class="bg-success">MESS</th>
    <th class="bg-success">COUNT</th>
  </tr>

  <?php 
  	while($row = mysqli_fetch_assoc($result)){
  		?>

  		<tr>
  			
  			<th class="bg-danger"> <?php echo $row['mess']; ?> </th>
  			<th class="bg-warning"> <?php echo $row['left_count']; ?> </th>

  		</tr>

  		<?php 
  	}
?>

</table> 
<div class="container">
<div style="background: #cc99ff; margin: 20px;"> 
  <form method="post" action="messleftcount.php" style="margin: 60px;">
    <?php include('login_errors.php'); ?>
	    
		<br>
<br>	
			<select class = "form-control" name="MessCountCategory">
 				 <option value="">Choose Mess...</option>
  				 <option value="1st Block">1st Block</option>
 				 <option value="2nd Block">2nd Block</option>
 				 <option value="4th Block">4th Block</option> 
 				 <option value="Mega Mess">Mega Mess</option> 

			</select>
		<br>

<div class = "input-group">
			<label class="form-control">Set Count</label>
			<input type="text" name="count1" value="">
		</div>
<br>

  		<div class="input-group" >
  			<button type="submit" class="btn form-control" name="messcount">Set Count</button>
  		</div>
<br>
<br>
  
	</form>
</div></div>

<a href="main.php" class="float">
<i class="fa fa-plus my-float text-white" style="text-decoration: none;">Main page</i>
</a>
</body>
</html>
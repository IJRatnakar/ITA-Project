<?php include('server.php') ?>


<!DOCTYPE html>
<html>
<head>
	<title>Menu</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
<style type="text/css">
	
form {
	margin-left: 40%;
	margin-right: 40%;
}

table {
	margin-left: 20px;
	margin-right: 20px;
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
</style>
<body>

<?php
if(isset($_POST['Menu'])){
  $mess = mysqli_real_escape_string($db,$_POST['MessMenu']);

$query = "select * from $mess";
$result = mysqli_query($db,$query);
?>  
<table style="width:100%" class="table table-dark">
    <tr class="bg-info"><th></th><th></th><th><?php echo $mess ?></th><th></th></tr>

  <tr>
    <th>DAY</th>
    <th>BREAKFAST</th>
    <th>LUNCH</th>
    <th>DINNER</th>
    
  </tr>

  <?php 
    while($row = mysqli_fetch_assoc($result)){
      ?>

      <tr>
        <th class="bg-danger"> <?php echo $row['day']; ?> </th>
        <th class="bg-primary"> <?php echo $row['breakfast']; ?> </th>
        <th class="bg-warning"> <?php echo $row['lunch']; ?> </th>
        <th class="bg-success"> <?php echo $row['dinner']; ?> </th>
      </tr>

      <?php 
    }
?>

</table> 


<?php 
}
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">
<div style="background: #cc99ff;"> 
	<form method="post" action="menu.php">

		<br><br>
	<div class="header">
		<h2>MENU ...........</h2>
	</div>
		<?php include('login_errors.php'); ?>

			<div class="input-group">

 			<label>Choose menu</label>
			 <div class="col-md-6">
                        <div class="form-group">
			<select name="MessMenu">
 				 <option value="">Select...</option>
  				 <option value="FirstBlockMenu">1st Block</option>
 				 <option value="SecondBlockMenu">2nd Block</option>
 				 <option value="FourthBlockMenu">4th Block</option> 
 				 <option value="MegaMessMenu">Mega Mess</option> 

			</select>
		</div></div>
			</div>



  		<div class="input-group">
  			<button type="submit" class="btn" name="Menu">Apply</button>
  		</div>

	<br><br>  
	</form></div>
</div></div></div></div>

<a href="main.php" class="float">
<i class="fa fa-plus my-float text-white" style="text-decoration: none;">Main page</i>
</a>

</body>
</html>
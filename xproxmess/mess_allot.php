<?php include('server.php') ?>

<?php 

  if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
  }
  else
{
  $rollno=$_SESSION['username'];
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Mess Allotment Application</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <style type="text/css">
        
form {
  margin-left: 40%;
  margin-right: 40%;
}
    </style>
</head>

<?php  
  $query = "Select mess from mess_allot where roll_no = '$rollno'";

  $result = mysqli_query($db,$query);
  $res = mysqli_fetch_assoc($result);
  if(mysqli_num_rows($result) != 0){
    $me = $res['mess'];
    ?>

<div style="background: #cc99ff;" class="text-white"> 
    <br><h1 align="center">MESS ALLOTED</h1><br>
  </div>

<div style="background: pink;" class="text-white"> 
    <br><h1 align="center"><?php echo $me; ?></h1><br>
  </div>

    <?php
  }else {

?>

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
    <th class="bg-success">CARD AVAILABLE</th>
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
    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">
<div style="background: #cc99ff;"> 

	<form method="post" action="mess_allot.php">
		<?php include('login_errors.php'); ?>
		<br>
	    
		<div class = "input-group">
			<label class="form-control"><?php echo $rollno;?> </label>	
		</div>


			<div class="input-group">


                        <div class="form-group">
 			<label >Choose mess</label>
			<select name="formMessAllotCategory">
 				 <option value="">Select...</option>
  				 <option value="1st Block">1st Block</option>
 				 <option value="2nd Block">2nd Block</option>
 				 <option value="4th Block">4th Block</option> 
 				 <option value="Mega Mess">Mega Mess</option> 

			</select>
			</div>
    </div>

  		<div class="input-group">
  			<button type="submit" class="btn" name="apply_mess">Apply</button>
  		</div>

<br>
</form></div></div></div>
  
	</form>
</body>
</html>
<?php } ?>
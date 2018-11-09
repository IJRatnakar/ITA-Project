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
</head>
<body>
	<div class="header">
		<h2>MESS ALLOTMENT</h2>
	</div>

	<form method="post" action="messleftcount.php">
		<?php include('login_errors.php'); ?>

<?php 
$query = "select * from mess_count";
$result = mysqli_query($db,$query);
?>	
<table style="width:100%">
  
  <tr>
    <th>MESS</th>
    <th>COUNT</th>
  </tr>

  <?php 
  	while($row = mysqli_fetch_assoc($result)){
  		?>

  		<tr>
  			
  			<th> <?php echo $row['mess']; ?> </th>
  			<th> <?php echo $row['left_count']; ?> </th>

  		</tr>

  		<?php 
  	}
?>

</table> 

	    
			<div class="input-group">

				<p>
 			<label>Choose mess</label>
			<select name="MessCountCategory">
 				 <option value="">Select...</option>
  				 <option value="1st Block">1st Block</option>
 				 <option value="2nd Block">2nd Block</option>
 				 <option value="4th Block">4th Block</option> 
 				 <option value="Mega Mess">Mega Mess</option> 

			</select>
				</p>
			</div>


<div class = "input-group">
			<label>Set Count</label>
			<input type="text" name="count1" value="">
		</div>


  		<div class="input-group">
  			<button type="submit" class="btn" name="messcount">Set Count</button>
  		</div>

  
	</form>
</body>
</html>
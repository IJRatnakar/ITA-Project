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
  
  $query = "Select * from mess_allot where roll_no = '$rollno'";

  $result = mysqli_query($db,$query);
  if(mysqli_num_rows($result) != 0){
  	$_SESSION['chosen'] = 1;
  	header('location: main.php');
  }

?>
<!DOCTYPE html>
<html>
<head>
	<title>Mess Allotment Application</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">
		<h2>MESS ALLOTMENT</h2>
	</div>


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


	<form method="post" action="mess_allot.php">
		<?php include('login_errors.php'); ?>
		
	    
		<div class = "input-group">
			<label>Roll No</label>
			<?php echo $rollno;?> 
		</div>


			<div class="input-group">

				<p>
 			<label>Choose mess</label>
			<select name="formMessAllotCategory">
 				 <option value="">Select...</option>
  				 <option value="1st Block">1st Block</option>
 				 <option value="2nd Block">2nd Block</option>
 				 <option value="4th Block">4th Block</option> 
 				 <option value="Mega Mess">Mega Mess</option> 

			</select>
				</p>
			</div>



  		<div class="input-group">
  			<button type="submit" class="btn" name="apply_mess">Apply</button>
  		</div>

  
	</form>
</body>
</html>
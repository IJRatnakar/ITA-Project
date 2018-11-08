<?php include('server.php') ?>

<?php 

  if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
  }
  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
  }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Feedback</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">
		<h2>Feedback</h2>
	</div>

	<form method="post" action="feedback.php">
		<?php include('login_errors.php'); ?>
		
			<div class="input-group">

				<p>
 			<label>Choose mess</label>
			<select name="formMessCategory">
 				 <option value="">Select...</option>
  				 <option value="1st Block">1st Block</option>
 				 <option value="2nd Block">2nd Block</option>
 				 <option value="4th Block">4th Block</option> 
 				 <option value="Mega Mess">Mega Mess</option> 
 				 <option value="Night Canteen">Mega Mess</option> 
			</select>
				</p>
			</div>

		<div class = "input-group">
			<label>Roll No</label>
			<input type="text" name="rollno" value="<?php echo $rollno; ?>">
		</div>

		<div class="input-group">
			<label>Complaint</label>
			<textarea name="complaint" rows="5" cols="40"></textarea>
		</div>


  		<div class="input-group">
  			<button type="submit" class="btn" name="reg_complaint">Submit</button>
  		</div>

  
	</form>
</body>
</html>
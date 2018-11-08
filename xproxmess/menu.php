<?php include('server.php') ?>


<!DOCTYPE html>
<html>
<head>
	<title>Menu</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">
		<h2>MENU ...........</h2>
	</div>


	<form method="post" action="menu.php">
		<?php include('login_errors.php'); ?>

			<div class="input-group">

				<p>
 			<label>Choose menu</label>
			<select name="MessMenu">
 				 <option value="">Select...</option>
  				 <option value="FirstBlockMenu">1st Block</option>
 				 <option value="SecondBlockMenu">2nd Block</option>
 				 <option value="FourthBlockMenu">4th Block</option> 
 				 <option value="MegaMessMenu">Mega Mess</option> 

			</select>
				</p>
			</div>



  		<div class="input-group">
  			<button type="submit" class="btn" name="Menu">Apply</button>
  		</div>

  
	</form>
</body>
</html>
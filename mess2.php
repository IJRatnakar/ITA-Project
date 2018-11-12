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
	<title></title>
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
    <h2 align="center">1st BLOCK MESS</h2>
    <br>
</div>

<?php 
	
	if(isset($_POST['upda'])){
		$tt = $_POST['TIMEE'];

		$pp = 0;

		if($tt == 'b') $pp = 30;
		if($tt == 'l') $pp = 60;
		if($tt == 's') $pp = 30;
		if($tt == 'd') $pp = 60;
		
	$rol = $_POST['count1'];
	$query = "update students set price = price + '$pp' where roll_no = '$rol' and mess = '1st Block'";
	$result = mysqli_query($db,$query);

	 if($result){
	 	$queryw = "select count(*) as c from students where roll_no = '$rol' and mess = '2nd Block'";
		$resultw = mysqli_query($db,$queryw);
		$resw = mysqli_fetch_assoc($resultw);
		if($resw['c'] == 0)
			echo "NOT IN MESS";
		else 
	 		echo "SUCCESS";
	 }else {
	 	echo "FAILURE";
	 }
	}

?>

<div class="container">
<div style="background: #cc99ff; margin: 20px;"> 
  <form method="post" action="mess2.php" style="margin: 60px;">
    <?php include('login_errors.php'); ?>
	    
		<br>
<br>	
			<select class = "form-control" name="TIMEE">
 				 <option value="">Choose Time...</option>
  				 <option value="b">Breakfast</option>
 				 <option value="l">Lunch</option>
 				 <option value="s">Snacks</option> 
 				 <option value="d">Dinner</option> 

			</select>
		<br>

<div class = "input-group">
			<label class="form-control">Roll No</label>
			<input type="text" name="count1" value="">
		</div>
<br>

  		<div class="input-group" >
  			<button type="submit" class="btn form-control" name="upda">UPDATE</button>
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
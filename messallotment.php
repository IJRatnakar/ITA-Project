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
<html lang="en">
  <head>
  <title>NITK MESS MANAGEMENT</title>
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
	

<div class="bg-success text-white"><br><h1 align="center">ALLOTMENT</h1> <br></div>
<?php 
$query = "select roll_no,mess,apply_date from mess_allot order by roll_no";
$result = mysqli_query($db,$query);
?>  
<table style="width:100%" class="table">

<thead>
  <tr>
    <th>ROLL NO</th>
    <th>MESS</th>
    <th>APPLY DATE</th>
    
  </tr>
  </thead>
  <tbody>

  <?php 
    while($row = mysqli_fetch_assoc($result)){
      ?>

      <tr>
        <th> <?php echo $row['roll_no']; ?> </th>
        <th> <?php echo $row['mess']; ?> </th>
        <th> <?php echo $row['apply_date']; ?> </th>
      </tr>

    <?php } ?>
</tbody>

<a href="main.php" class="float">
<i class="fa fa-plus my-float text-white" style="text-decoration: none;">Main page</i>
</a>
</body>
</html>
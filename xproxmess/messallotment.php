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
</head>
<body>
	
<?php 
$query = "select roll_no,mess,apply_date from mess_allot order by roll_no";
$result = mysqli_query($db,$query);
?>  
<table style="width:100%">

  <tr>
    <th>ROLL NO</th>
    <th>MESS</th>
    <th>APPLY DATE</th>
    
  </tr>

  <?php 
    while($row = mysqli_fetch_assoc($result)){
      ?>

      <tr>
        <th> <?php echo $row['roll_no']; ?> </th>
        <th> <?php echo $row['mess']; ?> </th>
        <th> <?php echo $row['apply_date']; ?> </th>
      </tr>

    <?php } ?>
</body>
</html>
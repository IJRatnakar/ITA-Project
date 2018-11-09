<?php include('server_admin.php') ?>

<!DOCTYPE html>
<html>
<head>
  <title>Menu</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
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
<body style="background: #cc99ff;">

<?php 

if(isset($_POST['MenuUpdate'])){

  $mess = mysqli_real_escape_string($db,$_POST['MessMenu']);
$_SESSION['MESS'] = $mess;
$query = "select * from $mess";
$result = mysqli_query($db,$query);
?>

<form method="post" action="updatemenu.php">

<table style="width:100%" class="table bg-info">
  <tr><th></th><th></th><th><?php echo $mess ?></th><th></th><th></th></tr>
  
  <tr>
    <th>DAY</th>
    <th>BREAKFAST</th>
    <th>LUNCH</th>
    <th>DINNER</th>
    
  </tr>
<?php

    $var = 1; 
    while($row = mysqli_fetch_assoc($result)){
      ?>

      <tr>
        <th class="bg-danger text-white"><?php echo $row['day']; ?></th>
        <th class="bg-warning text-white"><input type="text" name="<?php echo $var ?>" value="<?php echo $row['breakfast']; ?>"  >  </th>
        <th class="bg-primary text-white"><input type="text" name="<?php echo $var+1 ?>" value="<?php echo $row['lunch']; ?>" >  </th>
        <th class="bg-success text-white"><input type="text" name="<?php echo $var+2 ?>" value="<?php echo $row['dinner']; ?>" >  </th>
        <th>

      </tr>    
      <?php 
      $var = $var + 3;
    }
?>
</table> 
<button class = "form-control  bg-info text-white" type="submit" class="btn" name="UpdateFunction">Update</button>
</form>

      
<?php }

?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">
<div style="background: #cc99ff;"> 

  <form method="post" action="updatemenu.php" style="margin: 0 auto; width: 50%;">
  
 <br><br>
  <div class="header">
    <h2>MENU ...........</h2>
  </div>
    <?php include('login_errors.php'); ?>

       <div class="col-md-6">
                        <div class="form-group">
      <label>Choose menu</label>
      <select name="MessMenu">
         <option value="">Select...</option>
           <option value="FirstBlockMenu">1st Block</option>
         <option value="SecondBlockMenu">2nd Block</option>
         <option value="FourthBlockMenu">4th Block</option> 
         <option value="MegaMessMenu">Mega Mess</option> 

      </select>
        </div>
      </div>



      <div class="input-group">
        <button type="submit" class="btn" name="MenuUpdate">Apply</button>
      </div>

  <br><br>
  </form>
</div></div></div></div>

<a href="main.php" class="float">
<i class="fa fa-plus my-float text-white" style="text-decoration: none;">Main page</i>
</a>
</body>
</html>
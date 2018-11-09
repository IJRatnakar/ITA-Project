<?php
session_start();

// initializing variables
$username = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'XPROXMESS');

if (isset($_POST['login_user'])) {

  if(isset($_SESSION['username'])){
    unset($_SESSION['username']);
  }  
  $username = mysqli_real_escape_string($db, $_POST['username1']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
    array_push($errors, "Username is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
    $query = "SELECT * FROM admin_table WHERE username='$username' AND password='$password'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
      $_SESSION['username1'] = $username;
      $_SESSION['success'] = "You are now logged in";
      header('location: main.php');
    }else {
      array_push($errors, "Wrong username/password combination");
    }
  }
}


if(isset($_POST['messcount'])){
  $mess = mysqli_real_escape_string($db,$_POST['MessCountCategory']);
  $messcount = mysqli_real_escape_string($db,$_POST['count1']);
  
  
  if(empty($mess)){array_push($errors, "Mess is required");}
  
  if(empty($messcount)){array_push($errors, "Count is required");}
    

  if(count($errors) == 0){
    
    $query = "INSERT INTO mess_count VALUES ('$mess','$messcount')";

    if(!mysqli_query($db,$query))
    {
    
    $query2 = "update mess_count set left_count = '$messcount' where mess = '$mess'";

    if(!mysqli_query($db,$query2)){

   echo "could not be inserted";
 }else {
   header('location: messleftcount.php');
   // header('location: index.php');
 }
  }
  else
  {
   header('location: messleftcount.php');
  }
}
}


?>

<?php 

if(isset($_POST['MenuUpdate'])){

  $mess = mysqli_real_escape_string($db,$_POST['MessMenu']);
$_SESSION['MESS'] = $mess;
$query = "select * from $mess";
$result = mysqli_query($db,$query);
?>

<form method="post" action="updatemenu.php">

<table style="width:100%">
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
        <th><?php echo $row['day']; ?></th>
        <th><input type="text" name="<?php echo $var ?>" value="<?php echo $row['breakfast']; ?>"  >  </th>
        <th><input type="text" name="<?php echo $var+1 ?>" value="<?php echo $row['lunch']; ?>" >  </th>
        <th><input type="text" name="<?php echo $var+2 ?>" value="<?php echo $row['dinner']; ?>" >  </th>
        <th>

      </tr>    
      <?php 
      $var = $var + 3;
    }
?>
</table> 
<button type="submit" class="btn" name="UpdateFunction">Update</button>
</form>

      
<?php }

if(isset($_POST['UpdateFunction'])){

    $var = 1; 
    while($var <= 21){
        $dayy = round($var/3);
        
        $bx = mysqli_real_escape_string($db,$_POST["$var"]);
        $var = $var+1;
        $lx = mysqli_real_escape_string($db,$_POST["$var"]);
        $var = $var+1;
        $dx = mysqli_real_escape_string($db,$_POST["$var"]);
        $var = $var+1;

        $da = "MON";

        if($dayy == 0) $da = "MON";
        if($dayy == 1) $da = "TUE";
        if($dayy == 2) $da = "WED";
        if($dayy == 3) $da = "THURS";
        if($dayy == 4) $da = "FRI";
        if($dayy == 5) $da = "SAT";
        if($dayy == 6) $da = "SUN";
        $mess = $_SESSION['MESS'];
        $query = "update $mess set breakfast = '$bx', lunch = '$lx',dinner = '$dx' where day = '$da'";
        
        if(mysqli_query($db,$query)){
          
        }else {
          echo "ERROR";
          break;
        }         
    }    
  }
?>
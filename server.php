<?php
session_start();

// initializing variables
$rollno = "";
$email    = "";
$complaint="";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'XPROXMESS');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  
  if(isset($_SESSION['username1'])){
    unset($_SESSION['username1']);
  }  
  // receive all input values from the form
  $rollno = mysqli_real_escape_string($db, $_POST['rollno']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($rollno)) { array_push($errors, "Roll No is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM students WHERE roll_no='$rollno' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['rollno'] === $rollno) {
      array_push($errors, "Rollno already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO students (roll_no, email, password) 
  			  VALUES('$rollno', '$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $rollno;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: main.php');
  }
}


// LOGIN USER
if (isset($_POST['login_user'])) {
  $rollno = mysqli_real_escape_string($db, $_POST['rollno']);
  $password = mysqli_real_escape_string($db, $_POST['password']);


  if(isset($_SESSION['username1'])){
    unset($_SESSION['username1']);
  }  

  if (empty($rollno)) {
    array_push($errors, "Roll No is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
    $password = md5($password);
    $query = "SELECT * FROM students WHERE roll_no='$rollno' AND password='$password'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
      $_SESSION['username'] = $rollno;
      $_SESSION['success'] = "You are now logged in";
      header('location: main.php');
    }else {
      array_push($errors, "Wrong username/password combination");
    }
  }
}



if(isset($_POST['reg_complaint'])){

  $rollno = mysqli_real_escape_string($db,$_POST['rollno']);
  $complaint = mysqli_real_escape_string($db,$_POST['complaint']);
  $mess = mysqli_real_escape_string($db,$_POST['formMessCategory']);

  date_default_timezone_set('Asia/Kolkata');
  $dated = date("y/m/d");
  
  if(empty($mess)){array_push($errors, "Mess is required");}
  if (empty($complaint)) { array_push($errors, "Please comment on mess"); }
     

  if(count($errors) == 0){
  
    $query = "INSERT INTO feedback(mess,roll_no,complaint,sub_date) VALUES ('$mess','$rollno','$complaint','$dated')";

    if(!mysqli_query($db,$query))
    {
    
   echo "could not be inserted";
   // header('location: index.php');
  }
  else
  {
    $rollno = "";
   $complaint="";
  header('location: main.php');
  }
}
}



if(isset($_POST['apply_mess'])){
  $rollno=$_SESSION['username'];
  $mess = mysqli_real_escape_string($db,$_POST['formMessAllotCategory']);

  $query2 = "SELECT left_count from mess_count where mess = '$mess'";

  $result2 = mysqli_query($db,$query2);
   $result3=mysqli_fetch_assoc($result2);
  date_default_timezone_set('Asia/Kolkata');
  $dated = date("y/m/d");

  if(!$result3 || $result3['left_count'] <= 0){
    array_push($errors, "Mess not available");
  } 
  
  if(empty($mess)){array_push($errors, "Mess is required");}
  

  if(count($errors) == 0){
  
    $query = "INSERT INTO mess_allot(mess,roll_no,apply_date) VALUES ('$mess','$rollno','$dated')";

    $query2 = "update students set mess = '$mess' where roll_no = '$rollno'";
    mysqli_query($db,$query2);

    if(!mysqli_query($db,$query))
    {
    
   echo "could not be inserted";
   // header('location: index.php');
  }
  else
  {

     $query4 = "update mess_count set left_count = left_count-1 where mess = '$mess'";

     $result4 = mysqli_query($db,$query4);

     if(!$result4){
   echo "could not be inserted";    
     }else 
   header('location: mess_allot.php');
  }
}
}

?>



<?php 

?>
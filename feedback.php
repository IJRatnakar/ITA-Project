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
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="CSS/style.css">
    <link rel="stylesheet" type="text/css" href="CSS/s.css">
    <link rel="stylesheet" type="text/css" href="CSS/sss.css">
    <style type="text/css">
    	.jumbotron {
background: #358CCE;
color: #FFF;
border-radius: 0px;
}
.jumbotron-sm { padding-top: 24px;
padding-bottom: 24px; }
.jumbotron small {
color: #FFF;
}
.h1 small {
font-size: 24px;
}
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


<?php 
  if(isset($_SESSION['username1'])){

    ?>
  <nav class="navbar navbar-toggleable-md bg-inverse hidden-sm-down">
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse text-white" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="main.php"><h2>Home </h2><span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="messleftcount.php"><h2>MESS</h2></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="messallotment.php"><h2>ALLOTMENT</h2></a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="order_show.php"><h2>NC_ORDER</h2></a>
      </li>

      <li class="nav-item">
        <a class="nav-link disabled" href="nightcanteenmenuupdate.php"><h2>NC_MENU</h2></a>
      </li>

      <li class="nav-item">
        <a class="nav-link disabled" href="updatemenu.php"><h2>MENU</h2></a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="main.php?logout1='1'"><h2>LOGOUT</h2></a>
      </li>
    </ul>
  </div>
</nav>
<h1 class="hidden-md-up"> HELLO</h1>
<div class="pos-f-t hidden-md-up fixed-top cliente4">
  <div class="collapse" id="navbarToggleExternalContent">
    <div class="bg-inverse p-4">
     <ul class="navbar-nav mr-auto mt-2 mt-md-0">
      <li class="nav-item active">
        <a class="nav-link text-center btn btn-primary mb-4" href="main.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-center btn btn-success mb-4" href="messleftcount.php">MESS</a>
      </li>
            <li class="nav-item align-middle">
        <a class="nav-link text-center btn btn-info mb-4" href="messallotment.php">ALLOTMENT</a>
      </li>
            <li class="nav-item">
        <a class="nav-link text-center btn btn-danger mb-0" href="order_show.php">NC_ORDER</a>
      </li>

            <li class="nav-item">
        <a class="nav-link text-center btn btn-danger mb-0" href="nightcanteenmenuupdate.php">NC_MENU</a>
      </li>

            <li class="nav-item">
        <a class="nav-link text-center btn btn-danger mb-0" href="updatemenu.php">MENU</a>
      </li>

            <li class="nav-item">

        <a class="nav-link" href="main.php?logout1='1'"><h2>LOGOUT</h2></a>

      </li>

    </ul>
    </div>
  </div>
  <nav class="navbar navbar-inverse bg-inverse">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </nav>
</div>
  <nav class="navbar navbar-toggleable-md bg-inverse hidden-sm-down fixed-top cliente4">
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse text-white" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="main.php"><h2>HOME</h2><span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="messleftcount.php"><h2>MESS</h2></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="messallotment.php"><h2>ALLOTMENT</h2></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="order_show.php"><h2>NC_ORDER</h2></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="nightcanteenmenuupdate.php"><h2>NC_MENU</h2></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="updatemenu.php"><h2>MENU</h2></a>
      </li>
            <li class="nav-item">

        <a class="nav-link" href="main.php?logout1='1'"><h2>LOGOUT</h2></a>

      </li>

    </ul>
  </div>
</nav>

<?php } ?>

<?php 
  if(isset($_SESSION['username'])){

    ?>
  <nav class="navbar navbar-toggleable-md bg-inverse hidden-sm-down">
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse text-white" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="main.php"><h2>Home </h2><span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="mess_allot.php"><h2>MESS</h2></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="feedback.php"><h2>FEEDBACK</h2></a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="nightcanteen.php"><h2>NC_ORDER</h2></a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="myorders.php"><h2>MY_ORDER</h2></a>
      </li>

      <li class="nav-item">
        <a class="nav-link disabled" href="menu.php"><h2>MENU</h2></a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="main.php?logout='1'"><h2>LOGOUT</h2></a>
      </li>
    </ul>
  </div>
</nav>
<h1 class="hidden-md-up"> HELLO</h1>
<div class="pos-f-t hidden-md-up fixed-top cliente4">
  <div class="collapse" id="navbarToggleExternalContent">
    <div class="bg-inverse p-4">
     <ul class="navbar-nav mr-auto mt-2 mt-md-0">
      <li class="nav-item active">
        <a class="nav-link text-center btn btn-primary mb-4" href="main.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-center btn btn-success mb-4" href="mess_allot.php">MESS</a>
      </li>
            <li class="nav-item align-middle">
        <a class="nav-link text-center btn btn-info mb-4" href="feedback.php">FEEDBACK</a>
      </li>
            <li class="nav-item">
        <a class="nav-link text-center btn btn-danger mb-0" href="nightcanteen.php">NC_ORDER</a>
      </li>

            <li class="nav-item">
        <a class="nav-link text-center btn btn-danger mb-0" href="myorders.php">MY_ORDER</a>
      </li>
            <li class="nav-item">
        <a class="nav-link text-center btn btn-danger mb-0" href="menu.php">MENU</a>
      </li>

            <li class="nav-item">

        <a class="nav-link" href="main.php?logout='1'"><h2>LOGOUT</h2></a>

      </li>

    </ul>
    </div>
  </div>
  <nav class="navbar navbar-inverse bg-inverse">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </nav>
</div>
  <nav class="navbar navbar-toggleable-md bg-inverse hidden-sm-down fixed-top cliente4">
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse text-white" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="main.php"><h2>HOME</h2><span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="mess_allot.php"><h2>MESS</h2></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="feedback.php"><h2>FEEDBACK</h2></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="nightcanteen.php"><h2>NC_ORDER</h2></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="myorders.php"><h2>MY_ORDER</h2></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="menu.php"><h2>MENU</h2></a>
      </li>
            <li class="nav-item">

        <a class="nav-link" href="main.php?logout='1'"><h2>LOGOUT</h2></a>

      </li>

    </ul>
  </div>
</nav>

<?php } ?>

<div class="jumbotron jumbotron-sm">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <h1 class="h1">
                    Feedback Form</small></h1>
            </div>
        </div>
    </div>
</div>


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">
	<form method="post" action="feedback.php">
		<?php include('login_errors.php'); ?>
		
                    <div class="col-md-6">
                        <div class="form-group">
			<select class="form-control" id="subject" name="formMessCategory">
 				 <option value="">Choose Mess</option>
  				 <option value="1st Block">1st Block</option>
 				 <option value="2nd Block">2nd Block</option>
 				 <option value="4th Block">4th Block</option> 
 				 <option value="Mega Mess">Mega Mess</option> 
 				 <option value="Night Canteen">Night Canteen</option> 
			</select>
		</div></div>
		

                    <div class="col-md-6">
                        <div class="form-group">
			<label class="form-control bg-primary text-white" for="name">Roll No  </label>
			<input class="form-control" type="text" name="rollno" value="<?php echo $rollno; ?>">

</div></div>


                    <div class="col-md-6">
                        <div class="form-group">
			<label class="form-control bg-primary text-white" for="name">Complaint</label>
			<textarea placeholder = "Complaint..." name="complaint" class="form-control" rows="9" cols="25"></textarea>

</div></div>
  		<div class="input-group">
  			 <div class="col-md-12">
  			<button type="submit" class="btn btn-primary pull-right" name="reg_complaint">Submit</button>
  		</div>
  		</div>

  
	</form>

</div></div></div></div>

<a href="main.php" class="float">
<i class="fa fa-plus my-float text-white" style="text-decoration: none;">Main page</i>
</a>
</body>
</html>
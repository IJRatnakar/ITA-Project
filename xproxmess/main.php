<?php include('server.php') ?>

<?php 
  
  if(isset($_SESSION['username1'])){

  }  
  else if (!isset($_SESSION['username'] )) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
  }
  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
  }
  if(isset($_GET['logout1'])){
    session_destroy();
    unset($_SESSION['username1']);
    header("location: login_admin.php");  
  }

  if(isset($_SESSION['chosen'])){
    unset($_SESSION['chosen']);
    ?>
<script type="text/javascript">
    alert("Mess Chosen");
    </script>
  <?php
  }
?>



<!DOCTYPE html>
<html lang="en">
  <head>
  <title>NITK MESS MANAGEMENT</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="CSS/style.css">
    <link rel="stylesheet" type="text/css" href="CSS/s.css">
    <link rel="stylesheet" type="text/css" href="CSS/sss.css">
  </head>
  <body class="bg-inverse">
  <!--NAVBAR -->

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

<!--NAVBAR -->
  <div class="container text-center text-white">
 <h1 class="display-2 mt-4 "><a href="#" class="text-danger">X</a>PRO<a href="#" class="text-primary">X</a> <a href="#" class="text-success">M</a>ES<a href="#" class="text-warning">S</a></h1>

 <h5><div id="msg">    <!-- <p class="lead mb-4 ">A new club to change the rituals is COMING SOON</p> --></div>
    </div></h5>


<div class="container text-center text-white mt-4">
    <div class="row">
    <div class="col-sm-3 bg-danger">
      <h1>1st Block</h1>
      <img src="Img/1.jpeg" class="img-fluid mt-2 mb-4">
    </div>
    <div class="col-sm-3 bg-primary">
      <h1>2nd Block</h1>
      <img src="Img/2.gif" class="img-fluid mt-2 mb-4">
    </div>
    <div class="col-sm-3 bg-success">
      <h1>5th Block</h1>
            <img src="Img/1.jpeg" class="img-fluid mt-2 mb-4">
    </div>
    <div class="col-sm-3 bg-warning">
    <h1>Mega Mess</h1>
          <img src="Img/2.gif" class="img-fluid mt-2 mb-4">
    </div>
  </div>
</div>
<!-- Timeline -->
<section class="intro">
  <div class="container123">
    <h1>What You Can Do Here &darr;</h1>
  </div>
</section>
<a href="#_" class="lightbox" id="img1">
  <img src="Img/1.jpg">
</a>

<a href="#_" class="lightbox" id="img2">
  <img src="Img/3.jpg">
</a>
<a href="#_" class="lightbox" id="img3">
  <img src="Img/2.jpg">
</a>
<a href="#_" class="lightbox" id="img4">
  <img src="Img/6.png">
</a>
<a href="#_" class="lightbox" id="img5">
  <img src="Img/Coding.jpg">
</a>
<a href="#_" class="lightbox" id="img6">
  <img src="Img/6.png">
</a>
<a href="#_" class="lightbox" id="img7">
  <img src="Img/6.jpg">
</a>
<section class="timeline">
  <ul>
       <li>
      <div>
        <time>OPTIONS</time>  <a href="#img1" class="pp">Choose any mess for a semester</a>
      </div>
    </li>
    <li>
      <div>
        <time>Menu</time>  <a href="#img2" class="pp">You can see weekly menu changes and updates of all the mess</a>
      </div>
    </li>
    <li>
      <div>
        <time>Statistics</time>  <a href="#img3" class="pp">You can see all the stats i.e. feedbacks, ratings, quality and previous registerations</a>
      </div>
    </li>
    <li>
      <div>
        <time>Night Canteen</time> <a href="#img4" class="pp">Love Night Canteens! So you can order your food here in some steps.</a>      </div>
    </li>
    <li>
      <div>
        <time>Special Order</time>  <a href="#img5" class="pp">Wanted to order food in bulk. Here is a option for you</a>
      </div>
    </li>
    <li>
      <div>
        <time>Feedback</time>  <a href="#img7" class="pp">You can give feedback and ratings to a particular mess.</a>
      </div>
    </li>
    <li>
      <div>
        <time>Allotment</time><a href="#img7" class="pp">Online mess allotment depending on number of applicants and first come first serve basis.</a>      </div>
    </li>
    <li>
      <div>
        <time>Leave</time> <a href="#img7" class="pp">If you are not in the college for a month or week. You can apply for compansation from mess</a>
      </div>
    </li>
    
  </ul>
</section>

<!-- signup form -->
<hr>
<div class="row py-4 text-white text-center cliente3">
  <div class="col-sm-5">
    <p><strong>About Us</strong></p>
    <p>To know more about us you can check our <a href="" class="text-info">facebook page</a>.</p>
  </div>
  <div class="col-sm-6">
    <p><strong>Stay up-to-date on NITK MESS</strong></p>
    <div class="input-group">
      <input type="text" class="form-control" placeholder="Email">
      <span class="input-group-btn">
        <button class="btn btn-primary" type="button">Sign up</button>
      </span>
    </div>
  </div>
</div>
<hr>
<!-- /signup form -->
    <div class="container-fluid text-white text-center">
  <div class="row">
    <div class="col-sm ml-3 mr-3 mt-3 cliente push-md-4">
      <h1 class="text-primary">MEMBERS</h1>
      <p class="">Indrajeet Ratnakar, Pawan Rahangdale, Divyansh Verma</p>
    </div>
    <div class="col-sm ml-3 mr-3 mt-3 cliente1 pull-md-4">
      
      <h1 class="text-warning">NEWS</h1>
      <p class=""> Change in menu this week.</p>
          </div>
    <div class="col-sm ml-3 mr-3 mt-3 cliente2">
      
      <h1 class="text-danger">COMPLAINTS</h1>
      <?php 

      date_default_timezone_set('Asia/Kolkata');
      $dated = date("y/m/d");
        $query_from_feedback = "SELECT mess,complaint from feedback where MONTH(sub_date) = MONTH('$dated')";

        $result1 = mysqli_query($db,$query_from_feedback);
        while($result = mysqli_fetch_assoc($result1)){
          ?>
            <p><?php echo $result['mess']; ?> - <?php echo $result['complaint']; ?></p>  
        <?php }
      ?>
          </div>
  </div>
</div></br>
<section>
  <h3 class="mt-3">Made With <span style="color:red;">&hearts;</span> by NITK-MESS</h3>
  <div class="footer-social-icons">
    <ul class="social-icons mb-3">
        <li><a href="https://www.facebook.com/fdns.nitk/" class="social-icon"> <i class="fa fa-facebook"><img src="Img/facebook.png"></i></a></li>
        <li><a href="https://chat.whatsapp.com/7kxla9pGcD6DeAxdZs30wx" class="social-icon"> <i class="fa fa-twitter"><img src="Img/whatsapp.png"></i></a></li>
        <li><a href="https://github.com/FDNS-NITK" class="social-icon"> <i class="fa fa-rss"><img src="Img/github-logo.png"></i></a></li>
        <li><a href="https://github.com/failedcoder12" class="social-icon"> <i class="fa fa-youtube"><img src="Img/youtube.png"></i></a></li>
        <li><a href="https://mail.google.com/mail/u/0/#inbox?compose=15ec88c283207349
          " class="social-icon"> <i class="fa fa-google-plus"><img src="Img/gmail.png"></i></a></li>
    </ul>
</div>
</section>

    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
<!-- JavaScript -->
<script type="text/javascript">
 var showText = function (target, message, index, interval) {   
  if (index < message.length) {
    $(target).append(message[index++]);
    setTimeout(function () { showText(target, message, index, interval); }, interval);
  }
}
$(function () {

  showText("#msg", "WELCOME TO NITK MESS MANAGEMENT PORTAL", 0, 100);   
    showText("#msg1", "AILE", 0, 100);   
});
</script>
<script type="text/javascript" >
  (function() {

  'use strict';

  // define variables
  var items = document.querySelectorAll(".timeline li");

  // check if an element is in viewport
  // http://stackoverflow.com/questions/123999/how-to-tell-if-a-dom-element-is-visible-in-the-current-viewport
  function isElementInViewport(el) {
    var rect = el.getBoundingClientRect();
    return (
      rect.top >= 0 &&
      rect.left >= 0 &&
      rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
      rect.right <= (window.innerWidth || document.documentElement.clientWidth)
    );
  }

  function callbackFunc() {
    for (var i = 0; i < items.length; i++) {
      if (isElementInViewport(items[i])) {
        items[i].classList.add("in-view");
      }
    }
  }

  // listen for events
  window.addEventListener("load", callbackFunc);
  window.addEventListener("resize", callbackFunc);
  window.addEventListener("scroll", callbackFunc);

})();
</script>
  </body>
</html>
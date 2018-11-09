<!DOCTYPE html>
<html>
<head>
	<title>Loading</title>
</head>
<link rel="stylesheet" type="text/css" href="CSS/qq.css">
<body>
<div class="site">
  <div class="container">
    <div class="page-content" id="old-content">
      <p><strong>&hearts;</strong>NITK-MESS<br>
        <em>NITK-MESS</em></p>
    </div>
    <div class="page-content" id="new-content">
      <p><strong></strong>LOADING......<br>
        <em></em></p>
    </div>
  </div>
</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.11.8/TweenMax.min.js"></script>
<script>
 var siteW = $(window).width();
var siteH = $(window).height();

TweenMax.set('.container', { perspective: "1200px" }); 
TweenMax.set('#old-content', { transformOrigin: "100% 50%", backfaceVisibility: 'hidden' });
TweenMax.set('#new-content', { transformOrigin: "0% 50%", backfaceVisibility: 'hidden' });

var tlFlip = new TimelineMax({ yoyo: true, repeat: -1, delay: 1, repeatDelay: 1 });

var duration = 1.0;

tlFlip
.to('.container', duration/2, { scale: 0.9, ease: Power2.easeInOut }, "start")
.to('.container', duration/2, { scale: 1, ease: Power2.easeInOut }, "start+=" + duration/2)
.to('#old-content', duration, { x: -siteW, rotationY: -90, ease: Power2.easeInOut }, "start")
.fromTo('#new-content', duration, { x: siteW, rotationY: 90 }, { x: 0, rotationY: 0, ease: Power2.easeInOut }, "start")
/*
Old hack to hide backface of #old-content, but
fixed with z-index halfways in the animation
.set('#old-content', { 
  visibility: 'hidden'
}, "start+=0.78")
*/
.set('#new-content', { zIndex: 2 }, "start+=" + duration/2);
    </script>
<!--
New version with support for IE: https://codepen.io/robbue/pen/tnLmH/
-->
<!-- <div class="container loader">
	<span><em>F</em></span>
	<span><em>.</em></span>
	<span><em>D</em></span>
	<span><em>.</em></span>
	<span><em>N</em></span>
	<span><em>.</em></span>
	<span><em>S</em></span>
	<span><em>.</em></span>
</div> -->
<script>
        var timer = setTimeout(function() {
            window.location='main.php'
        }, 4000);

    </script>
    
</body>
</html>
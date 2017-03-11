<?php
session_start();
include 'common/con.php';
if(isset($_GET['e']))
{
$i=$_GET['e'];

if($i=='1')
{
$errmsg="Please Fill the Mobile Number";
} else if($i == '3') {
	$errmsg="Please Fill College Name";
}
else{
$errmsg="Invalid Mobile NO";


}
}
if(!isset($_SESSION['userData'])||$_SESSION['userData']['activated']==1)
{header("Location:/");}

$u=$_SESSION['userData'];
$email=$u['email'];
$fname=$u['first_name'];
$lname=$u['last_name'];



?>

<?php
function phpAlert($msg) {
	if($msg != null) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}
}
?>  


<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="razorSharp">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="assets/images/untitled-130x128.ppg" type="image/x-icon">
  <meta name="description" content="Web Site Maker Description">
  <title>DeadLock - Enter Details</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic&amp;subset=latin"><meta name=msapplication-tap-highlight content=no>
    <link rel=manifest href=manifest.json>
    <meta name=mobile-web-app-capable content=yes>
    <meta name=application-name content="Deadlock">
    <link rel=icon sizes=192x192 href=assets/images/untitled-130x128.png>
    <meta name=apple-mobile-web-app-capable content=yes>
    <meta name=apple-mobile-web-app-status-bar-style content=#00964d>
     <meta name=theme-color content=#00964d>
    <meta name=apple-mobile-web-app-title content="Deadlock">
    <link rel=apple-touch-icon href=assets/images/untitled-130x128.png>
    <meta name=msapplication-TileImage content=assets/images/untitled-130x128.png>
    <meta name=msapplication-TileColor content=#00964d>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
  <link rel="stylesheet" href="assets/bootstrap-material-design-font/css/material.css">
  <link rel="stylesheet" href="assets/tether/tether.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/dropdown/css/style.css">
  <link rel="stylesheet" href="assets/animate.css/animate.min.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="stylesheet" href="assets/additional/css/mbr-additional.css" type="text/css">
  
  
  
</head>
<body>
<section id="menu-5">

    <nav class="navbar navbar-dropdown bg-color transparent navbar-fixed-top">
        <div class="container">

            <div class="mbr-table">
                <div class="mbr-table-cell">

                    <div class="navbar-brand">
                        <a href="index.php" class="navbar-logo"><img src="assets/images/untitled-130x128.png" alt="Deadlock"></a>
                         <a class="navbar-caption" href="index.php"><img class = " col-md-4 col-xs-4" src = "assets/images/logo.png" /></a>
                    </div>

                </div>
                <div class="mbr-table-cell">

                    <button class="navbar-toggler pull-xs-right hidden-md-up" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
                        <div class="hamburger-icon"></div>
                    </button>

                    <ul class="nav-dropdown collapse pull-xs-right nav navbar-nav navbar-toggleable-sm" id="exCollapsingNavbar"><li class="nav-item"><a class="nav-link link" href="rules.php">RULES</a></li><li class="nav-item dropdown"><a class="nav-link link" href="leadersboard.php" aria-expanded="false">LEADERBOARD</a></li><li class="nav-item dropdown"><a class="nav-link link" href="https://a3k.in/" aria-expanded="false" target="_blank">A3K</a></li><li class="nav-item nav-btn"><a class="nav-link btn btn-white btn-white-outline" href="index.php">LOGIN</a></li></ul>
                    <button hidden="" class="navbar-toggler navbar-close" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
                        <div class="close-icon"></div>
                    </button>

                </div>
            </div>

        </div>
    </nav>

</section>

<section class="engine"></section><section class="mbr-section article mbr-parallax-background mbr-after-navbar" id="msg-box8-8" style="background-image: url(assets/images/jumbotron.jpg); padding-top: 120px; padding-bottom: 120px;">

    <div class="mbr-overlay" style="opacity: 0.5; background-color: rgb(34, 34, 34);">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-xs-center">
                <h3 class="mbr-section-title display-2" style="font-size: 2rem">COMPLETE REGISTRATION</h3>
                
            </div>
        </div>
    </div>

</section>

<section class="mbr-section article mbr-section__container" id="content1-b" style="background-color: rgb(255, 255, 255); padding-top: 20px; padding-bottom: 20px;">

    <div class="container">
        <div class="row">
            <div class="col-xs-12 lead">
           
           
           
           
      
           
           
           
<form action="complete.php" method="POST">

<p><?php phpAlert($errmsg); ?></p>
<table class="table table-hover" padding=10101010101010101010px>
<tr><td class="userdetails_text">First Name:</td><td><input type="text" class="form-control" name="fname" readonly="readonly" value="<?php echo $fname;?>"></input></td></tr>

<tr><td class="userdetails_text">Last Name:</td><td><input type="text"  class="form-control" name="lname"  readonly="readonly" value="<?php echo $lname;?>"></input></td></tr>

<tr><td class="userdetails_text">Email:</td><td><input type="text" class="form-control" name="email" readonly="readonly" value="<?php echo $email;?>" disabled ></input></td></tr>

<tr><td class="userdetails_text">Mobile No:</td><td><input type="text" class="form-control" name="mobno"></input></td></tr>
  <tr><td><label for="sel1" class="userdetails_text">College:</label></td><td>
 <script type="text/javascript">
function showfield(name){
  if(name=='Others') { 
    document.getElementById('div1').innerHTML=' <input type="text"  class="form-control" name="college"/>'; 
    document.getElementById("sel1").style.display = 'none';
}
  else document.getElementById('div1').innerHTML='';
}
</script>
  <select class="form-control" name ="college" id="sel1" onchange="showfield(this.options[this.selectedIndex].value)">
    <option value = "RSET">RSET</option>
    <option>Others</option>
  </select>
<div id="div1"></div></td></tr>

<tr><td></td><td><input type="submit" name="submit" class="col-xs-offset-2 btn btn-raised ripple-effect btn-primary btn-lg"></input></td></tr>
</table>

</form>
            
            </div>
        </div>
    </div>

</section>

<footer class="mbr-small-footer mbr-section mbr-section-nopadding" id="footer1-d" style="background-image: url(/assets/images/footer.jpg); padding-top: 1.75rem; padding-bottom: 1.75rem;">
    
    <div class="container">
        <p class="text-xs-center">Copyright (c) 2017 Deadlock.</p>
    </div>
</footer>


  <script src="assets/web/assets/jquery/jquery.min.js"></script>
  <script src="assets/tether/tether.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/smooth-scroll/SmoothScroll.js"></script>
  <script src="assets/dropdown/js/script.min.js"></script>
  <script src="assets/touchSwipe/jquery.touchSwipe.min.js"></script>
  <script src="assets/viewportChecker/jquery.viewportchecker.js"></script>
  <script src="assets/jarallax/jarallax.js"></script>
  <script src="assets/theme/js/script.js"></script>
  
  
  <input name="animation" type="hidden">
   <div id="scrollToTop" class="scrollToTop mbr-arrow-up"><a style="text-align: center;"><i class="mbr-arrow-up-icon"></i></a></div>
  </body>
</html>

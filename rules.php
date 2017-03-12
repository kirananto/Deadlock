<!DOCTYPE html>
<?php
require_once 'fbConfig.php';
require_once 'User.php';
 $fbUser = $_SESSION['fbUser'];
if(isset($_SESSION['userData']))
{
$userdata=$_SESSION['userData'];
}
else{
$userdata=NULL;
} 
if(!$fbUser){
  $fbUser = NULL;
  $loginURL = $facebook->getLoginUrl(array('redirect_uri'=>$redirectURL,'scope'=>$fbPermissions));
  $logintop = '<a class="nav-link btn btn-white btn-white-outline" href="'.$loginURL.'">LOGIN</a>'; 
}else{
$logintop = '<a class="nav-link btn btn-white btn-white-outline" href="logout.php">LOG OUT</a>'; 
$play = '<a class="nav-link link" href="dashboard/index.php">PLAY</a>';
}
?>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="razorSharp">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="assets/images/untitled-130x128.png" type="image/x-icon">
  <meta name="description" content="Rules and Regulations">
  <title>Deadlock - Rules</title>
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
  <link rel="stylesheet" href="assets/web/assets/icons/icons.css">
  <link rel="stylesheet" href="assets/et-line-font-plugin/style.css">
  <link rel="stylesheet" href="assets/tether/tether.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/dropdown/css/style.css">
  <link rel="stylesheet" href="assets/animate.css/animate.min.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="stylesheet" href="assets/additional/css/mbr-additional.css" type="text/css">
  
  
  
</head>
<section id="menu-1">

    <nav class="navbar navbar-dropdown bg-color transparent navbar-fixed-top">
        <div class="container">

            <div class="mbr-table">
                <div class="mbr-table-cell">

                    <div class="navbar-brand">
                        <a href="/index.php" class="navbar-logo"><img src="assets/images/untitled-130x128.png" alt="Deadlock"></a>
                         <a class="navbar-caption" href="index.php"><img class = " col-md-4 col-xs-4" src = "assets/images/logo.png" /></a>
                    </div>

                </div>
                <div class="mbr-table-cell">

                    <button class="navbar-toggler pull-xs-right hidden-md-up" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
                        <div class="hamburger-icon"></div>
                    </button>

                    <ul class="nav-dropdown collapse pull-xs-right nav navbar-nav navbar-toggleable-sm" id="exCollapsingNavbar"><li class="nav-item"><a class="nav-link link" href="rules.php">RULES</a></li><li class="nav-item dropdown"><a class="nav-link link" href="leadersboard.php" aria-expanded="false">LEADERBOARD</a></li><li class="nav-item dropdown"><a class="nav-link link" href="https://a3k.in/" aria-expanded="false" target="_blank">A3K</a></li><li class="nav-item"><?php if(isset($_SESSION['userData'])&&$_SESSION['userData']['isadmin']==0)
{ echo $play; } ?></li><?php if(0&&$_SESSION['userData']['isadmin']){?><li class="nav-item nav-btn"><a class="nav-link btn btn-white btn-white-outline" href="/manage/index.php">GO TO ADMIN PANEL</a></li><?php }?><li class="nav-item nav-btn"><?php echo $logintop; ?></li><li class="nav-item dropdown"><div class="avatar hidden-md-down" style="background-image: url(&quot;<?php echo $userdata['picture'] ?>&quot;);"></div></li></ul>
                    <button hidden="" class="navbar-toggler navbar-close" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
                        <div class="close-icon"></div>
                    </button>

                </div>
            </div>

        </div>
    </nav>

</section>
<section class="engine"></section><section class="mbr-section article mbr-parallax-background mbr-after-navbar" id="msg-box8-8" style="background-image: url(assets/images/jumbotron.jpg); padding-top: 140px; padding-bottom: 100px;">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-xs-center">
                <h3 class="mbr-section-title display-2">Rules</h3>
                <div class="lead"><p></p></div>
 </div>
        </div>
    </div>
</section> 
<section class="engine"></section><section class="mbr-cards mbr-section mbr-section-nopadding mbr-after-navbar" id="features4-3" style="background-color: rgb(255, 255, 255);">

    

    <div class="mbr-cards-row row">
        <div class="mbr-cards-col col-xs-12 col-lg-4" style="padding-top: 100px; padding-bottom: 80px;">
            <div class="container">
                <div class="card cart-block">
                    <div class="card-img iconbox"><a class="mbri-user mbr-iconfont mbr-iconfont-features4" style="color: black;"></a></div>
                    <div class="card-block">
                        <h4 class="card-title">Admin is always right.</h4>
                        <h5 class="card-subtitle"></h5>
                        <p class="card-text">He's right above you.</p>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="mbr-cards-col col-xs-12 col-lg-4" style="padding-top: 100px; padding-bottom: 80px;">
            <div class="container">
                <div class="card cart-block">
                    <div class="card-img iconbox"><a class="etl-icon icon-edit mbr-iconfont mbr-iconfont-features4" style="color: black;"></a></div>
                    <div class="card-block">
                        <h4 class="card-title">We suggest you enter FULL NAMES including space.</h4>
                        <h5 class="card-subtitle"></h5>
                        <p class="card-text">Answer is CASE INSENSITIVE.Eg.barton hills,Barton Hills,BARTON HILLS,BaRtOn HilLs are all same</p>
                        
                    </div>
                </div>
          </div>
        </div>
        <div class="mbr-cards-col col-xs-12 col-lg-4" style="padding-top: 100px; padding-bottom: 80px;">
            <div class="container">
                <div class="card cart-block">
                    <div class="card-img iconbox"><a class="mbri-like mbr-iconfont mbr-iconfont-features4" style="color: black;"></a></div>
                    <div class="card-block">
                        <h4 class="card-title">Play fair, the mods will be fair.</h4>
                        <h5 class="card-subtitle"></h5>
                        <p class="card-text">Dare to post answers in forum or any place known to us, be ready to face the consequences..</p>
                        
                    </div>
                </div>
            </div>
        </div>
        
        
        
    </div>
</section>

<section class="mbr-cards mbr-section mbr-section-nopadding" id="features4-4" style="background-color: rgb(255, 255, 255);">

    

    <div class="mbr-cards-row row">
        <div class="mbr-cards-col col-xs-12 col-lg-4" style="padding-top: 80px; padding-bottom: 80px;">
            <div class="container">
                <div class="card cart-block">
                    <div class="card-img iconbox"><a class="mbri-search mbr-iconfont mbr-iconfont-features4" style="color: black;"></a></div>
                    <div class="card-block">
                        <h4 class="card-title">Google &amp; Wiki they are both our boon and bane!!!!<div><br></div></h4>
                        <h5 class="card-subtitle"></h5>
                        <p class="card-text"></p>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="mbr-cards-col col-xs-12 col-lg-4" style="padding-top: 80px; padding-bottom: 80px;">
            <div class="container">
                <div class="card cart-block">
                    <div class="card-img iconbox"><a  class="etl-icon icon-edit mbr-iconfont mbr-iconfont-features4" style="color: black;"></a></div>
                    <div class="card-block">
                        <h4 class="card-title">Get Clues from our FB page</h4>
                        <h5 class="card-subtitle"></h5>
                        <p class="card-text">Clues for the levels may be found in page source and on the Facebook page.</p>
                        
                    </div>
                </div>
          </div>
        </div>
        <div class="mbr-cards-col col-xs-12 col-lg-4" style="padding-top: 80px; padding-bottom: 80px;">
            <div class="container">
                <div class="card cart-block">
                    <div class="card-img iconbox"><a class="mbri-code mbr-iconfont mbr-iconfont-features4" style="color: black;"></a></div>
                    <div class="card-block">
                        <h4 class="card-title">Hackers, you guys rule.</h4>
                        <h5 class="card-subtitle"></h5>
                        <p class="card-text">Make any attempts and, you will be banned from the game.</p>
                        
                    </div>
                </div>
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
  <script src="assets/theme/js/script.js"></script>
  
  
  <input name="animation" type="hidden">
   <div id="scrollToTop" class="scrollToTop mbr-arrow-up"><a style="text-align: center;"><i class="mbr-arrow-up-icon"></i></a></div>
  </body>
</html>

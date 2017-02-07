
<?php
//Include FB config file && User class
require_once 'fbConfig.php';
require_once 'User.php';

if(!$fbUser){
  $fbUser = NULL;
  $loginURL = $facebook->getLoginUrl(array('redirect_uri'=>$redirectURL,'scope'=>$fbPermissions));
  $output = '<div class="mbr-section-btn"><a class="btn btn-lg btn-info" href="'.$loginURL.'" >LOGIN WITH FACEBOOK</a>';  
  $logintop = '<a class="nav-link btn btn-white btn-white-outline" href="'.$loginURL.'">LOGIN</a>'; 
}else{
$logintop = '<a class="nav-link btn btn-white btn-white-outline" href="logout.php">LOG OUT</a>'; 
  //Get user profile data from facebook
  $fbUserProfile = $facebook->api('/me?fields=id,first_name,last_name,email,link,gender,locale,picture');
  
  //Initialize User class
  $user = new User();
  
  //Insert or update user data to the database
  $fbUserData = array(
    'oauth_provider'=> 'facebook',
    'oauth_uid'   => $fbUserProfile['id'],
    'first_name'  => $fbUserProfile['first_name'],
    'last_name'   => $fbUserProfile['last_name'],
    'email'     => $fbUserProfile['email'],
    'gender'    => $fbUserProfile['gender'],
    'locale'    => $fbUserProfile['locale'],
    'picture'     => $fbUserProfile['picture']['data']['url'],
    'link'      => $fbUserProfile['link']
  );
  $userData = $user->checkUser($fbUserData);

    //Put user data into session
  $_SESSION['userData'] = $userData;
  /*
  //Render facebook profile data
  
    $output = '<h1>Facebook Profile Details </h1>';
    $output .= '<img src="'.$userData['picture'].'">';
        $output .= '<br/>Facebook ID : ' . $userData['oauth_uid'];
        $output .= '<br/>Name : ' . $userData['first_name'].' '.$userData['last_name'];
        $output .= '<br/>Email : ' . $userData['email'];
        $output .= '<br/>Gender : ' . $userData['gender'];
        $output .= '<br/>Locale : ' . $userData['locale'];
        $output .= '<br/>Logged in with : Facebook';
    $output .= '<br/><a href="'.$userData['link'].'" target="_blank">Click to Visit Facebook Page</a>';
        $output .= '<br/>Logout from <a href="logout.php">Facebook</a>'; 
  }
  
  */
  if(empty($userData)){
    $output = '<h3 style="color:red">Some problem occurred, please try again.</h3>';
    
  }
  else{
  
  if($userData['activated']==0){
  
  header("Location:enterdetails.php?");
  }
  else{
  
  
  header("Location:dashboard/index.php");
  }
  }
}
$_SESSION['fbUser'] = $fbUser;
?>

<head>
 <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="razorSharp">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="assets/images/untitled-130x128.png" type="image/x-icon">
  <meta name="description" content="Home Page">
  <title>Deadlock</title>
   <meta name=msapplication-tap-highlight content=no>
    <link rel=manifest href=manifest.json>
    <meta name=mobile-web-app-capable content=yes>
    <meta name=application-name content="Deadlock">
    <link rel=icon sizes=192x192 href=assets/images/untitled-130x128.png>
    <meta name=apple-mobile-web-app-capable content=yes>
    <meta name=apple-mobile-web-app-status-bar-style content=#7e9b9f>
     <meta name=theme-color content=#7e9b9f>
    <meta name=apple-mobile-web-app-title content="Deadlock">
    <link rel=apple-touch-icon href=assets/images/untitled-130x128.png>
    <meta name=msapplication-TileImage content=assets/images/untitled-130x128.png>
    <meta name=msapplication-TileColor content=#7e9b9f>
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic&amp;subset=latin">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
  <link rel="stylesheet" href="assets/bootstrap-material-design-font/css/material.css">
  <link rel="stylesheet" href="assets/tether/tether.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/dropdown/css/style.css">
  <link rel="stylesheet" href="assets/animate.css/animate.min.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="stylesheet" href="assets/additional/css/mbr-additional.css" type="text/css">
  
  <script type="text/javascript">
     if ('serviceWorker' in navigator) {
  window.addEventListener('load', function() {
    navigator.serviceWorker.register('service-worker.js').then(function(registration) {
      // Registration was successful
      console.log('ServiceWorker registration successful with scope: ', registration.scope);
    }).catch(function(err) {
      // registration failed :(
      console.log('ServiceWorker registration failed: ', err);
    });
  });
}
  </script>
</head>
<body>
<section id="menu-0">

    <nav class="navbar navbar-dropdown bg-color transparent navbar-fixed-top">
        <div class="container">

            <div class="mbr-table">
                <div class="mbr-table-cell">

                    <div class="navbar-brand">
                        <a href="index.php" class="navbar-logo"><img src="assets/images/untitled-130x128.png" alt="Deadlock"></a>
                        <a class="navbar-caption" href="index.php">DEADLOCK</a>
                    </div>

                </div>
                <div class="mbr-table-cell">

                    <button class="navbar-toggler pull-xs-right hidden-md-up" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
                        <div class="hamburger-icon"></div>
                    </button>

                    <ul class="nav-dropdown collapse pull-xs-right nav navbar-nav navbar-toggleable-sm" id="exCollapsingNavbar"><li class="nav-item"><a class="nav-link link" href="rules.php">RULES</a></li><li class="nav-item dropdown"><a class="nav-link link" href="leadersboard.php" aria-expanded="false">LEADERBOARD</a></li><li class="nav-item dropdown"><a class="nav-link link" href="https://a3k.in/" aria-expanded="false" target="_blank">A3K</a></li><li class="nav-item nav-btn"><?php echo $logintop; ?></li></ul>
                    <button hidden="" class="navbar-toggler navbar-close" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
                        <div class="close-icon"></div>
                    </button>

                </div>
            </div>

        </div>
    </nav>

</section>

<section class="engine"></section><section class="mbr-section mbr-section-hero mbr-section-full mbr-parallax-background mbr-section-with-arrow mbr-after-navbar" id="header1-1" style="background-image: url(assets/images/jumbotron.jpg);">

    

    <div class="mbr-table-cell">

        <div class="container">
            <div class="row">
                <div class="mbr-section col-md-10 col-md-offset-1 text-xs-center">

                    <h1 class="mbr-section-title display-1">DEADLOCK</h1>
                    <p class="mbr-section-lead lead">Overclock your brain<br>but never rest, unless you're at the top</p>
                    <div class="mbr-section-btn"><?php echo $output; ?> </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mbr-arrow mbr-arrow-floating" aria-hidden="true"><a href="#footer1-2"><i class="mbr-arrow-icon"></i></a></div>

</section>

<section class="mbr-section mbr-parallax-background" id="content5-0" style="background-image: url(assets/images/desert2.jpg); padding-top: 120px; padding-bottom: 120px;">

    <div class="mbr-overlay" style="opacity: 0.5; background-color: rgb(0, 0, 0);">
    </div>

    <div class="container">
        <h3 class="mbr-section-title display-2">Start playing, and think harder!</h3>
        <div class="lead"><p>An exciting online treasure hunt</p></div>
    </div>

</section>

<footer class="mbr-small-footer mbr-section mbr-section-nopadding" id="footer1-2" style="background-color: rgb(50, 50, 50); padding-top: 1.75rem; padding-bottom: 1.75rem;">
    
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

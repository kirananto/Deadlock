<?php

session_start();
if(empty($_GET)&&empty($_POST))
{
	header("Location:index.php");
	exit;
}
if(!empty($_GET))
{
include('../common/con.php');
$userdata=$_SESSION['userData'];
$lvlno=$_GET['lvlno'];
$answer="";
$imgurl="";
$res=fetchquery("SELECT  * from levels where id=$lvlno");
if($res!=null)
{
	if($res->num_rows==1)
	{	$row=$res->fetch_assoc();
		$imgurl=$row['lvlimage'];
		$answer=$row['answer'];
		$id=$userdata['id'];
		$h=crypt($imageurl.$id,"saltitbro");
		$imgurl='/dashboard/img.php?img='.$h;
		$ip=get_ip();
		$actualimage=$row['lvlimage'];
		fetchquery("INSERT into imageaccess values('$h','$ip',$id,'$actualimage');");
	}
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
  <link rel="shortcut icon" href="/assets/images/untitled-130x128.png" type="image/x-icon">
  <meta name="description" content="Admin Panel">
  <title>DeadLock - Admin Panel</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic&amp;subset=latin"><meta name=msapplication-tap-highlight content=no>
    <link rel=manifest href=manifest.json>
    <meta name=mobile-web-app-capable content=yes>
    <meta name=application-name content="Deadlock">
    <link rel=icon sizes=192x192 href=/assets/images/untitled-130x128.png>
    <meta name=apple-mobile-web-app-capable content=yes>
    <meta name=apple-mobile-web-app-status-bar-style content=#00964d>
     <meta name=theme-color content=#00964d>
    <meta name=apple-mobile-web-app-title content="Deadlock">
    <link rel=apple-touch-icon href=/assets/images/untitled-130x128.png>
    <meta name=msapplication-TileImage content=/assets/images/untitled-130x128.png>
    <meta name=msapplication-TileColor content=#00964d>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
  <link rel="stylesheet" href="/assets/bootstrap-material-design-font/css/material.css">
  <link rel="stylesheet" href="/assets/tether/tether.min.css">
  <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="/assets/dropdown/css/style.css">
  <link rel="stylesheet" href="/assets/animate.css/animate.min.css">
  <link rel="stylesheet" href="/assets/theme/css/style.css">
  <link rel="stylesheet" href="/assets/additional/css/mbr-additional.css" type="text/css">
</head>
<body>

<?php

if(!empty($_POST)){
    $imgisthere=0;
   if(isset($_FILES['image'])){
      $errors= array();
      $levelno = $_POST["lvlno"];
      $lvlans = $_POST["lvlans"];
      $isenabled = $_POST["tog"];
      $file_name = $_FILES['image']['name'];
      $file_size = $_FILES['image']['size'];
      $file_tmp = $_FILES['image']['tmp_name'];
      $file_type = $_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      $expensions= array("jpeg","jpg","png");
      if($isenabled != 1){ $isenabled = 0;}
   
     
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152) {
         $errors[]='File size must be less than 2 MB';
      }

    
      if(empty($errors)==true) {
         if(move_uploaded_file($_FILES['image']['tmp_name'],"/var/www/html/levelsmade/".$_FILES['image']['name'])) {
          $imgisthere=1;
         
      } else {
        $errors[]="Couldn't Upload Files";
      
      }}
      if(!empty($errors)==true)
      {
        $i = 0;
        $message= "";
        do{
		$message = $message.$errors[$i];
		$i++;
	  } while($errors[$i]!= null);
	     phpAlert($message);
      
      }
      else{ 
      
    $imgisthere=1;  
    }
    }else{$imgisthere=0;}
      if($imgisthere)
      {
      $id=$_POST['lvlno'];
$f=  $_FILES['images']['name'];
      fetchquery("UPDATE levels set answer=$answer,lvlimage=$f  where lvlno=".$id );
      
      }
      else{
      
fetchquery("UPDATE levels set answer=$answer   where lvlno=".$id );

         }
              header("Location:editlvl.php?lvlno=".$id);
               }
               
?>


<section id="menu-5">

    <nav class="navbar navbar-dropdown bg-color transparent navbar-fixed-top">
        <div class="container">

            <div class="mbr-table">
                <div class="mbr-table-cell">

                    <div class="navbar-brand">
                        <a href="../index.php" class="navbar-logo"><img src="../assets/images/untitled-130x128.png" alt="Deadlock"></a>
                         <a class="navbar-caption" href="../index.php"><img class = " col-md-5 col-xs-5 col-sm-5" src = "../assets/images/logo.png" /></a>
                    </div>
                </div>
                <div class="mbr-table-cell">
                    <button class="navbar-toggler pull-xs-right hidden-md-up" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
                        <div class="hamburger-icon"></div>
                    </button>
                    <ul class="nav-dropdown collapse pull-xs-right nav navbar-nav navbar-toggleable-sm" id="exCollapsingNavbar"><li class="nav-item"><a class="nav-link link" href="../rules.php">RULES</a></li><li class="nav-item dropdown"><a class="nav-link link" href="../leadersboard.php" aria-expanded="false">LEADERBOARD</a></li><li class="nav-item dropdown"><a class="nav-link link" href="https://a3k.in/" aria-expanded="false" target="_blank">A3K</a></li><li class="nav-item"></li><li class="nav-item nav-btn"></li><?php if($_SESSION['userData']['isadmin']){?><li class="nav-item nav-btn"><a class="nav-link btn btn-white btn-white-outline" href="/logout.php">LOG OUT</a></li><?php }?></ul>
                    <button hidden="" class="navbar-toggler navbar-close" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
                        <div class="close-icon"></div>
                    </button>
                </div>
            </div>
        </div>
    </nav>
</section>
<section class="engine"></section><section class="mbr-section article mbr-parallax-background mbr-after-navbar" id="msg-box8-8" style="background-image: url(/assets/images/jumbotron.jpg); padding-top: 120px; padding-bottom: 120px;">
    <div class="mbr-overlay" style="opacity: 0.5; background-color: rgb(34, 34, 34);">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-xs-center">
                <h3 class="mbr-section-title display-2">ADMIN PANEL</h3>
                <div class="lead"><p>Manage the levels</p></div>
 </div>
        </div>
    </div>
</section> 
<section class="mbr-section article mbr-section__container" id="content1-b" style="background-color: rgb(255, 255, 255); padding-top: 20px; padding-20px;" >

    <div class="container col-md-offset-1 col-xs-offset-1">
        <div class="row">
            <div class="col-xs-12 col-md-12 ">
     <?php 
include '../common/adminpanel.php'; ?>

<form method="POST" action="levelchange.php" enctype="multipart/form-data">
<div class = "form-group">
<label for="lvlno">Level No:<?php echo $lvlno;?></label>


      </div>
      <div class = "form-group">
      <label for="lvlans">Answer to the Level :</label>
 <input type="text" id="lvlans" value="<?php echo $answer; ?>" name="lvlans" class="form-control" placeholder="Answer to the Level :">
      </div>
      
       <div class = "form-group">
      <img src="<?php echo $imgurl; ?>" />
      
           </div> 
      
<div class = "form-group">
<label for="image">Level Image :</label>
  <input type="file" id="image" name="image" class="form-control">
      </div>
<br>
 <div class = "form-group"><button type="submit" name= "submit" class="btn btn-raised col-xs-12  col-md-6 col-md-offset-3 ripple-effect btn-primary btn-lg"> Submit</button></div>



</form>


       
            </div>
        </div>
    </div>
</section>
<footer class="mbr-small-footer mbr-section mbr-section-nopadding" id="footer1-d" style="background-image: url(/assets/images/footer.jpg); padding-top: 1.75rem; padding-bottom: 1.75rem;">
    
    <div class="container">
        <p class="text-xs-center">Copyright (c) 2017 Deadlock</p>
    </div>
</footer>

  <script src="/assets/web/assets/jquery/jquery.min.js"></script>
  <script src="/assets/tether/tether.min.js"></script>
  <script src="/assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="/assets/smooth-scroll/SmoothScroll.js"></script>
  <script src="/assets/dropdown/js/script.min.js"></script>
  <script src="/assets/touchSwipe/jquery.touchSwipe.min.js"></script>
  <script src="/assets/viewportChecker/jquery.viewportchecker.js"></script>
  <script src="/assets/jarallax/jarallax.js"></script>
  <script src="/assets/theme/js/script.js"></script>
  
  
  <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
  <script>


</script>

  <input name="animation" type="hidden">
   <div id="scrollToTop" class="scrollToTop mbr-arrow-up"><a style="text-align: center;"><i class="mbr-arrow-up-icon"></i></a></div>
   <?php

include '../common/foot.php';
   ?>
  </body>
</html>

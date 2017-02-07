<?php
include '../common/auth.php';
include '../common/con.php';
$userdata=$_SESSION['userData'];
if($userdata['activated']==0)

{
header("Location:/");
exit;
}
if(!isset($userdata['isadmin']))
{
$email=$_SESSION['userData']['email'];
	$res=fetchquery("SELECT * from admins where email='$email';");
	if($res->num_rows==1)
	{
	$_SESSION['userData']['isadmin']=1;

	}
	else{

	$_SESSION['userData']['isadmin']=0;

	}
}




$hash="";


$email=$userdata['email'];

$userid=$userdata['id'];
$res=fetchquery("SELECT * from leadersboard where id=$userid;");
if($res!=null)
{
	if($res->num_rows==1)
	{
	$row=$res->fetch_assoc();
	$lvl=$row['lvlno'];

	$res=fetchquery("SELECT * from levels where lvlno='$lvl';");
	if($res!=null)
	{
		if($res->num_rows==1)
		{ global $hash;
			$rowlevel=$res->fetch_assoc();
			
		$id=$userdata['id'];
			$hash=crypt($rowlevel['lvlimage'].$id,"saltitbro");
			$ip=get_ip();

		$actualimage=$rowlevel['lvlimage'];
		fetchquery("INSERT into imageaccess values('$hash','$ip',$id,'$actualimage');");
		

		}
		else{




		}

		}
		
		else{
		
		echo "nolevel for user";
		}


	}
	
	
	


}
else{

echo 'error:leadersboard access';
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
  <meta name="description" content="Web Site Creator Description">
  <title>Overclock your brain</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic&amp;subset=latin">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
  <link rel="stylesheet" href="/assets/bootstrap-material-design-font/css/material.css">
  <link rel="stylesheet" href="/assets/tether/tether.min.css">
  <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="/assets/dropdown/css/style.css">
  <script src="/assets/dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="/assets/dist/sweetalert.css">
  <link rel="stylesheet" href="/assets/animate.css/animate.min.css">
  <link rel="stylesheet" href="/assets/theme/css/style.css">
  <link rel="stylesheet" href="/assets/additional/css/mbr-additional.css" type="text/css">
  
  
  
</head>
<body>
<section id="menu-c">

    <nav class="navbar navbar-dropdown bg-color transparent navbar-fixed-top">
        <div class="container">

            <div class="mbr-table">
                <div class="mbr-table-cell">

                    <div class="navbar-brand">
                        <a href="index.php" class="navbar-logo"><img src="/assets/images/untitled-130x128.png" alt="Deadlock"></a>
                        <a class="navbar-caption" href="index.php">DEADLOCK</a>
                    </div>

                </div>
                <div class="mbr-table-cell">

                    <button class="navbar-toggler pull-xs-right hidden-md-up" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
                        <div class="hamburger-icon"></div>
                    </button>

                    <ul class="nav-dropdown collapse pull-xs-right nav navbar-nav navbar-toggleable-sm" id="exCollapsingNavbar"><li class="nav-item"><a class="nav-link link" href="/rules.php">RULES</a></li><li class="nav-item dropdown"><a class="nav-link link" href="/leadersboard.php" aria-expanded="false">LEADERBOARD</a></li><a class="nav-link link" href="/logout.php" aria-expanded="false">LOG OUT</a></li><li class="nav-item dropdown"><a class="nav-link link" href="https://a3k.in/" aria-expanded="false" target="_blank">A3K</a></li><?php if($_SESSION['userData']['isadmin']){?><li class="nav-item nav-btn"><a class="nav-link btn btn-white btn-white-outline" href="/manage/index.php">GO TO ADMIN PANEL</a></li><?php } else { ?><li class="nav-item nav-btn"><a class="nav-link btn btn-white btn-white-outline" href="https://www.facebook.com/D4Deadlock">CHECK CLUES</a></li><?php } ?></ul>
                    <button hidden="" class="navbar-toggler navbar-close" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
                        <div class="close-icon"></div>
                    </button>

                </div>
            </div>

        </div>
    </nav>

</section>

<section class="engine"></section><section class="mbr-section article mbr-parallax-background mbr-after-navbar" id="msg-box8-e" style="background-image: url(/assets/images/desert.jpg); padding-top: 120px; padding-bottom: 120px;">

    <div class="mbr-overlay" style="opacity: 0.5; background-color: rgb(34, 34, 34);">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-xs-center">
                <h3 class="mbr-section-title display-2">Overclock your Brain</h3>
                <div class="lead"><p>Try ,.. &nbsp; Answer if you can..!!!</p></div>
                
            </div>
        </div>
    </div>

</section>

<section class="mbr-section" id="msg-box5-h" style="background-color: rgb(255, 255, 255); padding-top: 120px; padding-bottom: 120px;">

    
    <div class="container">
        <div class="row">
            <div class="mbr-table-md-up">

              <div class="mbr-table-cell mbr-right-padding-md-up mbr-valign-top col-md-7 image-size" style="width: 70%;">
                  <div class="mbr-figure"><img src="img.php?img=<?php echo $hash; ?>" alt=" Image appears here "></div>
              </div>

              


              <div class="mbr-table-cell col-md-5 text-xs-center text-md-left content-size" id= "closestdiv">
                  <h3 class="mbr-section-title display-2">THINK FOR AN ANSWER</h3>
                  <div class="lead">
<p>
                  <input class ="form-control" type="text" id="anstxt"></input></p>

                  </div>

                  <div><button type="button" onclick = "sbmt_answer();"class="btn btn-raised ripple-effect btn-primary btn-lg"> Submit Answer</button></div>
              </div>


              

            </div>
        </div>
    </div>

</section>
<footer class="mbr-small-footer mbr-section mbr-section-nopadding" id="footer1-d" style="background-color: rgb(50, 50, 50); padding-top: 1.75rem; padding-bottom: 1.75rem;">
    
    <div class="container">
        <p class="text-xs-center">Copyright (c) 2017 Deadlock.</p>
    </div>
</footer>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script>

function sbmt_answer()
{
var txt=$('#anstxt').val();
$.post("check.php",{"ans":txt},function(data){
  alert1(data);
});


}
var alert1 = function(data1) {
   
        if(data1 == 'success') {
            swal("Good job!", "You've got the Right Answer", "success")
        } else {
            sweetAlert("Sorry...", "Wrong Answer.!", "error");
        }
    }

</script>

  <script src="/assets/web/assets/jquery/jquery.min.js"></script>
  <script src="/assets/tether/tether.min.js"></script>
  <script src="/assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="/assets/smooth-scroll/SmoothScroll.js"></script>
  <script src="/assets/dropdown/js/script.min.js"></script>
  <script src="/assets/touchSwipe/jquery.touchSwipe.min.js"></script>
  <script src="/assets/viewportChecker/jquery.viewportchecker.js"></script>
  <script src="/assets/jarallax/jarallax.js"></script>
  <script src="/assets/theme/js/script.js"></script>
  
  
  <input name="animation" type="hidden">
   <div id="scrollToTop" class="scrollToTop mbr-arrow-up"><a style="text-align: center;"><i class="mbr-arrow-up-icon"></i></a></div>
  </body>
</html>

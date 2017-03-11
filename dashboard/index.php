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
$rank="nil";
$user_on_top_level=0;
$email=$userdata['email'];
$userid=$userdata['id'];
$res=fetchquery("SELECT lvlno from leadersboard where id=$userid;");
$rk123 = fetchquery("SELECT * from leadersboard  where id not in (select id from users where email in(select email from admins)) order by lvlno desc,date asc ;");
if($rk123!=null)
{

for($i=0;$i<$rk123->num_rows;$i++)
{
$r=$rk123->fetch_assoc();
if($r['id'] == $userid)
{
  $rank = $i +1;
}

}

} else {
  $rank = "NIL";
}
if($res!=null)
{
  if($res->num_rows==1)
  {
  $row=$res->fetch_assoc();
  $lvl=$row['lvlno'];
  //lvl incremented bcoz it is 0-starting

  $res=fetchquery("SELECT * from levels where lvlno='".($lvl+1)."' and enabled=1 order by lvlno asc limit 1;");
  if($res!=null)
  {
    if($res->num_rows==1)
    { global $hash;
      $rowlevel=$res->fetch_assoc();
      
    $id=$userdata['id'];
      $hash=crypt($rowlevel['lvlimage'].$id,"saltitbro");
      $ip=get_ip();

    $actualimage=$rowlevel['lvlimage'];
//    fetchquery("INSERT into imageaccess values('$hash','$ip',$id,'$actualimage');");
    
$_SESSION['userData']['images'][$hash]=$actualimage;
    }
    else{


    $user_on_top_level=1;


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
                       <a class="navbar-caption" href="../index.php"><img class = " col-md-7 col-xs-5 col-sm-5" src = "../assets/images/logo.png" /></a>
                    </div>

                </div>
                <div class="mbr-table-cell">

                    <button class="navbar-toggler pull-xs-right hidden-md-up" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
                        <div class="hamburger-icon"></div>
                    </button>

                    <ul class="nav-dropdown collapse pull-xs-right nav navbar-nav navbar-toggleable-sm" id="exCollapsingNavbar"><li class="nav-item"><a class="nav-link link" href="/rules.php">RULES</a></li><li class="nav-item dropdown"><a class="nav-link link" href="/leadersboard.php" aria-expanded="false">LEADERBOARD</a></li><a class="nav-link link" href="/logout.php" aria-expanded="false">LOGOUT</a></li><li class="nav-item dropdown"><a class="nav-link link" href="https://a3k.in/" aria-expanded="false" target="_blank">A3K</a></li><?php if($_SESSION['userData']['isadmin']){?><li class="nav-item nav-btn"><a class="nav-link btn btn-white btn-white-outline" href="/manage/index.php">GO TO ADMIN PANEL</a></li><?php } else { ?><li class="nav-item nav-btn"><a class="nav-link btn btn-white btn-white-outline" href="https://www.facebook.com/D4Deadlock">CHECK CLUES</a></li><?php } ?><li class="nav-item dropdown"><div class="avatar hidden-md-down" style="background-image: url(&quot;<?php echo $userdata['picture'] ?>&quot;);"></div></li></ul>
                    <button hidden="" class="navbar-toggler navbar-close" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
                        <div class="close-icon"></div>
                    </button>

                </div>
            </div>

        </div>
    </nav>

</section>

<section class="engine"></section><section class="mbr-section article mbr-parallax-background mbr-after-navbar" id="msg-box8-e" style="background-image: url(/assets/images/jumbotron.jpg); padding-top: 120px; padding-bottom: 120px;">

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-xs-center">
                <h3 class="mbr-section-title display-2">Overclock your Brain</h3>
                
                
            </div>
        </div>
    </div>

</section>

<section class="mbr-section" id="msg-box5-h" style="background-color: rgb(255, 255, 255); padding-top: 25px; padding-bottom: 120px;">

    <div class="container" style=" padding-bottom: 70px;"><div class="row">
        <span class="mbr-section-title col-md-offset-1 col-xs-offset-1 col-md-6 col-xs-11 col-sm-8" style=" font-size: 2.7rem;
  font-weight: 600;     font-family: 'Montserrat', sans-serif;
  letter-spacing: -1px; ">Your  Rank is :</span><span class="mbr-section-title col-md-1 text-xs-center col-xs-12 col-sm-2" style="  font-size: 3rem;
  font-weight: 700;     font-family: 'Montserrat', sans-serif; color: #00964d";
  letter-spacing: -1px;"><?php echo $rank; ?></span></div></div>
 
<?php

//if user on top level this code works
if($user_on_top_level)
{
?>
    <div class="container" style=" padding-bottom: 70px; " >
    <div class="row">

            <div class="mbr-table-md-up">
        <span class="mbr-section-title col-md-offset-1 col-xs-offset-1 col-md-6 col-xs-11 col-sm-8" style=" font-size: 2rem;
  font-weight: 600;     font-family: 'Montserrat', sans-serif;
  letter-spacing: -1px; "> More Questions coming soon...</span></div></div>
  <br>
  <div class="mbr-table-cell mbr-right-padding-md-up mbr-valign-top col-md-5 image-size" style="width: 50%;">
                  <div class="mbr-figure"><img src="../assets/images/meme1.jpg" class="img-rounded" alt=" Image appears here "></div>
              </div>
              </div>
 <?php
} else {
?>
  <div class="container">
        <div class="row">
            <div class="mbr-table-md-up">

              <div class="mbr-table-cell mbr-right-padding-md-up mbr-valign-top col-md-7 image-size" style="width: 50%;">
                  <div class="mbr-figure"><img src="img.php?img=<?php echo $hash; ?>" class="img-rounded myImg" alt=" Image appears here "></div>
              </div>

         


              <div class="mbr-table-cell col-md-5 text-xs-center text-md-left content-size" id= "closestdiv">
                  <h3 class="mbr-section-title display-2" style="font-size: 2rem;">THINK FOR AN ANSWER</h3>
                  <div class="lead">
<p>
                  <input class ="form-control" type="text" id="anstxt"></input></p>

                  </div>

                  <div><button id="buttonsubmit" type="button" onclick = "sbmt_answer();"class="btn btn-lg btn-info"> Submit Answer</button></div>
              </div>
<script type="text/javascript">
  document.getElementById("anstxt")
    .addEventListener("keyup", function(event) {
    event.preventDefault();
    if (event.keyCode == 13) {
        document.getElementById("buttonsubmit").click();
    }
});
</script>

              

            </div>
        </div>
    </div>
<?php } ?>
</section>
<footer class="mbr-small-footer mbr-section mbr-section-nopadding" id="footer1-d" style="background-image: url(/assets/images/footer.jpg); padding-top: 1.75rem; padding-bottom: 1.75rem;">
    
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
   
        if(data1[data1.length-1] == 's') {
            

    setTimeout(function() {
        swal({
            title: "Good job!",
            text: "You've got the Right Answer",
            type: "success"
        }, function() {
            location.reload();
        });
    }, 1000);
            
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
  
  <script src="/assets/dist/sweetalert.min.js"></script>
  
  
  </body>
</html>

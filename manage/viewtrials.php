<?php
session_start();
include '../common/auth.php';
if($_SESSION['userData']['isadmin']==0)
{

header("Location:/");
exit;

}

include '../common/con.php';


$res=fetchquery("SELECT * from users");





?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="razorSharp">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="/assets/images/untitled-130x128.png" type="image/x-icon">
  <meta name="description" content="Add Levels">
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
<section id="menu-5">

    <nav class="navbar navbar-dropdown bg-color transparent navbar-fixed-top">
        <div class="container">

            <div class="mbr-table">
                <div class="mbr-table-cell">

                    <div class="navbar-brand">
                        <a href="index.php" class="navbar-logo"><img src="../assets/images/untitled-130x128.png" alt="Deadlock"></a>
                        <a class="navbar-caption" href="../index.php"><img class = " col-md-5 col-xs-5 col-sm-5" src = "../assets/images/logo.png" /></a>
                    </div>
                </div>
                <div class="mbr-table-cell">
                    <button class="navbar-toggler pull-xs-right hidden-md-up" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
                        <div class="hamburger-icon"></div>
                    </button>
                    <ul class="nav-dropdown collapse pull-xs-right nav navbar-nav navbar-toggleable-sm" id="exCollapsingNavbar"><li class="nav-item"><a class="nav-link link" href="../rules.php">RULES</a></li><li class="nav-item dropdown"><a class="nav-link link" href="../leadersboard.php" aria-expanded="false">LEADERBOARD</a></li><li class="nav-item dropdown"><a class="nav-link link" href="https://a3k.in/" aria-expanded="false" target="_blank">A3K</a></li><?php if($_SESSION['userData']['isadmin']){?><li class="nav-item nav-btn"><a class="nav-link btn btn-white btn-white-outline" href="/logout.php">LOG OUT</a></li><?php }?></ul>
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
                <div class="lead"><p>View User Trails</p></div>
 </div>
        </div>
    </div>
</section> 
<section class="mbr-section article mbr-section__container" id="content1-b" style="background-color: rgb(255, 255, 255); padding-top: 20px; padding-bottom: 20px; ">

    <div class="container col-md-offset-1 col-xs-offset-1">
        <div class="row">
            <div class="col-xs-12 col-md-12 ">
     <?php 
include '../common/adminpanel.php'; ?>
<br><br>

<h1> Select the user </h1>
<table id="users" class="display  table table-hover"  >

<tr><th>id</th><th>Name</th><th>College</th><th>Email</th><th>Mobile No</th></tr>

<?php
while($row=$res->fetch_assoc())
{


echo '<tr onclick="view('.$row['id'].')">';

$a=array("id","college","email","phoneno");
for($i=0;$i<count($a);$i++)
{
if($i==1){echo '<td>'.$row['first_name'].' '.$row['last_name'].'</td>';}
echo '<td>'.$row[$a[$i]].'</td>';


}
echo '</tr>';





}

?>

</table>

<h1 id="heading23"> USER TRIES </h1>
<table id="usertrys"class= "display table table-hover">

 <thead>
                                <tr>
                                    <th>LevelNo</th>
                                    <th>Answer</th>
                                    <th>Date</th>
                                    <th>IP address </th>
                                    
                                </tr>
                            </thead>
                            <tbody id="trys">
                            </tbody>

</table> 
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.13/css/jquery.dataTables.css">
  <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>

<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.13/js/jquery.dataTables.js"></script>
<script>
$(document).ready( function () {
    $('#users').DataTable();
} );


function view(id)
{

//document.getElementById("heading23").style.display = "none";
//document.getElementById("usertrys").style.display = "none";
$.post("viewusers.php",{"id":id},function(dataset){
console.log(dataset);

$('#trys').html('');
for(i=0;i<dataset.length;i++)
{
a='';
for(j=0;j<4;j++)
{
a=a+'<td>'+dataset[i][j]+'</td>';
}

$('#trys').append('<tr>'+a+'</tr>');
}

     $('#usertrys').DataTable( /*{
        data: dataset,
        columns: [
            { title: "Level No" },
            { title: "Tried Answer" },
            { title: "Date" },
            { title: "ip" }
        ]
    }*/ );
} );
}
</script>
       
            </div>
        </div>
    </div>
</section>
<footer class="mbr-small-footer mbr-section mbr-section-nopadding" id="footer1-d" style="background-image: url(/assets/images/footer.jpg); padding-top: 1.75rem; padding-bottom: 1.75rem;">
    
    <div class="container">
        <p class="text-xs-center">Copyright (c) 2017 Deadlock.</p>
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
  
  
  <input name="animation" type="hidden">
   <div id="scrollToTop" class="scrollToTop mbr-arrow-up"><a style="text-align: center;"><i class="mbr-arrow-up-icon"></i></a></div>
   <?php

include '../common/foot.php';
   ?>
  </body>
</html>
<?php
include '../common/con.php';
session_start();
include '../common/auth.php';
if($_SESSION['userData']['isadmin']==0)
{

header("Location:/?redir=na");
exit;

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
  <meta name="description" content="Add Levels">
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
<section id="menu-5">

    <nav class="navbar navbar-dropdown bg-color transparent navbar-fixed-top">
        <div class="container">

            <div class="mbr-table">
                <div class="mbr-table-cell">

                    <div class="navbar-brand">
                        <a href="index.php" class="navbar-logo"><img src="../assets/images/untitled-130x128.png" alt="Deadlock"></a>
                        <a class="navbar-caption" href="../index.php"><img class = " col-md-5 col-xs-5 col-sm-5" src = "../assets/images/logo.png" /></a>
                    </div>
                </div>
                <div class="mbr-table-cell">
                    <button class="navbar-toggler pull-xs-right hidden-md-up" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
                        <div class="hamburger-icon"></div>
                    </button>
                    <ul class="nav-dropdown collapse pull-xs-right nav navbar-nav navbar-toggleable-sm" id="exCollapsingNavbar"><li class="nav-item"><a class="nav-link link" href="../rules.php">RULES</a></li><li class="nav-item dropdown"><a class="nav-link link" href="../leadersboard.php" aria-expanded="false">LEADERBOARD</a></li><li class="nav-item dropdown"><a class="nav-link link" href="https://a3k.in/" aria-expanded="false" target="_blank">A3K</a></li><?php if($_SESSION['userData']['isadmin']){?><li class="nav-item nav-btn"><a class="nav-link btn btn-white btn-white-outline" href="/logout.php">LOG OUT</a></li><?php }?></ul>
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
<section class="mbr-section article mbr-section__container" id="content1-b" style="background-color: rgb(255, 255, 255); padding-top: 20px; padding-bottom: 20px; ">

    <div class="container col-md-offset-1 col-xs-offset-1">
        <div class="row">
            <div class="col-xs-12 col-md-12 ">
     <?php 
include '../common/adminpanel.php'; ?>
<br><br>

<form method="POST" action="addlevel.php">
<div class = "form-group">
<label for="lvlno">Level No:</label>
      <input type="text" id="lvlno" class="form-control" placeholder="Level No:">
      </div>
<div class = "form-group">
<label for="lvlfile">Level Image :</label>
  <input type="file" id="fileToUpload" name="fileToUpload" class="form-control">
      </div>

 <div class = "form-group"><button type="button" name= "f" onclick = "" class="btn btn-raised ripple-effect btn-primary btn-lg"> Submit</button></div>



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
   <?php

include '../common/foot.php';
   ?>
  </body>
</html>



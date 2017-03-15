<?php

session_start();
include 'common/con.php';
$userdata=$_SESSION['userData'];
$id1 = $userdata['id'];
if($userdata != null)
{

$rk123 = fetchquery("SELECT * from leadersboard  where id='$id1'; ");
if($rk123!=null)
  {
    if($rk123->num_rows==1)
    { 

      $rowlevel=$rk123->fetch_assoc();
      $levelno=$rowlevel['lvlno'];
      if($levelno < 20 )
      {
         header("Location:/?redir=na");
         exit;
      }
  }
}
} else {
  header("Location:/?redir=na");
         exit;
}
if(isset($_POST['submit']))
{
      $decrypted_val = $_POST['fname'];

      $decrypted_val2 =$_SESSION['d1'];
      $decrypted_val = str_replace(' ', '', $decrypted_val);
      $decrypted_val=strtolower($decrypted_val);      
      $decrypted_val2=strtolower($decrypted_val2);
      if( strcmp($decrypted_val, $decrypted_val2) == 0)
      {
          header("Location:asdfghjklqwertyuiopzxcvbnm.php");
          exit;
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
  <link rel="shortcut icon" href="assets/images/untitled-130x128.png" type="image/x-icon">
  <meta name="description" content="LeadersBoard">
  <title>DeadLock - Question</title>
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
                    <ul class="nav-dropdown collapse pull-xs-right nav navbar-nav navbar-toggleable-sm" id="exCollapsingNavbar"><li class="nav-item"><a class="nav-link link" href="rules.php">RULES</a></li><li class="nav-item dropdown"><a class="nav-link link" href="leadersboard.php" aria-expanded="false">LEADERBOARD</a></li><li class="nav-item dropdown"><a class="nav-link link" href="https://a3k.in/" aria-expanded="false" target="_blank">A3K</a></li></ul>
                    <button hidden="" class="navbar-toggler navbar-close" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
                        <div class="close-icon"></div>
                    </button>
                </div>
            </div>
        </div>
    </nav>
</section>
<section class="engine"></section><section class="mbr-section article mbr-parallax-background mbr-after-navbar" id="msg-box8-8" style="background-image: url(assets/images/jumbotron.jpg); padding-top: 150px; padding-bottom: 80px;">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-xs-center">
                <h3 class="mbr-section-title display-4">THINK FOR THE ANSWER</h3>
 </div>
        </div>
    </div>
</section> 
<section class="mbr-section-full article mbr-section__container" id="content1-b" style="background-color: rgb(255, 255, 255); padding-top: 20px; padding-bottom: 20px; ">

    <div class="container col-md-offset-1 ">
        <div class="row">
            <div class="col-xs-12 col-md-12 text-xs-center">

<?php
class Map {
  /* $table = [
   *   'encrypt' =>
   *     ['A' => 'A', 'B' => 'B', ...],
   *     ['A' => 'B', 'B' => 'C', ...],
   *     ...
   *   'decrypt' =>
   *     ['A' => 'A', 'B' => 'B', ...],
   *     ['B' => 'A', 'C' => 'B', ...],
   *     ...
   */
  protected $table;
  /* index of each character:
   * $index = ['A' => 0, 'B' => 1, ...]
   */ 
  protected $index;
  public function __construct() {
    $row = $keys = range('A', 'Z');
    $this->index = array_flip($keys);
    for ($i = 0; $i < count($keys); $i++) {
      $table = array_combine($keys, $row);
      $this->table['encrypt'][$i] = $table;
      $this->table['decrypt'][$i] = array_flip($table);
      array_push($row, array_shift($row));
    }
  }
  // remove non-alpha characters and convert to uppercase.
  public function clean($string) {
    return preg_replace('/[^A-Z]/', '', strtoupper($string));
  }
  // retrieve the index of a character.
  public function index($symbol) {
    return $this->index[$symbol];
  }
  // encode a character using the mapping table.
  public function encrypt($symbol, $shift) {
    return $this->table['encrypt'][$shift][$symbol];
  }
  // decode a character using the mapping table.
  public function decrypt($symbol, $shift) {
    return $this->table['decrypt'][$shift][$symbol];
  }
}
class Cipher {
  protected $map;
  public function __construct(Map $map) {
    $this->map = $map;
  }
  public function encrypt($string, $shift) {
    return $this->convert($string, $shift);
  }
  public function decrypt($string, $shift) {
    return $this->convert($string, $shift, $action = 'decrypt');
  } 
}
class Caesar extends Cipher {
  protected function convert($string, $shift, $action = 'encrypt') {
    // prepare the input and output.
    $stream = $this->map->clean($string);
    $output = '';
    for ($i = 0; $i < strlen($stream); $i++) {
      // translate each character of the input stream.
      $output .= $this->map->$action($stream[$i], $shift);
    }
    return $output;
  }
}
$p = "findtheencryptionalgorithm";
// caesar shift.
$i = 3;
$m = new Map();
$c = new Caesar($m);
$e1 = $c->encrypt($p, $i);
$d1 = $c->decrypt($e1, $i);
$_SESSION['d1'] = $d1;
echo "<p class = 'display-4'>Encrypted Text : " . $e1 . "</p>";

?>


<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">

<table class="table table-hover">
<tr><td class="userdetails_text">Decrypted Text:</td><td><input type="text" class="form-control" name="fname"></input></td></tr>

<tr><td></td><td><input type="submit" name="submit" class="col-xs-offset-2 btn btn-raised ripple-effect btn-primary btn-lg"></input></td></tr>
</table>

</form>

       
            </div>
        </div>
    </div>
</section>
<footer class="mbr-small-footer mbr-section mbr-section-nopadding" id="footer1-d" style="background-image: url(/assets/images/footer.jpg); padding-top: 1.75rem; padding-bottom: 1.75rem;">
    
    <div class="container">
        <p class="text-xs-center">Copyright (c) 2017 Razorsharp.</p>
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
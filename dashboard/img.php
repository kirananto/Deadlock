<?php
include '../common/con.php';

$h=$_GET['img'];

session_start();


header("Content-type: image/png");

readfile('../images/fblogin-btn.png');

















?>

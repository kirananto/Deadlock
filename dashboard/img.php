<?php
include '../common/con.php';

if(!isset($_GET['img'])){die();}
$h=$_GET['img'];


session_start();


header("Content-type: image/png");
$stmt = $mysqli->prepare('SELECT * from imageaccess where imagehash=?');
$stmt->bind_param("s",$h);
$stmt->execute();
$res=$stmt->get_result();
if(!$res->num_rows==1)
{
exit;

}
$row=$res->fetch_assoc();





readfile("../levelsmade/".$row['actualimage']);







$stmt->close();









?>

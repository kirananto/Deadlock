<?php


if(!isset($_POST['id']))
{
exit;}
session_start();


include '../common/auth.php';
if($_SESSION['userData']['isadmin']==0)
{


exit;

}

include '../common/con.php';

$id=$_POST['id'];

//$res=fetchquery("SELECT * from tried where id =");

$stmt=$mysqli->prepare("SELECT * from tried where uid=?");
	
	$stmt->bind_param("i",$id);
	$stmt->execute();
	$res=$stmt->get_result();
	
	$result=array();
	while($row=$res->fetch_assoc())
	{
	
	$a=array();
	array_push($a,$row['levelno'],$row['answer'],$row['timeoftry'],$row['ip']);
	array_push($result,$a);
	
	
	}
	header("Content-Type:text/json");
	echo json_encode($result);
	$stmt->close();




?>

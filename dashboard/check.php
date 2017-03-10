<?php

include '../common/con.php';
include '../common/auth.php';
$userdata=$_SESSION['userData'];
if($userdata['activated']==0)

{
header("Location:/");
exit;
}
if(isset($_POST))
{


$ansoriginal=$_POST['ans'];

$ans=$ansoriginal;
$id=$_SESSION['userData']['id'];



$ans = str_replace(' ', '', $ans);
$ans=strtolower($ans);

$res=fetchquery("SELECT * from leadersboard  where id=$id");
if($res!=null)
{
	$row=$res->fetch_assoc();
	$lvl=$row["lvlno"];
$lvl++;
	$stmt=$mysqli->prepare("INSERT into tried values(?,?,?,?,?);");
	$nowdate=date("Y-m-d H:i:s");
	$ip=get_ip();
	$stmt->bind_param("isiss",$id,$ansoriginal,$lvl,$nowdate,$ip  );
	$stmt->execute();
	$stmt->close();
	
	$res=fetchquery("SELECT * from levels where lvlno='$lvl';");
	
	
	if($res!=null)
	{
	
	$levelrow=$res->fetch_assoc();
	$answer=$levelrow['answer'];
	header("Content-Type:text/plain");
	if($answer==$ans)
	{
	$res=fetchquery("SELECT * from levels where lvlno>$lvl and enabled=1");
	if($res!=null)
	{
	
$nextlevelrow=$res->fetch_assoc();
$nextlevel=$nextlevelrow['lvlno'];
// changeed: above lines are not needed but not removing no neeed to calculate nextlevel
fetchquery("UPDATE  leadersboard SET lvlno='$lvl' where id='$id';");
	
	}
	echo "success";
	}
	else{
	echo "error";
	}
	
	}


}


}



?>

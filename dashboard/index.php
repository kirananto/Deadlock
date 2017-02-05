<?php
include '../common/header.php';
include '../common/con.php';
session_start();
$hash="";

$userdata=$_SESSION['userData'];
$email=$userdata['email'];
if(!isset($userdata['isadmin']))
{
	$res=fetchquery("SELECT * from admins where email='$email';");
	if($res->num_rows==1)
	{
	$_SESSION['userData']['isadmin']=1;

	}
	else{

	$_SESSION['userData']['isadmin']=0;

	}
}
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


<img src="img.php?img=<?php echo $hash; ?>"/>




<input type="text"></input>
<input type="button" onclick="sbmt_answer()";></input>





<?php


include '../common/foot.php';

?>




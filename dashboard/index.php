<?php
include '../common/auth.php';
include '../common/con.php';

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

if($_SESSION['userData']['isadmin'])
{
include '../common/adminheader.php';

}else{
include '../common/header.php';
}


$hash="";

$userdata=$_SESSION['userData'];
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
<script>

function sbmt_answer()
{
var txt=$('#anstxt').val();
$.post("check.php",{"ans":txt},function(data){
alert(data);
});


}
</script>

<img src="img.php?img=<?php echo $hash; ?>"/>




<input type="text" id="anstxt"></input>
<input type="button" onclick="sbmt_answer()";></input>





<?php


include '../common/foot.php';

?>




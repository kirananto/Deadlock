<?php
include 'common/con.php';
session_start();
if(!isset($_POST['mobno']))
{
header("Location:/");
exit;
}
if(!isset($_SESSION['userData']))
{

header("Location:/");
exit;
}
if($_SESSION['userData']['activated']==1)
{header("Location:/");exit;}

$mobno=$_POST['mobno'];
$lastname=$_POST['lname'];
$fname=$_POST['fname'];
$college=$_POST['college'];
$email1=$_POST['email'];
$email=$_SESSION['userData']['email'];

$id=$_SESSION['userData']['id'];


if(empty($mobno)) // phone number is not empty
{

header("Location:enterdetails.php?e=1");
exit;
}

if(empty($college)) // phone number is not empty
{

header("Location:enterdetails.php?e=3");
exit;
}

if(!preg_match('/^\d{10}$/',$mobno)){


header("Location:enterdetails.php?e=2");
exit;
}

/*$college=mysql_real_escape_string($college);
$mobno = mysql_real_escape_string($mobno);
$lastname=mysql_real_escape_string($lastname);
$fname = mysql_real_escape_string($fname); 
$email = mysql_real_escape_string($email); 
echo "UPDATE users set college='".$college."',phoneno=".$mobno.",last_name='".$lastname."',activated=1,first_name='".$fname."' where email='".$email."';";
exit;*/
$res=fetchquery("UPDATE users set college='".$college."',phoneno=".$mobno.",last_name='".$lastname."',activated=1,first_name='".$fname."' where email='".$email."';");

$res1=null;
if($res==null)
{
echo "Error complete ".$mysqli->error;
}
else{
	//if($_SESSION['userData']['activated']==1) {
//		$res1 = 12;
//	} else {
$res1=fetchquery("INSERT into leadersboard values($id,'".$fname.' '.$lastname."',0,'".date("Y-m-d H:i:s")."','".$college."');");
//}

}
if($res1!=null)

{


header("Location:/");
}

else{

echo "Error lead ".$mysqli->error;
}
?>

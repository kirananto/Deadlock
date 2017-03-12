<?php
include 'common/con.php';
session_start();
/*if(!isset($_SESSION['userData']))
{

header("Location:/");
exit;
}
if($_SESSION['userData']['activated']==1)
{header("Location:/");exit;}*/

$mobno=$_POST['mobno'];
$lastname=$_POST['lname'];
$fname=$_POST['fname'];
$college=$_POST['college'];
$email=$_POST['email'];
//$email=$_SESSION['userData']['email'];

$id=$_SESSION['userData']['id'];


if(empty($mobno)||empty($email)) // phone number is not empty
{

header("Location:MoreDetails.php?e=1");
exit;
}

if(empty($college)) // phone number is not empty
{

header("Location:MoreDetails.php?e=3");
exit;
}

if(!preg_match('/^\d{10}$/',$mobno)){


header("Location:MoreDetails.php?e=2");
exit;
}
$pattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/";
if(!preg_match($pattern,$email))
{

header("Location:MoreDetails.php?e=4");
exit;

}

/*echo "UPDATE users set college='".$college."',phoneno=".$mobno.",last_name='".$lastname."',activated=1,first_name='".$fname."' where email='".$email."';";
exit;*/
$res=fetchquery("UPDATE users set college='".$college."',email='".$email."',phoneno=".$mobno.",last_name='".$lastname."',activated=1,first_name='".$fname."' where id='".$id."';");

//$res1=null;
if($res==null)
{
echo "Error complete ".$mysqli->error;
}
else{
header("Location:/");



}
?>

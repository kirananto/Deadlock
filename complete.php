<?php
include 'common/con.php';
session_start();
if(!isset($_POST['mobno']))
{
header("Location:/");
}
if(!isset($_SESSION['userData']))
{

header("Location:/");

}
$mobno=$_POST['mobno'];
$lastname=$_POST['lname'];
$fname=$_POST['fname'];
$college=$_POST['college'];
$email=$_SESSION['userData']['email'];

$id=$_SESSION['userData']['id'];


if(empty($phoneNumber)||!empty($mobno)) // phone number is not empty
{

header("Location:enterdetails.php?e=1");

}
if(!preg_match('/^\d{10}$/',$phoneNumber)){


header("Location:enterdetails.php?e=2");

}

/*echo "UPDATE users set college='".$college."',phoneno=".$mobno.",last_name='".$lastname."',activated=1,first_name='".$fname."' where email='".$email."';";
exit;*/
$res=fetchquery("UPDATE users set college='".$college."',phoneno=".$mobno.",last_name='".$lastname."',activated=1,first_name='".$fname."' where email='".$email."';");
if($res==null)
{
echo "Error complete ".$mysqli->error;
}
$res1=fetchquery("INSERT into leadersboard values($id,'".$fname.' '.$lastname."',1,'".date("Y-m-d H:i:s")."','".$college."');");

if($res1!=null)

{


header("Location:/");
}

else{

echo "Error lead ".$mysqli->error;
}
?>

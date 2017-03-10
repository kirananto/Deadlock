<?php

session_start();
include('../common/con.php');

//admin check

if(!isset($_POST['lvlans']))
{

header("Location:index.php");
exit;

}
$userdata=$_SESSION['userData'];




?>

<?php 
 $lvlno = $_POST["lvlno"];
      $lvlans = $_POST["lvlans"];
$lvlstatus=$_POST["tog"];
if($lvlstatus!=1){$lvlstatus=0;}

    $imgisthere=0;
    
   if($_FILES['image']['size']!=0){
      $errors= array();
   

      $file_name = $_FILES['image']['name'];
      $file_size = $_FILES['image']['size'];
      $file_tmp = $_FILES['image']['tmp_name'];
      $file_type = $_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      $expensions= array("jpeg","jpg","png");
 
   
      
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
   

$_FILES['image']['name']=(string)rand(0,1989).$_FILES['image']['name'];   
      if($file_size > 2097152) {
         $errors[]='File size must be less than 2 MB';
      }


      if(empty($errors)==true) {
         if(move_uploaded_file($_FILES['image']['tmp_name'],"/var/www/html/levelsmade/".$_FILES['image']['name'])) {
          
         
      } else {
       echo("Couldn't Upload");
      }}else{
        $i = 0;
        $message= "";
        do{
        $message = $message.$errors[$i];
        $i++;
      } while(isset($errors[$i]));
      echo($message);
      exit;
      }
        
    $imgisthere=1;  
    }else{$imgisthere=0;}
      if($imgisthere)
      {
     
$f=$_FILES['image']['name'];
     if( fetchquery("UPDATE levels set answer='$lvlans',lvlimage='$f',enabled=$lvlstatus  where lvlno=".$lvlno )==null)
     {
     
     echo "failed";}
     
      
      }
      else{
      //echo "UPDATE levels set answer='$lvlans'  where lvlno=".$lvlno;
if(fetchquery("UPDATE levels set answer='$lvlans' ,enabled=$lvlstatus  where lvlno=".$lvlno )==null)
{
     
     echo "failed";}
     
         }
    header("Location:index.php");
?>

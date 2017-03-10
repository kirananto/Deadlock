<?php

session_start();
include('../common/con.php');

//admin check

if(!isset($_POST['lvlno']))
{

header("Location:index.php");
exit;

}
$userdata=$_SESSION['userData'];




?>

<?php

    $imgisthere=0;
   if(isset($_FILES['image'])){
      $errors= array();
      $levelno = $_POST["lvlno"];
      $lvlans = $_POST["lvlans"];
      $isenabled = $_POST["tog"];
      $file_name = $_FILES['image']['name'];
      $file_size = $_FILES['image']['size'];
      $file_tmp = $_FILES['image']['tmp_name'];
      $file_type = $_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      $expensions= array("jpeg","jpg","png");
      if($isenabled != 1){ $isenabled = 0;}
   
        $lvl = fetchquery("SELECT * from levels where lvlno = $levelno");
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152) {
         $errors[]='File size must be less than 2 MB';
      }

      if($lvl != null) {
      if($lvl->num_rows!=0)
      {
        $errors[]=' Level already exists';
        }
      }
      
      if(empty($errors)==true) {
         if(move_uploaded_file($_FILES['image']['tmp_name'],"/var/www/html/levelsmade/".$_FILES['image']['name'])) {
          
         
      } else {
        phpAlert("Couldn't Upload");
      }}else{
        $i = 0;
        $message= "";
        do{
        $message = $message.$errors[$i];
        $i++;
      } while($errors[$i]!= null);
      phpAlert($message);
      exit;
      }
        
    $imgisthere=1;  
    }else{$imgisthere=0;}
      if($imgisthere)
      {
      $id=$_POST['lvlno'];
$f=      $_FILES['images']['name'];
      fetchquery("UPDATE levels set answer=$answer,lvlimage=$f  where lvlno=".$id )
      
      }
      else{
      
fetchquery("UPDATE levels set answer=$answer   where lvlno=".$id )

         }
      header("Location:index.php");
?>

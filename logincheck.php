<?php 
session_start();
require_once  './connect/file.refer.connec.php';
 
$referConnect ="SELECT user_name,user_password FROM user_login WHERE user_name='".$_POST['userName']."' and user_password ='".$_POST['userPassword']."'"; 
$referQuery = mysqli_query($objconnect,$referConnect);

   while($referFetch = mysqli_fetch_array($referQuery))
{   
   if($referFetch['user_name']!='')   {   
 
    $_SESSION["userName"] = $referFetch['user_name']; 
    ?>

<script>
location.href = "./indexfromuse.php";
</script>


<?php  }
      }  ?>
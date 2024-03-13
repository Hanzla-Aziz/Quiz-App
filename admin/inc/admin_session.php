<?php 
if(isset($_SESSION['is_login'])){
    if($_SESSION['is_login'] != 1){
      header('Location: ../logout.php');
    }
}
//elseif($session_role != 'super admin'){
if($_SESSION['user_role'] != 'admin'){
    header('Location: ../logout.php');
}
?>
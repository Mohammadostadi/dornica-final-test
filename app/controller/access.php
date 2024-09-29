<?php 

if(!isset($_SESSION['user'])){
    header('Location:../../auth/sign-in.php');
}

?>
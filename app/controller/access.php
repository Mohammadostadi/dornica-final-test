<?php 

if(!isset($_SESSION['user'])){
    header('Location:../../auth/sign-in.php');
}


if(basename($_SERVER['PHP_SELF']) != 'index.php' and basename($_SERVER['PHP_SELF']) != 'admin_access.php'){
    $access = explode('.',basename($_SERVER['PHP_SELF']));
    if(!has_admin_access($_SESSION['user'], $access[0]))
        header('Location:../../index.php');
}

?>
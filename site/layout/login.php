<?php 

if (isset($_POST['btn_login'])) {
    $username = checkDataSecurity($_POST['username']);
    $password = checkDataSecurity($_POST['password']);
    if ($username != '') {
        $checkMemberExist = $db->where('username', $username)
            ->getOne('members', 'username, password');
        if (!is_null($checkMemberExist) and password_verify($password, $checkMemberExist['password'])) {
            $_SESSION['member'] = $username;
            header("Location:$SITE_PATH/panel/my-profile.php");
        } else {
            header("Location:".$_SERVER['PHP_SELF'].'?ok=4');
        }
    }
}

?>
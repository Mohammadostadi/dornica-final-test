<?php
require_once('../../../app/connection/DB.php');

require_once('../../../app/controller/function.php');
require_once('../../../app/controller/access.php');
require_once('../../../app/helper/jdf.php');

$errors = [];

if (isset($_POST['changePassword'])) {
    $newPassword = checkDataSecurity($_POST['newPass']);
    $confirmPassword = checkDataSecurity($_POST['confirmPassword']);

    checkDataEmpty($newPassword, 'newPass', 'فیلد رمز عبور جدید نمیتواند خالی باشد.');
    checkDataEmpty($confirmPassword, 'confirmPassword', 'فیلد تایید رمز عبور نمیتواند خالی باشد.');

    if ($newPassword != $confirmPassword)
        setErrorMessage('confirmPassword', 'رمز عبور جدید با تایید رمز عبور مطابقت ندارند.');

    if (count($errors) == 0) {
        $db->where('id', checkDataSecurity($_GET['id']))
            ->update('members', [
                'password' => password_hash($newPassword, PASSWORD_DEFAULT)
            ]);

        $query = $db->getLastQuery();
        $db->insert('logs', [
            'admin_id' => $_SESSION['user'],
            'table_name' => 'members',
            'changes' => $query,
            'type' => 2,
            'date' => $date
        ]);
        header('Location:members_list.php?ok=5');
    }
}


?>

<!doctype html>
<html lang="en" dir="rtl">


<!-- Mirrored from codetheme.ir/onedash/demo/rtl/authentication-reset-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 May 2024 08:56:30 GMT -->

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="../assets/images/favicon-32x32.png" type="image/png" />
    <?php require_once("../../layout/css.php"); ?>

    <title>تغییر رمز عبور</title>

</head>

<body>
    <div class="wrapper">

        <?php require_once("../../layout/header.php"); ?>

        <?php require_once("../../layout/asidebar.php"); ?>

        <main class="page-content">

            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">کاربر</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page"> تغییر رمز عبور </li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="card-body py-3 mt-5 w-100 d-flex justify-content-center ">
                <div class="row d-flex justify-content-center w-100 ">
                    <div class="col-12 col-lg-4 d-flex w-100 ">
                        <div class="card border shadow-none w-100">
                            <div class="card-body w-100 ">
                                <?php if (isset($_GET['id'])) {
                                    $member = $db->where('id', checkDataSecurity($_GET['id']))
                                        ->getOne('members', 'fname, lname, username');

                                    ?>
                                    <h6 class="fw-bold">
                                        <?= !empty($member) ? $member['fname'] . ' ' . $member['lname'] . ' ' : "" ?>
                                        (<span class="text-primary"><?= ($member['username']) ?></span>)
                                    </h6>
                                <?php } ?>
                                <form class="form-body needs-validation" novalidate action="" method="post" id="form">
                                    <div class="row g-3 ">
                                        <div class="row g-3  ">
                                            <div class=" d-flex justify-content-center mt-4 ">
                                                <div class="col-sm-12 col-xs-8 col-lg-8 col-md-8">
                                                    <label for="newPass" class="form-label">رمز عبور جدید</label>
                                                    <div>
                                                        <div class="position-absolute top-50 translate-middle-y">
                                                        </div>
                                                        <input type="password" class="form-control radius-30 ps-5"
                                                            id="newPass" name="newPass" value=""
                                                            placeholder="رمز عبور جدید را وارد کنید" required>
                                                        <div class="invalid-feedback">
                                                            فیلد رمز عبور جدید خالی باشد
                                                        </div>
                                                        <div class="text-danger">
                                                            <?= checkDataErrorExist('newPass') ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-center mt-4 ">
                                                <div class="col-sm-12 col-xs-8 col-lg-8 col-md-8">
                                                    <label for="ConfirmPassword" class="form-label">رمز عبور را
                                                        تایید
                                                        کنید</label>
                                                    <div class="ms-auto position-relative">
                                                        <div class="position-absolute top-50 translate-middle-y">
                                                        </div>
                                                        <input type="password" class="form-control radius-30 ps-5"
                                                            id="confirmPassword" name="confirmPassword" value=""
                                                            placeholder="رمز عبور را تایید کنید" required>
                                                        <div class="invalid-feedback">
                                                            فیلد تایید رمز عبور خالی باشد
                                                        </div>
                                                        <div class="text-danger">
                                                            <?= checkDataErrorExist('confirmPassword') ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-row justify-content-center ">
                                                <button type="submit" name="changePassword"
                                                    class="btn col-xxl-4 col-xl-12 col-lg-4 col-md-4 row-sm-12 col-xs-8  btn-primary radius-30 mt-4">رمز
                                                    عبور را
                                                    تغییر دهید</button>
                                                <a type="submit"
                                                    onclick="location.href='<?= isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '../../index.php' ?>'"
                                                    class="btn col-xxl-4 col-xl-12 col-lg-4 col-md-4 row-sm-12 col-xs-8  btn-light radius-30 mt-4 mx-1">بازگشت</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php require_once("../../layout/footer.php"); ?>
        </main>
    </div>
    <?php require_once("../../layout/js.php"); ?>
    <script src="../../../assets/js/validation.js" ></script>

    <!-- Mirrored from codetheme.ir/onedash/demo/rtl/authentication-reset-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 May 2024 08:56:30 GMT -->

</html>
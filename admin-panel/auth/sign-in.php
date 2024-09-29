<?php
require_once('../../app/connection/DB.php');
require_once('../../app/controller/function.php');
if(isset($_SESSION['user']) and $_SESSION['user'] != '')
    header('Location:../index.php');
$errors = [];
if (isset($_POST['sign_in'])) {
    $username = checkDataSecurity($_POST['username']);
    $password = checkDataSecurity($_POST['password']);
    $captcha = checkDataSecurity($_POST['captcha']);

    checkDataEmpty($username, 'username', 'فیلد نام کاربری خالی میباشد.');
    checkDataEmpty($password, 'password', 'فیلد رمز عبور خالی میباشد.');
    checkDataEmpty($captcha, 'captcha', 'فیلد کپچا خالی میباشد.');

    if ($captcha != '' and $_SESSION['captcha_text'] != $captcha) {
        setErrorMessage('captcha', 'کد با تصویر مطابقت ندارد.');
        unset($_SESSION['captcha_text']);
    }

    if (count($errors) == 0) {
        $checkUsernameExist = $db->where('username', $username)
            ->getValue('admins', 'COUNT(id)');
        if ($checkUsernameExist == 0) {
            setErrorMessage('username', 'نام کاربری شما وجود ندارد.');
        } elseif ($checkUsernameExist == 1) {
            $databasePassword = $db->where('username', $username)
                ->getValue('admins', 'password');
            if (password_verify($password, $databasePassword)) {
                $user = $db->where('username', $username)
                    ->getOne('admins', 'id, role, status');
                $_SESSION['user'] = $user['id'];
                $_SESSION['user_role'] = $user['role'];
                if ($user['status'] == 1) {
                    header('Location:../index.php');
                } else {
                    setErrorMessage('status', 'شما اجازه دسترسی به پنل را ندارید');
                }
            } else {
                setErrorMessage('password', 'رمز عبور شما درست نمیباشد.');
            }
        }
    }
}
?>

<!doctype html>
<html lang="en" dir="rtl">


<!-- Mirrored from codetheme.ir/onedash/demo/rtl/authentication-signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 May 2024 08:56:28 GMT -->

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../assets/images/favicon-32x32.png" type="image/png" />
    <!-- Bootstrap CSS -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/bootstrap-extended.css" rel="stylesheet" />
    <link href="../assets/css/style.css" rel="stylesheet" />
    <link href="../assets/css/icons.css" rel="stylesheet">
    <link href="../assets/fonts/googlefonts.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/fonts/bootstrap-icons.css">

    <!-- loader-->
    <link href="../assets/css/pace.min.css" rel="stylesheet" />

    <title>ورود</title>
</head>

<body>

    <!--start wrapper-->
    <div class="wrapper">

        <!--start content-->
        <main class="authentication-content">
            <div class="container-fluid">
                <div class="authentication-card">
                    <div class="card shadow rounded-0 overflow-hidden">
                        <div class="row g-0">
                            <div class="col-lg-6 bg-login d-flex align-items-center justify-content-center">
                                <img src="../assets/images/error/login-img.jpg" class="img-fluid" alt="">
                            </div>
                            <div class="col-lg-6">
                                <div class="card-body p-4 p-sm-5">
                                    <div><?= isset($_SESSION['newPassword']) ? 'رمز عبور جدید شما:'.$_SESSION['newPassword'] : "" ?></div>
                                    <?php if (isset($errors['status']) and $errors['status'] != '') { ?>
                                        <div class="alert text-center alert-danger text-danger radius-30 px-3 py-2 my-2">
                                            <?= checkDataErrorExist('status') ?></div>
                                    <?php } ?>
                                    <h5 class="card-title">ورود</h5>
                                    <p class="card-text mb-5">رشد خود را ببینید و پشتیبانی مشاوره دریافت کنید!</p>
                                    <form class="form-body needs-validation" novalidate action="" method="post">
                                        <div class="d-grid">
                                            <a class="btn btn-white radius-30" href="javascript:;"><span
                                                    class="d-flex justify-content-center align-items-center">
                                                    <img class="me-2" src="../assets/images/icons/search.svg" width="16"
                                                        alt="">
                                                    <span>با گوگل وارد شوید</span>
                                                </span>
                                            </a>
                                        </div>
                                        <div class="login-separater text-center mb-4"> <span>یا با ایمیل وارد
                                                شوید</span>
                                            <hr>
                                        </div>
                                        <div class="row g-3">
                                            <div class="col-12">
                                                <label for="inputEmailAddress" class="form-label">نام کاربری</label>
                                                <div class="ms-auto position-relative">
                                                    <div
                                                        class="position-absolute top-50 translate-middle-y search-icon px-3">
                                                        <i class="bi bi-person-fill"></i>
                                                    </div>
                                                    <input type="username" name="username"
                                                        class="form-control radius-30 ps-5" id="inputEmailAddress"
                                                        value="<?= (isset($_POST['username'])) ? $_POST['username'] : "" ?>"
                                                        placeholder="نام کاربری" required>
                                                    <div class="invalid-feedback">
                                                        فیلد نام کاربری خالی باشد
                                                    </div>
                                                    <div class="text-danger"><?= checkDataErrorExist('username') ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label for="inputChoosePassword" class="form-label">رمز عبور را وارد
                                                    کنید</label>
                                                <div class="ms-auto position-relative">
                                                    <div
                                                        class="position-absolute top-50 translate-middle-y search-icon px-3">
                                                        <i class="bi bi-lock-fill"></i>
                                                    </div>
                                                    <input type="password" name="password"
                                                        class="form-control radius-30 ps-5" id="inputChoosePassword"
                                                        placeholder="رمز عبور را وارد کنید" required>
                                                    <div class="invalid-feedback">
                                                        فیلد رمز عبور خالی باشد
                                                    </div>
                                                    <div class="text-danger"><?= checkDataErrorExist('password') ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="col-12 mt-0">

                                                <!-- <label for="inputChoosePassword" class="form-label">رمز عبور را وارد کنید</label> -->
                                                <div class="  row">
                                                    <!-- <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-lock-fill"></i></div> -->
                                                    <div class="col-5 d-flex justify-content-center align-items-center">

                                                        <i class="mx-2 lni lni-reload refresh-captcha"></i>
                                                        <img src="captcha.php" alt="CAPTCHA" class="captcha-image">
                                                    </div>
                                                    <div class="col-7">

                                                        <input type="text" name="captcha" class="form-control radius-30"
                                                            placeholder="کد را وارد کنید" required>
                                                        <div class="invalid-feedback">
                                                            کد را وارد کنید
                                                        </div>
                                                        <div class="text-danger"><?= checkDataErrorExist('captcha') ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-check form-switch">
                                                    <a href="../../index.php">رفتن به سایت</a>
                                                </div>
                                            </div>
                                            <div class="col-6 text-end"> <a href="forgot_password.php">رمز عبور را
                                                    فراموش کرده اید؟</a>
                                            </div>
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button type="submit" name="sign_in"
                                                        class="btn btn-primary radius-30">ورود</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <!--end page main-->

    </div>
    <!--end wrapper-->


    <!--plugins-->
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/pace.min.js"></script>

    <script>
        $(document).ready(function () {
            $("#alert").fadeTo(2000, 500).slideUp(500, function () {
                $("#alert").slideUp(500);
            });
        });
    </script>
    <script>
        (() => {
            'use strict'
            const forms = document.querySelectorAll('.needs-validation')
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>

    <script>
        const refreshButton = document.querySelector(".refresh-captcha");
        refreshButton.onclick = function () {
            document.querySelector(".captcha-image").src = 'captcha.php?' + Date.now();
        }
    </script>
    <script>
        $('.alert').fadeTo(2000, 500).slideUp(500, function () {
            $(".alert").slideUp(500);
        });
    </script>
</body>


<!-- Mirrored from codetheme.ir/onedash/demo/rtl/authentication-signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 May 2024 08:56:29 GMT -->

</html>
<?php
require_once('../../app/connection/DB.php');
require_once('../../app/controller/city_show.php');
require_once('../../app/controller/function.php');
require_once('../../app/helper/view.php');
require_once('../../app/helper/jdf.php');


$errors = [];




if (isset($_POST['_delete_password'])) {
    $username = checkDataSecurity($_POST['username']);

    checkDataEmpty($username, 'username', 'نام کاربری شما نمیتواند خالی باشد.');
    
    if (count($errors) == 0) {
        $check = $db->where('username', $username)
        ->getValue('members', 'COUNT(id)');
        if($check == 1){
            $db->where('username', $username)
            ->update('members', [
                'password' => null,
            ]);
            $_SESSION['member'] = $username;
            header('Location:../panel/reset_password.php');
        }
        setErrorMessage('username', 'نام کاربری وجود ندارد.');
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require_once('../layout/css.php') ?>
    <style>
        .list {
            width: 100%;
        }
    </style>
</head>

<body>
    <!-- Preloader Start -->
    <?php require_once('../layout/loader.php') ?>
    <div class="main-wrap">
        <?php
        require_once('../layout/sidebar.php');
        require_once('../layout/header.php');

        ?>
        <div class="card">
            <div class="card-body">
                <div class="border p-3 rounded">
                    <h6 class="mb-0 text-uppercase">فراموشی رمز عبور</h6>
                    <hr />
                    <form class="row g-3 needs-validation" novalidate action="" method="post">
                        <div class="col-lg-6 mt-3">
                            <label class="form-label">نام کاربری</label>
                            <span class="text-danger">*</span>
                            <input type="text" class="form-control text-end" name="username" value="<?= checkInputDataValue('username') ?>" oninput='usernamejs(this)'
                                required>
                            <div class="invalid-feedback">
                                فیلد نام کاربری نباید خالی باشد
                            </div>
                            <div class="text-danger"><?= checkDataErrorExist('username') ?></div>
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <div class="row">
                                <div class="col-6">
                                    <div class="d-grid">
                                        <a href="<?= isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : "../../index.php" ?>"
                                            class="btn btn-danger">برگشت</a>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary" name="_delete_password">ادامه</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php require_once('../layout/js.php') ?>

    <script>
        (() => {
            "use strict";
            const forms = document.querySelectorAll(".needs-validation");
            Array.from(forms).forEach((form) => {
                form.addEventListener(
                    "submit",
                    (event) => {
                        if (!form.checkValidity()) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add("was-validated");
                    },
                    false
                );
            });
        })();
    </script>
    <script>
        function usernamejs(input) {
            input.value = input.value.replace(/[^a-zA-Z0-9@_-]/g, "");
        }
    </script>
</body>

</html>
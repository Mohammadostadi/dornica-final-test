<?php
require_once('../../../app/connection/DB.php');

require_once('../../../app/controller/function.php');
require_once('../../../app/controller/access.php');
require_once('../../../app/helper/jdf.php');

$id = checkDataSecurity($_GET['id']);
$errors = [];

$admin = $db->where('id', $id)
    ->getOne('admins', 'id, fname, lname, role, username');


if (isset($_POST['_update'])) {
    $fname = checkDataSecurity($_POST['fname']);
    $lname = checkDataSecurity($_POST['lname']);
    $username = checkDataSecurity($_POST['username']);
    $role = checkDataSecurity($_POST['role']);

    checkDataEmpty($fname, 'fname', 'فیلد نام شما خالی میباشد.');
    checkDataEmpty($lname, 'lname', 'فیلد نام خانوادگی شما خالی میباشد.');
    checkDataEmpty($username, 'username', 'فیلد نام کاربری شما خالی میباشد.');
    checkDataEmpty($role, 'role', 'فیلد نقش شما خالی میباشد.');
    checkUniqData($username, 'username', 'admins', 'فیلد نام کاربری تکراری میباشد.', $admin['username']);


    if (count($errors) == 0) {
        $db->where('id', $id)
            ->update('admins', [
                'fname' => $fname,
                'lname' => $lname,
                'username' => $username,
                'role' => $role,
                'status' => 1
            ]);
        $query = $db->getLastQuery();
        $db->insert('logs', [
            'admin_id' => $_SESSION['user'],
            'table_name' => 'admins',
            'changes' => $query,
            'type' => 2,
            'date' => $date
        ]);
        header('Location:admins_list.php?ok=2');
    }
}

?>
<!doctype html>
<html lang="en" dir="rtl">


<!-- Mirrored from codetheme.ir/onedash/demo/rtl/form-layouts.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 May 2024 08:56:22 GMT -->

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
    require_once('../../layout/css.php');
    ?>
    <title>بروزرسانی ادمین</title>
</head>

<body>

    <div class="wrapper container my-5">
        <main class="page-content">
            <?php
            require_once('../../layout/header.php');
            require_once('../../layout/asidebar.php');
            ?>
            <!--start content-->
            <div class="card">
                <div class="card-body">
                    <div class="border p-3 rounded">
                        <h6 class="mb-0 text-uppercase">بروزرسانی ادمین</h6>
                        <hr />
                        <form class="row g-3 needs-validation" action="" method="post" novalidate
                            enctype="multipart/form-data">
                            <div class="col-lg-6 ">
                                <label class="form-label">نام </label>
                                <span class="text-danger">*</span>
                                <input value="<?= checkInputDataValue('fname', $admin['fname']) ?>" type="text"
                                    class="form-control" name="fname" required>
                                <div class="invalid-feedback">
                                    فیلد نام نباید خالی باشد
                                </div>
                                <div class="text-danger"><?= checkDataErrorExist('fname') ?></div>
                            </div>
                            <div class="col-lg-6 ">
                                <label class="form-label">نام خانوادگی</label>
                                <span class="text-danger">*</span>
                                <input value="<?= checkInputDataValue('lname', $admin['lname']) ?>" type="text"
                                    class="form-control" name="lname" required>
                                <div class="invalid-feedback">
                                    فیلد نام خانوادگی نباید خالی باشد
                                </div>
                                <div class="text-danger"><?= checkDataErrorExist('lname') ?></div>
                            </div>
                            <div class="col-lg-6 ">
                                <label class="form-label">نام کاربری</label>
                                <span class="text-danger">*</span>
                                <input value="<?= checkInputDataValue('username', $admin['username']) ?>" type="text"
                                    class="form-control" name="username" required>
                                <div class="invalid-feedback">
                                    فیلد نام کاربری نباید خالی باشد
                                </div>
                                <div class="text-danger"><?= checkDataErrorExist('username') ?></div>
                            </div>
                            <div class="col-lg-6 ">
                                <label class="form-label">نقش</label>
                                <span class="text-danger">*</span>
                                <select name="role" class="form-select" id="role" required>
                                    <?php if ($admin['role'] == 0) { ?>
                                        <option selected value="0">مدیر</option>
                                    <?php } else { ?>
                                        <option value="" selected>نقش</option>
                                        <option <?= ((isset($_POST['role']) and $_POST['role'] == 1) or ($admin['role'] == 1)) ? "SELECTED" : "" ?> value="1">
                                            ادمین</option>
                                        <option <?= ((isset($_POST['role']) and $_POST['role'] == 2) or ($admin['role'] == 2)) ? "SELECTED" : "" ?> value="2">
                                            اپراتور</option>
                                    <?php } ?>
                                </select>
                                <div class="invalid-feedback">
                                    فیلد نقش را انتخاب کنید
                                </div>
                                <div class="text-danger"><?= checkDataErrorExist('role') ?></div>
                            </div>
                            <div class="col-lg-12 d-flex justify-content-end">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="d-grid">
                                            <a class="btn btn-danger" href="admins_list.php">برگشت</a>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-primary"
                                                name="_update">بروزرسانی</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--end page main-->

        </main>
    </div>
    <!--start wrapper-->
    <?php
    require_once('../../layout/js.php');
    ?>
    <script src="assets/js/admin_add_page.js"></script>
    <!--end wrapper-->
</body>
<!-- Mirrored from codetheme.ir/onedash/demo/rtl/form-layouts.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 May 2024 08:56:22 GMT -->

</html>
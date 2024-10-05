<?php
require_once('../../../app/connection/DB.php');

require_once('../../../app/controller/function.php');
require_once('../../../app/controller/access.php');
require_once('../../../app/helper/jdf.php');

$errors = [];
$provincesList = $db->where('status', 1)
    ->orderBy('name', 'ASC')
    ->get('provinces', null, 'id, name');
if (isset($_POST['_insert'])) {
    $name = checkDataSecurity($_POST['name']);
    $province = checkDataSecurity($_POST['province']);

    checkDataEmpty($name, 'name', 'فیلد نام شهر شما خالی میباشد.');
    checkDataEmpty($province, 'province', 'فیلد استان شما خالی میباشد.');

    if (count($errors) == 0) {
        $db->insert('cities', [
            'name' => $name,
            'province_id'=>$province,
            'sort' => getMaxField('cities', 'sort'),
            'status' => 1
        ]);
        $query = $db->getLastQuery();
        $db->insert('logs', [
            'admin_id' => $_SESSION['user'],
            'table_name' => 'cities',
            'changes' => $query,
            'type' => 0,
            'date' => $date
        ]);
        header('Location:cities_list.php?ok=0');
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
    <title>افزودن شهر</title>
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
                        <h6 class="mb-0 text-uppercase">اضافه کردن شهر</h6>
                        <hr />
                        <form class="row g-3 needs-validation" action="" method="post" novalidate
                            enctype="multipart/form-data" a>
                            <div class="col-lg-6 ">
                                <label class="form-label">استان</label>
                                <span class="text-danger">*</span>
                                <select class="form-select" name="province" id="province" required >
                                    <option value="">استان را انتخاب کنید</option>
                                    <?php foreach ($provincesList as $province) { ?>
                                        <option <?= (isset($_POST['province']) and $_POST['province'] == $province['id']) ? "SELECTED" : "" ?>
                                            value="<?= $province['id'] ?>"><?= $province['name'] ?></option>
                                    <?php } ?>
                                </select>
                                <div class="invalid-feedback">
                                    فیلد استان نباید خالی باشد
                                </div>
                                <div class="text-danger">
                                        <?= checkDataErrorExist('province') ?>
                                </div>
                            </div>
                            <div class="col-lg-6 ">
                                <label class="form-label">نام شهر </label>
                                <span class="text-danger">*</span>
                                <input value="<?= checkInputDataValue('name') ?>" type="text" class="form-control" name="name" required>
                                <div class="invalid-feedback">
                                    فیلد نام نباید خالی باشد
                                </div>
                                <div class="text-danger">
                                        <?= checkDataErrorExist('name') ?>
                                </div>
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
                                            <button type="submit" class="btn btn-primary" name="_insert">ثبت</button>
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
    <!--end wrapper-->
</body>
<!-- Mirrored from codetheme.ir/onedash/demo/rtl/form-layouts.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 May 2024 08:56:22 GMT -->

</html>
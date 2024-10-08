<?php
require_once('../../../app/connection/DB.php');

require_once('../../../app/controller/function.php');
require_once('../../../app/controller/access.php');
require_once('../../../app/helper/jdf.php');
$id = checkDataSecurity($_GET['id']);
$errors = [];
$provincesList = $db->where('status', 1)
    ->orderBy('name', 'ASC')
    ->get('provinces', null, 'id, name');
if (isset($_POST['_update'])) {
    $name = checkDataSecurity($_POST['name']);
    $province = checkDataSecurity($_POST['province']);
    $sort = checkDataSecurity($_POST['sort']);

    checkDataEmpty($name, 'name', 'فیلد نام شهر شما خالی میباشد.');
    checkDataEmpty($name, 'name', 'فیلد ترتیب شهر شما خالی میباشد.');
    checkDataEmpty($province, 'province', 'فیلد استان شما خالی میباشد.');

    if (count($errors) == 0) {
        $db->where('id', $id)
        ->update('cities', [
            'name' => $name,
            'province_id'=>$province,
            'sort' => $sort,
            'status' => 1
        ]);
        $query = $db->getLastQuery();
        $db->insert('logs', [
            'admin_id' => $_SESSION['user'],
            'table_name' => 'cities',
            'changes' => $query,
            'type' => 2,
            'date' => $date
        ]);
        header('Location:cities_list.php?ok=2');
    }
}

$city = $db->where('id', $id)
->getOne('cities', 'id, name, province_id, sort');


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
    <title>بروزرسانی شهر</title>
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
                        <h6 class="mb-0 text-uppercase">بروزرسانی شهر</h6>
                        <hr />
                        <form class="row g-3 needs-validation" action="" method="post" novalidate
                            enctype="multipart/form-data" a>
                            <div class="col-lg-6 ">
                                <label class="form-label">استان</label>
                                <span class="text-danger">*</span>
                                <select class="form-select" name="province" id="province" required >
                                    <option value="">استان را انتخاب کنید</option>
                                    <?php foreach ($provincesList as $province) { ?>
                                        <option <?= ((isset($_POST['province']) and $_POST['province'] == $province['id']) or ($city['province_id'] == $province['id'])) ? "SELECTED" : "" ?>
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
                                <input value="<?= checkInputDataValue('name', $city['name']) ?>" type="text" class="form-control" name="name" required>
                                <div class="invalid-feedback">
                                    فیلد نام نباید خالی باشد
                                </div>
                                <div class="text-danger">
                                        <?= checkDataErrorExist('name') ?>
                                </div>
                            </div>
                            <div class="col-lg-6 ">
                                <label class="form-label">ترتیب شهر </label>
                                <span class="text-danger">*</span>
                                <input value="<?= checkInputDataValue('sort', $city['sort']) ?>" type="text" class="form-control" name="name" required>
                                <div class="invalid-feedback">
                                    فیلد ترتیب نباید خالی باشد
                                </div>
                                <div class="text-danger">
                                        <?= checkDataErrorExist('sort') ?>
                                </div>
                            </div>
                            <div class="col-lg-12 d-flex justify-content-end">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="d-grid">
                                            <a class="btn btn-danger" href="cities_list.php">برگشت</a>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-primary" name="_update">بروزرسانی</button>
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
    <script src="../../../assets/js/validation.js" ></script>
    <!--end wrapper-->
</body>
<!-- Mirrored from codetheme.ir/onedash/demo/rtl/form-layouts.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 May 2024 08:56:22 GMT -->

</html>
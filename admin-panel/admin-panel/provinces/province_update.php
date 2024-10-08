<?php
require_once('../../../app/connection/DB.php');

require_once('../../../app/controller/function.php');
require_once('../../../app/controller/access.php');
require_once('../../../app/helper/jdf.php');
$id = checkDataSecurity($_GET['id']);
$errors = [];

if (isset($_POST['_update'])) {
    $name = checkDataSecurity($_POST['name']);
    $sort = checkDataSecurity($_POST['sort']);

    checkDataEmpty($name, 'name', 'فیلد نام استان شما خالی میباشد.');
    checkDataEmpty($sort, 'sort', 'فیلد ترتیب استان شما خالی میباشد.');

    if (count($errors) == 0) {
        $db->where('id', $id)
        ->update('provinces', [
            'name' => $name,
            'sort' => $sort,
            'status' => 1
        ]);
        $query = $db->getLastQuery();
        $db->insert('logs', [
            'admin_id' => $_SESSION['user'],
            'table_name' => 'provinces',
            'changes' => $query,
            'type' => 2,
            'date' => $date
        ]);
        header('Location:provinces_list.php?ok=2');
    }
}

$province = $db->where('id', $id)
->getOne('provinces', 'id, name, sort');


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
    <title>بروزرسانی استان</title>
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
                        <h6 class="mb-0 text-uppercase"> بروزرسانی استان</h6>
                        <hr />
                        <form class="row g-3 needs-validation" action="" method="post" novalidate
                            enctype="multipart/form-data" a>
                            <div class="col-lg-6 ">
                                <label class="form-label">نام استان </label>
                                <span class="text-danger">*</span>
                                <input value="<?= checkInputDataValue('name', $province['name']) ?>" type="text" class="form-control" name="name" required>
                                <div class="invalid-feedback">
                                    فیلد نام نباید خالی باشد
                                </div>
                                <div class="text-danger"><?= checkDataErrorExist('name') ?></div>
                            </div>
                            <div class="col-lg-6 ">
                                <label class="form-label">ترتیب استان </label>
                                <span class="text-danger">*</span>
                                <input value="<?= checkInputDataValue('sort', $province['sort']) ?>" type="text" class="form-control" name="sort" required>
                                <div class="invalid-feedback">
                                    فیلد ترتیب نباید خالی باشد
                                </div>
                                <div class="text-danger"><?= checkDataErrorExist('sort') ?></div>
                            </div>
                            <div class="col-lg-12 d-flex justify-content-end">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="d-grid">
                                            <a class="btn btn-danger" href="provinces_list.php">برگشت</a>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-primary" name="ـupdate">بروزرسانی</button>
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
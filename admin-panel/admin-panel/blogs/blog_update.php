<?php
require_once('../../../app/connection/DB.php');

require_once('../../../app/controller/function.php');
require_once('../../../app/controller/access.php');
require_once('../../../app/helper/jdf.php');

$id = checkDataSecurity($_GET['id']);
$editBlog = $db->where('id', $id)
    ->getOne('blogs');

$errors = [];
$categoriesList = $db->where('status', 1)
    ->orderBy('name', 'ASC')
    ->get('categories', null, 'id, name');
if (isset($_POST['_update'])) {
    $title = checkDataSecurity($_POST['title']);
    $category = checkDataSecurity($_POST['category']);
    $description = checkDataSecurity($_POST['description']);
    $full_description = checkDataSecurity($_POST['full_description']);
    $newDate = checkDataSecurity($_POST['date']);
    $lastImage = $db->where('id', $id)
        ->getValue('blogs', 'image');

    checkDataEmpty($title, 'title', 'فیلد نام خبر شما خالی میباشد.');
    checkDataEmpty($category, 'category', 'فیلد دسته بندی شما خالی میباشد.');
    checkDataEmpty($description, 'description', 'فیلد چکیده شما خالی میباشد.');
    checkDataEmpty($full_description, 'full_description', 'فیلد توضیحات شما خالی میباشد.');
    checkDataEmpty($newDate, 'date', 'فیلد تاریخ خبر شما خالی میباشد.');


    if (isset($_FILES['image']) and !empty($_FILES['image']['name'])) {
        $dir = '../../../attachment/imgs/blogs/';
        $image = $_FILES['image']['tmp_name'];
        $image_name = rand() . $_FILES['image']['name'];
        $source_properties = getimagesize($image);
        $image_type = $source_properties['mime'];
        checkImage($_FILES['image']);
    }

    if (count($errors) == 0) {
        if (isset($image_name)) {
            $target_file = $dir . $image_name;
            if (!is_null($lastImage) and file_exists($dir . $lastImage))
                unlink($dir . $lastImage);
            move_uploaded_file($image, $target_file);
        }
        $db->where('id', $id)
            ->update('blogs', [
                'title' => $title,
                'blog_category' => $category,
                'description' => $description,
                'full_description' => $full_description,
                'image' => (isset($image_name) and !empty($image_name)) ? $image_name : $lastImage,
                'date' => $newDate,
                'updated_at' => $date,
                'admin_id' => $_SESSION['user'],
                'status' => 1
            ]);
        $query = $db->getLastQuery();
        $db->insert('logs', [
            'admin_id' => $_SESSION['user'],
            'table_name' => 'blogs',
            'changes' => $query,
            'type' => 2,
            'date' => $date
        ]);
        header('Location:blogs_list.php?ok=2');
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
    <link type="text/css" rel="stylesheet" href="../../assets/datePiker/css/persianDatepicker-default.css" />
    <title>بروزرسانی خبر</title>
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
                        <h6 class="mb-0 text-uppercase">بروزرسانی کردن خبر</h6>
                        <hr />
                        <form class="row g-3 needs-validation" action="" method="post" novalidate
                            enctype="multipart/form-data" enctype="multipart/form-data" a>
                            <div class="col-lg-6 ">
                                <label class="form-label">دسته بندی</label>
                                <span class="text-danger">*</span>
                                <select class="form-select" name="category" id="category" required>
                                    <option value="">دسته بندی را انتخاب کنید</option>
                                    <?php foreach ($categoriesList as $category) { ?>
                                        <option <?= ((isset($_POST['category']) and $_POST['category'] == $category['id']) or ($editBlog['blog_category'] == $category['id'])) ? "SELECTED" : "" ?>
                                            value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                                    <?php } ?>
                                </select>
                                <div class="invalid-feedback">
                                    فیلد دسته بندی نباید خالی باشد
                                </div>
                                <div class="text-danger">
                                    <?= checkDataErrorExist('category') ?>
                                </div>
                            </div>
                            <div class="col-lg-6 ">
                                <label class="form-label">عنوان خبر </label>
                                <span class="text-danger">*</span>
                                <input type="text" class="form-control" name="title"
                                    value="<?= checkInputDataValue('title', $editBlog['title']) ?>" required>
                                <div class="invalid-feedback">
                                    فیلد نام نباید خالی باشد
                                </div>
                                <div class="text-danger">
                                    <?= checkDataErrorExist('title') ?>
                                </div>
                            </div>
                            <div class="col-lg-6 ">
                                <label class="form-label">تاریخ خبر </label>
                                <span class="text-danger">*</span>
                                <input type="text" dir="ltr" class="form-control date" name="date"
                                    value="<?= checkInputDataValue('date', $editBlog['date']) ?>" required>
                                <div class="invalid-feedback">
                                    فیلد تاریخ نباید خالی باشد
                                </div>
                                <div class="text-danger">
                                    <?= checkDataErrorExist('date') ?>
                                </div>
                            </div>

                            <div class="col-lg-6 ">
                                <label class="form-label">تصویر </label>
                                <input type="file" class="form-control" name="image">
                                <div class="text-danger">
                                    <?= checkDataErrorExist('image') ?>
                                </div>
                            </div>
                            <div class="col-lg-12 ">
                                <label class="form-label">چکیده</label>
                                <span class="text-danger">*</span>
                                <textarea type="text" class="form-control" name="description" rows="3"
                                    required><?= checkInputDataValue('description', $editBlog['description']) ?></textarea>
                                <div class="invalid-feedback">
                                    فیلد چکیده نباید خالی باشد
                                </div>
                                <div class="text-danger">
                                    <?= checkDataErrorExist('description') ?>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <label class="form-label">توضیحات</label>
                                <span class="text-danger">*</span>
                                <textarea type="text" class="form-control" name="full_description" rows="6"
                                    required><?= $editBlog['full_description'] ?></textarea>
                                <div class="invalid-feedback">
                                    فیلد توضیحات نباید خالی باشد
                                </div>
                                <div class="text-danger">
                                    <?= checkDataErrorExist('full_description') ?>
                                </div>
                            </div>
                            <div class="col-lg-12 d-flex justify-content-end">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="d-grid">
                                            <a class="btn btn-danger" href="blogs_list.php">برگشت</a>
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
    <script type="text/javascript" src="../../assets/datePiker/js/persianDatepicker.min.js"></script>
    <script>
        const p = new persianDate();
        $(".date").persianDatepicker({
            formatDate: "YYYY/0M/0D",
            startDate: p.now().addMonth(-1).toString("YYYY/MM/DD"),
            endDate: "today"
        });
    </script>
    <!--end wrapper-->
</body>
<!-- Mirrored from codetheme.ir/onedash/demo/rtl/form-layouts.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 May 2024 08:56:22 GMT -->

</html>
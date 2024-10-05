<?php
require_once('../../../app/connection/DB.php');

require_once('../../../app/controller/function.php');
require_once('../../../app/controller/access.php');
require_once('../../../app/helper/jdf.php');

$errors = [];
$categoriesList = $db->where('status', 1)
    ->orderBy('name', 'ASC')
    ->get('categories', null, 'id, name');
if (isset($_POST['_insert'])) {
    $title = checkDataSecurity($_POST['title']);
    $category = checkDataSecurity($_POST['category']);
    $description = checkDataSecurity($_POST['description']);
    $full_description = checkDataSecurity($_POST['full_description']);
    $newDate = checkDataSecurity($_POST['date']);

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
            move_uploaded_file($image, $target_file);
        }
        $db->insert('blogs', [
            'title' => $title,
            'blog_category'=>$category,
            'description'=>$description,
            'full_description'=>$full_description,
            'image'=>(isset($image_name) and !empty($image_name))?$image_name:null,
            'date'=>$newDate,
            'setdate'=>$date,
            'admin_id'=>$_SESSION['user'],
            'counter' => 0,
            'status' => 1
        ]);
        $query = $db->getLastQuery();
        $db->insert('logs', [
            'admin_id' => $_SESSION['user'],
            'table_name' => 'blogs',
            'changes' => $query,
            'type' => 0,
            'date' => $date
        ]);
        header('Location:blogs_list.php?ok=0');
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
    <title>افزودن خبر</title>
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
                        <h6 class="mb-0 text-uppercase">اضافه کردن خبر</h6>
                        <hr />
                        <form class="row g-3 needs-validation" action="" method="post" novalidate enctype="multipart/form-data"
                            enctype="multipart/form-data" a>
                            <div class="col-lg-6 ">
                                <label class="form-label">دسته بندی</label>
                                <span class="text-danger">*</span>
                                <select class="form-select" name="category" id="category" required >
                                    <option value="">دسته بندی را انتخاب کنید</option>
                                    <?php foreach ($categoriesList as $category) { ?>
                                        <option <?= (isset($_POST['category']) and $_POST['category'] == $category['id']) ? "SELECTED" : "" ?>
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
                                <input type="text" class="form-control" name="title" value="<?= checkInputDataValue('title') ?>" required>
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
                                <input type="text" dir="ltr" class="form-control date" name="date" value="<?= checkInputDataValue('date') ?>" required>
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
                                <textarea type="text" class="form-control" name="description" rows="3"  required><?= checkInputDataValue('description') ?></textarea>
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
                                <textarea type="text" class="form-control" name="full_description" rows="6" required><?= checkInputDataValue('full_description') ?></textarea>
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
    <script src="../../../assets/js/validation.js" ></script>
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
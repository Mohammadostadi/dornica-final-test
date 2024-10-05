<?php

require_once('../../../app/connection/DB.php');
require_once('../../../app/controller/function.php');
require_once('../../../app/controller/access.php');
require_once('../../../app/helper/jdf.php');
require_once('../../../app/controller/city_show.php');

$SITE_PATH = '..';
$URL_PATH = '../..';
$errors = [];
$id = checkDataSecurity($_GET['id']);
$member = $db->where('id', $id)
    ->getOne('members', 'fname, lname, ncode, phone, gender, email, username, image, city_id, province_id, military_service, gender');


if (isset($_POST['_update'])) {
    $fname = checkDataSecurity($_POST['fname']);
    $lname = checkDataSecurity($_POST['lname']);
    $ncode = checkDataSecurity($_POST['ncode']);
    $phone = checkDataSecurity($_POST['phone']);
    $gender = checkDataSecurity($_POST['gender']);
    $email = checkDataSecurity($_POST['email']);
    $username = checkDataSecurity($_POST['username']);
    $lastImage = $member['image'];

    checkDataEmpty($fname, 'fname', 'نام شما نمیتواند خالی باشد.');
    checkDataEmpty($lname, 'lname', 'نام خانوادگی شما نمیتواند خالی باشد.');
    checkDataEmpty($ncode, 'ncode', 'کدملی شما نمیتواند خالی باشد.');
    checkDataEmpty($phone, 'phone', 'شماره تماس شما نمیتواند خالی باشد.');
    checkDataEmpty($username, 'username', 'نام کاربری شما نمیتواند خالی باشد.');
    checkDataEmpty($email, 'email', 'ایمیل شما نمیتواند خالی باشد.');
    checkDataEmpty($gender, 'gender', 'جنسیت شما نمیتواند خالی باشد.');
    checkUniqData($username, 'username', 'members', 'نام کاربری قبلا وارد شده است.', $member['username']);
    checkUniqData($phone, 'phone', 'members', ' شماره تماس قبلا وارد شده است.', $member['username']);
    checkUniqData($ncode, 'ncode', 'members', ' کدملی قبلا وارد شده است.', $member['username']);
    checkUniqData($email, 'email', 'members', ' ایمیل قبلا وارد شده است.', $member['username']);
    if (strlen($ncode) != 10)
        setErrorMessage('ncode', 'کدملی شما نا معتبر میباشد.');

    if ($gender == 0) {
        $military_service = checkDataSecurity($_POST['military_service']);
        checkDataEmpty($military_service, 'military_service', 'نظام وظیفه نمیتواند خالی باشد');
    }


    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        setErrorMessage('email', 'فرمت ایمیل شما صحیح نمیباشد .');
    if (!preg_match("/^[0-9]*$/", $phone))
        setErrorMessage('phone', 'فقط عدد میتوانید وارد کنید.');

    if (isset($_FILES['image']) and !empty($_FILES['image']['name'])) {
        $dir = '../../attachment/imgs/members/';
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
            if ($image_type == 'image/jpeg') {
                $image_resource_id = imagecreatefromjpeg($image);
                $target_layer = fn_resize($image_resource_id, $source_properties[0], $source_properties[1]);
                imagejpeg($target_layer, $image_name);
            } elseif ($image_type == 'image/gif') {
                $image_resource_id = imagecreatefromgif($image);
                $target_layer = fn_resize($image_resource_id, $source_properties[0], $source_properties[1]);
                imagegif($target_layer, $image_name);
            } elseif ($image_type == 'image/png') {
                $image_resource_id = imagecreatefrompng($image);
                $target_layer = fn_resize($image_resource_id, $source_properties[0], $source_properties[1]);
                imagepng($target_layer, $image_name);
            }
            rename($image_name, $target_file);
        }
        $db->where('username', $id)
            ->update('members', [
                'fname' => $fname,
                'lname' => $lname,
                'ncode' => $ncode,
                'username' => $username,
                'email' => $email,
                'phone' => $phone,
                'gender' => $gender,
                'province_id' => isset($_POST['province']) ? checkDataSecurity($_POST['province']) : NULL,
                'city_id' => isset($_POST['city']) ? checkDataSecurity($_POST['city']) : NULL,
                'image' => isset($image_name) ? checkDataSecurity($image_name) : $lastImage,
                'military_service' => isset($military_service) ? $military_service : NULL,
                'status' => 1,
                'setdate' => persian_number(jdate('Y/m/d H:i:s', strtotime($date))),
            ]);
        $query = $db->getLastQuery();
        $db->insert('logs', [
            'admin_id' => $_SESSION['user'],
            'table_name' => 'members',
            'changes' => $query,
            'type' => 2,
            'date' => $date
        ]);
        header('Location:members_list.php?ok=2');
    }
}

$provinceList = $db->where('status', 1)
    ->orderBy('name', 'ASC')
    ->get('provinces', null, 'id, name');
?>


<!doctype html>
<html lang="en" dir="rtl">


<!-- Mirrored from codetheme.ir/onedash/demo/rtl/table-datatable.php by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 May 2024 08:56:27 GMT -->

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
    require_once('../../layout/css.php');
    ?>

    <title>بروزرسانی کاربر</title>
</head>

<body>

    <div class="wrapper container my-5">
        <main class="page-content">
            <?php
            require_once('../../layout/header.php');
            require_once('../../layout/asidebar.php');
            ?>
            <!-- contact area -->
            <div class="card">
                <!-- Browse Jobs -->
                <section class="card-body">
                    <div class="container">
                        <div class="row">
                            <div class="border p-3 rounded">
                                <h6 class="mb-0 text-uppercase">بروزرسانی کاربر</h6>
                                <hr />
                                <div class="shop-bx shop-profile">
                                    <form class="row g-3 needs-validation " novalidate action="" method="post" enctype="multipart/form-data">
                                        <div class="row m-b30">
                                            <div class="col-lg-6 col-md-6">
                                                <div class="mb-3">
                                                    <label for="formcontrolinput1" class="form-label">نام:</label>
                                                    <input name="fname" type="text" class="form-control" required
                                                        id="formcontrolinput1" value="<?= $member['fname'] ?>"
                                                        placeholder="نام">
                                                        <div class="invalid-feedback">
                                    فیلد نام نباید خالی باشد
                                </div>
                                <div class="text-danger"><?= checkDataErrorExist('fname') ?></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="mb-3">
                                                    <label for="formcontrolinput2" class="form-label">نام
                                                        خانوادگی:</label>
                                                    <input name="lname" type="text" class="form-control"required
                                                        id="formcontrolinput2" value="<?= $member['lname'] ?>"
                                                        placeholder="نام خانوادگی">
                                                        <div class="invalid-feedback">
                                    فیلد نام خانوادگی نباید خالی باشد
                                </div>
                                <div class="text-danger"><?= checkDataErrorExist('lname') ?></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="mb-3">
                                                    <label for="formcontrolinput3" class="form-label">کدملی:</label>
                                                    <input name="ncode" dir="ltr" type="text" class="form-control"required
                                                        id="formcontrolinput3" value="<?= $member['ncode'] ?>"
                                                        placeholder="کدملی">
                                                        <div class="invalid-feedback">
                                    فیلد کدملی نباید خالی باشد
                                </div>
                                <div class="text-danger"><?= checkDataErrorExist('ncode') ?></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="mb-3">
                                                    <label for="formcontrolinput4" class="form-label">تصویر:</label>
                                                    <input name="image" dir="ltr" type="file" class="form-control"
                                                        id="formcontrolinput4" placeholder="تصویر">
                                                </div>
                                                <div class="text-danger"><?= checkDataErrorExist('image') ?></div>
                                            </div>
                                            <div class="col-lg-12 col-md-12">
                                                <div class="mb-3">
                                                    <label for="formcontrolinput4" class="form-label">نام
                                                        کاربری:</label>
                                                    <input name="username" dir="ltr" type="text" class="form-control"required
                                                        id="formcontrolinput4" value="<?= $member['username'] ?>"
                                                        placeholder="نام کاربری">
                                                        <div class="invalid-feedback">
                                    فیلد نام کاربری نباید خالی باشد
                                </div>
                                <div class="text-danger"><?= checkDataErrorExist('username') ?></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="mb-3">
                                                    <label for="formcontrolinput4" class="form-label">جنسیت:</label>
                                                    <label for="male">مرد</label>
                                                    <input value="0" id="male" type="radio" name="gender"
                                                        <?= $member['gender'] == 0 ? "checked" : "" ?>>
                                                    <label for="female">زن</label>
                                                    <input value="1" id="female" name="gender" type="radio"
                                                        <?= $member['gender'] == 1 ? "checked" : "" ?>>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 <?= $member['gender'] == 1 ? "d-none" : "" ?>"
                                                id="military">
                                                <div class="mb-3">
                                                    <label for="formcontrolinput4" class="form-label">نظام
                                                        وظیفه:</label>
                                                    <select class="form-select" name="military_service"
                                                        id="military_service">
                                                        <option <?= $member['military_service'] == 0 ? "SELECTED" : "" ?>
                                                            value="0">پایان خدمت</option>
                                                        <option <?= $member['military_service'] == 1 ? "SELECTED" : "" ?>
                                                            value="1">در حال خدمت</option>
                                                        <option <?= $member['military_service'] == 2 ? "SELECTED" : "" ?>
                                                            value="2">معاف</option>
                                                    </select>
                                                    <div class="text-danger"><?= checkDataErrorExist('military_service') ?></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="shop-bx-title clearfix">
                                            <h5 class="text-uppercase">اطلاعات تماس</h5>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <div class="mb-3">
                                                    <label for="formcontrolinput5" class="form-label">شماره
                                                        تماس:</label>
                                                    <input name="phone" value="<?= $member['phone'] ?>" dir="ltr"required
                                                        type="text" class="form-control" id="formcontrolinput5"
                                                        placeholder="+98">
                                                        <div class="invalid-feedback">
                                    فیلد شماره تماس نباید خالی باشد
                                </div>
                                <div class="text-danger"><?= checkDataErrorExist('phone') ?></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="mb-3">
                                                    <label for="formcontrolinput6" class="form-label">ایمیل:</label>
                                                    <input name="email" value="<?= $member['email'] ?>" dir="ltr"required
                                                        type="text" class="form-control" id="formcontrolinput6"
                                                        placeholder="info@example.com">
                                                        <div class="invalid-feedback">
                                    فیلد ایمیل نباید خالی باشد
                                </div>
                                <div class="text-danger"><?= checkDataErrorExist('email') ?></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="mb-3">
                                                    <label for="formcontrolinput7" class="form-label">استان:</label>
                                                    <select name="province" class="form-select" id="province">
                                                        <option value="">استان را انتخاب کنید</option>
                                                        <?php foreach ($provinceList as $province) { ?>
                                                            <option <?= (!is_null($member['province_id']) and $member['province_id'] == $province['id']) ? "SELECTED" : "" ?> value="<?= $province['id'] ?>"><?= $province['name'] ?>
                                                            </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="mb-3">
                                                    <label for="formcontrolinput9" class="form-label">شهر:</label>
                                                    <select name="city" class="form-select" id="city">
                                                        <option value="">ابتدا استان را انتخاب کنید</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 d-flex justify-content-end">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="d-grid">
                                                        <a class="btn btn-danger" href="members_list.php">برگشت</a>
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
                    </div>
                </section>
        </main>
    </div>
    <!-- Browse Jobs END -->
    <!-- Content END-->
    <?php require_once('../../layout/js.php') ?>

    <script>
        $('#male').click(function () {
            $('#military').removeClass('d-none');
        });
        $('#female').click(function () {
            $('#military').addClass('d-none');
        });

    </script>
    <script>
        $("#province").change(function () {
            const id = $(this).val();
            console.log(cities(id));
            cities(id);
        });
        const current_province = "<?= isset($member['province_id']) ? $member['province_id'] : "" ?>";
        const current_city = "<?= isset($member['city_id']) ? $member['city_id'] : "" ?>";
        if (current_city != "" && current_province != "") {
            cities(current_province, current_city);
        }
        if (current_city == "" && current_province != "") {
            cities(current_province);
        }

        function cities(province, city = null) {
            $.ajax({
                url: "member_update.php",
                type: "POST",
                data: {
                    province_id: province,
                    city_id: city,
                },
                success: function (msg) {
                    $("#city").html(msg);
                },
            });
        }
    </script>
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

</body>

<!-- Mirrored from bookland.dexignzone.com/xhtml/my-profile.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Apr 2024 14:18:19 GMT -->

</html>
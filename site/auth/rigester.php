<?php
require_once('../../app/connection/DB.php');
$provinceList = $db->where('status', 1)
->orderBy('name', 'ASC')
->get('provinces', null, 'id, name');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require_once('../layout/css.php') ?>
    <style>
        .list{
            width: 100%;
        }
    </style>
</head>

<body>
    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="text-center">
                    <img class="jump mb-50" src="assets/imgs/loading.svg" alt="">
                    <h6>در حال بارگذاری</h6>
                    <div class="loader">
                        <div class="bar bar1"></div>
                        <div class="bar bar2"></div>
                        <div class="bar bar3"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-wrap">
        <?php
        require_once('../layout/sidebar.php');
        require_once('../layout/header.php');

        ?>
        <div class="card container">
            <div class="card-body">
                <div class="border p-3 rounded">
                    <h6 class="mb-0 text-uppercase">ثبت نام</h6>
                    <hr />
                    <form class="row g-3 needs-validation" novalidate action="" method="post"
                        enctype="multipart/form-data">
                        <div class="col-lg-6 mt-3">
                            <label class="form-label">نام </label>
                            <input type="text" class="form-control" name="fname" required>
                            <div class="invalid-feedback">
                                فیلد نام نباید خالی باشد
                            </div>
                        </div>
                        <div class="col-lg-6 mt-3">
                            <label class="form-label">نام خانوادگی</label>
                            <input type="text" class="form-control" name="lname" required>
                            <div class="invalid-feedback">
                                فیلد نام خانوادگی نباید خالی باشد
                            </div>
                        </div>
                        <div class="col-lg-6 mt-3">
                        <div class="d-flex flex-column">
                            <label class="form-label">جنسیت</label>
                            <select class="form-control" name="gender" id="gender" required>
                                <option value="" selected >جنسیت مورد نظر را انتخاب کنید</option>
                                <option <?= (isset($_POST['gender']) and $_POST['gender'] == 0) ? "SELECTED" : "" ?>
                                    value="0">
                                    مرد</option>
                                <option <?= (isset($_POST['gender']) and $_POST['gender'] == 1) ? "SELECTED" : "" ?>
                                    value="1">
                                    زن</option>
                            </select>
                            <div class="invalid-feedback">
                                فیلد جنسیت نباید خالی باشد
                            </div>
                        </div>
                        </div>
                        <div class="col-lg-6 mt-3 d-none" id="military">
                        <div class="d-flex flex-column">
                            <label class="form-label">نظام وظیفه</label>
                            <select class="form-control" name="military_service" id="military_service" required>
                                <option <?= (isset($_POST['military_service']) and $_POST['military_service'] == 0) ? "SELECTED" : "" ?>
                                    value="0">
                                    پایان خدمت</option>
                                <option <?= (isset($_POST['military_service']) and $_POST['military_service'] == 1) ? "SELECTED" : "" ?>
                                    value="1">
                                    در حال خدمت</option>
                                <option <?= (isset($_POST['military_service']) and $_POST['military_service'] == 2) ? "SELECTED" : "" ?>
                                    value="2">
                                    معاف</option>
                            </select>
                            <div class="invalid-feedback">
                                فیلد جنسیت نباید خالی باشد
                            </div>
                        </div>
                        </div>
                        <div class="col-lg-6 mt-3">
                            <div class="d-flex flex-column">
                                <label for="province" class="form-label">استان</label>
                                <select id="province" name="province" class="form-control" required>
                                    <option value="" selected disabled>استان را انتخاب کنید</option>
                                    <?php foreach($provinceList as $province){ ?>
                                            <option value="<?= $province['id'] ?>"><?= $province['name'] ?></option>
                                        <?php } ?>
                                </select>
                                <div class="invalid-feedback">
                                    فیلد استان نباید خالی باشد
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mt-3">
                            <div class="d-flex flex-column">
                                <label for="city" class="form-label">شهر</label>
                                <select id="city" name="city" class="form-control" required>
                                    <option value="0" selected disabled>ابتدا استان را انتخاب کنید</option>
                                </select>
                                <div class="invalid-feedback">
                                    فیلد شهر نباید خالی باشد
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mt-3">
                            <label class="form-label">کدملی</label>
                            <input type="text" class="form-control text-end" name="national_code" required>
                            <div class="invalid-feedback">
                                فیلد کدملی نباید خالی باشد
                            </div>
                        </div>
                        <div class="col-lg-6 mt-3">
                            <label class="form-label">ایمیل</label>
                            <input type="text" class="form-control" name="email" required>
                            <div class="invalid-feedback">
                                فیلد ایمیل نباید خالی باشد
                            </div>
                        </div>
                        <div class="col-lg-6 mt-3">
                            <label class="form-label">َشماره</label>
                            <input type="text" class="form-control text-end" name="phone" required>
                            <div class="invalid-feedback">
                                فیلد شماره نباید خالی باشد
                            </div>
                        </div>
                        <div class="col-lg-6 mt-3">
                            <div>
                                <label class="form-label">تاریخ تولد</label>
                                <input id="date" name="birthday" class="form-control datepicker date text-end"
                                    required />
                                <div class="invalid-feedback">
                                    فیلد تاریخ تولد نباید خالی باشد
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mt-3">
                            <label class="form-label">کدپستی</label>
                            <input type="text" class="form-control text-end" name="postalCode" required>
                            <div class="invalid-feedback">
                                فیلد کدپستی نباید خالی باشد
                            </div>
                        </div>
                        <div class="col-lg-6 mt-3">
                            <label class="form-label">کلمه عبور</label>
                            <input type="password" class="form-control" name="password" value="" required>
                            <div class="invalid-feedback">
                                فیلد پسورد نباید خالی باشد
                            </div>
                        </div>
                        <div class="col-12 mt-3">
                            <label class="form-label">آدرس</label>
                            <textarea class="form-control" rows="3" name="address"></textarea>
                        </div>
                        <div class="col-md-6 mt-3">
                            <div class="form-group">
                                <label class="col-lg-3 control-label" for="image">تصویر :</label>
                                <div class="col-lg-9">
                                    <input name="image" id="image" type="file" class="border-1" value="" />
                                </div>
                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <div class="row">
                                <div class="col-6">
                                    <div class="d-grid">
                                        <a href="members_list.php" class="btn btn-danger">برگشت</a>
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
    </div>
    <?php require_once('../layout/js.php') ?>

    <script>
        $('#gender').change(function(){
            const value = $(this).val();
            if(value == 0)
                $('#military').removeClass('d-none');
            if(value == 1 || value == '')
                $('#military').addClass('d-none');
        })
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

</html>
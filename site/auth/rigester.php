<?php
require_once('../../app/connection/DB.php');
require_once('../../app/controller/city_show.php');
require_once('../../app/controller/function.php');
$provinceList = $db->where('status', 1)
->orderBy('name', 'ASC')
->get('provinces', null, 'id, name');
$errors = [];

if(isset($_POST['_insert'])){
    $fname = checkDataSecurity($_POST['fname']);
    $lname = checkDataSecurity($_POST['lname']);
    $ncode = checkDataSecurity($_POST['ncode']);
    $phone = checkDataSecurity($_POST['phone']);
    $gender = checkDataSecurity($_POST['gender']);
    $email = checkDataSecurity($_POST['email']);
    $username = checkDataSecurity($_POST['username']);
    $password = checkDataSecurity($_POST['password']);

    checkDataEmpty($fname, 'fname', 'نام شما نمیتواند خالی باشد.');
    checkDataEmpty($lname, 'lname', 'نام خانوادگی شما نمیتواند خالی باشد.');
    checkDataEmpty($ncode, 'ncode', 'کدملی شما نمیتواند خالی باشد.');
    checkDataEmpty($phone, 'phone', 'شماره تماس شما نمیتواند خالی باشد.');
    checkDataEmpty($username, 'username', 'نام کاربری شما نمیتواند خالی باشد.');
    checkDataEmpty($email, 'email', 'ایمیل شما نمیتواند خالی باشد.');
    checkDataEmpty($gender, 'gender', 'جنسیت شما نمیتواند خالی باشد.');
    checkDataEmpty($password, 'password', 'رمز عبور شما نمیتواند خالی باشد.');
    checkUniqData($username, 'username', 'members', 'نام کاربری قبلا وارد شده است.');
    checkUniqData($phone, 'phone', 'members', ' شماره تماس قبلا وارد شده است.');
    checkUniqData($ncode, 'ncode', 'members', ' کدملی قبلا وارد شده است.');
    checkUniqData($email, 'email', 'members', ' ایمیل قبلا وارد شده است.');
    if($gender == 0 ){
        $military_service = checkDataSecurity($_POST['military_service']);
        checkDataEmpty($military_service, 'military_service', 'نظام وظیفه نمیتواند خالی باشد');
    }



    if(count($errors) == 0){
        $db->insert('members', [
            'fname'=>$fname,
            'lname'=>$lname,
            'ncode'=>$ncode,
            'username'=>$username,
            'email'=>$email,
            'phone'=>$phone,
            'gender'=>$gender,
            'password'=>password_hash($password, PASSWORD_DEFAULT),
            'province_id'=>isset($_POST['province'])?checkDataSecurity($_POST['province']):NULL,
            'city_id'=>isset($_POST['city'])?checkDataSecurity($_POST['city']):NULL,
            'image'=>isset($_POST['image'])?checkDataSecurity($_POST['image']):NULL,
            'military_service'=>isset($military_service)?$military_service:NULL,
            'status'=>1,
            'setdate'=>$date,
        ]);
        $_SESSION['member'] = $username;
        header('Location:../../index.php');
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
                    <img class="jump mb-50" src="../attachment/imgs/loading.svg" alt="">
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
        <div class="card">
            <div class="card-body">
                <div class="border p-3 rounded">
                    <h6 class="mb-0 text-uppercase">ثبت نام</h6>
                    <hr />
                    <form class="row g-3 needs-validation" novalidate action="" method="post"
                        enctype="multipart/form-data">
                        <div class="col-lg-6 mt-3">
                            <label class="form-label">نام </label>
                            <span class="text-danger">*</span>
                            <input type="text" class="form-control" name="fname" required>
                            <div class="invalid-feedback">
                                فیلد نام نباید خالی باشد
                            </div>
                        </div>
                        <div class="col-lg-6 mt-3">
                            <label class="form-label">نام خانوادگی</label>
                            <span class="text-danger">*</span>
                            <input type="text" class="form-control" name="lname" required>
                            <div class="invalid-feedback">
                                فیلد نام خانوادگی نباید خالی باشد
                            </div>
                        </div>
                        <div class="col-lg-6 mt-3">
                        <div class="d-flex flex-column">
                            <label class="form-label">جنسیت <span class="text-danger">*</span></label>
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
                            <select class="form-control" name="military_service" id="military_service">
                                <option value="">نظام وظیفه را انتخاب کنید</option>
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
                        </div>
                        </div>
                        <div class="col-lg-6 mt-3">
                            <div class="d-flex flex-column">
                                <label for="province" class="form-label">استان</label>
                                <select id="province" name="province" class="form-control" >
                                    <option value="" selected disabled>استان را انتخاب کنید</option>
                                    <?php foreach($provinceList as $province){ ?>
                                            <option value="<?= $province['id'] ?>"><?= $province['name'] ?></option>
                                        <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 mt-3">
                            <div class="d-flex flex-column">
                                <label for="city" class="form-label">شهر</label>
                                <select id="city" name="city" class="form-control" >
                                    <option value="" selected disabled>ابتدا استان را انتخاب کنید</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 mt-3">
                            <label class="form-label">کدملی</label>
                            <span class="text-danger">*</span>
                            <input type="text" class="form-control text-end" name="ncode" required>
                            <div class="invalid-feedback">
                                فیلد کدملی نباید خالی باشد
                            </div>
                        </div>
                        <div class="col-lg-6 mt-3">
                            <label class="form-label">ایمیل</label>
                            <span class="text-danger">*</span>
                            <input type="text" class="form-control" name="email" required>
                            <div class="invalid-feedback">
                                فیلد ایمیل نباید خالی باشد
                            </div>
                        </div>
                        <div class="col-lg-6 mt-3">
                            <label class="form-label">َشماره</label>
                            <span class="text-danger">*</span>
                            <input type="text" class="form-control text-end" name="phone" required>
                            <div class="invalid-feedback">
                                فیلد شماره نباید خالی باشد
                            </div>
                        </div>
                        <div class="col-lg-6 mt-3">
                            <label class="form-label">نام کاربری</label>
                            <span class="text-danger">*</span>
                            <input type="text" class="form-control text-end" name="username" oninput='usernamejs(this)' required>
                            <div class="invalid-feedback">
                                فیلد نام کاربری نباید خالی باشد
                            </div>
                        </div>
                        <div class="col-lg-6 mt-3">
                            <label class="form-label">کلمه عبور</label>
                            <span class="text-danger">*</span>
                            <input type="password" class="form-control" name="password" value="" required>
                            <div class="invalid-feedback">
                                فیلد پسورد نباید خالی باشد
                            </div>
                        </div>
                        <div class="col-lg-6 mt-3">
                            <label class="form-label">تکرار رمز عبور</label>
                            <input type="text" class="form-control" name="confirmPassword">
                        </div>
                        <div class="col-md-6 mt-3">
                            <div class="form-group">
                                <label class="col-lg-3 control-label" for="image">تصویر :</label>
                                <div class="col-lg-9">
                                    <input name="image" id="image" type="file" style="border:1px solid #ccc; border-radius:4px;" value="" />
                                </div>
                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <div class="row">
                                <div class="col-6">
                                    <div class="d-grid">
                                        <a href="<?= isset($_SERVER['HTTP_REFERER'])?$_SERVER['HTTP_REFERER']:"../../index.php" ?>" class="btn btn-danger">برگشت</a>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary" name="_insert">ثبت نام</button>
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
        $("#province").change(function () {
            const id = $(this).val();
            console.log(cities(id));
            cities(id);
            });
            const current_province = "<?= isset($_POST['province'])?$_POST['province']:""?>";
                const current_city = "<?= isset($_POST['city'])?$_POST['city']:""?>";
            if (current_city != "" && current_province != "") {
            cities(current_province, current_city);
            }
            if (current_city == "" && current_province != "") {
            cities(current_province);
            }

            function cities(province, city = null) {
            $.ajax({
                url: "rigester.php",
                type: "POST",
                data: {
                province_id: province,
                city_id: city,
                },
                success: function (msg) {
                $("#city").html(msg);
                $("#city").select();
                console.log($("#city").html(msg));
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
    <script>
        function usernamejs(input) {
            input.value = input.value.replace(/[^a-zA-Z0-9@_-]/g, "");
            }
    </script>
</body>

</html>
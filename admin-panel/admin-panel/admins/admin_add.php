<?php 
require_once('../../../app/connection/DB.php');
require_once('../../../app/controller/access.php');

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
    <title>افزودن ادمین</title>
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
                        <h6 class="mb-0 text-uppercase">اضافه کردن ادمین</h6>
                        <hr />
                        <form class="row g-3 needs-validation" action="" method="post" novalidate
                            enctype="multipart/form-data" a>
                            <div class="col-lg-6 ">
                                <label class="form-label">نام </label>
                                <input type="text" class="form-control" name="fname"
                                    required>
                                <div class="invalid-feedback">
                                    فیلد نام نباید خالی باشد
                                </div>
                            </div>
                            <div class="col-lg-6 ">
                                <label class="form-label">نام خانوادگی</label>
                                <input type="text" class="form-control" name="lname"
                                    required>
                                <div class="invalid-feedback">
                                    فیلد نام خانوادگی نباید خالی باشد
                                </div>
                            </div>
                            <div class="col-lg-6 ">
                                <label class="form-label">نام کاربری</label>
                                <input type="text" class="form-control" name="username"
                                     required>
                                <div class="invalid-feedback">
                                    فیلد نام کاربری نباید خالی باشد
                                </div>
                            </div>
                            <div class="col-lg-6 ">
                                <label class="form-label">نقش</label>
                                <select name="role" class="form-select" id="role" required>
                                    <option value="" selected>نقش</option>
                                    <option
                                        value="1">
                                        ادمین</option>
                                    <option
                                        value="2">
                                        سوپر ادمین</option>
                                    <option
                                        value="3">
                                        اپراتور</option>
                                </select>
                                <div class="invalid-feedback">
                                    فیلد نقش را انتخاب کنید
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label">کلمه عبور</label>
                                <input type="password" class="form-control" name="password" required>
                                <div class="invalid-feedback">
                                    فیلد پسورد نباید خالی باشد
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
    <script src="assets/js/admin_add_page.js"></script>
    <!--end wrapper-->
</body>
<!-- Mirrored from codetheme.ir/onedash/demo/rtl/form-layouts.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 May 2024 08:56:22 GMT -->

</html>
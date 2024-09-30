<?php
require_once('../../../app/connection/DB.php');
require_once('../../../app/controller/access.php');
require_once('../../../app/controller/function.php');
$id = checkDataSecurity($_GET['id']);

if (isset($_POST['change_level_access'])) {
    $levelAccess = [];
    if (isset($_POST['admins_list']))
        $levelAccess[] = 'admins_list';
    if (isset($_POST['admin_add']))
        $levelAccess[] = 'admin_add';
    if (isset($_POST['admin_delete']))
        $levelAccess[] = 'admin_delete';
    if (isset($_POST['admin_update']))
        $levelAccess[] = 'admin_update';
    if (isset($_POST['blogs_list']))
        $levelAccess[] = 'blogs_list';
    if (isset($_POST['blog_delete']))
        $levelAccess[] = 'blog_delete';
    if (isset($_POST['blog_update']))
        $levelAccess[] = 'blog_update';
    if (isset($_POST['blog_add']))
        $levelAccess[] = 'blog_add';
    if (isset($_POST['members_list']))
        $levelAccess[] = 'members_list';
    if (isset($_POST['member_reset_password']))
        $levelAccess[] = 'member_reset_password';
    if (isset($_POST['member_delete']))
        $levelAccess[] = 'member_delete';
    if (isset($_POST['member_update']))
        $levelAccess[] = 'member_update';
    if (isset($_POST['provinces_list']))
        $levelAccess[] = 'provinces_list';
    if (isset($_POST['province_add']))
        $levelAccess[] = 'province_add';
    if (isset($_POST['province_delete']))
        $levelAccess[] = 'province_delete';
    if (isset($_POST['province_update']))
        $levelAccess[] = 'province_update';
    if (isset($_POST['cities_list']))
        $levelAccess[] = 'cities_list';
    if (isset($_POST['city_add']))
        $levelAccess[] = 'city_add';
    if (isset($_POST['city_delete']))
        $levelAccess[] = 'city_delete';
    if (isset($_POST['city_update']))
        $levelAccess[] = 'city_update';
    if (isset($_POST['categories_list']))
        $levelAccess[] = 'categories_list';
    if (isset($_POST['category_add']))
        $levelAccess[] = 'category_add';
    if (isset($_POST['category_delete']))
        $levelAccess[] = 'category_delete';
    if (isset($_POST['category_update']))
        $levelAccess[] = 'category_update';
    if (isset($_POST['logs_list']))
        $levelAccess[] = 'logs_list';

    if (count($levelAccess) != 0) {
        $db->where('id', $id)
            ->update('admins', [
                'levelAccess' => implode(',', $levelAccess)
            ]);
    }
}
$level = $db->where('id', $id)
    ->getValue('admins', 'levelAccess');
$levelAccess = explode(',', $level);
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

    <title>سطح دسترسی</title>
</head>

<body>


    <!--start wrapper-->
    <div class="wrapper">
        <!--start top header-->
        <?php
        require_once('../../layout/header.php');
        ?>
        <!--end top header-->

        <!--start sidebar -->
        <?php
        require_once('../../layout/asidebar.php');
        ?>
        <!--end sidebar -->

        <!--start content-->

        <main class="page-content">

            <div class="card">
                <div class="card-header py-3 d-flex justify-content-between">
                    <div>
                        <input type="radio" name="all" id="all">
                        <label for="all">انتخاب همه</label>
                    </div>
                    <div>
                        <h6 class="mb-0 text-uppercase">لیست دسترسی</h6>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 d-flex">
                            <div class="card border shadow-none w-100">
                                <div class="card-body">
                                    <div class="row">
                                        <form class="row g-3" action="" method="post">
                                            <div class="col-12">
                                                <div class="text-uppercase">
                                                    <label for="admins">جدول ادامین</label>
                                                    <hr>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <input type="radio" id="admins_list" name="admins_list"
                                                            <?= in_array('admins_list', $levelAccess) ? "checked" : "" ?>>
                                                        <label for="admins_list">لیست ادمین ها</label>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input type="radio" id="admin_add" name="admin_add"
                                                            <?= in_array('admin_add', $levelAccess) ? "checked" : "" ?>>
                                                        <label for="admin_add">درج ادمین ها</label>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input type="radio" id="admin_delete" name="admin_delete"
                                                            <?= in_array('admin_delete', $levelAccess) ? "checked" : "" ?>>
                                                        <label for="admin_delete">حذف ادمین ها</label>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input type="radio" id="admin_update" name="admin_update"
                                                            <?= in_array('admin_update', $levelAccess) ? "checked" : "" ?>>
                                                        <label for="admin_update">بروزرسانی ادمین ها</label>
                                                    </div>
                                                </div>
                                                <hr>
                                            </div>
                                            <div class="col-12">
                                                <div class="text-uppercase">
                                                    <label for="">جدول دسته بندی اخبار</label>
                                                    <hr>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <input type="radio" id="categories_list" name="categories_list"
                                                            <?= in_array('categories_list', $levelAccess) ? "checked" : "" ?>>
                                                        <label for="categories_list">لیست دسته بندی اخبار </label>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input type="radio" id="category_add" name="category_add"
                                                            <?= in_array('category_add', $levelAccess) ? "checked" : "" ?>>
                                                        <label for="category_add">درج دسته بندی خبر </label>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input type="radio" id="category_delete" name="category_delete"
                                                            <?= in_array('category_delete', $levelAccess) ? "checked" : "" ?>>
                                                        <label for="category_delete">حذف دسته بندی خبر </label>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input type="radio" id="category_update" name="category_update"
                                                            <?= in_array('category_update', $levelAccess) ? "checked" : "" ?>>
                                                        <label for="category_update">بروزرسانی دسته بندی خبر </label>
                                                    </div>
                                                </div>
                                                <hr>
                                            </div>
                                            <div class="col-12">
                                                <div class="text-uppercase">
                                                    <label for="">جدول اخبار</label>
                                                    <hr>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <input type="radio" id="blogs_list" name="blogs_list"
                                                            <?= in_array('blogs_list', $levelAccess) ? "checked" : "" ?>>
                                                        <label for="blogs_list">لیست اخبار </label>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input type="radio" id="blog_add" name="blog_add"
                                                            <?= in_array('blog_add', $levelAccess) ? "checked" : "" ?>>
                                                        <label for="blog_add">درج خبر </label>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input type="radio" id="blog_delete" name="blog_delete"
                                                            <?= in_array('blog_delete', $levelAccess) ? "checked" : "" ?>>
                                                        <label for="blog_delete">حذف خبر </label>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input type="radio" id="blog_update" name="blog_update"
                                                            <?= in_array('blog_update', $levelAccess) ? "checked" : "" ?>>
                                                        <label for="blog_update">بروزرسانی خبر </label>
                                                    </div>
                                                </div>
                                                <hr>
                                            </div>
                                            <div class="col-12">
                                                <div class="text-uppercase">
                                                    <label for="">جدول کاربران</label>
                                                    <hr>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <input type="radio" id="members_list" name="members_list"
                                                            <?= in_array('members_list', $levelAccess) ? "checked" : "" ?>>
                                                        <label for="members_list">لیست کاربران </label>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input type="radio" id="member_reset_password"
                                                            name="member_reset_password"
                                                            <?= in_array('member_reset_password', $levelAccess) ? "checked" : "" ?>>
                                                        <label for="member_reset_password">بازنشانی رمز عبور
                                                            کاربر</label>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input type="radio" id="member_delete" name="member_delete"
                                                            <?= in_array('member_delete', $levelAccess) ? "checked" : "" ?>>
                                                        <label for="member_delete">حذف کاربر </label>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input type="radio" id="member_update" name="member_update"
                                                            <?= in_array('member_update', $levelAccess) ? "checked" : "" ?>>
                                                        <label for="member_update">بروزرسانی کاربر </label>
                                                    </div>
                                                </div>
                                                <hr>
                                            </div>
                                            <div class="col-12">
                                                <div class="text-uppercase">
                                                    <label for="">جدول استان ها</label>
                                                    <hr>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <input type="radio" id="provinces_list" name="provinces_list"
                                                            <?= in_array('provinces_list', $levelAccess) ? "checked" : "" ?>>
                                                        <label for="provinces_list">لیست استان ها </label>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input type="radio" id="province_add" name="province_add"
                                                            <?= in_array('province_add', $levelAccess) ? "checked" : "" ?>>
                                                        <label for="province_add">درج استان</label>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input type="radio" id="province_delete" name="province_delete"
                                                            <?= in_array('province_delete', $levelAccess) ? "checked" : "" ?>>
                                                        <label for="province_delete">حذف استان </label>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input type="radio" id="province_update" name="province_update"
                                                            <?= in_array('province_update', $levelAccess) ? "checked" : "" ?>>
                                                        <label for="province_update">بروزرسانی استان </label>
                                                    </div>
                                                </div>
                                                <hr>
                                            </div>
                                            <div class="col-12">
                                                <div class="text-uppercase">
                                                    <label for="">جدول شهر ها</label>
                                                    <hr>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <input type="radio" id="cities_list" name="cities_list"
                                                            <?= in_array('cities_list', $levelAccess) ? "checked" : "" ?>>
                                                        <label for="cities_list">لیست شهر ها </label>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input type="radio" id="city_add" name="city_add"
                                                            <?= in_array('city_add', $levelAccess) ? "checked" : "" ?>>
                                                        <label for="city_add">درج شهر</label>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input type="radio" id="city_delete" name="city_delete"
                                                            <?= in_array('city_delete', $levelAccess) ? "checked" : "" ?>>
                                                        <label for="city_delete">حذف شهر </label>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input type="radio" id="city_update" name="city_update"
                                                            <?= in_array('city_update', $levelAccess) ? "checked" : "" ?>>
                                                        <label for="city_update">بروزرسانی شهر </label>
                                                    </div>
                                                </div>
                                                <hr>
                                            </div>
                                            <div class="col-12">
                                                <div class="text-uppercase">
                                                    <label for="">جدول لاگ ها</label>
                                                    <hr>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <input type="radio" id="logs_list" name="logs_list"
                                                            <?= in_array('logs_list', $levelAccess) ? "checked" : "" ?>>
                                                        <label for="logs_list">لیست لاگ ها </label>
                                                    </div>
                                                </div>
                                                <hr>
                                            </div>
                                            <div class="col-12 text-end">
                                                <button type="submit" class="btn btn-primary px-4 py-1"
                                                    name="change_level_access">ثبت</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!--end row-->
                </div>
            </div>
        </main>
        <!--end page main-->

        <?php
        require_once('../../layout/footer.php');
        ?>
    </div>
    <!--end wrapper-->
    <?php require_once('../../layout/js.php'); ?>
    <script src="assets/js/admin_list_page.js"></script>
    <script>
        checkBox('admin_delete');
        checkBox('admins_list');
        checkBox('admin_update');
        checkBox('admin_add');
        checkBox('blogs_list');
        checkBox('blog_add');
        checkBox('blog_delete');
        checkBox('blog_update');
        checkBox('members_list');
        checkBox('member_reset_password');
        checkBox('member_delete');
        checkBox('member_update');
        checkBox('provinces_list');
        checkBox('province_add');
        checkBox('province_delete');
        checkBox('province_update');
        checkBox('cities_list');
        checkBox('city_add');
        checkBox('city_delete');
        checkBox('city_update');
        checkBox('categories_list');
        checkBox('category_add');
        checkBox('category_delete');
        checkBox('category_update');
        checkBox('logs_list');
        function checkBox(name) {
            let check = ($(`input:radio[name='${name}']`).is(":checked")) ? true : false;
            $(`#${name}`).click(function () {
                if (check) {
                    $(`#${name}`).prop('checked', false);
                    check = false;
                } else {
                    $(`#${name}`).prop('checked', true);
                    check = true;
                }
            })
        }
        let all = false;
        $('#all').click(function () {
            if (!all) {
                $(`input:radio`).prop('checked', true);
                all = true;
            } else {
                $(`input:radio`).prop('checked', false);
                all = false;
            }
        });
    </script>
</body>


<!-- Mirrored from codetheme.ir/onedash/demo/rtl/table-datatable.php by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 May 2024 08:56:28 GMT -->

</html>
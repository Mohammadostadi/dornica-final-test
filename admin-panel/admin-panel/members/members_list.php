<?php
$prefix = 'members';
require_once('../../../app/connection/DB.php');
require_once('../../../app/controller/function.php');
require_once('../../../app/controller/access.php');
require_once('../../../app/controller/city_show.php');
require_once('../../../app/helper/jdf.php');
$provinceList = $db->orderBy('name', 'ASC')
->get('provinces', null, 'id, name');

$page = 1;
pageLimit('members', 7, false);

if(isset($_POST['filtered'])){
    $fname = checkDataSecurity($_POST['fname']);
    $lname = checkDataSecurity($_POST['lname']);
    $gender = checkDataSecurity($_POST['gender']);
    $username = checkDataSecurity($_POST['username']);
    $province_id = checkDataSecurity($_POST['province_id_filter']);
    $city_id = checkDataSecurity($_POST['city_id']);
    $setdate = checkDataSecurity($_POST['setdate']);
    $status = checkDataSecurity($_POST['status']);

    filter($fname, 'fname', 'like', 0);
    filter($lname, 'lname', 'like', 1);
    filter($username, 'username', 'like', 2);
    filter($setdate, 'setdate', 'like', 3);
    filter($gender, 'gender', '=', 4);
    filter($province_id, 'province_id', '=', 5);
    filter($city_id, 'city_id', '=', 6);
    filter($status, 'status', '=', 7);
}

if(isset($_POST['unFilter'])){
    unset($_SESSION[$prefix."_filter"]);
    unset($_SESSION[$prefix."_fname"]);
    unset($_SESSION[$prefix."_lname"]);
    unset($_SESSION[$prefix."_gender"]);
    unset($_SESSION[$prefix."_username"]);
    unset($_SESSION[$prefix."_province_id"]);
    unset($_SESSION[$prefix."_city_id"]);
    unset($_SESSION[$prefix."_setdate"]);
    unset($_SESSION[$prefix."_status"]);
}


$members = $db->join('provinces', 'provinces.id = members.province_id', 'LEFT')
    ->join('cities', 'cities.id = members.city_id', 'LEFT')
    ->orderBy('members.id', 'DESC')
    ->paginate('members', $page, "members.id, fname, lname, gender, phone, username, provinces.name as province, cities.name as city, members.status, members.setdate");

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

    <title>کاربران</title>
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
        <?php
            if (isset($_GET['ok']) and $_GET['ok'] != '')
                showMessage($_GET['ok'])
                    ?>
            <!--breadcrumb-->
            <div class="page-breadcrumb   d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">جداول</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">جدول داده</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        <button class="btn btn-outline-secondary" id="_filter">فیلتر</button>
                    </div>
                </div>
            </div>
            <!--end breadcrumb-->

            <div class="card">
                <div class="card-header py-3">
                    <h6 class="mb-0 text-uppercase">لیست کاربران</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 d-flex">
                            <div class="card border shadow-none w-100">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="text-center">
                                                <tr>
                                                    <th>#</th>
                                                    <th class="px-5">
                                                        نام
                                                    </th>
                                                    <th class="px-5">
                                                        نام خانوادگی
                                                    </th>
                                                    <th class="px-5">
                                                        جنسیت
                                                    </th>
                                                    <th class="px-5">
                                                        نام کاربری
                                                    </th>
                                                    <th class="px-5">
                                                        استان
                                                    </th>
                                                    <th class="px-5">
                                                        شهر
                                                    </th>
                                                    <th class="px-5">
                                                        شماره تماس
                                                    </th>
                                                    <th class="px-5">
                                                        تاریخ عضویت
                                                    </th>
                                                    <th class="px-5">
                                                        وضعیت
                                                    </th>
                                                    <?php if(has_admin_access($_SESSION['user'], 'member_update') or has_admin_access($_SESSION['user'], 'member_reset_password') or has_admin_access($_SESSION['user'], 'member_delete')){ ?>
                                                    <th class="px-5">
                                                        اقدامات
                                                    </th>
                                                    <?php } ?>
                                                </tr>
                                            </thead>
                                            <tbody class="text-center">
                                                <tr id="<?= (isset($_SESSION[$prefix."_filter"]) and !empty($_SESSION[$prefix."_filter"])) ? "" : "filter-row" ?>"
                                                    class="<?= (isset($_SESSION[$prefix."_filter"]) and !empty($_SESSION[$prefix."_filter"])) ? "" : "d-none" ?>">
                                                    <form class=" d-flex justify-content-around align-content-start"
                                                        id="form" action="members_list.php?page=1" method="post">
                                                        <td></td>
                                                        <td> 
                                                            <input class="col form-control" type="text"
                                                                value="<?= (isset($_SESSION[$prefix.'_fname'])?$_SESSION[$prefix.'_fname']:"") ?>"
                                                                name="fname" placeholder="نام">
                                                            </td>
                                                        <td> <input class="col form-control" type="text"
                                                                value="<?= (isset($_SESSION[$prefix.'_lname'])?$_SESSION[$prefix.'_lname']:"") ?>"
                                                                name="lname" placeholder="نام خانوادگی"> </td>
                                                        <td>
                                                        <select id="gender" name="gender"
                                                                class="form-select">
                                                                <option value=""></option>
                                                                    <option
                                                                        <?= (isset($_SESSION[$prefix.'_gender']) and $_SESSION[$prefix.'_gender'] == 0) ? "SELECTED" : "" ?> value="0">
                                                                        مرد
                                                                    </option>
                                                                    <option
                                                                        <?= (isset($_SESSION[$prefix.'_gender']) and $_SESSION[$prefix.'_gender'] == 1) ? "SELECTED" : "" ?> value="1">
                                                                        زن
                                                                    </option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                        <input class="col form-control" type="text"
                                                                value="<?= (isset($_SESSION[$prefix.'_username'])?$_SESSION[$prefix.'_username']:"") ?>"
                                                                name="username" placeholder="نام کاربری">
                                                        </td>
                                                        <td>
                                                            <select id="province" name="province_id_filter"
                                                                class="form-select">
                                                                <option value="" selected>استان را انتخاب کنید</option>
                                                                <?php
                                                                foreach ($provinceList as $province) { ?>
                                                                    <option
                                                                        <?= (isset($_SESSION[$prefix.'_province_id']) and $_SESSION[$prefix.'_province_id'] == $province['id']) ? "SELECTED" : "" ?> value="<?= $province['id'] ?>">
                                                                        <?= $province['name'] ?>
                                                                    </option>
                                                                <?php } ?>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select id="city" name="city_id"
                                                                class="form-select">
                                                                <option value="" selected>ابتدا استان را انتخاب کنید
                                                                </option>
                                                            </select>
                                                        </td>
                                                        <td></td>
                                                        <td> <input id="date" class="col form-control" type="text"
                                                                value="<?= (isset($_SESSION[$prefix.'_setdate'])?$_SESSION[$prefix.'_setdate']:"") ?>"
                                                                name="setdate" placeholder="تاریخ"> </td>
                                                        <td> <select class="form-select text-secondary"
                                                                name="status" id="status">
                                                                <option value="" class="text-secondary">وضعیت</option>
                                                                <option
                                                                    <?= (isset($_SESSION[$prefix.'_status']) and $_SESSION[$prefix.'_status'] == 1) ? 'selected' : '' ?> value="1">فعال</option>
                                                                <option
                                                                    <?= (isset($_SESSION[$prefix.'_status']) and $_SESSION[$prefix.'_status'] == 0) ? 'selected' : '' ?> value="0">غیر فعال</option>
                                                            </select> </td>
                                                        <td class="text-center button-filter">
                                                            <div class="btn-group p-0 m-0">
                                                                <button type="submit" name="filtered" id="apply_filter"
                                                                    class="btn btn-success"> اعمال فیلتر</button>
                                                                <?php if ((isset($_SESSION[$prefix.'_filter']) and !empty($_SESSION[$prefix.'_filter']))) { ?>
                                                                    <button type="submit" name="unFilter" id="delete_filter"
                                                                        class="btn btn-danger button-filter"> حذف
                                                                        فیلتر</button>
                                                                </div>
                                                            </td>
                                                        <?php } ?>
                                                    </form>
                                                </tr>
                                                <?php foreach ($members as $member) { ?>
                                                    <tr class="text-center">
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox">
                                                            </div>
                                                        </td>
                                                        <td><?= $member['fname'] ?></td>
                                                        <td><?= $member['lname'] ?></td>
                                                        <td><?= $member['gender'] == 0 ?"مرد":"زن" ?></td>
                                                        <td><?= $member['username'] ?></td>
                                                        <td><?= $member['province'] ?></td>
                                                        <td><?= $member['city'] ?></td>
                                                        <td><?= $member['phone'] ?></td>
                                                        <td><?= substr($member['setdate'],0, 10) ?></td>
                                                        <td>
                                                            <?= status('active', $member['status']) ?>
                                                        </td>
                                                        <?php if(has_admin_access($_SESSION['user'], 'member_update') or has_admin_access($_SESSION['user'], 'member_reset_password') or has_admin_access($_SESSION['user'], 'member_delete')){ ?>
                                                        <td>
                                                        <div>
                                                        <?php if(has_admin_access($_SESSION['user'], 'member_reset_password')){ ?>
                                                                <a href="member_reset_password.php?id=<?= $member['id'] ?>"
                                                                    class="btn border-0 disabled-sort text-info"
                                                                    data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                                    title="بازیابی رمزعبور" aria-label="Edit"><i
                                                                        class="bx bx-reset"></i></a>
                                                                        <?php } ?>
                                                                        <?php if(has_admin_access($_SESSION['user'], 'member_update')){ ?>
                                                                <a href="member_update.php?id=<?= $member['id'] ?>"
                                                                    class="btn border-0 disabled-sort text-warning"
                                                                    data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                                    title="ویرایش اطلاعات" aria-label="Edit"><i
                                                                        class="bi bi-pencil-fill"></i></a>
                                                                        <?php } ?>
                                                                        <?php if(has_admin_access($_SESSION['user'], 'member_delete')){ ?>
                                                                <button class="remove text-danger btn border-0 "
                                                                    value="<?= $member['id'] ?>" data-bs-toggle="tooltip"
                                                                    data-bs-placement="bottom" title="حذف"
                                                                    aria-label="Delete" style="cursor: pointer;"><i
                                                                        class="bi bi-trash-fill"></i></button>

                                                                <div class="modal fade"
                                                                    id="exampleModal<?= $member['id'] ?>" tabindex="-1"
                                                                    role="dialog" aria-labelledby="exampleModalLabel"
                                                                    aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">

                                                                                <h5 class="modal-title"
                                                                                    id="exampleModalLabel">حذف داده</h5>
                                                                                <button type="button" class="close"
                                                                                    value="<?= $member['id'] ?>"
                                                                                    data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <form
                                                                                action="member_delete.php?id=<?= $member['id'] ?>"
                                                                                method="post">
                                                                                <div class="modal-body">
                                                                                    <h5>آیا مطمئن هستید؟</h5>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button"
                                                                                        value="<?= $member['id'] ?>"
                                                                                        class="btn btn-secondary close"
                                                                                        data-dismiss="modal">لغو</button>
                                                                                    <button type="submit" name="btn_delete"
                                                                                        class="btn btn-primary">حذف</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <?php } ?>
                                                            </div>
                                                        </td>
                                                        <?php } ?>
                                                    </tr>

                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <?php pagination($page, $pages) ?>
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

    <script>
        $(document).ready(function () {
            $("#filter-row").hide();
            $("#_filter").click(function () {
                if ($("#filter-row").hasClass("d-none")) {
                    $("#filter-row").removeClass("d-none");
                }
                $("#filter-row").toggle(400);
            });
        });
    </script>
    <script>
        $("#province").change(function () {
            const id = $(this).val();
            cities(id);
            });
            const current_province = "<?= isset($_SESSION[$prefix.'_province_id'])?$_SESSION[$prefix.'_province_id']:""?>";
                const current_city = "<?= isset($_SESSION[$prefix.'_city_id'])?$_SESSION[$prefix.'_city_id']:""?>";
            if (current_city != "" && current_province != "") {
            cities(current_province, current_city);
            }
            if (current_city == "" && current_province != "") {
            cities(current_province);
            }

            function cities(province, city = null) {
            $.ajax({
                url: "members_list.php",
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
        $('.btn-close').click(function () {
            window.location = 'members_list.php';
        });
    </script>
    <script>
        $(".remove").click(function () {
            const id = $(this).val();
            $(`#exampleModal${id}`).modal("show");
        });
        $(".close").click(function () {
            const id = $(this).val();
            $(`#exampleModal${id}`).modal("hide");
        });
    </script>
</body>


<!-- Mirrored from codetheme.ir/onedash/demo/rtl/table-datatable.php by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 May 2024 08:56:28 GMT -->

</html>
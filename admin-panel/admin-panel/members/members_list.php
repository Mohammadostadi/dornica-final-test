<?php 
require_once('../../../app/connection/DB.php');
require_once('../../../app/controller/access.php');
require_once('../../../app/controller/function.php');
$members = $db->join('provinces', 'provinces.id = members.province_id', 'LEFT')
->join('cities', 'cities.id = members.city_id', 'LEFT')
->get('members', null, "CONCAT(fname, ' ', lname) as name, gender, phone, username, provinces.name as province, cities.name as city, members.status");

?>
<!doctype html>
<html lang="en" dir="rtl">


<!-- Mirrored from codetheme.ir/onedash/demo/rtl/table-datatable.php by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 May 2024 08:56:27 GMT -->

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
    require_once ('../../layout/css.php');
    ?>

    <title>کاربران</title>
</head>

<body>


    <!--start wrapper-->
    <div class="wrapper">
        <!--start top header-->
        <?php
        require_once ('../../layout/header.php');
        ?>
        <!--end top header-->

        <!--start sidebar -->
        <?php
        require_once ('../../layout/asidebar.php');
        ?>
        <!--end sidebar -->

        <!--start content-->

        <main class="page-content">
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
                                                        وضعیت
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-center">
                                                <?php foreach ($members as $member) { ?>
                                                    <tr class="text-center">
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox">
                                                            </div>
                                                        </td>
                                                        <td><?= $member['name'] ?></td>
                                                        <td><?= $member['gender'] ?></td>
                                                        <td><?= $member['username'] ?></td>
                                                        <td><?= $member['province'] ?></td>
                                                        <td><?= $member['city'] ?></td>
                                                        <td><?= $member['phone'] ?></td>
                                                        <td>
                                                            <?= status('active', $member['status']) ?>
                                                        </td>
                                                    </tr>

                                                <?php } ?>
                                            </tbody>
                                        </table>
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
        require_once ('../../layout/footer.php');
        ?>
    </div>
    <!--end wrapper-->
    <?php require_once ('../../layout/js.php'); ?>

</body>


<!-- Mirrored from codetheme.ir/onedash/demo/rtl/table-datatable.php by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 May 2024 08:56:28 GMT -->

</html>
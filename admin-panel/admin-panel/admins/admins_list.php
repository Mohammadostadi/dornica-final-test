<?php 
require_once('../../../app/connection/DB.php');
require_once('../../../app/controller/function.php');
$admins = $db->get('admins', null);

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

    <title>ادمین</title>
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
                <div class="ms-auto">
                    <div class="btn-group">
                            <a class="btn btn-outline-secondary" href="admin_add.php">اضافه کردن داده جدید</a>
                    </div>
                </div>
            </div>
            <!--end breadcrumb-->

            <div class="card">
                <div class="card-header py-3">
                    <h6 class="mb-0 text-uppercase">لیست ادمین</h6>
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
                                                        نام کاربری
                                                    </th>
                                                    <th class="px-5">
                                                        نقش
                                                    </th>
                                                    <th class="px-5">
                                                        وضعیت
                                                    </th>
                                                    <th>اقدامات</th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-center">
                                                <?php foreach ($admins as $admin) { ?>
                                                    <tr class="text-center">
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox">
                                                            </div>
                                                        </td>
                                                        <td><?= $admin['fname'] ?></td>
                                                        <td><?= $admin['lname'] ?></td>
                                                        <td><?= $admin['username'] ?></td>
                                                        <td><?= $admin['role'] ?></td>
                                                        <td>
                                                            <?= status('active', $admin['status']) ?>
                                                        </td>
                                                        <td>
                                                            <div>
                                                                <a href = "admin_update.php?id<?= $admin['id'] ?>"
                                                                    class="btn border-0 disabled-sort text-warning" data-bs-toggle="tooltip"
                                                                    data-bs-placement="bottom" title="ویرایش اطلاعات"                                                                    aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                                                                <button class="edit text-danger btn border-0 "
                                                                    value="<?= $admin['id'] ?>" data-bs-toggle="tooltip"
                                                                    data-bs-placement="bottom" title="حذف" aria-label="Delete"
                                                                    style="cursor: pointer;"><i
                                                                        class="bi bi-trash-fill"></i></button>
                                                                        
                                                                    <div class="modal fade"
                                                                        id="exampleModal<?= $admin['id'] ?>" tabindex="-1"
                                                                        role="dialog" aria-labelledby="exampleModalLabel"
                                                                        aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">

                                                                                    <h5 class="modal-title"
                                                                                        id="exampleModalLabel">حذف داده</h5>
                                                                                    <button type="button" class="close" value="<?= $admin['id'] ?>"
                                                                                        data-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <form action="admin_delete.php?id=<?= $admin['id'] ?>" method="post">
                                                                                    <div class="modal-body">
                                                                                        <h5>آیا مطمئن هستید؟</h5>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" value="<?= $admin['id'] ?>"
                                                                                            class="btn btn-secondary close"
                                                                                            data-dismiss="modal">لغو</button>
                                                                                        <button type="submit"
                                                                                            name="btn_change_status"
                                                                                            class="btn btn-primary">حذف</button>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                            </div>
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
    <script  src="assets/js/admin_list_page.js"></script>

</body>


<!-- Mirrored from codetheme.ir/onedash/demo/rtl/table-datatable.php by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 May 2024 08:56:28 GMT -->

</html>
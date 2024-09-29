<?php
require_once('../../../app/connection/DB.php');
require_once('../../../app/controller/access.php');
require_once('../../../app/controller/function.php');
require_once('../../../app/helper/jdf.php');
$logs = $db->join('admins', 'admins.id = logs.admin_id', 'LEFT')
->orderBy('logs.id', 'DESC')
    ->get('logs', null, 'admins.username, logs.date, changes, table_name, type');

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

    <title>لاگ ها</title>
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
                </div>
                <!--end breadcrumb-->

                <div class="card">
                    <div class="card-header py-3">
                        <h6 class="mb-0 text-uppercase">لیست لاگ ها</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 d-flex">
                                <div class="card border shadow-none w-100">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table" dir="ltr" >
                                                <thead class="text-center">
                                                    <tr>
                                                        <th>#</th>
                                                        <th class="px-5">
                                                            username(admin)
                                                        </th>
                                                        <th class="px-5">
                                                            table
                                                        </th>
                                                        <th class="px-5">
                                                            type
                                                        </th>
                                                        <th class="px-5">
                                                            changes
                                                        </th>
                                                        <th class="px-5">
                                                            date
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody class="text-center">
                                                <?php foreach ($logs as $log) { ?>
                                                    <tr class="text-center">
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox">
                                                            </div>
                                                        </td>
                                                        <td><?= $log['username'] ?></td>
                                                        <td><?= $log['table_name'] ?></td>
                                                        <td>
                                                            <?=  status('log', $log['type']) ?>
                                                        </td>
                                                        <td>
                                                            <?=  $log['changes'] ?>
                                                        </td>
                                                        <td>
                                                            <?=  jdate('Y/m/d H:i', strtotime($log['date'])) ?>
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
        require_once('../../layout/footer.php');
        ?>
    </div>
    <!--end wrapper-->
    <?php require_once('../../layout/js.php'); ?>
</body>


<!-- Mirrored from codetheme.ir/onedash/demo/rtl/table-datatable.php by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 May 2024 08:56:28 GMT -->

</html>
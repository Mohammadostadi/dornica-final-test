<?php
require_once('../../../app/connection/DB.php');

require_once('../../../app/controller/function.php');
require_once('../../../app/controller/access.php');
require_once('../../../app/helper/jdf.php');
$page = 1;
pageLimit('cities', 7, false);
$cities = $db->join('provinces', 'provinces.id = cities.province_id', 'LEFT')
    ->orderBy('id', 'DESC')
    ->paginate('cities', $page, 'cities.id, cities.name, cities.sort, cities.status, provinces.name as province');

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

    <title>شهر ها</title>
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
                            <a class="btn btn-outline-secondary" href="city_add.php">اضافه کردن داده جدید</a>
                        </div>
                    </div>
                </div>
                <!--end breadcrumb-->

                <div class="card">
                    <div class="card-header py-3">
                        <h6 class="mb-0 text-uppercase">لیست شهر ها</h6>
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
                                                            نام استان
                                                        </th>
                                                        <th class="px-5">
                                                            نام شهر
                                                        </th>
                                                        <th class="px-5">
                                                            ترتیب
                                                        </th>
                                                        <th class="px-5">
                                                            وضعیت
                                                        </th>
                                                        <th>اقدامات</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="text-center">
                                                <?php foreach ($cities as $city) { ?>
                                                    <tr class="text-center">
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox">
                                                            </div>
                                                        </td>
                                                        <td><?= $city['province'] ?></td>
                                                        <td><?= $city['name'] ?></td>
                                                        <td><?= $city['sort'] ?></td>
                                                        <td>
                                                            <?= status('active', $city['status']) ?>
                                                        </td>
                                                        <td>
                                                            <div>
                                                                <a href="city_update.php?id=<?= $city['id'] ?>"
                                                                    class="btn border-0 disabled-sort text-warning"
                                                                    data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                                    title="ویرایش اطلاعات" aria-label="Edit"><i
                                                                        class="bi bi-pencil-fill"></i></a>
                                                                <button class="remove text-danger btn border-0 "
                                                                    value="<?= $city['id'] ?>" data-bs-toggle="tooltip"
                                                                    data-bs-placement="bottom" title="حذف"
                                                                    aria-label="Delete" style="cursor: pointer;"><i
                                                                        class="bi bi-trash-fill"></i></button>

                                                                <div class="modal fade" id="exampleModal<?= $city['id'] ?>"
                                                                    tabindex="-1" role="dialog"
                                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">

                                                                                <h5 class="modal-title"
                                                                                    id="exampleModalLabel">حذف داده</h5>
                                                                                <button type="button" class="close"
                                                                                    value="<?= $city['id'] ?>"
                                                                                    data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <form
                                                                                action="city_delete.php?id=<?= $city['id'] ?>"
                                                                                method="post">
                                                                                <div class="modal-body">
                                                                                    <h5>آیا مطمئن هستید؟</h5>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button"
                                                                                        value="<?= $city['id'] ?>"
                                                                                        class="btn btn-secondary close"
                                                                                        data-dismiss="modal">لغو</button>
                                                                                    <button type="submit" name="btn_delete"
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
                                        <?php pagination($page, $pages) ?>
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
    <script>
        $('.btn-close').click(function () {
            window.location = 'cities_list.php';
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
<?php
require_once('../../../app/connection/DB.php');

require_once('../../../app/controller/function.php');
require_once('../../../app/controller/access.php');
require_once('../../../app/helper/jdf.php');

$page = 1;
pageLimit('blogs', 7, false);

$blogs = $db->join('categories', 'categories.id = blogs.blog_category', 'LEFT')
    ->orderBy('id', 'DESC')
    ->paginate('blogs', $page, 'blogs.id, blogs.title, categories.name, date, blogs.status');

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

    <title>اخبار</title>
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
                    <?php if(has_admin_access($_SESSION['user'], 'blog_add')){ ?>
                    <div class="ms-auto">
                        <div class="btn-group">
                            <a class="btn btn-outline-secondary" href="blog_add.php">اضافه کردن داده جدید</a>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <!--end breadcrumb-->

                <div class="card">
                    <div class="card-header py-3">
                        <h6 class="mb-0 text-uppercase">لیست اخبار</h6>
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
                                                            عنوان
                                                        </th>
                                                        <th class="px-5">
                                                            دسته بندی
                                                        </th>
                                                        <th class="px-5">
                                                            تاریخ
                                                        </th>
                                                        <th class="px-5">
                                                            وضعیت
                                                        </th>
                                                    <?php if (has_admin_access($_SESSION['user'], 'blog_update') or has_admin_access($_SESSION['user'], 'blog_delete')) { ?>
                                                        <th>اقدامات</th>
                                                    <?php } ?>
                                                </tr>
                                            </thead>
                                            <tbody class="text-center">
                                                <?php foreach ($blogs as $blog) { ?>
                                                    <tr class="text-center">
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox">
                                                            </div>
                                                        </td>
                                                        <td><?= $blog['title'] ?></td>
                                                        <td><?= $blog['name'] ?></td>
                                                        <td><?= $blog['date'] ?></td>
                                                        <td>
                                                            <?= status('active', $blog['status']) ?>
                                                        </td>
                                                        <?php if (has_admin_access($_SESSION['user'], 'blog_update') or has_admin_access($_SESSION['user'], 'blog_delete')) { ?>
                                                        <td>
                                                            <div>
                                                                <?php if (has_admin_access($_SESSION['user'], 'blog_update')) { ?>
                                                                    <a href="blog_update.php?id=<?= $blog['id'] ?>"
                                                                        class="btn border-0 disabled-sort text-warning"
                                                                        data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                                        title="ویرایش اطلاعات" aria-label="Edit"><i
                                                                            class="bi bi-pencil-fill"></i></a>
                                                                <?php } ?>
                                                                <?php if (has_admin_access($_SESSION['user'], 'blog_delete')) { ?>
                                                                    <button class="remove text-danger btn border-0 "
                                                                        value="<?= $blog['id'] ?>" data-bs-toggle="tooltip"
                                                                        data-bs-placement="bottom" title="حذف"
                                                                        aria-label="Delete" style="cursor: pointer;"><i
                                                                            class="bi bi-trash-fill"></i></button>

                                                                    <div class="modal fade" id="exampleModal<?= $blog['id'] ?>"
                                                                        tabindex="-1" role="dialog"
                                                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">

                                                                                    <h5 class="modal-title"
                                                                                        id="exampleModalLabel">حذف داده</h5>
                                                                                    <button type="button" class="close"
                                                                                        value="<?= $blog['id'] ?>"
                                                                                        data-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <form
                                                                                    action="blog_delete.php?id=<?= $blog['id'] ?>"
                                                                                    method="post">
                                                                                    <div class="modal-body">
                                                                                        <h5>آیا مطمئن هستید؟</h5>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button"
                                                                                            value="<?= $blog['id'] ?>"
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
        $('.btn-close').click(function () {
            window.location = 'blogs_list.php';
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
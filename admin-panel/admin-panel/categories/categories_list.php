<?php
require_once('../../../app/connection/DB.php');

require_once('../../../app/controller/function.php');
require_once('../../../app/controller/access.php');
require_once('../../../app/helper/jdf.php');
$page = 1;
pageLimit('categories', 7, false);
$categories = $db->orderBy('id', 'DESC')
    ->paginate('categories', $page);

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

    <title>دسته بندی اخبار</title>
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
                    <?php if(has_admin_access($_SESSION['user'], 'category_add')){ ?>
                    <div class="ms-auto">
                        <div class="btn-group">
                            <a class="btn btn-outline-secondary" href="category_add.php">اضافه کردن داده جدید</a>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <!--end breadcrumb-->

                <div class="card">
                    <div class="card-header py-3">
                        <h6 class="mb-0 text-uppercase">لیست دسته بندی اخبار</h6>
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
                                                            ترتیب
                                                        </th>
                                                        <th class="px-5">
                                                            وضعیت
                                                        </th>
                                                    <?php if (has_admin_access($_SESSION['user'], 'category_update') or has_admin_access($_SESSION['user'], 'category_delete')) { ?>
                                                        <th>اقدامات</th>
                                                    <?php } ?>
                                                </tr>
                                            </thead>
                                            <tbody class="text-center">
                                                <?php foreach ($categories as $category) { ?>
                                                    <tr class="text-center">
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox">
                                                            </div>
                                                        </td>
                                                        <td><?= $category['name'] ?></td>
                                                        <td><?= $category['sort'] ?></td>
                                                        <td>
                                                            <?= status('active', $category['status']) ?>
                                                        </td>
                                                        <?php if (has_admin_access($_SESSION['user'], 'category_update') or has_admin_access($_SESSION['user'], 'category_delete')) { ?>
                                                        <td>
                                                            <div>
                                                                <?php if (has_admin_access($_SESSION['user'], 'category_update')) { ?>
                                                                    <a href="category_update.php?id=<?= $category['id'] ?>"
                                                                        class="btn border-0 disabled-sort text-warning"
                                                                        data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                                        title="ویرایش اطلاعات" aria-label="Edit"><i
                                                                            class="bi bi-pencil-fill"></i></a>
                                                                <?php } ?>
                                                                <?php if (has_admin_access($_SESSION['user'], 'category_delete')) { 
                                                                    
                                                                    $categoryDelete = $db->where('blog_category', $category['id'])
                                                                    ->getValue('blogs', 'COUNT(id)');
                                                                    ?>
                                                                    <button class="<?= ($categoryDelete == 0)?"remove text-danger":"text-secondary" ?> btn border-0 "
                                                                        value="<?= $category['id'] ?>" data-bs-toggle="tooltip"
                                                                        data-bs-placement="bottom" title="<?= ($categoryDelete == 0)?"حذف":"غیر قابل حذف" ?>"
                                                                        aria-label="Delete" style="cursor: pointer;"><i
                                                                            class="bi bi-trash-fill"></i></button>

                                                                    <div class="modal fade"
                                                                        id="exampleModal<?= $category['id'] ?>" tabindex="-1"
                                                                        role="dialog" aria-labelledby="exampleModalLabel"
                                                                        aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">

                                                                                    <h5 class="modal-title"
                                                                                        id="exampleModalLabel">حذف داده</h5>
                                                                                    <button type="button" class="close"
                                                                                        value="<?= $category['id'] ?>"
                                                                                        data-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <form
                                                                                    action="category_delete.php?id=<?= $category['id'] ?>"
                                                                                    method="post">
                                                                                    <div class="modal-body">
                                                                                        <h5>آیا مطمئن هستید؟</h5>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button"
                                                                                            value="<?= $category['id'] ?>"
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
                                </div>
                                <?php pagination($page, $pages) ?>
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
            window.location = 'categories_list.php';
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
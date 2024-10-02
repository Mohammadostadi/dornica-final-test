<?php
require_once('../../../app/connection/DB.php');

require_once('../../../app/controller/function.php');
require_once('../../../app/controller/access.php');
require_once('../../../app/helper/jdf.php');
$page = 1;
pageLimit('comments', 7, false);
if (isset($_POST['change_status'])) {
    list($id, $status) = explode('/', checkDataSecurity($_POST['change_status']));
    $db->where('id', $id)
        ->update('comments', [
            'status' => $status
        ]);
    // var_dump($db->getLastQuery());die;
}

$comments = $db->join('blogs', 'blogs.id = comments.blog_id')
    ->paginate('comments', $page, 'comments.id, concat(comments.fname, \' \', comments.lname) as name, blogs.title, comments.setdate, comments.status');
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
    <link rel="stylesheet" href="../../assets/css/sort.css">
    <title>لیست کامنت ها</title>
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
            <!--breadcrumb-->
            <div class="page-breadcrumb   d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">نظرات و پیام ها</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">لیست نظرات</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        <?php if (isset($member_comment) and !empty($member_comment)) { ?>
                            <a class="btn btn-outline-secondary" href="../members/members_list.php?comment=1">برگشت به لیست
                                کاربران</a>
                        <?php } ?>
                        <button class="btn btn-outline-secondary" id="_filter">فیلتر</button>
                    </div>
                </div>
            </div>
            <!--end breadcrumb-->
            <div class="card">
                <div class="card-header py-3">
                    <h6 class="mb-0 text-uppercase">لیست کامنت ها</h6>
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
                                                        خبر
                                                    </th>
                                                    <th class="px-5">
                                                        نام
                                                    </th>
                                                    <th class="px-5">
                                                        زمان
                                                    </th>
                                                    <th class="px-5">
                                                        وضعیت
                                                    </th>
                                                    <th>اقدامات</th>

                                                </tr>
                                            </thead>
                                            <tbody class="text-center">
                                                <?php foreach ($comments as $comment) { ?>
                                                    <tr>
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox">
                                                            </div>
                                                        </td>
                                                        <td><?= $comment['title'] ?></td>
                                                        <td><?= $comment['name'] ?></td>
                                                        <td dir="ltr">
                                                            <?= jdate('Y/m/d', strtotime($comment['setdate'])) ?>
                                                        </td>
                                                        <td>
                                                            <?php status('read', $comment['status']); ?>
                                                        </td>
                                                        <td>
                                                            <div>
                                                                <button value="<?= $comment['id'] ?>"
                                                                    class=" btn border-0 bx p-0 bx-edit edit"
                                                                    data-toggle="modal" data-bs-toggle="tooltip"
                                                                    data-bs-placement="bottom" title="ویرایش وضعیت"
                                                                    data-target="#exampleModal"></button>
                                                                <div class="modal fade"
                                                                    id="exampleModal<?= $comment['id'] ?>" tabindex="-1"
                                                                    role="dialog" aria-labelledby="exampleModalLabel"
                                                                    aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">

                                                                                <h5 class="modal-title"
                                                                                    id="exampleModalLabel">ویرایش
                                                                                    وضعیت</h5>
                                                                                <button type="button" class="close"
                                                                                    value="<?= $comment['id'] ?>"
                                                                                    data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <form method="POST">
                                                                                <div class="modal-body">
                                                                                    <select class="form-select"
                                                                                        name="change_status" id="SelectBox">
                                                                                        <?php if ($comment['status'] != 2) { ?>
                                                                                            <option
                                                                                                value="<?= $comment['id'] ?>/2">
                                                                                                تایید شده
                                                                                            </option>
                                                                                        <?php }
                                                                                        if ($comment['status'] != 0) {
                                                                                            ?>
                                                                                            <option
                                                                                                value="<?= $comment['id'] ?>/0">
                                                                                                درحال بررسی
                                                                                            </option>
                                                                                        <?php }
                                                                                        if ($comment['status'] != 1) {
                                                                                            ?>
                                                                                            <option
                                                                                                value="<?= $comment['id'] ?>/1">
                                                                                                تایید نشده
                                                                                            </option>
                                                                                        <?php } ?>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button"
                                                                                        class="btn btn-secondary close"
                                                                                        value="<?= $comment['id'] ?>"
                                                                                        data-dismiss="modal">لغو</button>
                                                                                    <button type="submit"
                                                                                        name="btn_change_status"
                                                                                        class="btn btn-primary">ذخیره
                                                                                        تنظیمات</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <a href="comment_detail.php?id=<?= $comment['id'] ?>"
                                                                    class="text-primary" data-bs-toggle="tooltip"
                                                                    data-bs-placement="bottom" title="وضعیت جزئیات"
                                                                    data-bs-original-title="وضعیت جزئیات"
                                                                    aria-label="Views"><i class="bi bi-eye-fill"></i></a>

                                                            </div>
                                                        </td>
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

    <?php
    require_once('../../layout/js.php');
    ?>
    <script>
        $('.btn-close').click(function () {
            window.location = 'cities_list.php';
        });
    </script>
    <script>
        $(".edit").click(function () {
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
<?php

require_once('../../app/connection/DB.php');
require_once('../../app/controller/function.php');
require_once('../../app/helper/view.php');
$member = $db->where('username', $_SESSION['member'])
    ->getOne('members');

if (isset($_GET['id'])) {
    $id = checkDataSecurity($_GET['id']);
    $db->where('id', $id)
        ->delete('comments');
    header('Location:comments.php');
}
$comments = $db->where('member_id', $member['id'])
    ->join('blogs', 'blogs.id = comments.blog_id', 'LEFT')
    ->join('categories', 'blogs.blog_category = categories.id', 'LEFT')
    ->orderBy('comments.setdate', 'DESC')
    ->get('comments', null, 'comments.id, blogs.blog_category, categories.name, blogs.title, blogs.id as blog, comments.status');
$path = basename($_SERVER['PHP_SELF']);
?>


<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from bookland.dexignzone.com/xhtml/my-profile.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Apr 2024 14:18:19 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="robots" content="" />
    <meta name="description" content="Bookland-Book Store Ecommerce Website" />
    <meta property="og:title" content="Bookland-Book Store Ecommerce Website" />
    <meta property="og:description" content="Bookland-Book Store Ecommerce Website" />
    <meta property="og:image" content="../../makaanlelo.com/tf_products_007/bookland/xhtml/social-image.php" />
    <meta name="format-detection" content="telephone=no">

    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />

    <!-- PAGE TITLE HERE -->
    <title>Bookland-Book Store Ecommerce Website</title>

    <!-- MOBILE SPECIFIC -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php require_once('../layout/css.php') ?>
    <!-- STYLESHEETS -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="icons/fontawesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css">

    <!-- GOOGLE FONTS-->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&amp;family=Poppins:wght@100;200;300;400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet">

</head>

<body id="bg" dir="rtl">
    <div class="page-wraper">
        <div id="loading-area">
            <div class="preloader d-flex align-items-center justify-content-center">
                <div class="preloader-inner position-relative">
                    <div class="text-center">
                        <img class="jump mb-50" src="../../attachment/imgs/loading.svg" alt="">
                        <h6>در حال بارگذاری</h6>
                        <div class="loader">
                            <div class="bar bar1"></div>
                            <div class="bar bar2"></div>
                            <div class="bar bar3"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Content -->
        <div class="page-content bg-white">
            <!-- contact area -->
            <div class="content-block">
                <!-- Browse Jobs -->
                <section class="content-inner bg-white">
                    <div class="container">
                        <div class="row">
                            <?php require_once('layout/sidebar.php') ?>
                            <div class="col-xl-9 col-lg-8 m-b30">
                                <div class="table-responsive">
                                    <table class="table check-tbl">
                                    <?php   
                                    if (empty($comments)) { ?>
                                                    <div class="text-center">داده ایی برای نمایش وجود ندارد</div>
                                                <?php } else { ?>
                                        <thead>
                                            <tr>
                                                <th>خبر</th>
                                                <th>دسته بندی</th>
                                                <th>وضعیت</th>
                                                <th>حذف</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                                foreach ($comments as $comment) { ?>
                                                    <tr>
                                                        <td class="product-item-name"><a
                                                                href="../singe-page/single.php?id=<?= $comment['blog'] ?>"><?= $comment['title'] ?></a>
                                                        </td>
                                                        <td class="product-item-price"><?= $comment['name'] ?></td>
                                                        <td class="product-item-price"><?= status("read",$comment['status']) ?></td>
                                                        <td class="product-item-close"><a
                                                                href="comment.php?id=<?= $comment['id'] ?>"
                                                                class="ti-close"></a></td>
                                                    </tr>
                                                <?php } ?>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Browse Jobs END -->
            </div>
        </div>
        <!-- Content END-->

        <button class="scroltop" type="button"><i class="fas fa-arrow-up"></i></button>
    </div>

    <!-- JAVASCRIPT FILES ========================================= -->
    <script src="js/jquery.min.js"></script><!-- JQUERY MIN JS -->
    <script src="vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script><!-- BOOTSTRAP MIN JS -->
    <script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script><!-- BOOTSTRAP SELECT MIN JS -->
    <script src="js/custom.js"></script><!-- CUSTOM JS -->

</body>

<!-- Mirrored from bookland.dexignzone.com/xhtml/my-profile.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Apr 2024 14:18:19 GMT -->

</html>
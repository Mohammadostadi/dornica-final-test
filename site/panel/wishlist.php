<?php

require_once('../../app/connection/DB.php');
require_once('../../app/controller/function.php');
require_once('../../app/helper/view.php');
$SITE_PATH = '..';
$URL_PATH = '../..';
$member = $db->where('username', $_SESSION['member'])
    ->getOne('members');

if (isset($_GET['id'])) {
    $id = checkDataSecurity($_GET['id']);
    $db->where('id', $id)
        ->delete('wishlist');
    header('Location:wishlist.php');
}
$wishlists = $db->where('member_id', $member['id'])
    ->join('blogs', 'blogs.id = wishlist.blog_id', 'LEFT')
    ->join('categories', 'blogs.blog_category = categories.id', 'LEFT')
    ->orderBy('wishlist.setdate', 'DESC')
    ->get('wishlist', null, 'wishlist.id, blogs.blog_category, categories.name, blogs.title, blogs.id as blog');
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
    <?php require_once('assets/layout/css.php') ?>

</head>

<body id="bg" dir="rtl">
    <div class="page-wraper">
        <?php require_once('assets/layout/loader.php') ?>
        <!-- Content -->
        <div class="page-content bg-white">
            <!-- contact area -->
            <div class="content-block">
                <!-- Browse Jobs -->
                <section class="content-inner bg-white">
                    <div class="container">
                        <div class="row">
                            <?php require_once('assets/layout/sidebar.php') ?>
                            <div class="col-xl-9 col-lg-8 m-b30">
                                <div class="table-responsive">
                                    <table class="table check-tbl">
                                    <?php   
                                    if (empty($wishlists)) { ?>
                                                    <div class="text-center">داده ایی برای نمایش وجود ندارد</div>
                                                <?php } else { ?>
                                        <thead>
                                            <tr>
                                                <th>خبر</th>
                                                <th>دسته بندی</th>
                                                <th>حذف</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                                foreach ($wishlists as $wishlist) { ?>
                                                    <tr>
                                                        <td class="product-item-name"><a
                                                                href="../singe-page/single.php?id=<?= $wishlist['blog'] ?>"><?= $wishlist['title'] ?></a>
                                                        </td>
                                                        <td class="product-item-price"><?= $wishlist['name'] ?></td>
                                                        <td class="product-item-close"><a
                                                                href="wishlist.php?id=<?= $wishlist['id'] ?>"
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

    <?php require_once('assets/layout/js.php') ?>

</body>

<!-- Mirrored from bookland.dexignzone.com/xhtml/my-profile.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Apr 2024 14:18:19 GMT -->

</html>
<?php
require_once('app/connection/DB.php');
require_once('app/controller/function.php');
require_once('app/helper/view.php');
require_once('app/helper/jdf.php');

$SITE_PATH = 'site';
$URL_PATH = '';

$categoriesList = $db->where('status', 1)
    ->orderBy('name', 'ASC')
    ->get('categories', null, 'id, name');

require_once('site/layout/login.php');


?>
<!DOCTYPE html>
<html class="no-js" lang="en">


<!-- Mirrored from webilux.net/demo-newsviral/index.html by HTTrack We Copier/3.x [XR&CO'2014], Sat, 28 Sep 2024 10:08:58 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>نیوز وایرال - قالب HTML نیوز وایرال</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href=.html">
    <link rel="shortcut icon" type="image/x-icon" href="attachment/imgs/favicon.svg">
    <!-- NewsViral CSS  -->
    <?php require_once('site/layout/css.php') ?>
</head>

<body>
    <!-- Preloader Start -->
    <?php require_once('site/layout/loader.php') ?>
    <div class="main-wrap">
        <!--Offcanvas sidebar-->
        <aside id="sidebar-wrapper" class="custom-scrollbar offcanvas-sidebar position-right">
            <button class="off-canvas-close"><i class="ti-close"></i></button>
            <div class="sidebar-inner">
                <!--Search-->
                <div class="siderbar-widget mb-50 mt-30">
                    <form action="#" method="get" class="search-form position-relative">
                        <input type="text" class="search_field" placeholder="جستجو ..." value="" name="s">
                        <span class="search-icon"><i class="ti-search mr-5"></i></span>
                    </form>
                </div>
                <!--lastest post-->
                <div class="sidebar-widget mb-50">
                    <div class="widget-header mb-30">
                        <h5 class="widget-title">پرطرفدارترین ها</h5>
                    </div>
                    <?php
                    $PopularBlogs = $db->orderBy('counter', 'DESC')
                        ->get('blogs', 5);
                    ?>
                    <div class="post-aside-style-2">
                        <ul class="list-post">
                            <?php foreach ($PopularBlogs as $popularBlog) { ?>
                                <li class="mb-30 wow fadeIn animated">
                                    <div class="d-flex">
                                        <div class="post-thumb d-flex ml-15 border-radius-5 img-hover-scale">
                                            <a class="color-white" href="site/singe-page/single.php">
                                                <img src="<?= isset($popularBlog['image']) ? "attachment/imgs/blogs" . $popularBlog['image'] : "attachment/imgs/thumbnail-2.jpg" ?>"
                                                    alt="">
                                            </a>
                                        </div>
                                        <div class="post-content media-body">
                                            <h6 class="post-title mb-10 text-limit-2-row"><a
                                                    href="site/singe-page/single.php?id=<?= $popularBlog['id'] ?>&click=1"><?= $popularBlog['description'] ?></a>
                                            </h6>
                                            <div
                                                class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase">
                                                <span class="post-by">توسط <a href="author.html">همتی</a></span>
                                                <span class="post-on"><?= $popularBlog['date'] ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
        </aside>
        <!-- Main Header -->
        <?php
        require_once('site/layout/header.php')
            ?>
        <!-- Main Wrap Start -->
        <main class="position-relative">
            <div class="container">
                <div class="row">
                    <!-- sidebar-left -->
                    <?php require_once('site/layout/left_sidebar.php') ?>
                    <!-- main content -->
                    <div class="col-lg-10 col-md-9 order-1 order-md-2">
                        <div class="row">
                            <div class="col-lg-8 col-md-12">
                                <!-- Featured posts -->
                                <div class="featured-post mb-50">
                                    <h4 class="widget-title mb-30">آخرین <span>خبر</span></h4>
                                    <?php
                                    $lastBlog = $db->orderBy('date', 'DESC')
                                        ->join('categories', 'categories.id = blogs.blog_category', 'LEFT')
                                        ->getOne('blogs', 'blogs.id, title, description, categories.name, date, counter, image');
                                    ?>
                                    <div class="featured-slider-1 border-radius-10">
                                        <div class="featured-slider-1-items">
                                            <div class="slider-single p-10">
                                                <div
                                                    class="img-hover-slide border-radius-15 mb-30 position-relative overflow-hidden">
                                                    <span class="top-right-icon bg-dark"><i
                                                            class="mdi mdi-camera-alt"></i></span>
                                                    <a
                                                        href="site/singe-page/single.php?id=<?= $lastBlog['id'] ?>&click=1">
                                                        <img src="<?= (isset($lastBlog['image']) and $lastBlog['image'] != '') ? "attachment/imgs/blogs/" . $lastBlog['image'] : "admin-panel/assets/images/ads/default.png" ?>"
                                                            alt="post-slider">
                                                    </a>
                                                </div>
                                                <div class="pr-10 pl-10">
                                                    <div class="entry-meta mb-30">
                                                        <a class="entry-meta meta-0" href="category.html"><span
                                                                class="post-in background1 text-danger font-x-small"><?= $lastBlog['name'] ?></span></a>
                                                        <div class="float-left font-small">
                                                            <?php

                                                            $lastLike = $db->where('blog_id', $lastBlog['id'])
                                                                ->getValue('wishlist', 'COUNT(id)');
                                                            $lastComment = $db->where('blog_id', $lastBlog['id'])
                                                                ->getValue('comments', 'COUNT(id)');
                                                            ?>
                                                            <span><span class="ml-10 text-muted"><i class="fa fa-eye"
                                                                        aria-hidden="true"></i></span><?= $lastBlog['counter'] ?></span>
                                                            <span class="mr-30"><span class="ml-10 text-muted"><i
                                                                        class="fa fa-comment"
                                                                        aria-hidden="true"></i></span><?= $lastComment ?></span>
                                                            <span class="mr-30"><span class="ml-10 text-muted"><i
                                                                        class="fa fa-heart"
                                                                        aria-hidden="true"></i></span><?= $lastLike ?></span>
                                                        </div>
                                                    </div>
                                                    <h4 class="post-title mb-20"><a
                                                            href="site/singe-page/single.php?id=<?= $lastBlog['id'] ?>&click=1"><?= $lastBlog['description'] ?></a>
                                                    </h4>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--Videos-->
                                <div class="sidebar-widget">
                                    <div class="widget-header position-relative mb-20">
                                        <div class="row">
                                            <div class="col-7">
                                                <h5 class="widget-title mb-0">اخبار <span>آرشیو</span></h5>
                                            </div>
                                            <div class="col-5 text-left">
                                                <h6 class="font-medium pl-15">
                                                    <a class="text-muted font-small" href="site/category/category-big.php">مشاهده همه</a>
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="block-tab-item post-module-1 post-module-4">
                                        <div class="row">
                                            <?php
                                            $resentBlogs = $db->where('blogs.status', 1)
                                                ->join('categories', 'categories.id = blogs.blog_category', 'LEFT')
                                                ->orderBy('setdate', 'DESC')
                                                ->get('blogs', 4, 'blogs.id, title, description, categories.name, date, counter, image');
                                            ?>
                                            <?php foreach ($resentBlogs as $resentBlog) { ?>
                                                <div class="slider-single col-md-6 mb-30">
                                                    <div class="img-hover-scale border-radius-10">
                                                        <a
                                                            href="site/singe-page/single.php?id=<?= $resentBlog['id'] ?>&click=1">
                                                            <img class="border-radius-10"
                                                                src="<?= (isset($resentBlog['image']) and $resentBlog['image'] != '') ? "attachment/imgs/blogs/" . $resentBlog['image'] : "admin-panel/assets/images/ads/default.png" ?>"
                                                                width="358px" height="162px" alt="post-slider">
                                                        </a>
                                                    </div>
                                                    <a
                                                        href="site/singe-page/single.php?id=<?= $resentBlog['id'] ?>&click=1"><?= $resentBlog['title'] ?></a>
                                                    <h5 class="post-title pr-5 pl-5 mb-10 mt-15 text-limit-2-row">
                                                        <a
                                                            href="site/singe-page/single.php?id=<?= $resentBlog['id'] ?>&click=1"><?= $resentBlog['description'] ?></a>
                                                    </h5>
                                                    <div class="entry-meta meta-1 font-x-small mt-10 pr-5 pl-5 text-muted">

                                                        <span><span class="ml-5"><i class="fa fa-eye"
                                                                    aria-hidden="true"></i></span><?= $resentBlog['counter'] ?></span>

                                                        <?php
                                                        $countResentComment = $db->where('blog_id', $resentBlog['id'])
                                                            ->where('status', 2)
                                                            ->getValue('comments', 'COUNT(id)');

                                                        $countResentLike = $db->where('blog_id', $resentBlog['id'])
                                                            ->getValue('wishlist', 'COUNT(id)');

                                                        ?>
                                                        <span class="mr-15"><span class="ml-5 text-muted"><i
                                                                    class="fa fa-comment"
                                                                    aria-hidden="true"></i></span><?= $countResentComment ?></span>

                                                        <span class="mr-15"><span class="ml-5 text-muted"><i
                                                                    class="fa fa-heart"
                                                                    aria-hidden="true"></i></span><?= $countResentLike ?></span>

                                                        <span><span class="ml-5"></span><?= $resentBlog['date'] ?></span>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12 sidebar-right">
                                <?php require_once('site/layout/right_sidebar.php') ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-8 col-md-12">
                                <div class="latest-post mb-50">
                                    <div class="widget-header position-relative mb-30">
                                        <div class="row">
                                            <div class="col-7">
                                                <h4 class="widget-title mb-0">جدیدترین <span>پست ها</span></h4>
                                            </div>
                                            <div class="col-5 text-left">
                                                <h6 class="font-medium pl-15">
                                                    <a class="text-muted font-small" href="site/category/category-big.php">مشاهده همه</a>
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="loop-list-style-1">
                                        <?php
                                        $page = 1;
                                        pageLimit('blogs', 5, false);
                                        $blogs = $db->orderBy('date', 'DESC')
                                            ->where('blogs.status', 1)
                                            ->join('categories', 'categories.id = blogs.blog_category', 'LEFT')
                                            ->paginate('blogs', $page, 'blogs.id, categories.name, description, date, counter, post_liked, image');
                                        foreach ($blogs as $blog) {
                                            ?>
                                            <article
                                                class="p-10 background-white border-radius-10 mb-30 wow fadeIn animated">
                                                <div class="d-flex">
                                                    <div class="post-thumb d-flex ml-15 border-radius-15 img-hover-scale">
                                                        <a class="color-white"
                                                            href="site/singe-page/single.php?id=<?= $blog['id'] ?>&click=1">
                                                            <img class="border-radius-15"
                                                                src="<?= (isset($blog['image']) and $blog['image'] != '') ? "../../attachment/imgs/blogs/" . $blog['image'] : "../../admin-panel/assets/images/ads/default.png" ?>"
                                                                alt="">
                                                        </a>
                                                    </div>
                                                    <div class="post-content media-body">
                                                        <div class="entry-meta mb-15 mt-10">
                                                            <a class="entry-meta meta-2" href="category.html"><span
                                                                    class="post-in text-danger font-x-small"><?= $blog['name'] ?></span></a>
                                                        </div>
                                                        <h5 class="post-title mb-15 text-limit-2-row">
                                                            <span class="post-format-icon">
                                                                <ion-icon name="videocam-outline"></ion-icon>
                                                            </span>
                                                            <a
                                                                href="site/singe-page/single.php?id=<?= $blog['id'] ?>&click=1"><?= $blog['description'] ?></a>
                                                        </h5>
                                                        <div
                                                            class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase">
                                                            <span class="post-by">
                                                                <i class="fa fa-eye"></i>
                                                                <?= $blog['counter'] ?>
                                                                بازدید
                                                            </span>
                                                            <span class="post-by">
                                                                <i class="fa fa-heart"></i>
                                                                <?= $blog['post_liked'] ?>
                                                                لایک
                                                            </span>
                                                            <span class="post-on"><?= $blog['date'] ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </article>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="pagination-area mb-30">
                                    <?= pagination($page, $pages) ?>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12 sidebar-right">
                                <?php require_once('site/layout/right_sidebar_second.php') ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!-- Footer Start-->
        <?php require_once('site/layout/footer.php') ?>
    </div> <!-- Main Wrap End-->
    <div class="dark-mark"></div>
    <!-- Vendor JS-->
    <?php require_once('site/layout/js.php') ?>
    <script src="assets/js/vendor/jquery.nice-select.min.js"></script>
    <script src="assets/js/vendor/perfect-scrollbar.js"></script>
    <script>
        $(".edit").click(function () {
            $(`#exampleModal`).modal("show");
        });
        $(".close").click(function () {
            $(`#exampleModal`).modal("hide");
        });
    </script>
    <script>
        (() => {
            'use strict'
            const forms = document.querySelectorAll('.needs-validation')
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>
    <script>
        $('.btn-close').click(function () {
            window.location = 'index.php';
        });
    </script>
</body>


<!-- Mirrored from webilux.net/demo-newsviral/index.html by HTTrack We Copier/3.x [XR&CO'2014], Sat, 28 Sep 2024 10:08:58 GMT -->

</html>
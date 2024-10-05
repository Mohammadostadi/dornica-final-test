<?php

require_once('../../app/connection/DB.php');
require_once('../../app/controller/function.php');
require_once('../../app/helper/view.php');
require_once('../../app/helper/jdf.php');
$SITE_PATH = '..';
$URL_PATH = '../..';
require_once('../layout/login.php');

if(isset($_GET['category'])){
    $id = checkDataSecurity($_GET['category']);
    $category_name = $db->where('id', $id)
    ->getValue('categories', 'name');
    $db->where('blog_category', $id);
}
$page = 1;
pageLimit('blogs', 5, false);
if(isset($_GET['category']))
    $db->where('blog_category', $id);
$categories = $db->orderBy('date', 'DESC')
->where('blogs.status', 1)
->join('categories', 'categories.id = blogs.blog_category', 'LEFT')
->paginate('blogs', $page, 'blogs.id, title, categories.name, description, date, image, post_liked, counter, full_description, blog_category');

?>

<!DOCTYPE html>
<html class="no-js" lang="en">


<!-- Mirrored from webilux.net/demo-newsviral/category-big.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 28 Sep 2024 10:08:58 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>اخبار ورزشی - قالب HTML نیوز وایرال</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.html">
    <link rel="shortcut icon" type="image/x-icon" href="../../attachment/imgs/favicon.svg">
    <!-- NewsViral CSS  -->
    <?php require_once('../layout/css.php') ?>
</head>

<body>
    <!-- Preloader Start -->
    <?php require_once('../layout/loader.php') ?>
    <div class="main-wrap">
        <!--Offcanvas sidebar-->
        <?php require_once('../layout/sidebar.php') ?>
        <!-- Main Header -->
        <?php require_once('../layout/header.php') ?>
        <!-- Main Wrap Start -->
        <main class="position-relative">
            <?php if(isset($id)){ ?>
            <div class="archive-header text-center mb-50">
                <div class="container">
                    <h2><span class="text-info">اخبار <?= $category_name ?></span></h2>
                    <div class="breadcrumb">
                        <span class="no-arrow">شما الان اینجا هستید:</span>
                        <a href="../../index.php" rel="nofollow">خانه</a>
                        <span></span>
                        اخبار <?= $category_name ?>
                    </div>
                </div>
            </div>
            <?php } ?>
            <div class="container">
                <div class="row">
                    <!-- sidebar-left -->
                    <?php require_once('../layout/left_sidebar.php') ?>
                    <!-- main content -->
                    <div class="col-lg-10 col-md-9 order-1 order-md-2">
                        <div class="row mb-50">
                            <div class="col-lg-8 col-md-12">
                                <div class="latest-post mb-50">
                                    <div class="loop-big">
                                        <?php foreach($categories as $category){ ?>
                                        <article
                                            class="first-post p-10 background-white border-radius-10 mb-30 wow fadeIn animated">
                                            <div
                                                class="img-hover-slide border-radius-15 mb-30 position-relative overflow-hidden">
                                                <span class="top-right-icon bg-dark"><i
                                                        class="mdi mdi-flash-on"></i></span>
                                                <a href="../singe-page/single.php?id=<?= $category['id'] ?>">
                                                    <img src="<?= (isset($category['image']) and $category['image'] != '')?"$URL_PATH/attachment/imgs/blogs/".$category['image']:"$URL_PATH/admin-panel/assets/images/ads/default.png" ?>" alt="post-slider" width="727px" height="329px">
                                                </a>
                                            </div>
                                            <div class="pr-10 pl-10">
                                                <div class="entry-meta mb-30">
                                                    <a class="entry-meta meta-0" href="category.html"><span
                                                            class="post-in background4 text-danger font-x-small"><?= $category['title'] ?></span></a>
                                                    <div class="float-left font-small">
                                                        <span><span class="ml-10 text-muted"><i class="fa fa-eye"
                                                                    aria-hidden="true"></i></span><?= $category['counter'] ?></span>
                                                        <span class="mr-30"><span class="ml-10 text-muted"><i
                                                                    class="fa fa-comment"
                                                                    aria-hidden="true"></i></span><?= $category['post_liked'] ?></span>
                                                        <span class="mr-30"><span class="ml-10 text-muted"><i
                                                                    class="fa fa-share-alt"
                                                                    aria-hidden="true"></i></span>12 هزار</span>
                                                    </div>
                                                </div>
                                                <h3 class="post-title mb-20">
                                                    <a href="../singe-page/single.php?id=<?= $category['id'] ?>"><?= $category['description'] ?></a>
                                                </h3>
                                                <p class="post-exerpt font-medium text-muted mb-30"><?= $category['description'] ?></p>
                                                <div class="mb-20 overflow-hidden">
                                                    <div
                                                        class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase">
                                                        <span class="post-by">در <a href="category-big.php?id=><?= $category['blog_category'] ?>"><?= $category['name'] ?></a></span>
                                                        <span class="post-on">ارسال در <?= $category['date'] ?></span>
                                                    </div>
                                                    <div class="float-left">
                                                        <a href="../singe-page/single.php?id=<?= $category['id'] ?>" class="read-more"><span class="ml-10"><i
                                                                    class="fa fa-hand-point-left"
                                                                    aria-hidden="true"></i></span>ادامه مطلب</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="pagination-area mb-30">
                                    <?php pagination($page, $pages) ?>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12 sidebar-right">
                                <!--Post aside style 1-->
                                <div class="sidebar-widget mb-30">
                                    <?php require_once('../layout/right_sidebar.php') ?>
                                </div>
                                    <?php require_once('../layout/right_sidebar_second.php') ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!-- Footer Start-->
        <?php require_once('../layout/footer.php') ?>
    </div> <!-- Main Wrap End-->
    <div class="dark-mark"></div>
    <!-- Vendor JS-->
    <?php require_once('../layout/js.php') ?>
    <script src="../../assets/js/vendor/jquery.nice-select.min.js"></script>
    <script src="../../assets/js/vendor/perfect-scrollbar.js"></script>
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
            window.location = 'category-big.php';
        });
    </script>
</body>


<!-- Mirrored from webilux.net/demo-newsviral/category-big.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 28 Sep 2024 10:08:58 GMT -->

</html>
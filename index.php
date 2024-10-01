<?php
require_once('app/connection/DB.php');
require_once('app/controller/function.php');
require_once('app/helper/view.php');


$categoriesList = $db->where('status', 1)
    ->orderBy('name', 'ASC')
    ->get('categories', null, 'id, name');

if (isset($_POST['btn_login'])) {
    $username = checkDataSecurity($_POST['username']);
    $password = checkDataSecurity($_POST['password']);
    if ($username != '') {
        $checkMemberExist = $db->where('username', $username)
            ->getOne('members', 'username, password');
        if (!is_null($checkMemberExist) and password_verify($password, $checkMemberExist['password'])) {
            $_SESSION['member'] = $username;
            header('Location:site/panel/my-profile.php');
        } else {
            header('Location:index.php?ok=4');
        }
    }
}


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
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/widgets.css">
    <link rel="stylesheet" href="assets/css/color.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link rel="stylesheet" href="assets/css/vendor/ionicons.min.css">
</head>

<body>
    <!-- Preloader Start -->
    <!-- <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="text-center">
                    <img class="jump mb-50" src="attachment/imgs/loading.svg" alt="">
                    <h6>در حال بارگذاری</h6>
                    <div class="loader">
                        <div class="bar bar1"></div>
                        <div class="bar bar2"></div>
                        <div class="bar bar3"></div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
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
                                                    href="site/singe-page/single.php?id=<?= $popularBlog['id'] ?>"><?= $popularBlog['description'] ?></a>
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
        <header class="main-header header-style-2 mb-40">
            <div class="header-bottom header-sticky background-white text-center">
                <div class="scroll-progress gradient-bg-1"></div>
                <div class="mobile_menu d-lg-none d-block"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-2 col-md-3">
                            <div class="header-logo d-none d-lg-block">
                                <a href="index.php">
                                    <img class="logo-img d-inline" src="attachment/imgs/logo.svg" alt="">
                                </a>
                            </div>
                            <div class="logo-tablet d-md-inline d-lg-none d-none">
                                <a href="index.html">
                                    <img class="logo-img d-inline" src="attachment/imgs/logo.svg" alt="">
                                </a>
                            </div>
                            <div class="logo-mobile d-block d-md-none">
                                <a href="index.html">
                                    <img class="logo-img d-inline" src="attachment/imgs/favicon.svg" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-10 col-md-9 main-header-navigation">
                            <!-- Main-menu -->
                            <div class="main-nav text-right float-lg-right float-md-left">
                                <ul class="mobi-menu d-none menu-3-columns" id="navigation">
                                    <?php foreach ($categoriesList as $category) { ?>
                                        <li class="cat-item cat-item-2"><a href="#"><?= $category['name'] ?></a></li>
                                    <?php } ?>
                                </ul>
                                <nav>
                                    <ul class="main-menu d-none d-lg-inline">
                                        <li class="menu-item-has-children">
                                            <a href="index.php">
                                                <span class="ml-15">
                                                    <i name="home-outline"></i>
                                                </span>
                                                خانه
                                            </a>
                                            <ul class="sub-menu text-muted font-small">
                                                <li><a href="index.php">صفحه اصلی 1</a></li>
                                                <li><a href="home-2.html">صفحه اصلی 2</a></li>
                                                <li><a href="home-3.html">صفحه اصلی 3</a></li>
                                            </ul>
                                        </li>
                                        <li class="mega-menu-item">
                                            <a href="#">
                                                <span class="ml-15">
                                                    <i class="ti-desktop mr-5"></i>
                                                </span>
                                                صفحات
                                            </a>
                                            <div class="sub-mega-menu sub-menu-list row text-muted font-small">
                                                <ul class="col-md-2">
                                                    <li><strong>آرشیو</strong></li>
                                                    <li><a href="site/category/category.php">دسته بندی لیستی</a></li>
                                                    <li><a href="site/category/category-grid.php">دسته بندی شبکه ای</a>
                                                    </li>
                                                    <li><a href="site/category/category-big.php">دسته بندی بزرگ</a></li>
                                                    <li><a href="site/category/category-metro.php">دسته بندی مترو</a>
                                                    </li>
                                                </ul>
                                                <ul class="col-md-2">
                                                    <li><strong>صفحات</strong></li>
                                                    <li><a href="site/typography/typography.php">تایپوگرافی</a></li>
                                                    <li><a href="site/about/about.php">درباره ما</a></li>
                                                    <li><a href="site/contact/contact.php">تماس با ما</a></li>
                                                    <li><a href="site/search/search.php">جستجو</a></li>
                                                    <li><a href="site/error/404.php">صفحه 404</a></li>
                                                </ul>
                                                <div class="col-md-6 text-left">
                                                    <a href="#"><img class="border-radius-10"
                                                            src="attachment/imgs/ads-2.jpg" alt=""></a>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="site/contact/contact.php">
                                                <span class="ml-15">
                                                    <i class="ti-email mr-5"></i>
                                                </span>
                                                تماس با ما
                                            </a>
                                        </li>
                                        <li>
                                            <a href="admin-panel/auth/sign-in.php">
                                                <span class="ml-15">
                                                    <i class="ti-panel mr-5"></i>
                                                </span> پنل ادمین
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="d-inline mr-50 tools-icon">
                                        <a class="red-tooltip"
                                            href="<?= isset($_SESSION['member']) ? "site/panel/my-profile.php" : "site/auth/rigester.php" ?>"
                                            data-toggle="tooltip" data-placement="top" title=""
                                            data-original-title="<?= isset($_SESSION['member']) ? "پنل" : "ثبت نام" ?>">
                                            <?= isset($_SESSION['member']) ? "<img src='admin-panel/assets/images/admin/default.png' class='rounded-circle' alt='' width='30px' height='30px' >" : "<i class='ti-user'></i>" ?>
                                        </a>
                                        <?php if (!isset($_SESSION['member'])) { ?>
                                            <button class="p-0 m-0 bg-white border-0 edit red-tooltip text-danger" href="#"
                                                data-toggle="tooltip" data-placement="top" title=""
                                                data-original-title="ورود">
                                                <i class="ti-lock"></i>
                                            </button>
                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">ورود</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="" class="needs-validation" method="post" novalidate>
                                                            <div class="modal-body">
                                                                <?php
                                                                if (isset($_GET['ok']) and $_GET['ok'] != '')
                                                                    showMessage($_GET['ok'])
                                                                        ?>
                                                                    <div class="col-12">
                                                                        <label for="inputEmailAddress" class="form-label">نام
                                                                            کاربری</label>
                                                                        <div class="ms-auto">
                                                                            <input type="username" name="username"
                                                                                class="form-control radius-30 ps-5"
                                                                                id="inputEmailAddress"
                                                                                value="<?= (isset($_POST['username'])) ? $_POST['username'] : "" ?>"
                                                                            placeholder="نام کاربری" required>
                                                                        <div class="invalid-feedback">
                                                                            فیلد نام کاربری خالی باشد
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <label for="inputChoosePassword" class="form-label">رمز
                                                                        عبور را وارد
                                                                        کنید</label>
                                                                    <div class="ms-auto">
                                                                        <input type="password" name="password"
                                                                            class="form-control radius-30 ps-5"
                                                                            id="inputChoosePassword"
                                                                            placeholder="رمز عبور را وارد کنید" required>
                                                                        <div class="invalid-feedback">
                                                                            فیلد رمز عبور خالی باشد
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" name="btn_login"
                                                                    class="btn btn-primary">ورود</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </nav>
                            </div>
                            <!-- Search -->
                            <form action="#" method="get"
                                class="search-form d-lg-inline float-left position-relative ml-30 d-none">
                                <input type="text" class="search_field" placeholder="جستجو ..." value="" name="s">
                                <span class="search-icon"><i class="ti-search mr-5"></i></span>
                            </form>
                            <!-- Off canvas -->
                            <div class="off-canvas-toggle-cover">
                                <div class="off-canvas-toggle hidden d-inline-block mr-15" id="off-canvas-toggle">
                                    <ion-icon name="grid-outline"></ion-icon>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main Wrap Start -->
        <main class="position-relative">
            <div class="container">
                <div class="row">
                    <!-- sidebar-left -->
                    <div class="col-lg-2 col-md-3 primary-sidebar sticky-sidebar sidebar-left order-2 order-md-1">
                        <!-- Widget Weather -->
                        <div class="sidebar-widget widget-weather border-radius-10 bg-white mb-30 mt-55">
                            <div class="d-flex">
                                <div class="font-medium">
                                    <p>دوشنبه</p>
                                    <h2>12</h2>
                                    <p><strong>فروردین</strong></p>
                                </div>
                                <div class="font-medium mr-10 pt-20">
                                    <div id="datetime" class="d-inline-block">
                                        <ul>
                                            <li><span class="font-small">
                                                    <a class="text-primary" href="#">تهران</a><br>
                                                    <i class="wi wi-day-sunny ml-5"></i>32ºc
                                                </span>
                                                <p>آفتابی</p>
                                            </li>
                                            <li><span class="font-small">
                                                    <a class="text-danger" href="#">کرج</a><br>
                                                    <i class="wi wi-day-cloudy ml-5"></i>28ºc
                                                </span>
                                                <p>ابری</p>
                                            </li>
                                            <li><span class="font-small">
                                                    <a class="text-success" href="#">رشت</a><br>
                                                    <i class="wi wi-rain-mix ml-5"></i>25ºc
                                                </span>
                                                <p>بارانی</p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Widget Categories -->
                        <div class="sidebar-widget widget_categories border-radius-10 bg-white mb-30">
                            <div class="widget-header position-relative mb-15">
                                <h5 class="widget-title"><strong>دسته بندی ها</strong></h5>
                            </div>
                            <ul class="font-small text-muted">
                                <?php foreach ($categoriesList as $category) { ?>
                                    <li class="cat-item cat-item-2"><a href="#"><?= $category['name'] ?></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
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
                                    ->getOne('blogs', 'blogs.id, title, description, categories.name, date, counter');
                                    ?>
                                    <div class="featured-slider-1 border-radius-10">
                                        <div class="featured-slider-1-items">
                                            <div class="slider-single p-10">
                                                <div
                                                    class="img-hover-slide border-radius-15 mb-30 position-relative overflow-hidden">
                                                    <span class="top-right-icon bg-dark"><i
                                                            class="mdi mdi-camera-alt"></i></span>
                                                    <a href="site/singe-page/single.php?id=<?= $lastBlog['id'] ?>">
                                                        <img src="<?= (isset($lastBlog['image']) and $lastBlog['image'] != '')?"attachment/imgs/blogs/".$lastBlog['image']:"admin-panel/assets/images/ads/default.png" ?>" alt="post-slider">
                                                    </a>
                                                </div>
                                                <div class="pr-10 pl-10">
                                                    <div class="entry-meta mb-30">
                                                        <a class="entry-meta meta-0" href="category.html"><span
                                                                class="post-in background1 text-danger font-x-small"><?= $lastBlog['name'] ?></span></a>
                                                        <div class="float-left font-small">
                                                            <?php 
                                                            
                                                            $lastLike =$db->where('blog_id', $lastBlog['id'])
                                                            ->getValue('wishlist', 'COUNT(id)');
                                                            $lastComment =$db->where('blog_id', $lastBlog['id'])
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
                                                    <h4 class="post-title mb-20"><a href="site/singe-page/single.php?id=<?= $lastBlog['id'] ?>"><?= $lastBlog['description'] ?></a></h4>
                                                    
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
                                                    <a class="text-muted font-small" href="#">مشاهده همه</a>
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
                                                        <a href="site/singe-page/single.php?id=<?= $resentBlog['id'] ?>">
                                                            <img class="border-radius-10"
                                                                src="<?= (isset($resentBlog['image']) and $resentBlog['image'] != '') ? "attachment/imgs/blogs/" . $resentBlog['image'] : "admin-panel/assets/images/ads/default.png" ?>"
                                                                alt="post-slider">
                                                        </a>
                                                    </div>
                                                    <a
                                                        href="site/singe-page/single.php?id=<?= $resentBlog['id'] ?>"><?= $resentBlog['title'] ?></a>
                                                    <h5 class="post-title pr-5 pl-5 mb-10 mt-15 text-limit-2-row">
                                                        <a
                                                            href="site/singe-page/single.php?id=<?= $resentBlog['id'] ?>"><?= $resentBlog['description'] ?></a>
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
                                <!--Post aside style 1-->
                                <div class="sidebar-widget mb-30">
                                    <div class="widget-header position-relative mb-30">
                                        <div class="row">
                                            <div class="col-7">
                                                <h4 class="widget-title mb-0">از دست <span>ندهید</span></h4>
                                            </div>
                                            <div class="col-5 text-left">
                                                <h6 class="font-medium pl-15">
                                                    <a class="text-muted font-small" href="#">مشاهده همه</a>
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="post-aside-style-1 border-radius-10 p-20 bg-white">
                                        <ul class="list-post">
                                            <li class="mb-20">
                                                <div class="d-flex">
                                                    <div
                                                        class="post-thumb d-flex ml-15 border-radius-5 img-hover-scale">
                                                        <a class="color-white" href="site/singe-page/single.php">
                                                            <img src="attachment/imgs/thumbnail-4.jpg" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="post-content media-body">
                                                        <h6 class="post-title mb-10 text-limit-2-row"><a
                                                                href="site/singe-page/single.php">لورم ایپسوم متن ساختگی
                                                                با تولید سادگی
                                                                نامفهوم از صنعت چاپ</a></h6>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="mb-20">
                                                <div class="d-flex">
                                                    <div
                                                        class="post-thumb d-flex ml-15 border-radius-5 img-hover-scale">
                                                        <a class="color-white" href="site/singe-page/single.php">
                                                            <img src="attachment/imgs/thumbnail-15.jpg" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="post-content media-body">
                                                        <h6 class="post-title mb-10 text-limit-2-row"><a
                                                                href="site/singe-page/single.php">سه درصد گذشته، حال و
                                                                آینده شناخت
                                                                فراوان</a></h6>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="mb-20">
                                                <div class="d-flex">
                                                    <div
                                                        class="post-thumb d-flex ml-15 border-radius-5 img-hover-scale">
                                                        <a class="color-white" href="site/singe-page/single.php">
                                                            <img src="attachment/imgs/thumbnail-16.jpg" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="post-content media-body">
                                                        <h6 class="post-title mb-10 text-limit-2-row"><a
                                                                href="site/singe-page/single.php">سطرآنچنان که لازم است
                                                                و برای شرایط
                                                                فعلی تکنولوژی</a></h6>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex">
                                                    <div
                                                        class="post-thumb d-flex ml-15 border-radius-5 img-hover-scale">
                                                        <a class="color-white" href="site/singe-page/single.php">
                                                            <img src="attachment/imgs/thumbnail-15.jpg" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="post-content media-body">
                                                        <h6 class="post-title mb-10 text-limit-2-row"><a
                                                                href="site/singe-page/single.php">سه درصد گذشته، حال و
                                                                آینده شناخت
                                                                فراوان</a></h6>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!--Newsletter-->
                                <div class="sidebar-widget widget_newsletter border-radius-10 p-20 bg-white mb-30">
                                    <div class="widget-header widget-header-style-1 position-relative mb-15">
                                        <h5 class="widget-title">خبرنامه</h5>
                                    </div>
                                    <div class="newsletter">
                                        <p class="font-medium">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ
                                        </p>
                                        <form target="_blank" action="#" method="get"
                                            class="subscribe_form relative mail_part">
                                            <div class="form-newsletter-cover">
                                                <div class="form-newsletter position-relative">
                                                    <input type="email" name="EMAIL"
                                                        placeholder="ایمیل خود را اینجا وارد کنید" required="">
                                                    <button type="submit">
                                                        <i class="ti ti-email"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!--Post aside style 2-->
                                <div class="sidebar-widget">
                                    <div class="widget-header mb-30">
                                        <h5 class="widget-title">پرطرفدارترین ها</h5>
                                    </div>
                                    <div class="post-aside-style-2">
                                        <ul class="list-post">
                                            <li class="mb-30 wow fadeIn animated">
                                                <div class="d-flex">
                                                    <div
                                                        class="post-thumb d-flex ml-15 border-radius-5 img-hover-scale">
                                                        <a class="color-white" href="site/singe-page/single.php">
                                                            <img src="attachment/imgs/thumbnail-2.jpg" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="post-content media-body">
                                                        <h6 class="post-title mb-10 text-limit-2-row"><a
                                                                href="site/singe-page/single.php">لورم ایپسوم متن ساختگی
                                                                با تولید سادگی
                                                                نامفهوم از صنعت چاپ</a></h6>
                                                        <div
                                                            class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase">
                                                            <span class="post-by">توسط <a href="author.html">رضا
                                                                    کیمیا</a></span>
                                                            <span class="post-on">4 دقیقه پیش</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="mb-30 wow fadeIn animated">
                                                <div class="d-flex">
                                                    <div
                                                        class="post-thumb d-flex ml-15 border-radius-5 img-hover-scale">
                                                        <a class="color-white" href="site/singe-page/single.php">
                                                            <img src="attachment/imgs/thumbnail-3.jpg" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="post-content media-body">
                                                        <h6 class="post-title mb-10 text-limit-2-row"><a
                                                                href="site/singe-page/single.php">لورم ایپسوم متن ساختگی
                                                                با تولید سادگی
                                                                نامفهوم از صنعت</a></h6>
                                                        <div
                                                            class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase">
                                                            <span class="post-by">توسط <a href="author.html">سعید
                                                                    شمس</a></span>
                                                            <span class="post-on">3 ساعت پیش</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="mb-30 wow fadeIn animated">
                                                <div class="d-flex">
                                                    <div
                                                        class="post-thumb d-flex ml-15 border-radius-5 img-hover-scale">
                                                        <a class="color-white" href="site/singe-page/single.php">
                                                            <img src="attachment/imgs/thumbnail-5.jpg" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="post-content media-body">
                                                        <h6 class="post-title mb-10 text-limit-2-row"><a
                                                                href="site/singe-page/single.php">سه درصد گذشته، حال و
                                                                آینده شناخت
                                                                فراوان</a></h6>
                                                        <div
                                                            class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase">
                                                            <span class="post-by">توسط <a href="author.html">الناز
                                                                    روستایی</a></span>
                                                            <span class="post-on">4 ساعت پیش</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="mb-30 wow fadeIn animated">
                                                <div class="d-flex">
                                                    <div
                                                        class="post-thumb d-flex ml-15 border-radius-5 img-hover-scale">
                                                        <a class="color-white" href="site/singe-page/single.php">
                                                            <img src="attachment/imgs/thumbnail-7.jpg" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="post-content media-body">
                                                        <h6 class="post-title mb-10 text-limit-2-row"><a
                                                                href="site/singe-page/single.php">طراحان خلاقی و فرهنگ
                                                                پیشرو در زبان
                                                                فارسی ایجاد کرد</a></h6>
                                                        <div
                                                            class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase">
                                                            <span class="post-by">توسط <a href="author.html">بهمن
                                                                    راستی</a></span>
                                                            <span class="post-on">5 ساعت پیش</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="wow fadeIn animated">
                                                <div class="d-flex">
                                                    <div
                                                        class="post-thumb d-flex ml-15 border-radius-5 img-hover-scale">
                                                        <a class="color-white" href="site/singe-page/single.php">
                                                            <img src="attachment/imgs/thumbnail-8.jpg" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="post-content media-body">
                                                        <h6 class="post-title mb-10 text-limit-2-row"><a
                                                                href="site/singe-page/single.php">تایپ به پایان رسد
                                                                وزمان مورد نیاز
                                                                شامل حروفچینی دستاوردهای اصلی</a></h6>
                                                        <div
                                                            class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase">
                                                            <span class="post-by">توسط <a href="author.html">مسعود
                                                                    راستی</a></span>
                                                            <span class="post-on">5 ساعت پیش</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
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
                                                    <a class="text-muted font-small" href="#">مشاهده همه</a>
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="loop-list-style-1">
                                        <?php 
                                        $page = 1;
                                        pageLimit('blogs', 5, false);
                                        $blogs = $db->orderBy('date', 'DESC')
                                        ->where('status', 1)
                                        ->paginate('blogs', $page);
                                        foreach($blogs as $blog){
                                        ?>
                                        <article
                                            class="p-10 background-white border-radius-10 mb-30 wow fadeIn animated">
                                            <div class="d-flex">
                                                <div class="post-thumb d-flex ml-15 border-radius-15 img-hover-scale">
                                                    <a class="color-white" href="site/singe-page/single.php?id=<?= $blog['id'] ?>">
                                                        <img class="border-radius-15"
                                                            src="<?= (isset($blog['image']) and $blog['image'] != '')?"../../attachment/imgs/blogs/".$blog['image']:"../../admin-panel/assets/images/ads/default.png" ?>" alt="">
                                                    </a>
                                                </div>
                                                <div class="post-content media-body">
                                                    <div class="entry-meta mb-15 mt-10">
                                                        <a class="entry-meta meta-2" href="category.html"><span
                                                                class="post-in text-danger font-x-small">سیاسی</span></a>
                                                    </div>
                                                    <h5 class="post-title mb-15 text-limit-2-row">
                                                        <span class="post-format-icon">
                                                            <ion-icon name="videocam-outline"></ion-icon>
                                                        </span>
                                                        <a href="site/singe-page/single.php?id=<?= $blog['id'] ?>"><?= $blog['description'] ?></a>
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
                                                            <?php $countLike = $db->where('blog_id', $blog['id'])
                                                            ->getValue('wishlist', 'COUNT(id)') ?>
                                                            <?= $countLike ?>
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
                                <div class="sidebar-widget mb-50">
                                    <div class="widget-header mb-30">
                                        <h5 class="widget-title">محبوب ترین</h5>
                                    </div>
                                    <div class="post-aside-style-3">
                                        <article class="bg-white border-radius-15 mb-30 p-10 wow fadeIn animated">
                                            <div class="post-thumb d-flex mb-15 border-radius-15 img-hover-scale">
                                                <a href="site/singe-page/single.php">
                                                    <video autoplay="" class="photo-item__video" loop="" muted=""
                                                        preload="none">
                                                        <source src="#" type="video/mp4">
                                                    </video>
                                                </a>
                                            </div>
                                            <div class="pl-10 pr-10">
                                                <h5 class="post-title mb-15"><a href="site/singe-page/single.php">لورم
                                                        ایپسوم متن
                                                        ساختگی با تولید سادگی نامفهوم از صنعت چاپ</a></h5>
                                                <div
                                                    class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase mb-10">
                                                    <span class="post-in">در <a href="category.html">جهان</a></span>
                                                    <span class="post-by">توسط <a href="author.html">الناز
                                                            روستایی</a></span>
                                                    <span class="post-on">4 دقیقه پیش</span>
                                                </div>
                                            </div>
                                        </article>
                                        <article class="bg-white border-radius-15 mb-30 p-10 wow fadeIn animated">
                                            <div class="post-thumb d-flex mb-15 border-radius-15 img-hover-scale">
                                                <a href="site/singe-page/single.php">
                                                    <img class="border-radius-15" src="attachment/imgs/news-22.jpg"
                                                        alt="">
                                                </a>
                                            </div>
                                            <div class="pl-10 pr-10">
                                                <h5 class="post-title mb-15"><a href="site/singe-page/single.php">لورم
                                                        ایپسوم متن
                                                        ساختگی با تولید</a></h5>
                                                <div
                                                    class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase mb-10">
                                                    <span class="post-in">در <a href="category.html">سلامت</a></span>
                                                    <span class="post-by">توسط <a href="author.html">رضا
                                                            کیمیا</a></span>
                                                    <span class="post-on">14 دقیقه پیش</span>
                                                </div>
                                            </div>
                                        </article>
                                        <article class="bg-white border-radius-15 mb-30 p-10 wow fadeIn animated">
                                            <div class="post-thumb d-flex mb-15 border-radius-15 img-hover-scale">
                                                <a href="site/singe-page/single.php">
                                                    <img class="border-radius-15" src="attachment/imgs/news-20.jpg"
                                                        alt="">
                                                </a>
                                            </div>
                                            <div class="pl-10 pr-10">
                                                <h5 class="post-title mb-15"><a href="site/singe-page/single.php">لورم
                                                        ایپسوم متن
                                                        ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از
                                                        طراحان</a></h5>
                                                <div
                                                    class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase mb-10">
                                                    <span class="post-in">در <a href="category.html">تهران</a></span>
                                                    <span class="post-by">توسط <a href="author.html">سعید شمس</a></span>
                                                    <span class="post-on">16 دقیقه پیش</span>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                </div>
                                <div
                                    class="sidebar-widget p-20 border-radius-15 bg-white widget-latest-comments wow fadeIn animated my-3">
                                    <div class="widget-header mb-30">
                                        <h5 class="widget-title">آخرین <span>نظرات</span></h5>
                                    </div>
                                    <div class="post-block-list post-module-6">
                                        <div class="last-comment mb-20 d-flex wow fadeIn animated">
                                            <span class="item-count vertical-align">
                                                <a class="red-tooltip author-avatar" href="#" data-toggle="tooltip"
                                                    data-placement="top" title=""
                                                    data-original-title="مرجان - 985 پست"><img
                                                        src="attachment/imgs/authors/author-14.png" alt=""></a>
                                            </span>
                                            <div class="alith_post_title_small">
                                                <p class="font-medium mb-10"><a href="site/singe-page/single.php">لورم
                                                        ایپسوم متن
                                                        ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از
                                                        طراحان.</a></p>
                                                <div
                                                    class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase mb-10">
                                                    <span class="post-by">توسط <a href="author.html">مرجان
                                                            همتی</a></span>
                                                    <span class="post-on">4 دقیقه پیش</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="last-comment mb-20 d-flex wow fadeIn animated">
                                            <span class="item-count vertical-align">
                                                <a class="red-tooltip author-avatar" href="#" data-toggle="tooltip"
                                                    data-placement="top" title=""
                                                    data-original-title="بهمن - 1245 پست"><img
                                                        src="attachment/imgs/authors/author-9.png" alt=""></a>
                                            </span>
                                            <div class="alith_post_title_small">
                                                <p class="font-medium mb-10"><a href="site/singe-page/single.php">لورم
                                                        ایپسوم متن
                                                        ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از
                                                        طراحان</a></p>
                                                <div
                                                    class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase mb-10">
                                                    <span class="post-by">توسط <a href="author.html">بهمن
                                                            راستی</a></span>
                                                    <span class="post-on">4 دقیقه پیش</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="last-comment d-flex wow fadeIn animated">
                                            <span class="item-count vertical-align">
                                                <a class="red-tooltip author-avatar" href="#" data-toggle="tooltip"
                                                    data-placement="top" title=""
                                                    data-original-title="مسعود - 445 پست"><img
                                                        src="attachment/imgs/authors/author-3.png" alt=""></a>
                                            </span>
                                            <div class="alith_post_title_small">
                                                <p class="font-medium mb-10"><a href="site/singe-page/single.php">لورم
                                                        ایپسوم متن
                                                        ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان
                                                        گرافیک است.</a></p>
                                                <div
                                                    class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase mb-10">
                                                    <span class="post-by">توسط <a href="author.html">مسعود
                                                            راستی</a></span>
                                                    <span class="post-on">4 دقیقه پیش</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!-- Footer Start-->
        <footer>
            <div class="footer-area pt-50 bg-white">
                <div class="container">
                    <div class="row pb-30">
                        <?php
                        $j = 0;
                        for ($i = 1; $i <= 5; $i++) {
                            $counter = 1;
                            ?>
                            <div class="col">
                                <ul class="float-right ml-30 font-medium">
                                    <?php foreach ($categoriesList as $category) {
                                        if (isset($categoriesList[$j])) {
                                            ?>

                                            <li class="cat-item cat-item-2"><a href="#"><?= $categoriesList[$j]['name'] ?></a></li>
                                        <?php }
                                        $j += 1;
                                        $counter += 1;
                                        if ($counter == 9)
                                            break;
                                    } ?>
                                </ul>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <!-- footer-bottom aera -->
            <div class="footer-bottom-area bg-white text-muted">
                <div class="container">
                    <div class="footer-border pt-20 pb-20">
                        <div class="row d-flex mb-15">
                            <div class="col-12">
                                <ul class="list-inline font-small">
                                    <?php foreach ($categoriesList as $category) { ?>
                                        <li class="list-inline-item"><a href="#"><?= $category['name'] ?></a></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                        <div class="row d-flex align-items-center justify-content-between">
                            <div class="col-12">
                                <div class="footer-copy-right">
                                    <p class="font-small text-muted">© 1400 ، نیوز وایرال | کلیه حقوق محفوظ است |
                                        راستچین شده
                                        توسط <a href="#" target="_blank">لوکس تم</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End-->
        </footer>
    </div> <!-- Main Wrap End-->
    <div class="dark-mark"></div>
    <!-- Vendor JS-->
    <script src="assets/js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="assets/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="assets/js/vendor/popper.min.js"></script>
    <script src="assets/js/vendor/bootstrap.min.js"></script>
    <script src="assets/js/vendor/jquery.slicknav.js"></script>
    <script src="assets/js/vendor/owl.carousel.min.js"></script>
    <script src="assets/js/vendor/slick.min.js"></script>
    <script src="assets/js/vendor/wow.min.js"></script>
    <script src="assets/js/vendor/animated.headline.js"></script>
    <script src="assets/js/vendor/jquery.magnific-popup.js"></script>
    <script src="assets/js/vendor/jquery.ticker.js"></script>
    <script src="assets/js/vendor/jquery.vticker-min.js"></script>
    <script src="assets/js/vendor/jquery.scrollUp.min.js"></script>
    <script src="assets/js/vendor/jquery.nice-select.min.js"></script>
    <script src="assets/js/vendor/jquery.sticky.js"></script>
    <script src="assets/js/vendor/perfect-scrollbar.js"></script>
    <script src="assets/js/vendor/waypoints.min.js"></script>
    <script src="assets/js/vendor/jquery.counterup.min.js"></script>
    <script src="assets/js/vendor/jquery.theia.sticky.js"></script>
    <!-- NewsViral JS -->
    <script src="assets/js/main.js"></script>
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
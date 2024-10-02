<?php
require_once('../app/connection/DB.php');
require_once('../app/controller/access.php');
require_once('../app/controller/function.php');
require_once('../app/helper/jdf.php');
if (!isset($_SESSION['user'])) {
    header('Location:auth/sign-in.php');
}



$this_month_first_day = date('Y/m/01');
$this_month_last_day = date('Y/m/t');
$last_month_first_day = date('Y/m/01', strtotime('-1 month'));
$last_month_last_day = date('Y/m/t', strtotime('-1 month'));

$today = strtotime("today");
$last_week = strtotime("-7 day", $today);
$end = date("Y/m/d", $today);
$start = date("Y/m/d", $last_week);
?>

<!doctype html>
<html lang="en" dir="rtl">


<!-- Mirrored from codetheme.ir/onedash/demo/rtl/index3.php by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 May 2024 08:52:57 GMT -->

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="assets/images/favicon-32x32.png" type="image/png" />
    <!--plugins-->
    <link href="assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/bootstrap-extended.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/icons.css" rel="stylesheet">
    <link href="assets/fonts/googlefonts.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/fonts/bootstrap-icons.css">


    <!-- loader-->
    <link href="assets/css/pace.min.css" rel="stylesheet" />

    <!--Theme Styles-->
    <link href="assets/css/dark-theme.css" rel="stylesheet" />
    <link href="assets/css/light-theme.css" rel="stylesheet" />
    <link href="assets/css/semi-dark.css" rel="stylesheet" />
    <link href="assets/css/header-colors.css" rel="stylesheet" />

    <title>صفحه اصلی</title>
</head>

<body>


    <!--start wrapper-->
    <div class="wrapper">
        <!--start top header-->

        <header class="top-header">
            <nav class="navbar navbar-expand gap-3">
                <div class="mobile-toggle-icon fs-3 d-flex d-lg-none">
                    <i class="bi bi-list"></i>
                </div>
                <form class="searchbar">
                    <div class="position-absolute top-50 translate-middle-y search-icon ms-3"><i
                            class="bi bi-search"></i></div>
                    <input class="form-control" type="text" placeholder="برای جستجو اینجا تایپ کنید">
                    <div class="position-absolute top-50 translate-middle-y search-close-icon"><i
                            class="bi bi-x-lg"></i></div>
                </form>
                <div class="top-navbar-right ms-auto">
                    <ul class="navbar-nav align-items-center gap-1">
                        <li class="nav-item search-toggle-icon d-flex d-lg-none">
                            <a class="nav-link" href="javascript:;">
                                <div class="">
                                    <i class="bi bi-search"></i>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item dark-mode d-none d-sm-flex">
                            <a class="nav-link dark-mode-icon" href="javascript:;">
                                <div class="">
                                    <i class="bi bi-moon-fill"></i>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item dropdown dropdown-large">
                            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#"
                                data-bs-toggle="dropdown">
                                <div class="messages">
                                    <?php

                                    $notification = $db->where('is_readed', 0)
                                        ->getValue('comments', 'COUNT(id)');
                                    ?>
                                    <span class="notify-badge"><?= $notification ?></span>
                                    <i class="bi bi-chat-left-text-fill"></i>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end p-0">
                                <div class="p-2 border-bottom m-2">
                                    <h5 class="h5 mb-0">پیام ها</h5>
                                </div>
                                <div class="header-message-list p-2">
                                    <?php
                                    if ($notification == 0) { ?>
                                        <h6 class="text-center">داده ایی برای نمایش وجود ندارد</h6>
                                    <?php } else {
                                        $db->pageLimit = 6;
                                        $comments = $db->where('is_readed', 0)
                                            ->join('members', 'members.id = comments.member_id', 'LEFT')
                                            ->join('blogs', 'blogs.id = comments.blog_id', 'LEFT')
                                            ->orderBy('comments.setdate', 'DESC')
                                            ->paginate('comments', 1, "comments.id, blogs.title, CONCAT(comments.fname, ' ', comments.lname) AS name, members.image, comments.setdate, comments.status");
                                        foreach ($comments as $comment) {
                                            ?>
                                            <a class="dropdown-item"
                                                href="admin-panel/comments/comment_detail.php?id=<?= $comment['id'] ?>">
                                                <div class="d-flex align-items-center">
                                                    <img src="<?= isset($comment['image']) ? $comment['image'] : "assets/images/admin/default.png" ?>"
                                                        alt="" class="rounded-circle" width="50" height="50">
                                                    <div class="ms-3 flex-grow-1 fw-bold">
                                                        <h6 class="mb-0 dropdown-msg-user fw-bold">
                                                            <?= $comment['name'] ?><span class="msg-time float-end fw-bold">
                                                                <?= jdate('Y/m/d', strtotime($comment['setdate'])) ?>
                                                            </span>
                                                        </h6>
                                                        <small
                                                            class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center"><?= $comment['title'] ?></small>
                                                    </div>
                                                </div>
                                            </a>
                                        <?php }
                                    } ?>
                                </div>
                                <div class="p-2">
                                    <div>
                                        <hr class="dropdown-divider">
                                    </div>
                                    <a class="dropdown-item <?= $notification == 0 ? "disabled" : "" ?>"
                                        href="<?= $notification != 0 ? "admin-panel/comments/comments_list.php?comment=1" : "" ?>">
                                        <div class="text-center">مشاهده همه پیام ها</div>
                                    </a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="dropdown dropdown-user-setting">
                    <a class="dropdown-toggle dropdown-toggle-nocaret" id="headerDropdown" href="#"
                        data-bs-toggle="dropdown" aria-expanded="true">
                        <?php
                        $adminShow = $db->where('id', $_SESSION['user'])
                            ->getOne('admins', 'concat(fname, \' \', lname) as name, role')
                            ?>
                        <div class="user-setting d-flex align-items-center gap-3">
                            <img src="assets/images/admin/default.png" alt="" class="user-img">
                            <div class="d-none d-sm-block">
                                <p class="user-name mb-0"><?= $adminShow['name'] ?>
                                </p>
                                <small
                                    class="mb-0 dropdown-user-designation"><?= admin_role($adminShow['role']) ?></small>
                            </div>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end myShow-menu " data-bs-popper="static">
                        <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item" href="auth/logout.php" name="logout">
                                <div class="d-flex align-items-center">
                                    <div class=""><i class="bi bi-lock-fill"></i></div>
                                    <div class="ms-3"><span>خروج</span></div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!--end top header-->

        <!--start sidebar -->
        <aside class="sidebar-wrapper" data-simplebar="true">
            <div class="sidebar-header">
                <a href="../index.php" class="d-flex">
                    <img src="../attachment/imgs/logo.svg" class="w-75" alt="logo icon">
                </a>
                <div class="toggle-icon ms-auto"> <i class="bi bi-list"></i>
                </div>
            </div>
            <!--navigation-->
            <ul class="metismenu" id="menu">
                <li>
                    <a href="index.php" class="">
                        <div class="parent-icon"><i class="bi bi-house-fill"></i>
                        </div>
                        <div class="menu-title">داشبورد</div>
                    </a>

                </li>
                <?php if(has_admin_access($_SESSION['user'], 'admins_list')){ ?>
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class="bi bi-grid-fill"></i>
                        </div>
                        <div class="menu-title">مدیران</div>
                    </a>
                    <ul>
                        <li> <a href="admin-panel/admins/admins_list.php"><i class="bi bi-circle"></i>لیست مدیران</a>
                        </li>
                    </ul>
                    <?php } ?>
                    <?php if(has_admin_access($_SESSION['user'], 'members_list')){ ?>
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class="bi bi-people-fill"></i>
                        </div>
                        <div class="menu-title">کاربران</div>
                    </a>
                    <ul>
                        <li> <a href="admin-panel/members/members_list.php"><i class="bi bi-circle"></i>لیست
                                کاربران</a>
                        </li>

                    </ul>
                </li>
                <?php } ?>
                <?php if(has_admin_access($_SESSION['user'], 'blogs_list') or has_admin_access($_SESSION['user'], 'categories_list')){ ?>
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class="bi bi-newspaper"></i>
                        </div>
                        <div class="menu-title">اخبار</div>
                    </a>
                    <ul>
                    <?php if(has_admin_access($_SESSION['user'], 'categories_list')){ ?>
                        <li> <a href="admin-panel/categories/categories_list.php"><i class="bi bi-circle"></i>لیست
                                دسته بندی</a>
                        </li>
                        <?php } ?>
                        <?php if(has_admin_access($_SESSION['user'], 'blogs_list')){ ?>
                        <li> <a href="admin-panel/blogs/blogs_list.php"><i class="bi bi-circle"></i>لیست
                                اخبار</a>
                        </li>
                        <?php } ?>

                    </ul>
                </li>
                <?php } ?>
                <?php if(has_admin_access($_SESSION['user'], 'provinces_list') or has_admin_access($_SESSION['user'], 'cities_list')){ ?>
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class="bi bi-building"></i>
                        </div>
                        <div class="menu-title">استان ها و شهر ها</div>
                    </a>
                    <ul>
                    <?php if(has_admin_access($_SESSION['user'], 'provinces_list')){ ?>
                        <li> <a href="admin-panel/provinces/provinces_list.php"><i class="bi bi-circle"></i>لیست
                                استان ها</a>
                        </li>
                        <?php } ?>
                        <?php if(has_admin_access($_SESSION['user'], 'cities_list')){ ?>
                        <li> <a href="admin-panel/cities/cities_list.php"><i class="bi bi-circle"></i>لیست شهر
                                ها</a>
                        </li>
                        <?php } ?>

                    </ul>
                    <?php } ?>
                    <?php if(has_admin_access($_SESSION['user'], 'logs_list')){ ?>
                </li>
                </li>
                <li>
                    <a href="admin-panel/logs/logs_list.php" class="">
                        <div class="parent-icon"><i class="bi bi-lock"></i>
                        </div>
                        <div class="menu-title">لیست لاگ ها</div>
                    </a>

                </li>
                <?php } ?>
                <?php if(has_admin_access($_SESSION['user'], 'comments_list')){ ?>
                <li>
                    <a href="admin-panel/comments/comments_list.php" class="">
                        <div class="parent-icon"><i class="fadeIn animated bx bx-comment-detail"></i>
                        </div>
                        <div class="menu-title">لیست کامنت ها</div>
                    </a>

                </li>
                <?php } ?>


            </ul>
            <!--end navigation-->
        </aside>
        <!--end sidebar -->

        <!--start content-->
        <main class="page-content">

            <div class="row">
                <div class="col-lg-6">
                    <div class="row"></div>
                    <div class="col-12">
                        <div class="card overflow-hidden radius-10">
                            <div class="card-body">
                                <div class="d-flex align-items-stretch justify-content-between overflow-hidden">
                                    <div class="w-50">
                                        <p>آمار کل بازدید</p>
                                        <?php $totalview = $db->getValue('view', 'COUNT(*)') ?>
                                        <h4 class=""><?= $totalview ?></h4>
                                    </div>
                                    <div class="w-50">
                                        <?php
                                        $this_month_view_countr = $db->where("DATE(setdate) BETWEEN '$this_month_first_day' AND '$this_month_last_day'")
                                            ->getValue('view', 'COUNT(*)');
                                        $last_month_view_countr = $db->where("DATE(setdate) BETWEEN '$last_month_first_day' AND '$last_month_last_day'")
                                            ->getValue('view', 'COUNT(*)');
                                        $viewProfit = intval((($this_month_view_countr / $totalview) * 100) - (($last_month_view_countr / $totalview) * 100));

                                        ?>
                                        <p class="mb-3 float-end text-<?= $viewProfit > 0 ? "success" : 'danger' ?>">
                                            <?= $viewProfit > 0 ? "+" : '-' ?> <?= abs($viewProfit) ?>درصد <i
                                                class="bi bi-arrow-<?= $viewProfit > 0 ? "up" : 'down' ?>"></i>
                                        </p>
                                        <div id="chart1"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-12 col-lg-6 d-flex">
                    <div class="card radius-10 w-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <h6 class="mb-0">بازدید کنندگان</h6>
                                <div class="fs-5 ms-auto dropdown">
                                    <div class="dropdown-toggle dropdown-toggle-nocaret cursor-pointer"
                                        data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></div>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">عمل</a></li>
                                        <li><a class="dropdown-item" href="#">یک اقدام دیگر</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="#">یه چیز دیگه اینجا</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div id="chart11" class=""></div>
                            <div
                                class="d-flex align-items-center gap-5 justify-content-center mt-3 p-2 radius-10 border">
                                <div class="text-center">
                                    <?php
                                    $oldMembers = $db->where("setdate < '$start'")
                                        ->getValue('members', 'COUNT(*)');
                                    $newMembers = $db->where("DATE(setdate) BETWEEN '$start' AND '$end'")
                                        ->getValue('members', 'COUNT(*)');
                                    ?>
                                    <h3 class="mb-2 text-primary"><?= $newMembers ?></h3>
                                    <p class="mb-0">کاربران جدید</p>
                                </div>
                                <div class="border-end sepration"></div>
                                <div class="text-center">
                                    <h3 class="mb-2 text-primary-2"><?= $oldMembers ?></h3>
                                    <p class="mb-0">کاربران قدیمی</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <!--end wrapper-->


    <!-- Bootstrap bundle JS -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <!--plugins-->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <script src="assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="assets/js/pace.min.js"></script>
    <script src="assets/plugins/chartjs/js/Chart.min.js"></script>
    <script src="assets/plugins/chartjs/js/Chart.extension.js"></script>
    <script src="assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
    <!--app-->
    <script src="assets/js/app.js"></script>
    <?php require_once('assets/js/index3.php') ?>
    <script>
        new PerfectScrollbar(".best-product")
    </script>

</body>


<!-- Mirrored from codetheme.ir/onedash/demo/rtl/index3.php by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 May 2024 08:53:28 GMT -->

</html>
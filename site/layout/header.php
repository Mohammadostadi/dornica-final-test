<?php 


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
            header('Location:../panel/my-profile.php');
        } else {
            header("Location:".$_SERVER['PHP_SELF'].'?ok=4');
        }
    }
}

?>
<header class="main-header header-style-2 mb-40">
    <div class="header-bottom header-sticky background-white text-center">
        <div class="scroll-progress gradient-bg-1"></div>
        <div class="mobile_menu d-lg-none d-block"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-3">
                    <div class="header-logo d-none d-lg-block">
                        <a href="../../index.php">
                            <img class="logo-img d-inline" src="../../attachment/imgs/logo.svg" alt="">
                        </a>
                    </div>
                    <div class="logo-tablet d-md-inline d-lg-none d-none">
                        <a href="../../index.php">
                            <img class="logo-img d-inline" src="../../attachment/imgs/logo.svg" alt="">
                        </a>
                    </div>
                    <div class="logo-mobile d-block d-md-none">
                        <a href="../../index.php">
                            <img class="logo-img d-inline" src="../../attachment/imgs/favicon.svg" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-10 col-md-9 main-header-navigation">
                    <!-- Main-menu -->
                    <div class="main-nav text-right float-lg-right float-md-left">
                        <ul class="mobi-menu d-none menu-3-columns" id="navigation">
                            <li class="cat-item cat-item-2"><a href="#">اقتصاد جهانی</a></li>
                            <li class="cat-item cat-item-3"><a href="#">محیط</a></li>
                            <li class="cat-item cat-item-4"><a href="#">سلامت کودکان</a></li>
                            <li class="cat-item cat-item-5"><a href="#">مد</a></li>
                            <li class="cat-item cat-item-6"><a href="#">توریست</a></li>
                            <li class="cat-item cat-item-7"><a href="#">درگیری ها</a></li>
                            <li class="cat-item cat-item-2"><a href="#">رسوایی ها</a></li>
                            <li class="cat-item cat-item-2"><a href="#">اجرایی</a></li>
                            <li class="cat-item cat-item-2"><a href="#">سیاست خارجی</a></li>
                            <li class="cat-item cat-item-2"><a href="#">زندگی سالم</a></li>
                            <li class="cat-item cat-item-3"><a href="#">تحقیقات پزشکی</a></li>
                            <li class="cat-item cat-item-4"><a href="#">سلامت کودکان</a></li>
                            <li class="cat-item cat-item-5"><a href="#">سراسر دنیا</a></li>
                            <li class="cat-item cat-item-6"><a href="#">انتخاب آگهی</a></li>
                            <li class="cat-item cat-item-7"><a href="#">سلامت روان</a></li>
                            <li class="cat-item cat-item-2"><a href="#">روابط رسانه ای</a></li>
                        </ul>
                        <nav>
                            
                        <ul class="main-menu d-none d-lg-inline">
                                        <li class="menu-item-has-children">
                                            <a href="../../index.php">
                                                <span class="ml-15">
                                                    <i name="home-outline"></i>
                                                </span>
                                                خانه
                                            </a>
                                            <ul class="sub-menu text-muted font-small">
                                                <li><a href="../../index.php">صفحه اصلی 1</a></li>
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
                                                    <li><a href="../category/category.php">دسته بندی لیستی</a></li>
                                                    <li><a href="../category/category-grid.php">دسته بندی شبکه ای</a></li>
                                                    <li><a href="../category/category-big.php">دسته بندی بزرگ</a></li>
                                                    <li><a href="../category/category-metro.php">دسته بندی مترو</a></li>
                                                </ul>
                                                <ul class="col-md-2">
                                                    <li><strong>صفحات</strong></li>
                                                    <li><a href="../typography/typography.php">تایپوگرافی</a></li>
                                                    <li><a href="../about/about.php">درباره ما</a></li>
                                                    <li><a href="../contact/contact.php">تماس با ما</a></li>
                                                    <li><a href="../search/search.php">جستجو</a></li>
                                                    <li><a href="../error/404.php">صفحه 404</a></li>
                                                </ul>
                                                <div class="col-md-6 text-left">
                                                    <a href="#"><img class="border-radius-10"
                                                            src="../../attachment/imgs/ads-2.jpg" alt=""></a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="mega-menu-item">
                                            <a href="category.html"><span class="ml-15">
                                                    <i class="ti-mobile mr-5"></i>
                                                </span>مگامنو</a>
                                            <div class="sub-mega-menu">
                                                <div class="nav flex-column nav-pills" role="tablist">
                                                    <a class="nav-link active" data-toggle="pill" href="#news-0"
                                                        role="tab">همه</a>
                                                    <a class="nav-link" data-toggle="pill" href="#news-1"
                                                        role="tab">سرگرمی</a>
                                                    <a class="nav-link" data-toggle="pill" href="#news-2"
                                                        role="tab">مد</a>
                                                    <a class="nav-link" data-toggle="pill" href="#news-3"
                                                        role="tab">زندگی</a>
                                                </div>
                                                <div class="tab-content">
                                                    <div class="tab-pane show active" id="news-0" role="tabpanel">
                                                        <div class="row">
                                                            <div class="col-3 post-module-1">
                                                                <div
                                                                    class="post-thumb d-flex border-radius-5 img-hover-scale mb-15">
                                                                    <a href="single.html">
                                                                        <img src="../../attachment/imgs/news-1.jpg" alt="">
                                                                    </a>
                                                                    <span class="top-right-icon background2">
                                                                        <i class="mdi mdi-audiotrack"></i>
                                                                    </span>
                                                                </div>
                                                                <div class="post-content media-body">
                                                                    <h6 class="post-title mb-10 text-limit-2-row">لورم
                                                                        ایپسوم متن ساختگی با تولید سادگی نامفهوم </h6>
                                                                    <div
                                                                        class="entry-meta meta-1 font-x-small color-grey">
                                                                        <span class="post-on">25 فروردین</span>
                                                                        <span class="hit-count has-dot">126 هزار
                                                                            بازدید</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-3 post-module-1">
                                                                <div
                                                                    class="post-thumb d-flex border-radius-5 img-hover-scale mb-15">
                                                                    <a href="single.html">
                                                                        <img src="../../attachment/imgs/news-2.jpg" alt="">
                                                                    </a>
                                                                </div>
                                                                <div class="post-content media-body">
                                                                    <h6 class="post-title mb-10 text-limit-2-row">لورم
                                                                        ایپسوم متن ساختگی با تولید سادگی نامفهوم</h6>
                                                                    <div
                                                                        class="entry-meta meta-1 font-x-small color-grey mt-10">
                                                                        <span class="post-on">25 فروردین</span>
                                                                        <span class="hit-count has-dot">126 هزار
                                                                            بازدید</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-3 post-module-1">
                                                                <div
                                                                    class="post-thumb d-flex border-radius-5 img-hover-scale mb-15">
                                                                    <a href="single.html">
                                                                        <img src="../../attachment/imgs/news-3.jpg" alt="">
                                                                    </a>
                                                                </div>
                                                                <div class="post-content media-body">
                                                                    <h6 class="post-title mb-10 text-limit-2-row">لورم
                                                                        ایپسوم متن ساختگی با تولید سادگی نامفهوم </h6>
                                                                    <div
                                                                        class="entry-meta meta-1 font-x-small color-grey mt-10">
                                                                        <span class="post-on">25 فروردین</span>
                                                                        <span class="hit-count has-dot">126 هزار
                                                                            بازدید</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-3 post-module-1">
                                                                <div
                                                                    class="post-thumb d-flex border-radius-5 img-hover-scale mb-15">
                                                                    <a href="single.html">
                                                                        <img src="../../attachment/imgs/news-8.jpg" alt="">
                                                                    </a>
                                                                </div>
                                                                <div class="post-content media-body">
                                                                    <h6 class="post-title mb-10 text-limit-2-row">لورم
                                                                        ایپسوم متن ساختگی با تولید سادگی نامفهوم </h6>
                                                                    <div
                                                                        class="entry-meta meta-1 font-x-small color-grey mt-10">
                                                                        <span class="post-on">25 فروردین</span>
                                                                        <span class="hit-count has-dot">126 هزار
                                                                            بازدید</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="news-1" role="tabpanel">
                                                        <div class="row">
                                                            <div class="col-3 post-module-1">
                                                                <div
                                                                    class="post-thumb d-flex border-radius-5 img-hover-scale mb-15">
                                                                    <a href="single.html">
                                                                        <img src="../../attachment/imgs/news-5.jpg" alt="">
                                                                    </a>
                                                                </div>
                                                                <div class="post-content media-body">
                                                                    <h6 class="post-title mb-10 text-limit-2-row">لورم
                                                                        ایپسوم متن ساختگی با تولید سادگی نامفهوم </h6>
                                                                    <div
                                                                        class="entry-meta meta-1 font-x-small color-grey">
                                                                        <span class="post-on">25 فروردین</span>
                                                                        <span class="hit-count has-dot">126 هزار
                                                                            بازدید</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-3 post-module-1">
                                                                <div
                                                                    class="post-thumb d-flex border-radius-5 img-hover-scale mb-15">
                                                                    <a href="single.html">
                                                                        <img src="../../attachment/imgs/news-6.jpg" alt="">
                                                                    </a>
                                                                    <span class="top-right-icon background3">
                                                                        <i class="mdi mdi-videocam"></i>
                                                                    </span>
                                                                </div>
                                                                <div class="post-content media-body">
                                                                    <h6 class="post-title mb-10 text-limit-2-row">لورم
                                                                        ایپسوم متن ساختگی با تولید سادگی نامفهوم</h6>
                                                                    <div
                                                                        class="entry-meta meta-1 font-x-small color-grey mt-10">
                                                                        <span class="post-on">25 فروردین</span>
                                                                        <span class="hit-count has-dot">126 هزار
                                                                            بازدید</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-3 post-module-1">
                                                                <div
                                                                    class="post-thumb d-flex border-radius-5 img-hover-scale mb-15">
                                                                    <a href="single.html">
                                                                        <img src="../../attachment/imgs/news-7.jpg" alt="">
                                                                    </a>
                                                                </div>
                                                                <div class="post-content media-body">
                                                                    <h6 class="post-title mb-10 text-limit-2-row">لورم
                                                                        ایپسوم متن ساختگی با تولید سادگی نامفهوم </h6>
                                                                    <div
                                                                        class="entry-meta meta-1 font-x-small color-grey mt-10">
                                                                        <span class="post-on">25 فروردین</span>
                                                                        <span class="hit-count has-dot">126 هزار
                                                                            بازدید</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-3 post-module-1">
                                                                <div
                                                                    class="post-thumb d-flex border-radius-5 img-hover-scale mb-15">
                                                                    <a href="single.html">
                                                                        <img src="../../attachment/imgs/news-8.jpg" alt="">
                                                                    </a>
                                                                </div>
                                                                <div class="post-content media-body">
                                                                    <h6 class="post-title mb-10 text-limit-2-row">لورم
                                                                        ایپسوم متن ساختگی با تولید سادگی نامفهوم </h6>
                                                                    <div
                                                                        class="entry-meta meta-1 font-x-small color-grey mt-10">
                                                                        <span class="post-on">25 فروردین</span>
                                                                        <span class="hit-count has-dot">126 هزار
                                                                            بازدید</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="news-2" role="tabpanel">
                                                        <div class="row">
                                                            <div class="col-3 post-module-1">
                                                                <div
                                                                    class="post-thumb d-flex border-radius-5 img-hover-scale mb-15">
                                                                    <a href="single.html">
                                                                        <img src="../../attachment/imgs/news-9.jpg" alt="">
                                                                    </a>
                                                                    <span class="top-right-icon background2">
                                                                        <i class="mdi mdi-audiotrack"></i>
                                                                    </span>
                                                                </div>
                                                                <div class="post-content media-body">
                                                                    <h6 class="post-title mb-10 text-limit-2-row">لورم
                                                                        ایپسوم متن ساختگی با تولید سادگی نامفهوم </h6>
                                                                    <div
                                                                        class="entry-meta meta-1 font-x-small color-grey">
                                                                        <span class="post-on">25 فروردین</span>
                                                                        <span class="hit-count has-dot">126 هزار
                                                                            بازدید</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-3 post-module-1">
                                                                <div
                                                                    class="post-thumb d-flex border-radius-5 img-hover-scale mb-15">
                                                                    <a href="single.html">
                                                                        <img src="../../attachment/imgs/news-10.jpg" alt="">
                                                                    </a>
                                                                    <span class="top-right-icon background8">
                                                                        <i class="mdi mdi-favorite"></i>
                                                                    </span>
                                                                </div>
                                                                <div class="post-content media-body">
                                                                    <h6 class="post-title mb-10 text-limit-2-row">لورم
                                                                        ایپسوم متن ساختگی با تولید سادگی نامفهوم</h6>
                                                                    <div
                                                                        class="entry-meta meta-1 font-x-small color-grey mt-10">
                                                                        <span class="post-on">25 فروردین</span>
                                                                        <span class="hit-count has-dot">126 هزار
                                                                            بازدید</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-3 post-module-1">
                                                                <div
                                                                    class="post-thumb d-flex border-radius-5 img-hover-scale mb-15">
                                                                    <a href="single.html">
                                                                        <img src="../../attachment/imgs/news-11.jpg" alt="">
                                                                    </a>
                                                                </div>
                                                                <div class="post-content media-body">
                                                                    <h6 class="post-title mb-10 text-limit-2-row">لورم
                                                                        ایپسوم متن ساختگی با تولید سادگی نامفهوم </h6>
                                                                    <div
                                                                        class="entry-meta meta-1 font-x-small color-grey mt-10">
                                                                        <span class="post-on">25 فروردین</span>
                                                                        <span class="hit-count has-dot">126 هزار
                                                                            بازدید</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-3 post-module-1">
                                                                <div
                                                                    class="post-thumb d-flex border-radius-5 img-hover-scale mb-15">
                                                                    <a href="single.html">
                                                                        <img src="../../attachment/imgs/news-12.jpg" alt="">
                                                                    </a>
                                                                </div>
                                                                <div class="post-content media-body">
                                                                    <h6 class="post-title mb-10 text-limit-2-row">لورم
                                                                        ایپسوم متن ساختگی با تولید سادگی نامفهوم </h6>
                                                                    <div
                                                                        class="entry-meta meta-1 font-x-small color-grey mt-10">
                                                                        <span class="post-on">25 فروردین</span>
                                                                        <span class="hit-count has-dot">126 هزار
                                                                            بازدید</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="news-3" role="tabpanel">
                                                        <div class="row">
                                                            <div class="col-3 post-module-1">
                                                                <div
                                                                    class="post-thumb d-flex border-radius-5 img-hover-scale mb-15">
                                                                    <a href="single.html">
                                                                        <img src="../../attachment/imgs/news-13.jpg" alt="">
                                                                    </a>
                                                                </div>
                                                                <div class="post-content media-body">
                                                                    <h6 class="post-title mb-10 text-limit-2-row">لورم
                                                                        ایپسوم متن ساختگی با تولید سادگی نامفهوم </h6>
                                                                    <div
                                                                        class="entry-meta meta-1 font-x-small color-grey">
                                                                        <span class="post-on">25 فروردین</span>
                                                                        <span class="hit-count has-dot">126 هزار
                                                                            بازدید</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-3 post-module-1">
                                                                <div
                                                                    class="post-thumb d-flex border-radius-5 img-hover-scale mb-15">
                                                                    <a href="single.html">
                                                                        <img src="../../attachment/imgs/news-14.jpg" alt="">
                                                                    </a>
                                                                </div>
                                                                <div class="post-content media-body">
                                                                    <h6 class="post-title mb-10 text-limit-2-row">لورم
                                                                        ایپسوم متن ساختگی با تولید سادگی نامفهوم</h6>
                                                                    <div
                                                                        class="entry-meta meta-1 font-x-small color-grey mt-10">
                                                                        <span class="post-on">25 فروردین</span>
                                                                        <span class="hit-count has-dot">126 هزار
                                                                            بازدید</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-3 post-module-1">
                                                                <div
                                                                    class="post-thumb d-flex border-radius-5 img-hover-scale mb-15">
                                                                    <a href="single.html">
                                                                        <img src="../../attachment/imgs/news-15.jpg" alt="">
                                                                    </a>
                                                                </div>
                                                                <div class="post-content media-body">
                                                                    <h6 class="post-title mb-10 text-limit-2-row">لورم
                                                                        ایپسوم متن ساختگی با تولید سادگی نامفهوم </h6>
                                                                    <div
                                                                        class="entry-meta meta-1 font-x-small color-grey mt-10">
                                                                        <span class="post-on">25 فروردین</span>
                                                                        <span class="hit-count has-dot">126 هزار
                                                                            بازدید</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-3 post-module-1">
                                                                <div
                                                                    class="post-thumb d-flex border-radius-5 img-hover-scale mb-15">
                                                                    <a href="single.html">
                                                                        <img src="../../attachment/imgs/news-16.jpg" alt="">
                                                                    </a>
                                                                    <span class="top-right-icon background2">
                                                                        <i class="mdi mdi-audiotrack"></i>
                                                                    </span>
                                                                </div>
                                                                <div class="post-content media-body">
                                                                    <h6 class="post-title mb-10 text-limit-2-row">لورم
                                                                        ایپسوم متن ساختگی با تولید سادگی نامفهوم </h6>
                                                                    <div
                                                                        class="entry-meta meta-1 font-x-small color-grey mt-10">
                                                                        <span class="post-on">25 فروردین</span>
                                                                        <span class="hit-count has-dot">126 هزار
                                                                            بازدید</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="contact.html">
                                                <span class="ml-15">
                                                    <i class="ti-email mr-5"></i>
                                                </span>
                                                تماس با ما
                                            </a>
                                        </li>
                                        <li>
                                            <a href="../../admin-panel/auth/sign-in.php">
                                                <span class="ml-15">
                                                    <i class="ti-panel mr-5"></i>
                                                </span> پنل ادمین
                                            </a>
                                        </li>
                                    </ul>
                            <div class="d-inline mr-50 tools-icon">
                                <a class="red-tooltip"
                                    href="<?= isset($_SESSION['member']) ? "../panel/my-profile.php" : "../auth/rigester.php" ?>"
                                    data-toggle="tooltip" data-placement="top" title=""
                                    data-original-title="<?= isset($_SESSION['member']) ? "پنل" : "ثبت نام" ?>">
                                    <?= isset($_SESSION['member']) ? "<img src='../../admin-panel/assets/images/admin/default.png' class='rounded-circle' alt='' width='30px' height='30px' >" : "<i class='ti-user'></i>" ?>
                                </a>
                                <?php if (!isset($_SESSION['member'])) { ?>
                                    <button class="p-0 m-0 bg-white border-0 edit red-tooltip text-danger" href="#"
                                        data-toggle="tooltip" data-placement="top" title="" data-original-title="ورود">
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
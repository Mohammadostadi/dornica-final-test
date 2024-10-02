<?php

require_once('../../app/connection/DB.php');
require_once('../../app/controller/function.php');
require_once('../../app/helper/view.php');
require_once('../layout/login.php');

?>

<!DOCTYPE html>
<html class="no-js" lang="en">


<!-- Mirrored from webilux.net/demo-newsviral/search.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 28 Sep 2024 10:09:00 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>نتیجه جستجو برای "تبلیغات" - قالب HTML نیوز وایرال</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.html">
    <link rel="shortcut icon" type="image/x-icon" href="../../attachment/imgs/favicon.svg">
    <!-- NewsViral CSS  -->
    <?php require_once('../layout/css.php') ?>
</head>

<body>
    <!-- Preloader Start -->
    <div id="preloader-active">
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
    <div class="main-wrap">
        <!--Offcanvas sidebar-->
        <?php require_once('../layout/sidebar.php') ?>
        <!-- Main Header -->
        <?php require_once('../layout/header.php') ?>
        <!-- Main Wrap Start -->
        <main class="position-relative">
            <div class="archive-header text-center mb-50">
                <div class="container">
                    <h2>
                        <span class="text-success">نتیجه جستجو برای "تبلیغات"</span>
                    </h2>
                    <div class="breadcrumb">
                        <span class="no-arrow">ما 25 مقاله برای شما پیدا کردیم</span>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <!-- sidebar-left -->
                    <div class="col-lg-2 col-md-3 primary-sidebar sticky-sidebar sidebar-left order-2 order-md-1">
                        <!-- Widget Weather -->
                        <div class="sidebar-widget widget-weather border-radius-10 bg-white mb-30">
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
                        <div class="sidebar-widget widget_categories_2 border-radius-10 bg-white mb-30">
                            <ul class="font-small text-muted">
                                <li class="cat-item cat-item-2 active">
                                    <a href="#">
                                        <span class="ml-10">
                                            <ion-icon name="earth-outline"></ion-icon>
                                        </span>بین المللی
                                    </a>
                                </li>
                                <li class="cat-item cat-item-3">
                                    <a href="#">
                                        <span class="ml-10">
                                            <ion-icon name="trending-up-outline"></ion-icon>
                                        </span>کسب و کار
                                    </a>
                                </li>
                                <li class="cat-item cat-item-4">
                                    <a href="#">
                                        <span class="ml-10">
                                            <ion-icon name="glasses-outline"></ion-icon>
                                        </span>سرگرمی
                                    </a>
                                </li>
                                <li class="cat-item cat-item-5">
                                    <a href="#">
                                        <span class="ml-10">
                                            <ion-icon name="bicycle-outline"></ion-icon>
                                        </span>اخبار ورزشی
                                    </a>
                                </li>
                                <li class="cat-item cat-item-6">
                                    <a href="#">
                                        <span class="ml-10">
                                            <ion-icon name="fitness-outline"></ion-icon>
                                        </span>سلامتی
                                    </a>
                                </li>
                                <li class="cat-item cat-item-2">
                                    <a href="#">
                                        <span class="ml-10">
                                            <ion-icon name="book-outline"></ion-icon>
                                        </span>مجله
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- Widget Categories -->
                        <div class="sidebar-widget widget_categories border-radius-10 bg-white mb-30">
                            <div class="widget-header position-relative mb-15">
                                <h5 class="widget-title"><strong>دسته بندی ها</strong></h5>
                            </div>
                            <ul class="font-small text-muted">
                                <li class="cat-item cat-item-2"><a href="#">اقتصاد جهانی</a></li>
                                <li class="cat-item cat-item-3"><a href="#">محیط زیست</a></li>
                                <li class="cat-item cat-item-4"><a href="#">اجرایی</a></li>
                                <li class="cat-item cat-item-5"><a href="#">مد</a></li>
                                <li class="cat-item cat-item-6"><a href="#">نوریست</a></li>
                                <li class="cat-item cat-item-7"><a href="#">درگیری</a></li>
                                <li class="cat-item cat-item-2"><a href="#">رسوایی</a></li>
                                <li class="cat-item cat-item-2"><a href="#">اجرایی</a></li>
                                <li class="cat-item cat-item-2"><a href="#">سیاست خارجی</a></li>
                                <li class="cat-item cat-item-2"><a href="#">زندگی سالم</a></li>
                                <li class="cat-item cat-item-3"><a href="#">تحقیقات پزشکی</a></li>
                                <li class="cat-item cat-item-4"><a href="#">سلامت کودکان</a></li>
                                <li class="cat-item cat-item-5"><a href="#">سراسر جهان</a></li>
                                <li class="cat-item cat-item-6"><a href="#">تبلیغات</a></li>
                                <li class="cat-item cat-item-7"><a href="#">سلامت روان</a></li>
                                <li class="cat-item cat-item-2"><a href="#">رسانه ای</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- main content -->
                    <div class="col-lg-10 col-md-9 order-1 order-md-2">
                        <div class="row mb-50">
                            <div class="col-lg-8 col-md-12">
                                <div class="latest-post mb-50">
                                    <div class="loop-list-style-1">
                                        <article
                                            class="p-10 background-white border-radius-10 mb-30 wow fadeIn animated">
                                            <div class="d-md-flex d-block">
                                                <div
                                                    class="post-thumb post-thumb-big d-flex ml-15 border-radius-15 img-hover-scale">
                                                    <a class="color-white" href="single.html">
                                                        <img class="border-radius-15" src="../../attachment/imgs/thumbnail-15.jpg"
                                                            alt="">
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
                                                        <a href="single.html">لورم ایپسوم متن ساختگی با تولید سادگی
                                                            نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.
                                                            چاپگرها و متون.</a>
                                                    </h5>
                                                    <p
                                                        class="post-exerpt font-medium text-muted mb-30 d-none d-lg-block">
                                                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با
                                                        استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله
                                                        در ستون و سطرآنچنان که لازم است.</p>
                                                    <div
                                                        class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase">
                                                        <span class="post-by">توسط <a href="author.html">الناز
                                                                روستایی</a></span>
                                                        <span class="post-on">ارسال در 15/9/1400 07:00</span>
                                                        <span class="time-reading">زمان خواندن 12 دقیقه</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                                        <article
                                            class="p-10 background-white border-radius-10 mb-30 wow fadeIn animated">
                                            <div class="d-md-flex d-block">
                                                <div
                                                    class="post-thumb post-thumb-big d-flex ml-15 border-radius-15 img-hover-scale">
                                                    <a class="color-white" href="single.html">
                                                        <img class="border-radius-15" src="../../attachment/imgs/thumbnail-13.jpg"
                                                            alt="">
                                                    </a>
                                                </div>
                                                <div class="post-content media-body">
                                                    <div class="entry-meta mb-15 mt-10">
                                                        <a class="entry-meta meta-2" href="category.html"><span
                                                                class="post-in text-warning font-x-small">ورزشی</span></a>
                                                    </div>
                                                    <h5 class="post-title mb-15 text-limit-2-row">
                                                        <a href="single.html">سه درصد گذشته، حال و آینده شناخت فراوان
                                                            جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت</a>
                                                    </h5>
                                                    <p
                                                        class="post-exerpt font-medium text-muted mb-30 d-none d-lg-block">
                                                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با
                                                        استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله
                                                        در ستون و سطرآنچنان که لازم است.</p>
                                                    <div
                                                        class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase">
                                                        <span class="post-by">توسط <a href="author.html">رضا
                                                                کیمیا</a></span>
                                                        <span class="post-on">ارسال در 15/9/1400 07:00</span>
                                                        <span class="time-reading">زمان خواندن 14 دقیقه</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                                        <div class="mb-30 text-center pl-50 pr-50">
                                            <a href="#">
                                                <img class="border-radius-10 d-inline" src="../../attachment/imgs/ads.jpg"
                                                    alt="post-slider">
                                            </a>
                                        </div>
                                        <article
                                            class="p-10 background-white border-radius-10 mb-30 wow fadeIn animated">
                                            <div class="d-md-flex d-block">
                                                <div
                                                    class="post-thumb post-thumb-big d-flex ml-15 border-radius-15 img-hover-scale">
                                                    <a class="color-white" href="single.html">
                                                        <img class="border-radius-15" src="../../attachment/imgs/thumbnail-16.jpg"
                                                            alt="">
                                                    </a>
                                                </div>
                                                <div class="post-content media-body">
                                                    <div class="entry-meta mb-15 mt-10">
                                                        <a class="entry-meta meta-2" href="category.html"><span
                                                                class="post-in text-success font-x-small">سلامت</span></a>
                                                    </div>
                                                    <h5 class="post-title mb-15 text-limit-2-row">
                                                        <span class="post-format-icon">
                                                            <ion-icon name="image-outline"></ion-icon>
                                                        </span>
                                                        <a href="single.html">طراحان خلاقی و فرهنگ پیشرو در زبان فارسی
                                                            ایجاد کرد. در این صورت می توان امید داشت</a>
                                                    </h5>
                                                    <p
                                                        class="post-exerpt font-medium text-muted mb-30 d-none d-lg-block">
                                                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با
                                                        استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله
                                                        در ستون و سطرآنچنان که لازم است.</p>
                                                    <div
                                                        class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase">
                                                        <span class="post-by">توسط <a href="author.html">بهمن
                                                                راستی</a></span>
                                                        <span class="post-on">ارسال در 15/9/1400 07:00</span>
                                                        <span class="time-reading">زمان خواندن 6 دقیقه</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                                        <article
                                            class="p-10 background-white border-radius-10 mb-30 wow fadeIn animated">
                                            <div class="d-md-flex d-block">
                                                <div
                                                    class="post-thumb post-thumb-big d-flex ml-15 border-radius-15 img-hover-scale">
                                                    <a class="color-white" href="single.html">
                                                        <img class="border-radius-15" src="../../attachment/imgs/thumbnail-8.jpg"
                                                            alt="">
                                                    </a>
                                                </div>
                                                <div class="post-content media-body">
                                                    <div class="entry-meta mb-15 mt-10">
                                                        <a class="entry-meta meta-2" href="category.html"><span
                                                                class="post-in text-info font-x-small">درگیری</span></a>
                                                    </div>
                                                    <h5 class="post-title mb-15 text-limit-2-row">
                                                        <span class="post-format-icon">
                                                            <ion-icon name="chatbox-outline"></ion-icon>
                                                        </span>
                                                        <a href="single.html">تایپ به پایان رسد وزمان مورد نیاز شامل
                                                            حروفچینی دستاوردهای اصلی و جوابگوی سوالات</a>
                                                    </h5>
                                                    <p
                                                        class="post-exerpt font-medium text-muted mb-30 d-none d-lg-block">
                                                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با
                                                        استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله
                                                        در ستون و سطرآنچنان که لازم است.</p>
                                                    <div
                                                        class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase">
                                                        <span class="post-by">توسط <a href="author.html">رضا
                                                                کیمیا</a></span>
                                                        <span class="post-on">ارسال در 15/9/1400 07:00</span>
                                                        <span class="time-reading">زمان خواندن 13 دقیقه</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                                        <article
                                            class="p-10 background-white border-radius-10 mb-30 wow fadeIn animated">
                                            <div class="d-md-flex d-block">
                                                <div
                                                    class="post-thumb post-thumb-big d-flex ml-15 border-radius-15 img-hover-scale">
                                                    <a class="color-white" href="single.html">
                                                        <img class="border-radius-15" src="../../attachment/imgs/thumbnail-9.jpg"
                                                            alt="">
                                                    </a>
                                                </div>
                                                <div class="post-content media-body">
                                                    <div class="entry-meta mb-15 mt-10">
                                                        <a class="entry-meta meta-2" href="category.html"><span
                                                                class="post-in text-success font-x-small">سیاسی</span></a>
                                                    </div>
                                                    <h5 class="post-title mb-15 text-limit-2-row">
                                                        <span class="post-format-icon">
                                                            <ion-icon name="chatbox-outline"></ion-icon>
                                                        </span>
                                                        <a href="single.html">سه درصد گذشته، حال و آینده شناخت فراوان
                                                            جامعه و متخصصان را می طلبد</a>
                                                    </h5>
                                                    <p
                                                        class="post-exerpt font-medium text-muted mb-30 d-none d-lg-block">
                                                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با
                                                        استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله
                                                        در ستون و سطرآنچنان که لازم است.</p>
                                                    <div
                                                        class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase">
                                                        <span class="post-by">توسط <a href="author.html">سعید
                                                                شمس</a></span>
                                                        <span class="post-on">ارسال در 15/9/1400 07:00</span>
                                                        <span class="time-reading">زمان خواندن 12 دقیقه</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                </div>
                                <div class="pagination-area mb-30">
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination justify-content-start">
                                            <li class="page-item"><a class="page-link" href="#"><i
                                                        class="ti-angle-right"></i></a></li>
                                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item"><a class="page-link" href="#">4</a></li>
                                            <li class="page-item"><a class="page-link" href="#"><i
                                                        class="ti-angle-left"></i></a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12 sidebar-right">
                                <div
                                    class="sidebar-widget p-20 border-radius-15 bg-white widget-text wow fadeIn animated">
                                    <div class="widget-header mb-30">
                                        <h5 class="widget-title">نکات <span>جستجو</span></h5>
                                    </div>
                                    <div>
                                        <h6>1. از برگه ها استفاده کنید</h6>
                                        <p class="font-small text-muted">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم
                                            از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و
                                            مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و
                                            کاربردهای.</p>
                                        <h6>2. از نقل قول ها استفاده کنید</h6>
                                        <p class="font-small text-muted">سه درصد گذشته، حال و آینده شناخت فراوان جامعه و
                                            متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای
                                            علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد.</p>
                                        <h6>3. برای حذف از خط فاصله استفاده کنید</h6>
                                        <p class="font-small text-muted">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم
                                            از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و
                                            مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و
                                            کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت
                                            و سه درصد گذشته. </p>
                                    </div>
                                </div>
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
            window.location = 'search.php';
        });
    </script>
</body>


<!-- Mirrored from webilux.net/demo-newsviral/search.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 28 Sep 2024 10:09:00 GMT -->

</html>
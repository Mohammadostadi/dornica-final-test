<?php

require_once('../../app/connection/DB.php');
require_once('../../app/controller/function.php');
require_once('../../app/helper/view.php');
require_once('../layout/login.php')


    ?>



<!DOCTYPE html>
<html class="no-js" lang="en">


<!-- Mirrored from webilux.net/demo-newsviral/category-grid.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 28 Sep 2024 10:08:58 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>اقتصاد جهانی - قالب HTML نیوز وایرال</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.html">
    <link rel="shortcut icon" type="image/x-icon" href="assets/imgs/favicon.svg">
    <!-- NewsViral CSS  -->
    <?php require_once('../layout/css.php') ?>
</head>

<body>
    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="text-center">
                    <img class="jump mb-50" src="assets/imgs/loading.svg" alt="">
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
                    <h2><span class="text-danger">اقتصاد جهانی</span></h2>
                    <div class="breadcrumb">
                        <span class="no-arrow">شما الان اینجا هستید::</span>
                        <a href="index.html" rel="nofollow">خانه</a>
                        <span></span>
                        اقتصاد جهانی
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
                                    <div class="loop-grid">
                                        <article
                                            class="first-post p-10 background-white border-radius-10 mb-30 wow fadeIn animated">
                                            <div
                                                class="img-hover-slide border-radius-15 mb-30 position-relative overflow-hidden">
                                                <span class="top-right-icon bg-dark"><i
                                                        class="mdi mdi-flash-on"></i></span>
                                                <a href="single.html">
                                                    <img src="assets/imgs/news-21.jpg" alt="post-slider">
                                                </a>
                                            </div>
                                            <div class="pr-10 pl-10">
                                                <div class="entry-meta mb-30">
                                                    <a class="entry-meta meta-0" href="category.html"><span
                                                            class="post-in background4 text-danger font-x-small">مزایده</span></a>
                                                    <div class="float-left font-small">
                                                        <span><span class="ml-10 text-muted"><i class="fa fa-eye"
                                                                    aria-hidden="true"></i></span>125 هزار</span>
                                                        <span class="mr-30"><span class="ml-10 text-muted"><i
                                                                    class="fa fa-comment"
                                                                    aria-hidden="true"></i></span>14 هزار</span>
                                                        <span class="mr-30"><span class="ml-10 text-muted"><i
                                                                    class="fa fa-share-alt"
                                                                    aria-hidden="true"></i></span>12 هزار</span>
                                                    </div>
                                                </div>
                                                <h4 class="post-title mb-20">
                                                    <a href="single.html">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم
                                                        از صنعت چاپ و با استفاده از طراحان</a>
                                                </h4>
                                                <p class="post-exerpt font-medium text-muted mb-30">لورم ایپسوم متن
                                                    ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان
                                                    گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان
                                                    که لازم است.</p>
                                                <div class="mb-20 overflow-hidden">
                                                    <div
                                                        class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase">
                                                        <span class="post-by">توسط <a href="author.html">الناز
                                                                روستایی</a></span>
                                                        <span class="post-on">ارسال در 12/7/1400 09:35</span>
                                                        <span class="time-reading">زمان خواندن 8 دقیقه</span>
                                                        <p class="font-x-small mt-10">به روز شده 18/8/1400 07:12</p>
                                                    </div>
                                                    <div class="float-left">
                                                        <a href="single.html" class="read-more"><span class="ml-10"><i
                                                                    class="fa fa-thumbtack"
                                                                    aria-hidden="true"></i></span>اخبار پرطرفدار</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                                        <div class="row">
                                            <article class="col-lg-6 col-md-12 wow fadeIn animated">
                                                <div class="background-white border-radius-10 p-10 mb-30">
                                                    <div
                                                        class="post-thumb d-flex mb-15 border-radius-15 img-hover-scale">
                                                        <a href="single.html">
                                                            <img class="border-radius-15" src="assets/imgs/news-2.jpg"
                                                                alt="">
                                                        </a>
                                                    </div>
                                                    <div class="pl-10 pr-10">
                                                        <div class="entry-meta mb-15 mt-10">
                                                            <a class="entry-meta meta-2" href="category.html"><span
                                                                    class="post-in text-primary font-x-small">سیاسی</span></a>
                                                        </div>
                                                        <h5 class="post-title mb-15">
                                                            <span class="post-format-icon">
                                                                <ion-icon name="image-outline"></ion-icon>
                                                            </span>
                                                            <a href="single.html">تایپ به پایان رسد وزمان مورد نیاز شامل
                                                                حروفچینی</a>
                                                        </h5>
                                                        <p class="post-exerpt font-medium text-muted mb-30">لورم ایپسوم
                                                            متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده
                                                            از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در
                                                            ستون و سطرآنچنان که لازم است.</p>
                                                        <div
                                                            class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase mb-10">
                                                            <span class="post-in">در <a
                                                                    href="category.html">سیاسی</a></span>
                                                            <span class="post-by">توسط <a href="author.html">بهمن
                                                                    راستی</a></span>
                                                            <span class="post-on">8 دقیقه پیش</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </article>
                                            <article class="col-lg-6 col-md-12 wow fadeIn animated">
                                                <div class="background-white border-radius-10 p-10 mb-30">
                                                    <div
                                                        class="post-thumb d-flex mb-15 border-radius-15 img-hover-scale">
                                                        <a href="single.html">
                                                            <img class="border-radius-15" src="assets/imgs/news-3.jpg"
                                                                alt="">
                                                        </a>
                                                    </div>
                                                    <div class="pl-10 pr-10">
                                                        <div class="entry-meta mb-15 mt-10">
                                                            <a class="entry-meta meta-2" href="category.html"><span
                                                                    class="post-in text-secondary font-x-small">جهانی</span></a>
                                                        </div>
                                                        <h5 class="post-title mb-15">
                                                            <span class="post-format-icon">
                                                                <ion-icon name="notifications-outline"></ion-icon>
                                                            </span>
                                                            <a href="single.html">سه درصد گذشته، حال و آینده شناخت
                                                                فراوان جامعه</a>
                                                        </h5>
                                                        <p class="post-exerpt font-medium text-muted mb-30">لورم ایپسوم
                                                            متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده
                                                            از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در
                                                            ستون و سطرآنچنان که لازم است…</p>
                                                        <div
                                                            class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase mb-10">
                                                            <span class="post-in">در <a
                                                                    href="category.html">جهان</a></span>
                                                            <span class="post-by">توسط <a href="author.html">سعید
                                                                    شمس</a></span>
                                                            <span class="post-on">15 دقیقه پیش</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </article>
                                            <article class="col-lg-6 col-md-12 wow fadeIn animated">
                                                <div class="background-white border-radius-10 p-10 mb-30">
                                                    <div
                                                        class="post-thumb d-flex mb-15 border-radius-15 img-hover-scale">
                                                        <a href="single.html">
                                                            <img class="border-radius-15" src="assets/imgs/news-4.jpg"
                                                                alt="">
                                                        </a>
                                                    </div>
                                                    <div class="pl-10 pr-10">
                                                        <div class="entry-meta mb-15 mt-10">
                                                            <a class="entry-meta meta-2" href="category.html"><span
                                                                    class="post-in text-success font-x-small">ورزش</span></a>
                                                        </div>
                                                        <h5 class="post-title mb-15">
                                                            <a href="single.html">طراحان خلاقی و فرهنگ پیشرو در زبان
                                                                فارسی ایجاد کرد</a>
                                                        </h5>
                                                        <p class="post-exerpt font-medium text-muted mb-30">لورم ایپسوم
                                                            متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده
                                                            از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در
                                                            ستون و سطرآنچنان که لازم است.</p>
                                                        <div
                                                            class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase mb-10">
                                                            <span class="post-in">در <a
                                                                    href="category.html">ورزش</a></span>
                                                            <span class="post-by">توسط <a href="author.html">الناز
                                                                    روستایی</a></span>
                                                            <span class="post-on">4 دقیقه پیش</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </article>
                                            <article class="col-lg-6 col-md-12 wow fadeIn animated">
                                                <div class="background-white border-radius-10 p-10 mb-30">
                                                    <div
                                                        class="post-thumb d-flex mb-15 border-radius-15 img-hover-scale">
                                                        <a href="single.html">
                                                            <img class="border-radius-15" src="assets/imgs/news-5.jpg"
                                                                alt="">
                                                        </a>
                                                    </div>
                                                    <div class="pl-10 pr-10">
                                                        <div class="entry-meta mb-15 mt-10">
                                                            <a class="entry-meta meta-2" href="category.html"><span
                                                                    class="post-in text-danger font-x-small">تکنولوژیکی</span></a>
                                                        </div>
                                                        <h5 class="post-title mb-15">
                                                            <span class="post-format-icon">
                                                                <ion-icon name="headset-outline"></ion-icon>
                                                            </span>
                                                            <a href="single.html">تکنولوژی مورد نیاز و کاربردهای متنوع
                                                                با هدف بهبود ابزارهای</a>
                                                        </h5>
                                                        <p class="post-exerpt font-medium text-muted mb-30">لورم ایپسوم
                                                            متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده
                                                            از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در
                                                            ستون و سطرآنچنان که لازم است.</p>
                                                        <div
                                                            class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase mb-10">
                                                            <span class="post-in">در <a
                                                                    href="category.html">تکنولوژیکی</a></span>
                                                            <span class="post-by">توسط <a href="author.html">مسعود
                                                                    راستی</a></span>
                                                            <span class="post-on">24 دقیقه پیش</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </article>
                                            <article class="col-lg-6 col-md-12 wow fadeIn animated">
                                                <div class="background-white border-radius-10 p-10">
                                                    <div
                                                        class="post-thumb d-flex mb-15 border-radius-15 img-hover-scale">
                                                        <a href="single.html">
                                                            <img class="border-radius-15" src="assets/imgs/news-6.jpg"
                                                                alt="">
                                                        </a>
                                                    </div>
                                                    <div class="pl-10 pr-10">
                                                        <div class="entry-meta mb-15 mt-10">
                                                            <a class="entry-meta meta-2" href="category.html"><span
                                                                    class="post-in text-warning font-x-small">مد
                                                                    روز</span></a>
                                                        </div>
                                                        <h5 class="post-title mb-15">
                                                            <span class="post-format-icon">
                                                                <ion-icon name="camera-outline"></ion-icon>
                                                            </span>
                                                            <a href="single.html">لورم ایپسوم متن ساختگی با تولید سادگی
                                                                نامفهوم</a>
                                                        </h5>
                                                        <p class="post-exerpt font-medium text-muted mb-30">لورم ایپسوم
                                                            متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده
                                                            از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در
                                                            ستون و سطرآنچنان که لازم است.</p>
                                                        <div
                                                            class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase mb-10">
                                                            <span class="post-in">در <a href="category.html">مد
                                                                    روز</a></span>
                                                            <span class="post-by">توسط <a href="author.html">رضا
                                                                    کیمیا</a></span>
                                                            <span class="post-on">1 ساعت قبل</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </article>
                                            <article class="col-lg-6 col-md-12 wow fadeIn animated">
                                                <div class="background-white border-radius-10 p-10">
                                                    <div
                                                        class="post-thumb d-flex mb-15 border-radius-15 img-hover-scale">
                                                        <a href="single.html">
                                                            <img class="border-radius-15" src="assets/imgs/news-7.jpg"
                                                                alt="">
                                                        </a>
                                                    </div>
                                                    <div class="pl-10 pr-10">
                                                        <div class="entry-meta mb-15 mt-10">
                                                            <a class="entry-meta meta-2" href="category.html"><span
                                                                    class="post-in text-danger font-x-small">جهانی</span></a>
                                                        </div>
                                                        <h5 class="post-title mb-15">
                                                            <a href="single.html">سطرآنچنان که لازم است و برای شرایط
                                                                فعلی تکنولوژی مورد نیاز</a>
                                                        </h5>
                                                        <p class="post-exerpt font-medium text-muted mb-30">لورم ایپسوم
                                                            متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده
                                                            از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در
                                                            ستون و سطرآنچنان که لازم است...</p>
                                                        <div
                                                            class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase mb-10">
                                                            <span class="post-in">در <a
                                                                    href="category.html">جهان</a></span>
                                                            <span class="post-by">توسط <a href="author.html">الناز
                                                                    روستایی</a></span>
                                                            <span class="post-on">24 دقیقه پیش</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </article>
                                        </div>
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
                                <div class="sidebar-widget mb-50">
                                    <div class="widget-header mb-30 bg-white border-radius-10 p-15">
                                        <h5 class="widget-title mb-0">پرطرفدارترین ها</h5>
                                    </div>
                                    <div class="post-aside-style-2">
                                        <ul class="list-post">
                                            <li class="mb-30 wow fadeIn  animated"
                                                style="visibility: visible; animation-name: fadeIn;">
                                                <div class="d-flex">
                                                    <div
                                                        class="post-thumb d-flex ml-15 border-radius-5 img-hover-scale">
                                                        <a class="color-white" href="single.html">
                                                            <img src="assets/imgs/thumbnail-2.jpg" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="post-content media-body">
                                                        <h6 class="post-title mb-10 text-limit-2-row"><a
                                                                href="single.html">لورم ایپسوم متن ساختگی با تولید سادگی
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
                                            <li class="mb-30 wow fadeIn  animated"
                                                style="visibility: visible; animation-name: fadeIn;">
                                                <div class="d-flex">
                                                    <div
                                                        class="post-thumb d-flex ml-15 border-radius-5 img-hover-scale">
                                                        <a class="color-white" href="single.html">
                                                            <img src="assets/imgs/thumbnail-3.jpg" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="post-content media-body">
                                                        <h6 class="post-title mb-10 text-limit-2-row"><a
                                                                href="single.html">لورم ایپسوم متن ساختگی با تولید سادگی
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
                                            <li class="mb-30 wow fadeIn  animated"
                                                style="visibility: visible; animation-name: fadeIn;">
                                                <div class="d-flex">
                                                    <div
                                                        class="post-thumb d-flex ml-15 border-radius-5 img-hover-scale">
                                                        <a class="color-white" href="single.html">
                                                            <img src="assets/imgs/thumbnail-5.jpg" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="post-content media-body">
                                                        <h6 class="post-title mb-10 text-limit-2-row"><a
                                                                href="single.html">سه درصد گذشته، حال و آینده شناخت
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
                                            <li class="mb-30 wow fadeIn  animated"
                                                style="visibility: visible; animation-name: fadeIn;">
                                                <div class="d-flex">
                                                    <div
                                                        class="post-thumb d-flex ml-15 border-radius-5 img-hover-scale">
                                                        <a class="color-white" href="single.html">
                                                            <img src="assets/imgs/thumbnail-7.jpg" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="post-content media-body">
                                                        <h6 class="post-title mb-10 text-limit-2-row"><a
                                                                href="single.html">طراحان خلاقی و فرهنگ پیشرو در زبان
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
                                            <li class="wow fadeIn  animated"
                                                style="visibility: visible; animation-name: fadeIn;">
                                                <div class="d-flex">
                                                    <div
                                                        class="post-thumb d-flex ml-15 border-radius-5 img-hover-scale">
                                                        <a class="color-white" href="single.html">
                                                            <img src="assets/imgs/thumbnail-8.jpg" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="post-content media-body">
                                                        <h6 class="post-title mb-10 text-limit-2-row"><a
                                                                href="single.html">تایپ به پایان رسد وزمان مورد نیاز
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
                                <div class="sidebar-widget widget_newsletter border-radius-10 p-20 bg-white mb-50">
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
                                <div class="sidebar-widget mb-50">
                                    <div class="widget-header mb-30">
                                        <h5 class="widget-title">پست های <span>اخیر</span></h5>
                                    </div>
                                    <div class="post-aside-style-3">
                                        <article class="bg-white border-radius-15 mb-30 p-10 wow fadeIn animated">
                                            <div class="post-thumb d-flex mb-15 border-radius-15 img-hover-scale">
                                                <a href="single.html">
                                                    <video autoplay="" class="photo-item__video" loop="" muted=""
                                                        preload="none">
                                                        <source src="#" type="video/mp4">
                                                    </video>
                                                </a>
                                            </div>
                                            <div class="pl-10 pr-10">
                                                <h5 class="post-title mb-15"><a href="single.html">لورم ایپسوم متن
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
                                                <a href="single.html">
                                                    <img class="border-radius-15" src="assets/imgs/news-22.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="pl-10 pr-10">
                                                <h5 class="post-title mb-15"><a href="single.html">لورم ایپسوم متن
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
                                                <a href="single.html">
                                                    <img class="border-radius-15" src="assets/imgs/news-20.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="pl-10 pr-10">
                                                <h5 class="post-title mb-15"><a href="single.html">لورم ایپسوم متن
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
                                    class="sidebar-widget p-20 border-radius-15 bg-white widget-latest-comments wow fadeIn animated">
                                    <div class="widget-header mb-30">
                                        <h5 class="widget-title">آخرین <span>نظرات</span></h5>
                                    </div>
                                    <div class="post-block-list post-module-6">
                                        <div class="last-comment mb-20 d-flex wow fadeIn animated">
                                            <span class="item-count vertical-align">
                                                <a class="red-tooltip author-avatar" href="#" data-toggle="tooltip"
                                                    data-placement="top" title=""
                                                    data-original-title="مرجان - 985 پست"><img
                                                        src="assets/imgs/authors/author-14.png" alt=""></a>
                                            </span>
                                            <div class="alith_post_title_small">
                                                <p class="font-medium mb-10"><a href="single.html">لورم ایپسوم متن
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
                                        <div class="last-comment d-flex wow fadeIn animated">
                                            <span class="item-count vertical-align">
                                                <a class="red-tooltip author-avatar" href="#" data-toggle="tooltip"
                                                    data-placement="top" title=""
                                                    data-original-title="بهمن - 1245 پست"><img
                                                        src="assets/imgs/authors/author-9.png" alt=""></a>
                                            </span>
                                            <div class="alith_post_title_small">
                                                <p class="font-medium mb-10"><a href="single.html">لورم ایپسوم متن
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
                                                        src="assets/imgs/authors/author-3.png" alt=""></a>
                                            </span>
                                            <div class="alith_post_title_small">
                                                <p class="font-medium mb-10"><a href="single.html">لورم ایپسوم متن
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
            window.location = 'category-grid.php';
        });
    </script>
</body>


<!-- Mirrored from webilux.net/demo-newsviral/category-grid.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 28 Sep 2024 10:08:58 GMT -->

</html>
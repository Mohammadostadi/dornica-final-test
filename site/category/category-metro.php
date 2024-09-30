<?php 

require_once('../../app/connection/DB.php');
require_once('../../app/controller/function.php');
require_once('../layout/login.php');

?>


<!DOCTYPE html>
<html class="no-js" lang="en">


<!-- Mirrored from webilux.net/demo-newsviral/category-metro.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 28 Sep 2024 10:08:58 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>اخبار روز - قالب HTML نیوز وایرال</title>
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
                    <h2>
                        <span class="text-dark">اخبار روزانه</span>
                        <span class="post-count">1256 مقاله</span>
                    </h2>
                    <div class="breadcrumb">
                        <span class="no-arrow"><i class="ti ti-location-pin ml-5"></i>شما الان اینجا هستید::</span>
                        <a href="index.html" rel="nofollow">خانه</a>
                        <span></span>
                        اخبار روزانه
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row post-module-1 mb-50">
                    <article class="col-lg-3 col-md-6 col-sm-12 mb-30">
                        <div class="post-thumb position-relative p-10 bg-white border-radius-10">
                            <div class="thumb-overlay img-hover-slide border-radius-15 position-relative" style="background-image: url(assets/imgs/thumbnail-1.jpg)">
                                <a class="img-link" href="single.html"></a>
                                <div class="post-content-overlay">
                                    <div class="entry-meta meta-0 font-small mb-15">
                                        <a href="category.html"><span class="post-cat bg-success color-white">جهان</span></a>
                                    </div>
                                    <h5 class="post-title">
                                        <a class="color-white" href="single.html">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده</a>
                                    </h5>
                                    <div class="entry-meta meta-1 font-x-small mt-10 pr-5 pl-5 text-muted">
                                        <span><span class="ml-5"><i class="fa fa-eye" aria-hidden="true"></i></span>5.8هزار </span>
                                        <span class="ml-15"><span class="ml-5 text-muted"><i class="fa fa-comment" aria-hidden="true"></i></span>2.5هزار </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                    <article class="col-lg-3 col-md-6 col-sm-12 mb-30">
                        <div class="slider-single bg-white p-10 border-radius-15">
                            <div class="img-hover-scale border-radius-10">
                                <span class="top-right-icon background10"><i class="mdi mdi-share"></i></span>
                                <a href="single.html">
                                    <img class="border-radius-10" src="assets/imgs/news-5.jpg" alt="post-slider">
                                </a>
                            </div>
                            <h6 class="post-title pr-5 pl-5 mb-10 mt-15 text-limit-2-row">
                                <a href="single.html">طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد</a>
                            </h6>
                        </div>
                    </article>
                    <article class="col-lg-3 col-md-6 col-sm-12 mb-30">
                        <div class="post-thumb position-relative p-10 bg-white border-radius-10">
                            <div class="thumb-overlay img-hover-slide border-radius-15 position-relative" style="background-image: url(assets/imgs/thumbnail-2.jpg)">
                                <a class="img-link" href="single.html"></a>
                                <div class="post-content-overlay">
                                    <div class="entry-meta meta-0 font-small mb-15">
                                        <a href="category.html"><span class="post-cat bg-success color-white">اخبار</span></a>
                                    </div>
                                    <h5 class="post-title">
                                        <a class="color-white" href="single.html">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده</a>
                                    </h5>
                                    <div class="entry-meta meta-1 font-x-small mt-10 pr-5 pl-5 text-muted">
                                        <span><span class="ml-5"><i class="fa fa-eye" aria-hidden="true"></i></span>5.8هزار </span>
                                        <span class="ml-15"><span class="ml-5 text-muted"><i class="fa fa-comment" aria-hidden="true"></i></span>2.5هزار </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                    <article class="col-lg-3 col-md-6 col-sm-12 mb-30">
                        <div class="post-thumb position-relative p-10 bg-white border-radius-10">
                            <div class="thumb-overlay img-hover-slide border-radius-15 position-relative" style="background-image: url(assets/imgs/thumbnail-3.jpg)">
                                <a class="img-link" href="single.html"></a>
                                <div class="post-content-overlay">
                                    <div class="entry-meta meta-0 font-small mb-15">
                                        <a href="category.html"><span class="post-cat bg-success color-white">سلامت</span></a>
                                    </div>
                                    <h5 class="post-title">
                                        <a class="color-white" href="single.html">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده</a>
                                    </h5>
                                    <div class="entry-meta meta-1 font-x-small mt-10 pr-5 pl-5 text-muted">
                                        <span><span class="ml-5"><i class="fa fa-eye" aria-hidden="true"></i></span>5.8هزار </span>
                                        <span class="ml-15"><span class="ml-5 text-muted"><i class="fa fa-comment" aria-hidden="true"></i></span>2.5هزار </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                    <article class="col-lg-6 col-md-6 col-sm-12 mb-30">
                        <div class="post-thumb position-relative p-10 bg-white border-radius-10">
                            <div class="thumb-overlay img-hover-slide border-radius-15 position-relative" style="background-image: url(assets/imgs/news-20.jpg)">
                                <a class="img-link" href="single.html"></a>
                                <div class="post-content-overlay">
                                    <div class="entry-meta meta-0 font-small mb-15">
                                        <a href="category.html"><span class="post-cat bg-success color-white">آشپزی</span></a>
                                    </div>
                                    <h5 class="post-title">
                                        <a class="color-white" href="single.html">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده</a>
                                    </h5>
                                    <div class="entry-meta meta-1 font-x-small mt-10 pr-5 pl-5 text-muted">
                                        <span><span class="ml-5"><i class="fa fa-eye" aria-hidden="true"></i></span>5.8هزار </span>
                                        <span class="ml-15"><span class="ml-5 text-muted"><i class="fa fa-comment" aria-hidden="true"></i></span>2.5هزار </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                    <article class="col-lg-3 col-md-6 col-sm-12 mb-30">
                        <div class="post-thumb position-relative p-10 bg-white border-radius-10">
                            <div class="thumb-overlay img-hover-slide border-radius-15 position-relative" style="background-image: url(assets/imgs/thumbnail-16.jpg)">
                                <a class="img-link" href="single.html"></a>
                                <div class="post-content-overlay">
                                    <div class="entry-meta meta-0 font-small mb-15">
                                        <a href="category.html"><span class="post-cat bg-success color-white">ورزشی</span></a>
                                    </div>
                                    <h5 class="post-title">
                                        <a class="color-white" href="single.html">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده</a>
                                    </h5>
                                    <div class="entry-meta meta-1 font-x-small mt-10 pr-5 pl-5 text-muted">
                                        <span><span class="ml-5"><i class="fa fa-eye" aria-hidden="true"></i></span>5.8هزار </span>
                                        <span class="ml-15"><span class="ml-5 text-muted"><i class="fa fa-comment" aria-hidden="true"></i></span>2.5هزار </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                    <article class="col-lg-3 col-md-6 col-sm-12 mb-30">
                        <div class="slider-single bg-white p-10 border-radius-15">
                            <div class="img-hover-scale border-radius-10">
                                <span class="top-right-icon background10"><i class="mdi mdi-share"></i></span>
                                <a href="single.html">
                                    <img class="border-radius-10" src="assets/imgs/news-6.jpg" alt="post-slider">
                                </a>
                            </div>
                            <h6 class="post-title pr-5 pl-5 mb-10 mt-15 text-limit-2-row">
                                <a href="single.html">طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد</a>
                            </h6>
                        </div>
                    </article>
                    <article class="col-lg-3 col-md-6 col-sm-12">
                        <div class="slider-single bg-white p-10 border-radius-15">
                            <div class="img-hover-scale border-radius-10">
                                <span class="top-right-icon background10"><i class="mdi mdi-share"></i></span>
                                <a href="single.html">
                                    <img class="border-radius-10" src="assets/imgs/news-8.jpg" alt="post-slider">
                                </a>
                            </div>
                            <h6 class="post-title pr-5 pl-5 mb-10 mt-15 text-limit-2-row">
                                <a href="single.html">طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد</a>
                            </h6>
                        </div>
                    </article>
                    <article class="col-lg-3 col-md-6 col-sm-12">
                        <div class="post-thumb position-relative p-10 bg-white border-radius-10">
                            <div class="thumb-overlay img-hover-slide border-radius-15 position-relative" style="background-image: url(assets/imgs/thumbnail-11.jpg)">
                                <a class="img-link" href="single.html"></a>
                                <div class="post-content-overlay">
                                    <div class="entry-meta meta-0 font-small mb-15">
                                        <a href="category.html"><span class="post-cat bg-success color-white">هنری</span></a>
                                    </div>
                                    <h5 class="post-title">
                                        <a class="color-white" href="single.html">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده</a>
                                    </h5>
                                    <div class="entry-meta meta-1 font-x-small mt-10 pr-5 pl-5 text-muted">
                                        <span><span class="ml-5"><i class="fa fa-eye" aria-hidden="true"></i></span>5.8هزار </span>
                                        <span class="ml-15"><span class="ml-5 text-muted"><i class="fa fa-comment" aria-hidden="true"></i></span>2.5هزار </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                    <article class="col-lg-3 col-md-6 col-sm-12">
                        <div class="post-thumb position-relative p-10 bg-white border-radius-10">
                            <div class="thumb-overlay img-hover-slide border-radius-15 position-relative" style="background-image: url(assets/imgs/thumbnail-7.jpg)">
                                <a class="img-link" href="single.html"></a>
                                <div class="post-content-overlay">
                                    <div class="entry-meta meta-0 font-small mb-15">
                                        <a href="category.html"><span class="post-cat bg-success color-white">نشان دادن</span></a>
                                    </div>
                                    <h5 class="post-title">
                                        <a class="color-white" href="single.html">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده</a>
                                    </h5>
                                    <div class="entry-meta meta-1 font-x-small mt-10 pr-5 pl-5 text-muted">
                                        <span><span class="ml-5"><i class="fa fa-eye" aria-hidden="true"></i></span>5.8هزار </span>
                                        <span class="ml-15"><span class="ml-5 text-muted"><i class="fa fa-comment" aria-hidden="true"></i></span>2.5هزار </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                    <article class="col-lg-3 col-md-6 col-sm-12">
                        <div class="post-thumb position-relative p-10 bg-white border-radius-10">
                            <div class="thumb-overlay img-hover-slide border-radius-15 position-relative" style="background-image: url(assets/imgs/thumbnail-9.jpg)">
                                <a class="img-link" href="single.html"></a>
                                <div class="post-content-overlay">
                                    <div class="entry-meta meta-0 font-small mb-15">
                                        <a href="category.html"><span class="post-cat bg-success color-white">خبری</span></a>
                                    </div>
                                    <h5 class="post-title">
                                        <a class="color-white" href="single.html">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده</a>
                                    </h5>
                                    <div class="entry-meta meta-1 font-x-small mt-10 pr-5 pl-5 text-muted">
                                        <span><span class="ml-5"><i class="fa fa-eye" aria-hidden="true"></i></span>5.8هزار </span>
                                        <span class="ml-15"><span class="ml-5 text-muted"><i class="fa fa-comment" aria-hidden="true"></i></span>2.5هزار </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="row">
                    <div class="col-12 text-center mb-50">
                        <a href="#">
                            <img class="border-radius-10 d-inline" src="assets/imgs/ads.jpg" alt="post-slider">
                        </a>
                    </div>
                </div>
                <div class="row mb-50">
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="sidebar-widget mb-md-30">
                            <div class="widget-header mb-30">
                                <h5 class="widget-title">پرطرفدارترین ها</h5>
                            </div>
                            <div class="post-aside-style-2">
                                <ul class="list-post">
                                    <li class="mb-30 wow fadeIn animated">
                                        <div class="d-flex">
                                            <div class="post-thumb d-flex ml-15 border-radius-5 img-hover-scale">
                                                <a class="color-white" href="single.html">
                                                    <img src="assets/imgs/thumbnail-12.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="post-content media-body">
                                                <h6 class="post-title mb-10 text-limit-2-row"><a href="single.html">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم</a></h6>
                                                <div class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase">
                                                    <span class="post-by">توسط <a href="author.html">رضا کیمیا</a></span>
                                                    <span class="post-on">4 دقیقه پیش</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="mb-30 wow fadeIn animated">
                                        <div class="d-flex">
                                            <div class="post-thumb d-flex ml-15 border-radius-5 img-hover-scale">
                                                <a class="color-white" href="single.html">
                                                    <img src="assets/imgs/thumbnail-13.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="post-content media-body">
                                                <h6 class="post-title mb-10 text-limit-2-row"><a href="single.html">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم</a></h6>
                                                <div class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase">
                                                    <span class="post-by">توسط <a href="author.html">مسعود راستی</a></span>
                                                    <span class="post-on">3 ساعت قبل</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="wow fadeIn animated">
                                        <div class="d-flex">
                                            <div class="post-thumb d-flex ml-15 border-radius-5 img-hover-scale">
                                                <a class="color-white" href="single.html">
                                                    <img src="assets/imgs/thumbnail-15.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="post-content media-body">
                                                <h6 class="post-title mb-10 text-limit-2-row"><a href="single.html">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم</a></h6>
                                                <div class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase">
                                                    <span class="post-by">توسط <a href="author.html">الناز روستایی</a></span>
                                                    <span class="post-on">4 ساعت قبل</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="sidebar-widget mb-md-30">
                            <div class="widget-header mb-30">
                                <h5 class="widget-title">انتخاب <span>ویرایشگر</span></h5>
                            </div>
                            <div class="post-aside-style-1 border-radius-10 p-20 bg-white">
                                <ul class="list-post">
                                    <li class="mb-20">
                                        <div class="d-flex">
                                            <div class="post-thumb d-flex ml-15 border-radius-5 img-hover-scale">
                                                <a class="color-white" href="single.html">
                                                    <img src="assets/imgs/thumbnail-4.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="post-content media-body">
                                                <h6 class="post-title mb-10 text-limit-2-row"><a href="single.html">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت</a></h6>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="mb-20">
                                        <div class="d-flex">
                                            <div class="post-thumb d-flex ml-15 border-radius-5 img-hover-scale">
                                                <a class="color-white" href="single.html">
                                                    <img src="assets/imgs/thumbnail-15.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="post-content media-body">
                                                <h6 class="post-title mb-10 text-limit-2-row"><a href="single.html">طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد</a></h6>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="mb-20">
                                        <div class="d-flex">
                                            <div class="post-thumb d-flex ml-15 border-radius-5 img-hover-scale">
                                                <a class="color-white" href="single.html">
                                                    <img src="assets/imgs/thumbnail-16.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="post-content media-body">
                                                <h6 class="post-title mb-10 text-limit-2-row"><a href="single.html">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت</a></h6>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="d-flex">
                                            <div class="post-thumb d-flex ml-15 border-radius-5 img-hover-scale">
                                                <a class="color-white" href="single.html">
                                                    <img src="assets/imgs/thumbnail-15.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="post-content media-body">
                                                <h6 class="post-title mb-10 text-limit-2-row"><a href="single.html">طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد</a></h6>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="sidebar-widget mb-sm-30">
                            <div class="widget-header mb-30">
                                <h5 class="widget-title">محبوب ترین</h5>
                            </div>
                            <div class="post-aside-style-2">
                                <ul class="list-post">
                                    <li class="mb-30 wow fadeIn   animated" style="visibility: visible; animation-name: fadeIn;">
                                        <div class="d-flex">
                                            <div class="post-thumb d-flex ml-15 border-radius-5 img-hover-scale">
                                                <a class="color-white" href="single.html">
                                                    <img src="assets/imgs/thumbnail-2.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="post-content media-body">
                                                <h6 class="post-title mb-10 text-limit-2-row"><a href="single.html">تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای</a></h6>
                                                <div class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase">
                                                    <span class="post-by">توسط <a href="author.html">رضا کیمیا</a></span>
                                                    <span class="post-on">4 دقیقه پیش</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="mb-30 wow fadeIn   animated" style="visibility: visible; animation-name: fadeIn;">
                                        <div class="d-flex">
                                            <div class="post-thumb d-flex ml-15 border-radius-5 img-hover-scale">
                                                <a class="color-white" href="single.html">
                                                    <img src="assets/imgs/thumbnail-3.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="post-content media-body">
                                                <h6 class="post-title mb-10 text-limit-2-row"><a href="single.html">تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای</a></h6>
                                                <div class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase">
                                                    <span class="post-by">توسط <a href="author.html">مسعود راستی</a></span>
                                                    <span class="post-on">3 ساعت قبل</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="wow fadeIn animated" style="visibility: visible; animation-name: fadeIn;">
                                        <div class="d-flex">
                                            <div class="post-thumb d-flex ml-15 border-radius-5 img-hover-scale">
                                                <a class="color-white" href="single.html">
                                                    <img src="assets/imgs/thumbnail-5.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="post-content media-body">
                                                <h6 class="post-title mb-10 text-limit-2-row"><a href="single.html">تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای</a></h6>
                                                <div class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase">
                                                    <span class="post-by">توسط <a href="author.html">الناز روستایی</a></span>
                                                    <span class="post-on">4 ساعت قبل</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="widget-header mb-30">
                            <h5 class="widget-title">آخرین <span>نظرات</span></h5>
                        </div>
                        <div class="sidebar-widget p-20 border-radius-15 bg-white widget-latest-comments wow fadeIn  animated">
                            <div class="post-block-list post-module-6">
                                <div class="last-comment mb-20 d-flex wow fadeIn">
                                    <span class="item-count vertical-align">
                                        <a class="red-tooltip author-avatar" href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Azumi - 985 posts"><img src="assets/imgs/authors/author-14.png" alt=""></a>
                                    </span>
                                    <div class="alith_post_title_small">
                                        <p class="font-medium mb-10"><a href="single.html">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان.</a></p>
                                        <div class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase mb-10">
                                            <span class="post-by">توسط <a href="author.html">الناز روستایی</a></span>
                                            <span class="post-on">4 دقیقه پیش</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="last-comment d-flex wow fadeIn">
                                    <span class="item-count vertical-align">
                                        <a class="red-tooltip author-avatar" href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Johny - 445 posts"><img src="assets/imgs/authors/author-3.png" alt=""></a>
                                    </span>
                                    <div class="alith_post_title_small">
                                        <p class="font-medium mb-10"><a href="single.html">سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان.</a></p>
                                        <div class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase mb-10">
                                            <span class="post-by">توسط <a href="author.html">مسعود راستی</a></span>
                                            <span class="post-on">4 دقیقه پیش</span>
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
            window.location = 'category-metro.php';
        });
    </script>
</body>


<!-- Mirrored from webilux.net/demo-newsviral/category-metro.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 28 Sep 2024 10:08:59 GMT -->
</html>
<?php

require_once('../../app/connection/DB.php');
require_once('../../app/controller/function.php');
$SITE_PATH = '..';
$URL_PATH = '../..';
require_once('../layout/login.php');
?>

<!DOCTYPE html>
<html class="no-js" lang="en">


<!-- Mirrored from webilux.net/demo-newsviral/404.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 28 Sep 2024 10:09:00 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>خطای 404 - صفحه یافت نشد</title>
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
        <?php require_once("../layout/sidebar.php") ?>
        <!-- Main Header -->
        <?php require_once('../layout/header.php') ?>
        <!-- Main Wrap Start -->
        <main class="position-relative">
            <div class="container">
                <div class="row mb-30">
                    <div class="col-12">
                        <div class="content-404 text-center mb-30">
                            <h1 class="mb-30">404</h1>
                            <p>صفحه مورد نظر شما یافت نشد.</p>
                            <p class="text-muted">ممکن است آدرس را اشتباه تایپ کرده باشید یا از پیوند قدیمی استفاده کرده باشید :) </p>
                            <h6 class="mt-50 mb-15">در سایت ما جستجو کنید</h6>
                            <form action="#" method="get" class="search-form d-lg-flex open-search mb-30">
                                <i class="icon-search"></i>
                                <input class="form-control" name="name" id="search" type="text" placeholder="جستجو ...">
                            </form>
                            <p>بازدید از <a href="../../index.php">صفحه نخست</a> یا در مورد مشکل <a href="contact.html">با ما تماس بگیرید</a></p>
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
    <script src="../../assets/js/model.js"></script>
    <script src="../../assets/js/validation.js" ></script>
    <script>
        $('.btn-close').click(function () {
            window.location = '404.php';
        });
    </script>
</body>


<!-- Mirrored from webilux.net/demo-newsviral/404.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 28 Sep 2024 10:09:00 GMT -->
</html>
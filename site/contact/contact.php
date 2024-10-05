<?php

require_once('../../app/connection/DB.php');
require_once('../../app/controller/function.php');
require_once('../../app/helper/view.php');
$SITE_PATH = '..';
$URL_PATH = '../..';
require_once('../layout/login.php');
$errors = [];
if (isset($_POST['_contact'])) {
    $name = checkDataSecurity($_POST['name']);
    $email = checkDataSecurity($_POST['email']);
    $phone = checkDataSecurity($_POST['phone']);
    $contact = checkDataSecurity($_POST['contact']);

    checkDataEmpty($name, 'name', 'فیلد نام نمیتواند خالی باشد');
    checkDataEmpty($email, 'email', 'فیلد نام نمیتواند خالی باشد');
    checkDataEmpty($phone, 'phone', 'فیلد نام نمیتواند خالی باشد');
    checkDataEmpty($contact, 'contact', 'فیلد نام نمیتواند خالی باشد');

    if (count($errors) == 0) {
        $db->insert('contacts', [
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'description' => $contact,
            'setdate' => $date,
            'status' => 0,
        ]);
        header('Location:contact.php?ok=8');
    }
}
?>

<!DOCTYPE html>
<html class="no-js" lang="en">


<!-- Mirrored from webilux.net/demo-newsviral/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 28 Sep 2024 10:08:59 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>تماس با ما - قالب HTML نیوز وایرال</title>
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
            <div class="container">
                <div class="entry-header entry-header-2 mb-50 mt-50 text-center">
                    <div class="thumb-overlay img-hover-slide border-radius-5 position-relative"
                        style="background-image: url(../../attachment/imgs/news-24.jpg)">
                        <div class="position-midded">
                            <div class="entry-meta meta-0 font-small mb-30">
                                <a href="category.html"><span class="post-cat bg-success color-white">در تماس
                                        باشید</span></a>
                            </div>
                            <h1 class="post-title mb-30 text-white">
                                تماس با ما
                            </h1>
                            <div class="entry-meta meta-1 font-x-small color-grey text-uppercase text-white">
                                <span class="ml-5">
                                    <ion-icon name="planet"></ion-icon>
                                </span>
                                <span class="ml-15">SiteName.com</span>
                                <span class="mr-15 ml-5">
                                    <ion-icon name="call"></ion-icon>
                                </span>
                                <span>شماره 021-1234567</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end entry header-->
                <div class="row mb-50">
                    <div class="col-lg-2 d-none d-lg-block"></div>
                    <div class="col-lg-8 col-md-12">
                        <div class="single-social-share single-sidebar-share mt-30">
                            <ul>
                                <li><a class="social-icon facebook-icon text-xs-center" target="_blank" href="#"><i
                                            class="ti-facebook"></i></a></li>
                                <li><a class="social-icon twitter-icon text-xs-center" target="_blank" href="#"><i
                                            class="ti-twitter-alt"></i></a></li>
                                <li><a class="social-icon pinterest-icon text-xs-center" target="_blank" href="#"><i
                                            class="ti-pinterest"></i></a></li>
                                <li><a class="social-icon instagram-icon text-xs-center" target="_blank" href="#"><i
                                            class="ti-instagram"></i></a></li>
                                <li><a class="social-icon linkedin-icon text-xs-center" target="_blank" href="#"><i
                                            class="ti-linkedin"></i></a></li>
                                <li><a class="social-icon email-icon text-xs-center" target="_blank" href="#"><i
                                            class="ti-email"></i></a></li>
                            </ul>
                        </div>
                        <div class="single-excerpt">
                            <p class="font-large">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده
                                از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است
                                و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می
                                باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را
                                می طلبد..</p>
                            <hr class="wp-block-separator is-style-wide">
                            <p><span class="ml-5">
                                    <ion-icon name="location-outline"></ion-icon>
                                </span><strong>آدرس</strong>: تهران ، زعفرانیه ، خیابان مهر ، پلاک 825</p>
                            <p><span class="ml-5">
                                    <ion-icon name="home-outline"></ion-icon>
                                </span><strong>وب سایت ما</strong>: https://SiteName.com</p>
                            <p><span class="ml-5">
                                    <ion-icon name="planet-outline"></ion-icon>
                                </span><strong>مرکز پشتیبانی</strong>: https://SiteName.ticksy.com</p>
                        </div>
                        <div class="entry-main-content mt-50">
                            <h3>تبلیغات</h3>
                            <hr class="wp-block-separator is-style-wide">
                            <p>لطفاً مستقیماً با ما در SiteName.ticksy.com برای کمپین های بزرگ یا منحصر به فرد برای
                                درخواست های پیشنهادی و اطلاعات قیمت دیگر به SiteName@yahoo.com ایمیل بزنید. </p>
                            <h1 class="mt-30">در تماس باشید</h1>
                            <hr class="wp-block-separator is-style-wide">
                            <?php
                            if (isset($_GET['ok']) and $_GET['ok'] != '')
                                showMessage($_GET['ok'])
                                    ?>
                                <form class="form-contact comment_form needs-validation" novalidate action="" method="post"
                                    id="commentForm">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input class="form-control" name="name" id="name" type="text" required
                                                    placeholder="نام">
                                                <div class="invalid-feedback">
                                                    فیلد نام نباید خالی باشد
                                                </div>
                                            </div>
                                            <div><?= checkDataErrorExist('name') ?></div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input class="form-control" name="email" id="email" type="email" required
                                                    placeholder="ایمیل">
                                                <div class="invalid-feedback">
                                                    فیلد ایمیل نباید خالی باشد
                                                </div>
                                            </div>
                                            <div><?= checkDataErrorExist('email') ?></div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <input class="form-control" name="phone" id="phone" type="text" required
                                                    placeholder="شماره تماس">
                                                <div class="invalid-feedback">
                                                    فیلد شماره تماس نباید خالی باشد
                                                </div>
                                            </div>
                                            <div><?= checkDataErrorExist('phone') ?></div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <textarea class="form-control w-100" name="contact" id="contact" cols="30"
                                                    rows="9" placeholder="پیام" required></textarea>
                                                <div class="invalid-feedback">
                                                    فیلد پیام نباید خالی باشد
                                                </div>
                                            </div>
                                            <div><?= checkDataErrorExist('contact') ?></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="_contact" class="button button-contactForm">ارسال
                                            پیام</button>
                                    </div>
                                </form>
                            </div>
                            <div class="entry-bottom mt-50 mb-30">
                                <div class="overflow-hidden mt-30">
                                    <div class="single-social-share float-right">
                                        <ul class="d-inline-block list-inline">
                                            <li class="list-inline-item"><span class="font-small text-muted"><i
                                                        class="ti-sharethis ml-5"></i>اشتراک: </span></li>
                                            <li class="list-inline-item"><a class="social-icon facebook-icon text-xs-center"
                                                    target="_blank" href="#"><i class="ti-facebook"></i></a></li>
                                            <li class="list-inline-item"><a class="social-icon twitter-icon text-xs-center"
                                                    target="_blank" href="#"><i class="ti-twitter-alt"></i></a></li>
                                            <li class="list-inline-item"><a
                                                    class="social-icon pinterest-icon text-xs-center" target="_blank"
                                                    href="#"><i class="ti-pinterest"></i></a></li>
                                            <li class="list-inline-item"><a
                                                    class="social-icon instagram-icon text-xs-center" target="_blank"
                                                    href="#"><i class="ti-instagram"></i></a></li>
                                            <li class="list-inline-item"><a class="social-icon linkedin-icon text-xs-center"
                                                    target="_blank" href="#"><i class="ti-linkedin"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End row-->
                    <div class="row">
                        <div class="col-12 text-center mb-50">
                            <a href="#">
                                <img class="d-inline border-radius-10" src="../../attachment/imgs/ads.jpg" alt="">
                            </a>
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
    <script src="../../assets/js/model.js"></script>
    <script src="../../assets/js/validation.js"></script>
    <script>
        $('.btn-close').click(function () {
            window.location = 'contact.php';
        });
    </script>
</body>


<!-- Mirrored from webilux.net/demo-newsviral/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 28 Sep 2024 10:09:00 GMT -->

</html>
<?php 

require_once('../../app/connection/DB.php');
require_once('../../app/controller/function.php');
require_once('../layout/login.php')

?>

<!DOCTYPE html>
<html class="no-js" lang="en">


<!-- Mirrored from webilux.net/demo-newsviral/about.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 28 Sep 2024 10:08:59 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>درباره ما - قالب HTML نیوز وایرال</title>
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
            <div class="container">
                <div class="entry-header entry-header-2 mb-50 mt-50 text-center">
                    <div class="entry-meta meta-0 font-small mb-30"><a href="category.html"><span class="post-cat background4 text-danger">خوش آمدید</span></a></div>
                    <h1 class="post-title mb-30">
                        درباره شرکت ما
                    </h1>
                    <div class="entry-meta meta-1 font-x-small color-grey text-uppercase">
                        <span>150+ پرسنل</span>
                        <span class="ml-10">25+ جایزه</span>
                        <span class="ml-10">12000+ پروژه</span>
                    </div>
                </div>
                <!--end entry header-->
                <div class="row mb-50">
                    <div class="col-lg-2 d-none d-lg-block"></div>
                    <div class="col-lg-8 col-md-12">
                        <div class="single-social-share single-sidebar-share mt-30">
                            <ul>
                                <li><a class="social-icon facebook-icon text-xs-center" target="_blank" href="#"><i class="ti-facebook"></i></a></li>
                                <li><a class="social-icon twitter-icon text-xs-center" target="_blank" href="#"><i class="ti-twitter-alt"></i></a></li>
                                <li><a class="social-icon pinterest-icon text-xs-center" target="_blank" href="#"><i class="ti-pinterest"></i></a></li>
                                <li><a class="social-icon instagram-icon text-xs-center" target="_blank" href="#"><i class="ti-instagram"></i></a></li>
                                <li><a class="social-icon linkedin-icon text-xs-center" target="_blank" href="#"><i class="ti-linkedin"></i></a></li>
                                <li><a class="social-icon email-icon text-xs-center" target="_blank" href="#"><i class="ti-email"></i></a></li>
                            </ul>
                        </div>
                        <div class="single-excerpt">
                            <p class="font-large">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد.</p>
                            <hr class="wp-block-separator is-style-wide">
                            <p><span class="ml-5">
                                    <ion-icon name="home-outline"></ion-icon>
                                </span><strong>وب سایت ما:</strong> www.SiteName.com</p>
                            <p><span class="ml-5">
                                    <ion-icon name="planet-outline"></ion-icon>
                                </span><strong>مرکز پشتیبانی:</strong> www.SiteName.com</p>
                        </div>
                        <div class="entry-main-content">
                            <h2>محیطی عالی برای کار</h2>
                            <hr class="wp-block-separator is-style-wide">
                            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه. </p>
                            <h5>مدیرعامل ما را ملاقات کنید</h5>
                            <figure class="wp-block-gallery columns-6">
                                <ul class="blocks-gallery-grid">
                                    <li class="blocks-gallery-item"><a href="#"><img class="border-radius-5" src="assets/imgs/authors/author.png" alt=""></a>
                                        <p class="font-small text-muted text-center mt-15"><strong>مسعود راستی</strong><br>مدیرعامل</p>
                                    </li>
                                    <li class="blocks-gallery-item"><a href="#"><img class="border-radius-5" src="assets/imgs/authors/author-1.png" alt=""></a>
                                        <p class="font-small text-muted text-center mt-15"><strong>رضا کیمیا</strong><br>مدیر ارشد اجرایی</p>
                                    </li>
                                    <li class="blocks-gallery-item"><a href="#"><img class="border-radius-5" src="assets/imgs/authors/author-2.png" alt=""></a>
                                        <p class="font-small text-muted text-center mt-15"><strong>الناز روستایی</strong><br>مدیر بازاریابی</p>
                                    </li>
                                    <li class="blocks-gallery-item"><a href="#"><img class="border-radius-5" src="assets/imgs/authors/author-3.png" alt=""></a>
                                        <p class="font-small text-muted text-center mt-15"><strong>سعید شمس</strong><br>مدیر امنیت</p>
                                    </li>
                                    <li class="blocks-gallery-item"><a href="#"><img class="border-radius-5" src="assets/imgs/authors/author-7.png" alt=""></a>
                                        <p class="font-small text-muted text-center mt-15"><strong>بهمن راستی</strong><br>سرپرست مشتری</p>
                                    </li>
                                </ul>
                            </figure>
                            <p>
                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ.
                            </p>
                            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد.</p>
                            <h2>چگونه مدیریت می کنیم</h2>
                            <div class="wp-block-image">
                                <figure>
                                    <img class="border-radius-5" src="assets/imgs/news-23.jpg" alt="">
                                    <figcaption> لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم </figcaption>
                                </figure>
                            </div>
                            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای.</p>
                            <hr class="wp-block-separator is-style-dots">
                            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی.</p>
                            <blockquote class="wp-block-quote is-style-large">
                                <p>پیشرفت تکنولوژی مبتنی بر تناسب آن است به طوری که شما حتی به آن توجه نمی کنید ، بنابراین بخشی از زندگی روزمره است.</p><cite>مسعود راستی</cite>
                            </blockquote>
                            <h2>چشم انداز ما</h2>
                            <hr class="wp-block-separator is-style-wide">
                            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه.</p>
                            <p>طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای</p>
                            <hr class="wp-block-separator is-style-wide">
                            <p>سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد.</p>
                            <p class="text-center mt-30">
                                <a href="#"><img class="d-inline border-radius-10" src="assets/imgs/ads.jpg" alt=""></a>
                            </p>
                        </div>
                        <div class="entry-bottom mt-50 mb-30">
                            <div class="overflow-hidden mt-30">
                                <div class="single-social-share float-right">
                                    <ul class="d-inline-block list-inline">
                                        <li class="list-inline-item"><span class="font-small text-muted"><i class="ti-sharethis ml-5"></i>اشتراک: </span></li>
                                        <li class="list-inline-item"><a class="social-icon facebook-icon text-xs-center" target="_blank" href="#"><i class="ti-facebook"></i></a></li>
                                        <li class="list-inline-item"><a class="social-icon twitter-icon text-xs-center" target="_blank" href="#"><i class="ti-twitter-alt"></i></a></li>
                                        <li class="list-inline-item"><a class="social-icon pinterest-icon text-xs-center" target="_blank" href="#"><i class="ti-pinterest"></i></a></li>
                                        <li class="list-inline-item"><a class="social-icon instagram-icon text-xs-center" target="_blank" href="#"><i class="ti-instagram"></i></a></li>
                                        <li class="list-inline-item"><a class="social-icon linkedin-icon text-xs-center" target="_blank" href="#"><i class="ti-linkedin"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--related posts-->
                        <div class="related-posts">
                            <h3 class="mb-30">از وبلاگ ما</h3>
                            <div class="row">
                                <article class="col-lg-4">
                                    <div class="background-white border-radius-10 p-10 mb-30">
                                        <div class="post-thumb d-flex mb-15 border-radius-15 img-hover-scale">
                                            <a href="single.html">
                                                <img class="border-radius-15" src="assets/imgs/news-2.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="pl-10 pr-10">
                                            <div class="entry-meta mb-15 mt-10">
                                                <a class="entry-meta meta-2" href="category.html"><span class="post-in text-primary font-x-small">سیاسی</span></a>
                                            </div>
                                            <h5 class="post-title mb-15">
                                                <span class="post-format-icon">
                                                    <ion-icon name="image-outline" role="img" class="md hydrated" aria-label="image outline"></ion-icon>
                                                </span>
                                                <a href="single.html">لورم ایپسوم متن ساختگی با تولید سادگی</a></h5>
                                            <div class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase mb-10">
                                                <span class="post-by">توسط <a href="author.html">الناز روستایی</a></span>
                                                <span class="post-on">8 دقیقه پیش</span>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                                <article class="col-lg-4">
                                    <div class="background-white border-radius-10 p-10 mb-30">
                                        <div class="post-thumb d-flex mb-15 border-radius-15 img-hover-scale">
                                            <a href="single.html">
                                                <img class="border-radius-15" src="assets/imgs/news-5.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="pl-10 pr-10">
                                            <div class="entry-meta mb-15 mt-10">
                                                <a class="entry-meta meta-2" href="category.html"><span class="post-in text-success font-x-small">فناوری</span></a>
                                            </div>
                                            <h5 class="post-title mb-15">
                                                <span class="post-format-icon">
                                                    <ion-icon name="headset-outline" role="img" class="md hydrated" aria-label="headset outline"></ion-icon>
                                                </span>
                                                <a href="single.html">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم</a></h5>
                                            <div class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase mb-10">
                                                <span class="post-by">توسط <a href="author.html">رضا کیمیا</a></span>
                                                <span class="post-on">24 دقیقه پیش</span>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                                <article class="col-lg-4">
                                    <div class="background-white border-radius-10 p-10">
                                        <div class="post-thumb d-flex mb-15 border-radius-15 img-hover-scale">
                                            <a href="single.html">
                                                <img class="border-radius-15" src="assets/imgs/news-7.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="pl-10 pr-10">
                                            <div class="entry-meta mb-15 mt-10">
                                                <a class="entry-meta meta-2" href="category.html"><span class="post-in text-danger font-x-small">جهانی</span></a>
                                            </div>
                                            <h5 class="post-title mb-15">
                                                <a href="single.html">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم</a></h5>
                                            <div class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase mb-10">
                                                <span class="post-by">توسط <a href="author.html">سعید شمس</a></span>
                                                <span class="post-on">24 دقیقه پیش</span>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End row-->
                <div class="row">
                    <div class="col-12 text-center mb-50">
                        <a href="#">
                            <img class="border-radius-10 d-inline" src="assets/imgs/ads-3.png" alt="">
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
            window.location = 'about.php';
        });
    </script>
</body>


<!-- Mirrored from webilux.net/demo-newsviral/about.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 28 Sep 2024 10:08:59 GMT -->
</html>
<?php

require_once('../../app/connection/DB.php');
require_once('../../app/controller/function.php');
require_once('../../app/helper/view.php');
require_once('../layout/login.php');
$SITE_PATH = '..';
$URL_PATH = '../..';
?>
<!DOCTYPE html>
<html class="no-js" lang="en">


<!-- Mirrored from webilux.net/demo-newsviral/typography.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 28 Sep 2024 10:08:59 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>تایپوگرافی - راهنمای سبک - قالب HTML نیوز وایرال</title>
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
            <div class="container">
                <div class="entry-header entry-header-2 mb-50 mt-50 text-center">
                    <div class="entry-meta meta-0 font-small mb-30"><a href="category.html"><span
                                class="post-cat bg-success text-white">المنت ها</span></a></div>
                    <h1 class="post-title mb-30">
                        تایپوگرافی - راهنمای سبک
                    </h1>
                    <div class="entry-meta meta-1 font-x-small color-grey text-uppercase">
                        <span>عنوان</span>
                        <span class="mr-10">نقل قول ها</span>
                        <span class="mr-10">جدول</span>
                        <span class="mr-10">برچسب ها</span>
                        <span class="mr-10">کد</span>
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
                        <figure class="post-thumb d-flex mb-30 border-radius-5 img-hover-scale animate-conner-box">
                            <a href="single.html"><img class="border-radius-5" src="assets/imgs/news-23.jpg" alt=""></a>
                        </figure>
                        <div class="single-excerpt">
                            <p class="font-large">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده
                                از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است
                                و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود</p>
                        </div>
                        <div class="entry-main-content">
                            <hr class="wp-block-separator is-style-dots">
                            <h2>عناوین</h2>
                            <h1>سرتیتر یک</h1>
                            <h2>سرتیتر دو</h2>
                            <h3>سرتیتر سه</h3>
                            <h4>سرتیتر چهار</h4>
                            <h5>سرتیتر پنج</h5>
                            <h6>سرتیتر شیش</h6>
                            <hr class="wp-block-separator">
                            <h2>لینک ها</h2>
                            <p>اگر نشانی اینترنتی را وارد کنید ، مانند <a
                                    href="https://rtl-theme.com/">https://rtl-theme.com</a> - به طور خودکار پیوند داده
                                می شود. اما اگر می خواهید متن لنگر خود را سفارشی کنید ، می توانید این کار را نیز انجام
                                دهید! در اینجا پیوندی به <a href="https://rtl-theme.com/">وب سایت راستچین آمده است.</a>
                            </p>
                            <hr class="wp-block-separator">
                            <h2>نقل قول ها</h2>
                            <p>نقل قول بلوک تک خط:</p>
                            <blockquote>
                                <p>لورم ایپسوم متن ساختگی.</p>
                            </blockquote>
                            <p>نقل قول چند خطی با مرجع استناد:</p>
                            <blockquote cite="https://developer.mozilla.org/en-US/docs/Web/HTML/Element/blockquote">
                                <p>عنصر <strong> <code>&lt;blockquote&gt;</code></strong> (یا <em>عنصر نقل قول بلوک
                                        HTML</em>) نشان می دهد که متن پیوست یک نقل قول گسترده است. معمولاً ، این مورد
                                    بصورت تورفت به صورت تصویری ارائه می شود (به <a
                                        href="https://developer.mozilla.org/en-US/docs/HTML/Element/blockquote#Notes">نکات</a>
                                    مربوط به نحوه تغییر آن مراجعه کنید). یک آدرس اینترنتی برای منبع نقل قول ممکن است با
                                    استفاده از ویژگی <strong>cite</strong> داده شود ، در حالی که نمایندگی متنی منبع می
                                    تواند با استفاده از عنصر <a
                                        href="https://developer.mozilla.org/en-US/docs/Web/HTML/Element/cite"
                                        title="عنصر استناد <cite> نشان دهنده مرجع یک اثر خلاق است. باید عنوان یک اثر یا مرجع نشانی اینترنتی را در بر داشته باشد ، که ممکن است به صورت مختصر مطابق با قواعد مورد استفاده برای افزودن فوق داده های نقل قول باشد."><code>&lt;cite&gt;</code></a>
                                    داده شود.</p>
                            </blockquote>
                            <p><cite>مشارکت کنندگان متعدد</cite> – مرجع عنصر HTML MDN - بلوک نقل قول</p>
                            <hr class="wp-block-separator">
                            <h2>جداول</h2>
                            <table>
                                <thead>
                                    <tr>
                                        <th>کارمند</th>
                                        <th>حقوق</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th><a href="http://example.org/">رضا کیمیا</a></th>
                                        <td>10 میلیون</td>
                                        <td>زیرا این تنها چیزی است که رضا برای حقوق لازم دارد</td>
                                    </tr>
                                    <tr>
                                        <th><a href="http://example.org/">الناز روستایی</a></th>
                                        <td>15 میلیون</td>
                                        <td>به خاطر تمام وبلاگ نویسی هایی که انجام می دهد.</td>
                                    </tr>
                                    <tr>
                                        <th><a href="http://example.org/">سعید شمس</a></th>
                                        <td>17 میلیون</td>
                                        <td>سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز.</td>
                                    </tr>
                                    <tr>
                                        <th><a href="http://example.org/">بهمن راستی</a></th>
                                        <td>30 میلیون</td>
                                        <td>لورم ایپسوم متن ساختگی با تولید سادگی…</td>
                                    </tr>
                                </tbody>
                            </table>
                            <hr class="wp-block-separator">
                            <h2>لیست های تعریف</h2>
                            <dl>
                                <dt>عنوان لیست تعریف</dt>
                                <dd>تعریف لیست تعریف.</dd>
                                <dt>استارت آپ</dt>
                                <dd>یک شرکت نوپا یا استارتاپ یک شرکت یا سازمان موقت است که برای جستجوی مدل تجاری
                                    تکرارپذیر و مقیاس پذیر طراحی شده است.</dd>
                                <dt>#کار</dt>
                                <dd>"کار کنید" توسط Rob Dyrdek و محافظ بدن شخصی اش کریستوفر "Big Black" بویکینز ابداع
                                    شده است ، به عنوان یک انگیزه دهنده خود ، برای ایجاد انگیزه در دوستان شما عمل می
                                    کند..</dd>
                                <dt>به صورت زنده انجام دهید</dt>
                                <dd>اجازه می دهم مسعود این <a title="تماشایی ویدیو" href="#">مورد</a> را توضیح دهد.</dd>
                            </dl>
                            <hr class="wp-block-separator">
                            <h2>لیست های نامرتب ( تو در تو )</h2>
                            <ul>
                                <li>آیتم لیست یک
                                    <ul>
                                        <li>آیتم لیست یک
                                            <ul>
                                                <li>آیتم لیست یک</li>
                                                <li>آیتم لیست دو</li>
                                                <li>آیتم لیست سه</li>
                                                <li>آیتم لیست چهار</li>
                                            </ul>
                                        </li>
                                        <li>آیتم لیست دو</li>
                                        <li>آیتم لیست سه</li>
                                        <li>آیتم لیست چهار</li>
                                    </ul>
                                </li>
                                <li>آیتم لیست دو</li>
                                <li>آیتم لیست سه</li>
                                <li>آیتم لیست چهار</li>
                            </ul>
                            <hr class="wp-block-separator">
                            <h2>لیست سفارش (تو در تو)</h2>
                            <ol start="8">
                                <li>آیتم لیست یک - از 8 شروع کنید
                                    <ol>
                                        <li>آیتم لیست یک
                                            <ol reversed="reversed">
                                                <li>آیتم لیست یک -ویژگی معکوس</li>
                                                <li>آیتم لیست دو</li>
                                                <li>آیتم لیست سه</li>
                                                <li>آیتم لیست چهار</li>
                                            </ol>
                                        </li>
                                        <li>آیتم لیست دو</li>
                                        <li>آیتم لیست سه</li>
                                        <li>آیتم لیست چهار</li>
                                    </ol>
                                </li>
                                <li>آیتم لیست دو</li>
                                <li>آیتم لیست سه</li>
                                <li>آیتم لیست چهار</li>
                            </ol>
                            <hr class="wp-block-separator">
                            <h2>برچسب های HTML</h2>
                            <p>این برچسب های پشتیبانی شده از <a title="Code"
                                    href="https://en.support.wordpress.com/code/">سوالات متداول</a> کد WordPress.com
                                آمده است.</p>
                            <p><strong>آدرس برچسب</strong></p>
                            <address>1 حلقه بی نهایت<br>
                                تهران , زعفرانیه<br>
                                ایران</address>
                            <p><strong>برچسب لنگر (با نام مستعار پیوند)</strong></p>
                            <p>این یک مثال از <a title="بنیاد وردپرس" href="https://wordpressfoundation.org/">پیوند</a>
                                است.</p>
                            <p><strong>برچسب اختصاری</strong></p>
                            <p>مخفف <abbr title="Seriously">srsly</abbr> مخفف "seriously" است.</p>
                            <p><strong>برچسب مخفف (<em>منسوخ شده در HTML5</em>)</strong></p>
                            <p>مخفف <acronym title="For The Win">ftw</acronym> مخفف عبارت "for the win" است.</p>
                            <p><strong>برچسب بزرگ</strong> (<em>منسوخ شده در HTML5</em>)</p>
                            <p>این آزمایش ها یک معامله <big>بزرگ</big> هستند ، اما این تگ دیگر در HTML5 پشتیبانی نمی
                                شود.</p>
                            <p><strong>استناد برچسب</strong></p>
                            <p>“رمز شعر است” —<cite>اتوماتیک</cite></p>
                            <p><strong>برچسب کد</strong></p>
                            <p>این برچسب به بلوک های کد استایل می دهد.<br>
                                <code>.post-title {<br>
                                    margin: 0 0 5px;<br>
                                    font-weight: bold;<br>
                                    font-size: 38px;<br>
                                    line-height: 1.2;<br>
                                    و در اینجا خطی از برخی از متون واقعاً طولانی وجود دارد ، فقط برای دیدن نحوه مدیریت و نحوه سرریز آن;<br>
                                    }</code><br>
                                بعداً در این آزمون ها خواهید آموخت که کلمه <code>word-wrap: break-word;</code> بهترین
                                دوست شما خواهد بود.
                            </p>
                            <p><strong>حذف تگ</strong></p>
                            <p>این برچسب به شما امکان می دهد متن <del cite="deleted it">را حذف کنید</del> اما این برچسب
                                در HTML5 پشتیبانی می شود (به جای آن از <code>&lt;s&gt;</code> استفاده کنید).</p>
                            <p><strong>بر برچسب تأکید کنید</strong></p>
                            <p>برچسب تاکید باید متن را به صورت <em>مورب متغیر</em> <i>کند</i>.</p>
                            <p><strong>برچسب قانون افقی</strong></p>
                            <hr>
                            <p>این جمله از برچسب <code>&lt;hr /&gt;</code> پیروی می کند..</p>
                            <p><strong>درج برچسب</strong></p>
                            <p>این برچسب باید نشان دهنده <ins cite="inserted it">متن</ins> درج شده باشد.</p>
                            <p><strong>برچسب صفحه کلید</strong></p>
                            <p>این برچسب که به ندرت شناخته می شود ، <kbd>متن صفحه کلید </kbd>را شبیه سازی می کند ، که
                                معمولاً مانند برچسب <code>&lt;code&gt;</code> طراحی می شود.</p>
                            <p><strong>برچسب پیش فرمت شده</strong></p>
                            <p>این برچسب برای حفظ فضای سفید به صورت تایپ شده ، مانند شعر یا هنر ASCII است.</p>
                            <hr class="wp-block-separator">
                            <h2>جاده ای که طی نشده است</h2>
                            <pre><cite>رابرت فراست</cite>
                                  دو جاده در یک چوب زرد از هم جدا شدند ،
                                  و متاسفم که نتوانستم هر دو را سفر کنم             (\ _/)
                                  و یک مسافر باش ، من مدتها ایستادم              (= '.' =)
                                  و تا جایی که می توانستم به پایین نگاه کردم         (") _ (")
                                  به جایی که در زیر بوته خم شده است.

                                  سپس دیگری را به همان اندازه عادلانه گرفت ،
                                  و شاید داشتن ادعای بهتر ،                |/_\|
                                  چون علفی بود و پوشیدن می خواست.        \ @ @ /
                                  اگرچه در مورد آن عبور از آنجا          ( &lt; º &gt; )
                                  آنها را تقریباً یکسان پوشیده بود ،           `&gt;&gt;x&lt;&lt;´
                                                                    \ O /
                                  و هر دو صبح همان روز دراز کشیدند
                                  در برگها هیچ قدم سیاه پا نگذاشته بود.
                                  اوه ، من اولین روز را برای یک روز دیگر نگه داشتم!
                                  با این حال دانستن اینکه چگونه راه به راه می انجامد ،
                                  من شک داشتم که آیا من هرگز باید برگردم.

                                  این را با آه می گویم
                                  در سنین و سنین مختلف از این رو:
                                  دو جاده در یک جنگل از هم جدا شدند و من -
                                  من آن را که کمتر سفر کرده بود ، گرفتم ،
                                  و آن تمام تفاوتها را ایجاد کرده است.


                                  و در اینجا خطی از برخی از متون واقعاً ، واقعاً ، واقعاً طولانی وجود دارد ، فقط برای دیدن نحوه مدیریت و نحوه سرریز آن.
                                </pre>
                            <p><strong>برچسب را برای</strong> نقل قول های کوتاه و خطی نقل قول کنید</p>
                            <p><q>توسعه دهندگان ، توسعه دهندگان ، توسعه دهندگان...</q> --استیو بالمر</p>
                            <p><strong>برچسب اعتصاب</strong> (<em>منسوخ شده در HTML5</em>) و <strong>برچسب S</strong>
                            </p>
                            <p>این برچسب متنی از <strike>طریق هشدار</strike> <s>را نشان می دهد</s>.</p>
                            <p><strong>برچسب کوچک</strong></p>
                            <p>این برچسب متن <small>کوچکتر<small> را نشان می دهد.</small></small></p>
                            <p><strong>برچسب قوی</strong></p>
                            <p>این برچسب متن <strong>پررنگ<strong> را نشان می دهد.</strong></strong></p>
                            <p><strong>برچسب Subscript</strong></p>
                            <p>با استفاده از H<sub>2</sub>O, حالت علمی خود را تقویت کنید ، که باید "2" را به سمت پایین
                                فشار دهد.</p>
                            <p><strong>برچسب Superscript</strong></p>
                            <p>هنوز به علم و E = MC<sup>2</sup>, آلبرت اینشتین پایبند هستید ، که باید 2 را بالا ببرد.
                            </p>
                            <p><strong>برچسب Teletype </strong>(<em>منسوخ شده در HTML5</em>)</p>
                            <p>این برچسب که به ندرت مورد <tt>استفاده قرار می گیرد</tt>, متن تله تایپ را شبیه سازی می کند
                                ، که معمولاً مانند برچسب <code>&lt;code&gt;</code> طراحی می شود.</p>
                            <p><strong>برچسب Underline</strong> <em>در HTML 4 منسوخ شده است ، مجدداً در HTML5 با معانی
                                    دیگر وارد شده است</em></p>
                            <p>این برچسب متن <u>زیر خط دار را نشان می دهد</u>.</p>
                            <p><strong>برچسب متغیر</strong></p>
                            <p>این به شما امکان می دهد <var>متغیرها</var> را مشخص کنید.</p>
                            <div class="clearfix"></div>
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
            window.location = 'typography.php';
        });
    </script>
</body>


<!-- Mirrored from webilux.net/demo-newsviral/typography.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 28 Sep 2024 10:08:59 GMT -->

</html>
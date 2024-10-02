<?php
require_once('../../app/connection/DB.php');
require_once('../../app/controller/function.php');
require_once('../../app/helper/view.php');
require_once('../../app/helper/jdf.php');
require_once('../layout/login.php');

if (!isset($_GET['id']) or $_GET['id'] == '' or !is_numeric($_GET['id']))
    header('Location:../../index.php');

$id = checkDataSecurity($_GET['id']);
if (isset($_SESSION['member'])) {
    $memberId = $db->where('username', $_SESSION['member'])
        ->getValue('members', 'id');
    $like = $db->where('member_id', $memberId)
        ->where('blog_id', $id)
        ->getValue('wishlist', 'COUNT(id)');
}


if (isset($_GET['like']) and $_GET['like'] == 1) {
    $data = $db->where('member_id', $memberId)
        ->where('blog_id', $id)
        ->getValue('wishlist', 'COUNT(id)');
    if ($data == 0) {
        $db->insert('wishlist', [
            'blog_id' => $id,
            'member_id' => $memberId,
            'setdate' => $date
        ]);
        $liked = getMaxField('blogs', 'post_liked', $id);
        $db->where('id', $id)
        ->update('blogs', [
            'post_liked'=> $liked
        ]);
    } else {
        $data = $db->where('member_id', $memberId)
            ->where('blog_id', $id)
            ->delete('wishlist');
        $deleteLike = $db->where('id', $id)
        ->getValue('blogs', 'post_liked');
        $deleteLike -= 1;
        $db->where('id', $id)
        ->update('blogs', [
            'post_liked'=> $deleteLike
        ]);
        
    }
    header('Location:single.php?id=' . $id);
}
$errors = [];

if (isset($_POST['btn_comment'])) {
    $fname = checkDataSecurity($_POST['fname']);
    $lname = checkDataSecurity($_POST['lname']);
    $email = checkDataSecurity($_POST['email']);
    $description = checkDataSecurity($_POST['description']);

    checkDataEmpty($fname, 'fname', 'نام شما نمیتواند خالی باشد.');
    checkDataEmpty($lname, 'lname', 'نام خانوادگی شما نمیتواند خالی باشد.');
    checkDataEmpty($email, 'email', 'ایمیل شما نمیتواند خالی باشد.');
    checkDataEmpty($description, 'description', 'توضیحات شما نمیتواند خالی باشد.');

    if (count($errors) == 0) {
        $db->insert('comments', [
            'fname' => $fname,
            'lname' => $lname,
            'email' => $email,
            'description' => $description,
            'blog_id' => $id,
            'setdate' => $date,
            'member_id' => isset($memberId) ? $memberId : null,
            'status' => 0
        ]);
        header("Location:single.php?id=$id&ok=6");
    }
}


$counterDate = $db->where('blog_id', $id)
    ->orderBy('date', 'DESC')
    ->getOne('counter', 'date, member_id');
if (!empty($counterDate)) {
    if (!is_null($counterDate['date']))
        $counterDate['date'] = strtotime($counterDate['date'] . " +5min");
    if ((is_null($counterDate['date'])) or (is_null($counterDate['member_id']) and $counterDate['date'] <= strtotime($date)) or (isset($memberId) and $memberId == $counterDate['member_id'] and $counterDate['date'] <= strtotime($date)) or (isset($memberId) and $memberId != $counterDate['member_id']) or (!isset($memberId) and $counterDate['date'] <= strtotime($date))) {
        $count = getMaxField('blogs', 'counter', $id);
        $db->where('id', $id)->update('blogs', [
            'counter' => $count
        ]);
        $db->insert('counter', [
            'member_id' => isset($memberId) ? $memberId : null,
            'blog_id' => $id,
            'date' => $date
        ]);
    }
}else{
    $db->where('id', $id)->update('blogs', [
        'counter' => 1
    ]);
    $db->insert('counter', [
        'member_id' => isset($memberId) ? $memberId : null,
        'blog_id' => $id,
        'date' => $date
    ]);
}



$blog = $db->where('blogs.id', $id)
    ->join('categories', 'categories.id = blogs.blog_category')
    ->getOne('blogs', 'blogs.id, blogs.title, blogs.image, description , full_description, counter, categories.name, date , blog_category');

$relatedBlogs = $db->where('blog_category', $blog['blog_category'])
    ->where('blogs.id', $id, '!=')
    ->join('categories', 'categories.id = blogs.blog_category')
    ->orderBy('date', 'DESC')
    ->get('blogs', 3, 'blogs.id, title, description, categories.name, date, image');

$countComment = $db->where('blog_id', $id)
    ->where('comments.status', 2)
    ->getValue('comments', 'COUNT(id)');

$countLike = $db->where('blog_id', $id)
    ->getValue('wishlist', 'COUNT(id)');

$blogComments = $db->where('blog_id', $id)
    ->where('comments.status', 2)
    ->join('members', 'members.id = comments.member_id', 'LEFT')
    ->orderBy('setdate', 'DESC')
    ->get('comments', null, "CONCAT(comments.fname, ' ', comments.lname) as name, description, comments.setdate, members.image");


?>


<!DOCTYPE html>
<html class="no-js" lang="en">


<!-- Mirrored from webilux.net/demo-newsviral/single.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 28 Sep 2024 10:08:56 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>پست استاندارد - قالب HTML نیوز وایرال</title>
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
                <?php
                if (isset($_GET['ok']) and $_GET['ok'] != '')
                    showMessage($_GET['ok'])
                        ?>
                    <div class="entry-header entry-header-1 mb-30 mt-50">
                        <div class="entry-meta meta-0 font-small mb-30"><a href="category.html"><span
                                    class="post-cat bg-success color-white"><?= $blog['name'] ?></span></a></div>
                    <h1 class="post-title mb-30">
                        <?= $blog['title'] ?>
                    </h1>
                    <div class="entry-meta meta-1 font-x-small color-grey text-uppercase">
                        <span class="post-on"><?= $blog['date'] ?></span>
                        <p class="font-x-small mt-10">
                            <span class="hit-count"><i class="ti-comment ml-5"></i>نظرات <?= $countComment ?></span>
                            <?= isset($_SESSION['member']) ? "<a href='single.php?id=$id&like=1'>" : "" ?>
                            <span class="hit-count"><i
                                    class="ti-heart ml-5 <?= (isset($like) and $like == 1) ? "text-danger" : "" ?>"></i>لایک
                                <?= $countLike ?></span>
                            <?= isset($_SESSION['member']) ? "</a>" : "" ?>
                            <span class="hit-count"><i class="ti-eye ml-5"></i>بازدید <?= $blog['counter'] ?></span>
                        </p>
                    </div>
                </div>
                <!--end entry header-->
                <div class="row mb-50">
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
                        <div class="bt-1 border-color-1 mb-30"></div>
                        <figure class="single-thumnail mb-30">
                            <img src="<?= (isset($blog['image']) and $blog['image'] != '') ? '../../attachment/imgs/blogs/' . $blog['image'] : "../../admin-panel/assets/images/ads/default.png" ?>"
                                alt="">
                            <div class="credit mt-15 font-small color-grey">
                            </div>
                        </figure>
                        <div class="single-excerpt">
                            <p class="font-large"><?= $blog['description'] ?></p>
                        </div>
                        <div class="entry-main-content">
                            <h2><?= $blog['title'] ?></h2>
                            <hr class="wp-block-separator is-style-wide">
                            <p><?= $blog['full_description'] ?></p>
                        </div>
                        <div class="entry-bottom mt-50 mb-30">
                            <div class="font-weight-500 entry-meta meta-1 font-x-small color-grey">
                                <span class="hit-count"><i class="ti-comment"></i>نظرات <?= $countComment ?></span>
                                <?= isset($_SESSION['member']) ? "<a href='single.php?id=$id&like=1'>" : "" ?>
                                <span class="hit-count"><i
                                        class="ti-heart ml-5 <?= (isset($like) and $like == 1) ? "text-danger" : "" ?>"></i>لایک
                                    <?= $countLike ?></span>
                                <?= isset($_SESSION['member']) ? "</a>" : "" ?>
                                <span class="hit-count"><i class="ti-eye"></i>بازدید <?= $blog['counter'] ?></span>
                            </div>
                            <div class="overflow-hidden mt-30">
                                <div class="tags float-right text-muted mb-md-30">
                                    <span class="font-small ml-10"><i class="fa fa-tag ml-5"></i>برچسب : </span>
                                    <a href="category.html" rel="tag"><?= $blog['name'] ?></a>
                                </div>
                                <div class="single-social-share float-left">
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
                        <!--related posts-->
                        <div class="related-posts">
                            <h3 class="mb-30">پست های مرتبط</h3>
                            <div class="row">
                                <?php if(empty($relatedBlogs)){ ?>
                                    <div class="col-12 text-center">داده ایی برای نمایش وجود ندارد</div>
                                <?php }
                                foreach ($relatedBlogs as $relatedBlog) { ?>
                                    <article class="col-lg-4">
                                        <div class="background-white border-radius-10 p-10 mb-30">
                                            <div class="post-thumb d-flex mb-15 border-radius-15 img-hover-scale">
                                                <a href="single.php?id=<?= $relatedBlog['id'] ?>">
                                                    <img class="border-radius-15"
                                                        src="<?= (isset($relatedBlog['image']) and $relatedBlog['image'] != '') ? "../../attachment/imgs/blogs/" . $relatedBlog['image'] : "../../admin-panel/assets/images/ads/default.png" ?>"
                                                        alt="">
                                                </a>
                                            </div>
                                            <div class="pl-10 pr-10">
                                                <div class="entry-meta mb-15 mt-10">
                                                    <a class="entry-meta meta-2" href="category.html"><span
                                                            class="post-in text-primary font-x-small"><?= $relatedBlog['name'] ?></span></a>
                                                </div>
                                                <h5 class="post-title mb-15">
                                                    <span class="post-format-icon">
                                                        <ion-icon name="image-outline" role="img" class="md hydrated"
                                                            aria-label="image outline"></ion-icon>
                                                    </span>
                                                    <a
                                                        href="single.php?id=<?= $relatedBlog['id'] ?>"><?= $relatedBlog['description'] ?></a>
                                                </h5>
                                                <div
                                                    class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase mb-10">
                                                    <span class="post-by"><?= $relatedBlog['title'] ?></span>
                                                    <span class="post-on"><?= $relatedBlog['date'] ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                <?php } ?>
                            </div>
                        </div>
                        <!--Comments-->
                        <div class="comments-area">
                            <h3 class="mb-30"><?= $countComment ?> نظرات</h3>
                            <?php foreach ($blogComments as $blogComment) { ?>
                                <div class="comment-list">
                                    <div class="single-comment justify-content-between d-flex">
                                        <div class="user justify-content-between d-flex">
                                            <div class="thumb">
                                                <img src="<?= (isset($blogComment['image']) and $blogComment['image'] != '') ? "../../attachment/imgs/members/" . $blogComment['image'] : "../../admin-panel/assets/images/admin/default.png" ?>"
                                                    alt="">
                                            </div>
                                            <div class="desc">
                                                <p class="comment">
                                                    <?= $blogComment['description'] ?>
                                                </p>
                                                <div class="d-flex justify-content-between">
                                                    <div class="d-flex align-items-center">
                                                        <h5>
                                                            <?= $blogComment['name'] ?>
                                                        </h5>
                                                        <p class="date">
                                                            <?= jdate('Y/m/d H:i', strtotime($blogComment['setdate'])) ?>
                                                        </p>
                                                    </div>
                                                    <div class="reply-btn">
                                                        <a href="#" class="btn-reply text-uppercase">پاسخ</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <!--comment form-->
                        <div class="comment-form">
                            <h3 class="mb-30">ارسال نظرات</h3>
                            <form class="form-contact comment_form needs-validation" novalidate
                                action="single.php?id=<?= $id ?>" id="commentForm" method="post">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input class="form-control" name="fname" id="fname" type="text"
                                                placeholder="نام" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input class="form-control" name="lname" id="lname" type="lname"
                                                placeholder="نام خانوادگی" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input class="form-control" name="email" id="email" type="text"
                                                placeholder="ایمیل" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <textarea class="form-control w-100" name="description" id="description"
                                                cols="30" rows="9" placeholder="نظرات" required></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button name="btn_comment" type="submit" class="button button-contactForm">ارسال
                                        نظر</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!--End col-lg-8-->
                    <div class="col-lg-4 col-md-12 sidebar-right sticky-sidebar">
                        <div class="pl-lg-50">
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
                                                <div class="post-thumb d-flex ml-15 border-radius-5 img-hover-scale">
                                                    <a class="color-white" href="single.html">
                                                        <img src="../../attachment/imgs/thumbnail-4.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="post-content media-body">
                                                    <h6 class="post-title mb-10 text-limit-2-row"><a
                                                            href="single.html">لورم ایپسوم متن ساختگی با تولید سادگی
                                                            نامفهوم از صنعت چاپ</a></h6>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="mb-20">
                                            <div class="d-flex">
                                                <div class="post-thumb d-flex ml-15 border-radius-5 img-hover-scale">
                                                    <a class="color-white" href="single.html">
                                                        <img src="../../attachment/imgs/thumbnail-15.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="post-content media-body">
                                                    <h6 class="post-title mb-10 text-limit-2-row"><a
                                                            href="single.html">سه درصد گذشته، حال و آینده شناخت
                                                            فراوان</a></h6>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="mb-20">
                                            <div class="d-flex">
                                                <div class="post-thumb d-flex ml-15 border-radius-5 img-hover-scale">
                                                    <a class="color-white" href="single.html">
                                                        <img src="../../attachment/imgs/thumbnail-16.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="post-content media-body">
                                                    <h6 class="post-title mb-10 text-limit-2-row"><a
                                                            href="single.html">سطرآنچنان که لازم است و برای شرایط فعلی
                                                            تکنولوژی</a></h6>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="d-flex">
                                                <div class="post-thumb d-flex ml-15 border-radius-5 img-hover-scale">
                                                    <a class="color-white" href="single.html">
                                                        <img src="../../attachment/imgs/thumbnail-15.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="post-content media-body">
                                                    <h6 class="post-title mb-10 text-limit-2-row"><a
                                                            href="single.html">سه درصد گذشته، حال و آینده شناخت
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
                                    <p class="font-medium">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ</p>
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
                            <div class="sidebar-widget mb-50">
                                <div class="widget-header mb-30">
                                    <h5 class="widget-title">پست های <span>اخیر</span></h5>
                                </div>
                                <div class="post-aside-style-3">
                                    <article class="bg-white border-radius-15 mb-30 p-10 wow fadeIn  animated">
                                        <div class="post-thumb d-flex mb-15 border-radius-15 img-hover-scale">
                                            <a href="single.html">
                                                <video autoplay="" class="photo-item__video" loop="" muted=""
                                                    preload="none">
                                                    <source src="#" type="video/mp4">
                                                </video>
                                            </a>
                                        </div>
                                        <div class="pl-10 pr-10">
                                            <h5 class="post-title mb-15"><a href="single.html">لورم ایپسوم متن ساختگی با
                                                    تولید سادگی نامفهوم از صنعت چاپ</a></h5>
                                            <div
                                                class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase mb-10">
                                                <span class="post-in">در <a href="category.html">جهان</a></span>
                                                <span class="post-by">توسط <a href="author.html">الناز
                                                        روستایی</a></span>
                                                <span class="post-on">4 دقیقه پیش</span>
                                            </div>
                                        </div>
                                    </article>
                                    <article class="bg-white border-radius-15 mb-30 p-10 wow fadeIn  animated">
                                        <div class="post-thumb d-flex mb-15 border-radius-15 img-hover-scale">
                                            <a href="single.html">
                                                <img class="border-radius-15" src="../../attachment/imgs/news-22.jpg"
                                                    alt="">
                                            </a>
                                        </div>
                                        <div class="pl-10 pr-10">
                                            <h5 class="post-title mb-15"><a href="single.html">طراحان خلاقی و فرهنگ
                                                    پیشرو در زبان</a></h5>
                                            <div
                                                class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase mb-10">
                                                <span class="post-in">در <a href="category.html">سلامت</a></span>
                                                <span class="post-by">توسط <a href="author.html">سعید شمس</a></span>
                                                <span class="post-on">14 دقیقه پیش</span>
                                            </div>
                                        </div>
                                    </article>
                                    <article class="bg-white border-radius-15 mb-30 p-10 wow fadeIn  animated">
                                        <div class="post-thumb d-flex mb-15 border-radius-15 img-hover-scale">
                                            <a href="single.html">
                                                <img class="border-radius-15" src="../../attachment/imgs/news-20.jpg"
                                                    alt="">
                                            </a>
                                        </div>
                                        <div class="pl-10 pr-10">
                                            <h5 class="post-title mb-15"><a href="single.html">سطرآنچنان که لازم است و
                                                    برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف</a></h5>
                                            <div
                                                class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase mb-10">
                                                <span class="post-in">در <a href="category.html">کانادا</a></span>
                                                <span class="post-by">توسط <a href="author.html">بهمن راستی</a></span>
                                                <span class="post-on">16 دقیقه پیش</span>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End col-lg-4-->
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
                                                    <img src="../../attachment/imgs/thumbnail-12.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="post-content media-body">
                                                <h6 class="post-title mb-10 text-limit-2-row"><a href="single.html">لورم
                                                        ایپسوم متن ساختگی با تولید سادگی نامفهوم</a></h6>
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
                                            <div class="post-thumb d-flex ml-15 border-radius-5 img-hover-scale">
                                                <a class="color-white" href="single.html">
                                                    <img src="../../attachment/imgs/thumbnail-13.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="post-content media-body">
                                                <h6 class="post-title mb-10 text-limit-2-row"><a href="single.html">لورم
                                                        ایپسوم متن ساختگی با تولید سادگی نامفهوم</a></h6>
                                                <div
                                                    class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase">
                                                    <span class="post-by">توسط <a href="author.html">مسعود
                                                            راستی</a></span>
                                                    <span class="post-on">3 ساعت قبل</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="wow fadeIn animated">
                                        <div class="d-flex">
                                            <div class="post-thumb d-flex ml-15 border-radius-5 img-hover-scale">
                                                <a class="color-white" href="single.html">
                                                    <img src="../../attachment/imgs/thumbnail-15.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="post-content media-body">
                                                <h6 class="post-title mb-10 text-limit-2-row"><a href="single.html">لورم
                                                        ایپسوم متن ساختگی با تولید سادگی نامفهوم</a></h6>
                                                <div
                                                    class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase">
                                                    <span class="post-by">توسط <a href="author.html">الناز
                                                            روستایی</a></span>
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
                                                    <img src="../../attachment/imgs/thumbnail-4.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="post-content media-body">
                                                <h6 class="post-title mb-10 text-limit-2-row"><a href="single.html">لورم
                                                        ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت</a></h6>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="mb-20">
                                        <div class="d-flex">
                                            <div class="post-thumb d-flex ml-15 border-radius-5 img-hover-scale">
                                                <a class="color-white" href="single.html">
                                                    <img src="../../attachment/imgs/thumbnail-15.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="post-content media-body">
                                                <h6 class="post-title mb-10 text-limit-2-row"><a
                                                        href="single.html">طراحان خلاقی و فرهنگ پیشرو در زبان فارسی
                                                        ایجاد کرد</a></h6>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="mb-20">
                                        <div class="d-flex">
                                            <div class="post-thumb d-flex ml-15 border-radius-5 img-hover-scale">
                                                <a class="color-white" href="single.html">
                                                    <img src="../../attachment/imgs/thumbnail-16.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="post-content media-body">
                                                <h6 class="post-title mb-10 text-limit-2-row"><a href="single.html">لورم
                                                        ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت</a></h6>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="d-flex">
                                            <div class="post-thumb d-flex ml-15 border-radius-5 img-hover-scale">
                                                <a class="color-white" href="single.html">
                                                    <img src="../../attachment/imgs/thumbnail-15.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="post-content media-body">
                                                <h6 class="post-title mb-10 text-limit-2-row"><a
                                                        href="single.html">طراحان خلاقی و فرهنگ پیشرو در زبان فارسی
                                                        ایجاد کرد</a></h6>
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
                                    <li class="mb-30 wow fadeIn   animated"
                                        style="visibility: visible; animation-name: fadeIn;">
                                        <div class="d-flex">
                                            <div class="post-thumb d-flex ml-15 border-radius-5 img-hover-scale">
                                                <a class="color-white" href="single.html">
                                                    <img src="../../attachment/imgs/thumbnail-2.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="post-content media-body">
                                                <h6 class="post-title mb-10 text-limit-2-row"><a href="single.html">تایپ
                                                        به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای</a></h6>
                                                <div
                                                    class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase">
                                                    <span class="post-by">توسط <a href="author.html">رضا
                                                            کیمیا</a></span>
                                                    <span class="post-on">4 دقیقه پیش</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="mb-30 wow fadeIn   animated"
                                        style="visibility: visible; animation-name: fadeIn;">
                                        <div class="d-flex">
                                            <div class="post-thumb d-flex ml-15 border-radius-5 img-hover-scale">
                                                <a class="color-white" href="single.html">
                                                    <img src="../../attachment/imgs/thumbnail-3.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="post-content media-body">
                                                <h6 class="post-title mb-10 text-limit-2-row"><a href="single.html">تایپ
                                                        به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای</a></h6>
                                                <div
                                                    class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase">
                                                    <span class="post-by">توسط <a href="author.html">مسعود
                                                            راستی</a></span>
                                                    <span class="post-on">3 ساعت قبل</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="wow fadeIn animated"
                                        style="visibility: visible; animation-name: fadeIn;">
                                        <div class="d-flex">
                                            <div class="post-thumb d-flex ml-15 border-radius-5 img-hover-scale">
                                                <a class="color-white" href="single.html">
                                                    <img src="../../attachment/imgs/thumbnail-5.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="post-content media-body">
                                                <h6 class="post-title mb-10 text-limit-2-row"><a href="single.html">تایپ
                                                        به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای</a></h6>
                                                <div
                                                    class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase">
                                                    <span class="post-by">توسط <a href="author.html">الناز
                                                            روستایی</a></span>
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
                        <div
                            class="sidebar-widget p-20 border-radius-15 bg-white widget-latest-comments wow fadeIn  animated">
                            <div class="post-block-list post-module-6">
                                <div class="last-comment mb-20 d-flex wow fadeIn">
                                    <span class="item-count vertical-align">
                                        <a class="red-tooltip author-avatar" href="#" data-toggle="tooltip"
                                            data-placement="top" title="" data-original-title="Azumi - 985 posts"><img
                                                src="../../attachment/imgs/authors/author-14.png" alt=""></a>
                                    </span>
                                    <div class="alith_post_title_small">
                                        <p class="font-medium mb-10"><a href="single.html">لورم ایپسوم متن ساختگی با
                                                تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان.</a></p>
                                        <div
                                            class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase mb-10">
                                            <span class="post-by">توسط <a href="author.html">الناز روستایی</a></span>
                                            <span class="post-on">4 دقیقه پیش</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="last-comment d-flex wow fadeIn">
                                    <span class="item-count vertical-align">
                                        <a class="red-tooltip author-avatar" href="#" data-toggle="tooltip"
                                            data-placement="top" title="" data-original-title="Johny - 445 posts"><img
                                                src="../../attachment/imgs/authors/author-3.png" alt=""></a>
                                    </span>
                                    <div class="alith_post_title_small">
                                        <p class="font-medium mb-10"><a href="single.html">سه درصد گذشته، حال و آینده
                                                شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری
                                                را برای طراحان.</a></p>
                                        <div
                                            class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase mb-10">
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
            window.location = 'single.php?id=<?= $id ?>';
        });
    </script>
</body>


<!-- Mirrored from webilux.net/demo-newsviral/single.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 28 Sep 2024 10:08:57 GMT -->

</html>
<!--Post aside style 1-->
<div class="sidebar-widget mb-30">
    <div class="widget-header position-relative mb-30">
        <div class="row">
            <div class="col-7">
                <h4 class="widget-title mb-0">از دست <span>ندهید</span></h4>
            </div>
            <div class="col-5 text-left">
                <h6 class="font-medium pl-15">
                    <a class="text-muted font-small" href="<?= $SITE_PATH ?>/category/category-big.php">مشاهده
                        همه</a>
                </h6>
            </div>
        </div>
    </div>
    <div class="post-aside-style-1 border-radius-10 p-20 bg-white">
        <?php
        $tables = ['description', 'title', 'blog_category', 'setdate', 'date', 'counter'];
        $randomTable = rand(0, 5);
        $randomBlogs = $db->where('status', 1)
            ->orderBy($tables[$randomTable], 'DESC')
            ->get('blogs', 4, 'id, description, image');
        ?>
        <ul class="list-post">
            <?php foreach ($randomBlogs as $randomBlog) { ?>
                <li class="mb-20">
                    <div class="d-flex">
                        <div class="post-thumb d-flex ml-15 border-radius-5 img-hover-scale">
                            <a class="color-white"
                                href="<?= $SITE_PATH ?>/singe-page/single.php?id=<?= $randomBlog['id'] ?>&click=1">
                                <img src="<?= (isset($randomBlog['image']) and $randomBlog['image'] != '') ? "$URL_PATH/attachment/imgs/blogs/" . $randomBlog['image'] : "$URL_PATH/admin-panel/assets/images/ads/default.png" ?>"
                                    width="50px" height="50px" alt="">
                            </a>
                        </div>
                        <div class="post-content media-body">
                            <h6 class="post-title mb-10 text-limit-2-row"><a
                                    href="<?= $SITE_PATH ?>/singe-page/single.php?id=<?= $randomBlog['id'] ?>&click=1"><?= $randomBlog['description'] ?></a>
                            </h6>
                        </div>
                    </div>
                </li>
            <?php } ?>
        </ul>
    </div>
</div>
<!--Newsletter-->
<div class="sidebar-widget widget_newsletter border-radius-10 p-20 bg-white mb-30">
    <div class="widget-header widget-header-style-1 position-relative mb-15">
        <h5 class="widget-title">خبرنامه</h5>
    </div>
    <div class="newsletter">
        <p class="font-medium">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ
        </p>
        <form target="_blank" action="#" method="get" class="subscribe_form relative mail_part">
            <div class="form-newsletter-cover">
                <div class="form-newsletter position-relative">
                    <input type="email" name="EMAIL" placeholder="ایمیل خود را اینجا وارد کنید" required="">
                    <button type="submit">
                        <i class="ti ti-email"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<!--Post aside style 2-->
<div class="sidebar-widget">
    <div class="widget-header mb-30">
        <h5 class="widget-title">پرطرفدارترین ها</h5>
    </div>
    <div class="post-aside-style-2">
        <?php
        $popularBlogs = $db->orderBy('counter', 'DESC')
            ->join('categories', 'categories.id = blogs.blog_category', 'LEFT')
            ->get('blogs', 5, 'blogs.id, image, description, date, categories.name');

        ?>
        <ul class="list-post">
            <?php foreach ($popularBlogs as $popularBlog) { ?>
                <li class="mb-30 wow fadeIn animated">
                    <div class="d-flex">
                        <div class="post-thumb d-flex ml-15 border-radius-5 img-hover-scale">
                            <a class="color-white"
                                href="<?= $SITE_PATH ?>/singe-page/single.php?id=<?= $popularBlog['id'] ?>&click=1">
                                <img src="<?= (isset($popularBlog['image']) and $popularBlog['image'] != '') ? "$URL_PATH/attachment/imgs/blogs/" . $popularBlog['image'] : "$URL_PATH/admin-panel/assets/images/ads/default.png" ?>"
                                    alt="">
                            </a>
                        </div>
                        <div class="post-content media-body">
                            <h6 class="post-title mb-10 text-limit-2-row"><a
                                    href="<?= $SITE_PATH ?>/singe-page/single.php?id=<?= $popularBlog['id'] ?>&click=1"><?= $popularBlog['description'] ?></a>
                            </h6>
                            <div class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase">
                                <span class="post-by"><?= $popularBlog['name'] ?>
                                    <span class="post-on"><?= $popularBlog['date'] ?></span>
                            </div>
                        </div>
                    </div>
                </li>
            <?php } ?>
        </ul>
    </div>
</div>
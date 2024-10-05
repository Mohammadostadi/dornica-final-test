<div class="sidebar-widget mb-50">
    <div class="widget-header mb-30">
        <h5 class="widget-title">محبوب ترین</h5>
    </div>
    <div class="post-aside-style-3">
        <?php

        $mostLikedBlogs = $db->orderBy('post_liked', 'DESC')
            ->orderBy('date', 'DESC')
            ->join('categories', 'categories.id = blogs.blog_category', 'LEFT')
            ->get('blogs', 4, 'categories.name, blogs.id, description, image, date');
        foreach ($mostLikedBlogs as $mostLikedBlog) {
            ?>
            <article class="bg-white border-radius-15 mb-30 p-10 wow fadeIn animated">
                <div class="post-thumb d-flex mb-15 border-radius-15 img-hover-scale">
                    <a href="<?= $SITE_PATH ?>/singe-page/single.php?id=<?= $mostLikedBlog['id'] ?>">
                        <img class="border-radius-15"
                            src="<?= (isset($mostLikedBlog['image']) and $mostLikedBlog['image'] != '') ? "$URL_PATH/attachment/imgs/blogs/" . $mostLikedBlog['image'] : "$URL_PATH/admin-panel/assets/images/ads/default.png" ?>" width="338px"
                            height="153px" alt="">
                    </a>
                </div>
                <div class="pl-10 pr-10">
                    <h5 class="post-title mb-15"><a
                            href="<?= $SITE_PATH ?>/singe-page/single.php?id=<?= $mostLikedBlog['id'] ?>"><?= $mostLikedBlog['description'] ?></a>
                    </h5>
                    <div class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase mb-10">
                        <span class="post-in">در <a href="category.html"><?= $mostLikedBlog['name'] ?></a></span>
                        <span class="post-on"><?= $mostLikedBlog['date'] ?></span>
                    </div>
                </div>
            </article>
        <?php } ?>
    </div>
</div>
<div class="sidebar-widget p-20 border-radius-15 bg-white widget-latest-comments wow fadeIn animated my-3">
    <div class="widget-header mb-30">
        <h5 class="widget-title">آخرین <span>نظرات</span></h5>
    </div>
    <?php

    $lastComments = $db->orderBy('comments.setdate', 'DESC')
        ->join('members', 'members.id = comments.member_id', 'LEFT')
        ->get('comments', 3, 'blog_id, members.image, concat(comments.fname, \' \', comments.lname) as name, description, comments.setdate')

        ?>
    <div class="post-block-list post-module-6">
        <?php foreach ($lastComments as $lastComment) { ?>
            <div class="last-comment mb-20 d-flex wow fadeIn animated">
                <span class="item-count vertical-align">
                    <a class="red-tooltip author-avatar"
                        href="<?= $SITE_PATH ?>/singe-page/single.php?id=<?= $lastComment['blog_id'] ?>&click=1"
                        data-toggle="tooltip" data-placement="top" title=""
                        data-original-title="<?= $lastComment['name'] ?>"><img
                            src="<?= (isset($lastComment['image']) and $lastComment['image'] != '') ? "$URL_PATH/attachment/imgs/members/" . $lastComment['image'] : "$URL_PATH/admin-panel/assets/images/admin/default.png" ?>"
                            alt=""></a>
                </span>
                <div class="alith_post_title_small">
                    <p class="font-medium mb-10"><a
                            href="<?= $SITE_PATH ?>/singe-page/single.php?id=<?= $lastComment['blog_id'] ?>&click=1"><?= $lastComment['description'] ?></a>
                    </p>
                    <div class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase mb-10">
                        <span class="post-by">توسط <?= $lastComment['name'] ?></span>
                        <span dir="ltr" class="post-on"><?= jdate('Y/m/d H:i', strtotime($lastComment['setdate'])) ?></span>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
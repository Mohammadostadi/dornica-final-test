<header class="top-header">
    <nav class="navbar navbar-expand gap-3">
        <div class="mobile-toggle-icon fs-3 d-flex d-lg-none">
            <i class="bi bi-list"></i>
        </div>
        <form class="searchbar">
            <div class="position-absolute top-50 translate-middle-y search-icon ms-3"><i class="bi bi-search"></i></div>
            <input class="form-control" type="text" placeholder="برای جستجو اینجا تایپ کنید">
            <div class="position-absolute top-50 translate-middle-y search-close-icon"><i class="bi bi-x-lg"></i></div>
        </form>
        <div class="top-navbar-right ms-auto">
            <ul class="navbar-nav align-items-center gap-1">
                <li class="nav-item search-toggle-icon d-flex d-lg-none">
                    <a class="nav-link" href="javascript:;">
                        <div class="">
                            <i class="bi bi-search"></i>
                        </div>
                    </a>
                </li>
                <li class="nav-item dark-mode d-none d-sm-flex">
                    <a class="nav-link dark-mode-icon" href="javascript:;">
                        <div class="">
                            <i class="bi bi-moon-fill"></i>
                        </div>
                    </a>
                </li>
                <li class="nav-item dropdown dropdown-large">
                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">
                        <div class="messages">
                            <?php

                            $notification = $db->where('is_readed', 0)
                                ->getValue('comments', 'COUNT(id)');
                            ?>
                            <span class="notify-badge"><?= $notification ?></span>
                            <i class="bi bi-chat-left-text-fill"></i>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end p-0">
                        <div class="p-2 border-bottom m-2">
                            <h5 class="h5 mb-0">پیام ها</h5>
                        </div>
                        <div class="header-message-list p-2">
                            <?php
                            if ($notification == 0) { ?>
                                <h6 class="text-center">داده ایی برای نمایش وجود ندارد</h6>
                            <?php } else {
                                $db->pageLimit = 6;
                                $comments = $db->where('is_readed', 0)
                                    ->join('members', 'members.id = comments.member_id', 'LEFT')
                                    ->join('blogs', 'blogs.id = comments.blog_id', 'LEFT')
                                    ->orderBy('comments.setdate', 'DESC')
                                    ->paginate('comments', 1, "comments.id, blogs.title, CONCAT(comments.fname, ' ', comments.lname) AS name, members.image, comments.setdate, comments.status");
                                foreach ($comments as $comment) {
                                    ?>
                                    <a class="dropdown-item" href="../comments/comment_detail.php?id=<?= $comment['id'] ?>">
                                        <div class="d-flex align-items-center">
                                            <img src="../../<?= isset($comment['image']) ? "../attachment/imgs/members/" . $comment['image'] : "assets/images/admin/default.png" ?>"
                                                alt="" class="rounded-circle" width="50" height="50">
                                            <div class="ms-3 flex-grow-1 fw-bold">
                                                <h6 class="mb-0 dropdown-msg-user fw-bold">
                                                    <?= $comment['name'] ?><span class="msg-time float-end fw-bold">
                                                        <?= jdate('Y/m/d', strtotime($comment['setdate'])) ?>
                                                    </span>
                                                </h6>
                                                <small
                                                    class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center"><?= $comment['title'] ?></small>
                                            </div>
                                        </div>
                                    </a>
                                <?php }
                            } ?>
                        </div>
                        <div class="p-2">
                            <div>
                                <hr class="dropdown-divider">
                            </div>
                            <a class="dropdown-item <?= $notification == 0 ? "disabled" : "" ?>"
                                href="<?= $notification != 0 ? "admin-panel/comments/comments_list.php?comment=1" : "" ?>">
                                <div class="text-center">مشاهده همه پیام ها</div>
                            </a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="dropdown dropdown-user-setting">
            <a class="dropdown-toggle dropdown-toggle-nocaret" id="headerDropdown" href="#" data-bs-toggle="dropdown"
                aria-expanded="true">
                <?php  
                $adminShow = $db->where('id', $_SESSION['user'])
                ->getOne('admins', 'concat(fname, \' \', lname) as name, role')
                ?>
                <div class="user-setting d-flex align-items-center gap-3">
                    <img src="../../assets/images/admin/default.png" alt="" class="user-img">
                    <div class="d-none d-sm-block">
                        <p class="user-name mb-0"><?= $adminShow['name'] ?></p>
                        <small class="mb-0 dropdown-user-designation"><?= admin_role($adminShow['role']) ?></small>
                    </div>
                </div>
            </a>
            <ul class="dropdown-menu dropdown-menu-end myShow-menu " data-bs-popper="static">
                <hr class="dropdown-divider">
                <li>
                    <a class="dropdown-item" href="../../auth/logout.php" name="logout">
                        <div class="d-flex align-items-center">
                            <div class=""><i class="bi bi-lock-fill"></i></div>
                            <div class="ms-3"><span>خروج</span></div>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</header>
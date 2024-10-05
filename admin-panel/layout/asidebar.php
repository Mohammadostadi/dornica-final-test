<aside class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <a href="../../../index.php" class="d-flex">
            <img src="../../../attachment/imgs/logo.svg" class="w-75" alt="logo icon">
        </a>
        <div class="toggle-icon ms-auto"> <i class="bi bi-list"></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="../../index.php" class="">
                <div class="parent-icon"><i class="bi bi-house-fill"></i>
                </div>
                <div class="menu-title">داشبورد</div>
            </a>

        </li>
        <?php if(has_admin_access($_SESSION['user'], 'admins_list')){ ?>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-grid-fill"></i>
                </div>
                <div class="menu-title">مدیران</div>
            </a>
            <ul>
                <li> <a href="../admins/admins_list.php"><i class="bi bi-circle"></i>لیست مدیران</a>
                </li>

            </ul>
        </li>
        <?php } ?>
        <?php if(has_admin_access($_SESSION['user'], 'members_list')){ ?>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-people-fill"></i>
                </div>
                <div class="menu-title">کاربران</div>
            </a>
            <ul>
                <li> <a href="../members/members_list.php"><i class="bi bi-circle"></i>لیست کاربران</a>
                </li>

            </ul>
        </li>
        <?php } ?>
        <?php if(has_admin_access($_SESSION['user'], 'categories_list') or has_admin_access($_SESSION['user'], 'blogs_list')){ ?>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-newspaper"></i>
                </div>
                <div class="menu-title">اخبار</div>
            </a>
            <ul>
            <?php if(has_admin_access($_SESSION['user'], 'categories_list')){ ?>
                <li> <a href="../categories/categories_list.php"><i class="bi bi-circle"></i>دسته بندی اخبار</a>
                </li>
                <?php } ?>
                <?php if(has_admin_access($_SESSION['user'], 'blogs_list')){ ?>
                <li> <a href="../blogs/blogs_list.php"><i class="bi bi-circle"></i>لیست اخبار</a>
                </li>
                <?php } ?>
            </ul>
        </li>
        <?php } ?>
        <?php if(has_admin_access($_SESSION['user'], 'provinces_list') or has_admin_access($_SESSION['user'], 'cities_list')){ ?>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-building"></i>
                </div>
                <div class="menu-title">استان ها و شهر ها</div>
            </a>
            <ul>
            <?php if(has_admin_access($_SESSION['user'], 'provinces_list')){ ?>
                <li> <a href="../provinces/provinces_list.php"><i class="bi bi-circle"></i>لیست استان ها</a>
                </li>
                <?php } ?>
                <?php if(has_admin_access($_SESSION['user'], 'cities_list')){ ?>
                <li> <a href="../cities/cities_list.php"><i class="bi bi-circle"></i>لیست شهر ها</a>
                </li>
                <?php } ?>
            </ul>
        </li>
        <?php } ?>
        <?php if(has_admin_access($_SESSION['user'], 'logs_list')){ ?>
        <li>
            <a href="../logs/logs_list.php" class="">
                <div class="parent-icon"><i class="bi bi-lock"></i>
                </div>
                <div class="menu-title">لیست لاگ ها</div>
            </a>

        </li>
        <?php } ?>
        <?php if(has_admin_access($_SESSION['user'], 'comments_list')){ ?>
        <li>
            <a href="../comments/comments_list.php" class="">
                <div class="parent-icon"><i class="fadeIn animated bx bx-comment-detail"></i>
                </div>
                <div class="menu-title">لیست کامنت ها</div>
            </a>

        </li>
        <?php } ?>
        <?php if(has_admin_access($_SESSION['user'], 'contacts_list')){ ?>
        <li>
            <a href="../contacts/contacts_list.php" class="">
                <div class="parent-icon"><i class="fadeIn animated bx bx-comment-detail"></i>
                </div>
                <div class="menu-title">لیست پیام ها</div>
            </a>

        </li>
        <?php } ?>
    </ul>
    <!--end navigation-->
</aside>
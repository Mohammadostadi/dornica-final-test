<div class="col-xl-3 col-lg-4 m-b30">
    <div class="sticky-top">
        <div class="shop-account">
            <div class="account-detail text-center">
                <div class="my-image">
                    <a href="javascript:void(0);">
                        <img alt="" src="<?= (isset($member['image']) and $member['image'] != '')?"../../attachment/imgs/members/".$member['image']:"../../admin-panel/assets/images/admin/default.png" ?>">
                    </a>
                </div>
                <div class="account-title">
                    <div class="">
                        <h4 class="m-b5"><a
                                href="javascript:void(0);"><?= $member['fname'] . ' ' . $member['lname'] ?></a>
                        </h4>
                        <p class="m-b0"><a
                                href="javascript:void(0);"><?= $member['status'] == 1 ? "فعال" : "غیر فعال" ?></a>
                        </p>
                    </div>
                </div>
            </div>
            <ul class="account-list">
                <li>
                    <a href="../../index.php"><i class="fa fa-home" aria-hidden="true"></i>
                        <span>خانه</span></a>
                </li>
                <li>
                    <a href="my-profile.php" <?= (isset($path) and $path == 'my-profile.php')?"class='active'":"" ?>><i class="far fa-user" aria-hidden="true"></i>
                        <span>پروفایل</span></a>
                </li>
                <li>
                    <a href="wishlist.php" <?= (isset($path) and $path == 'wishlist.php')?"class='active'":"" ?>><i class="far fa-heart" aria-hidden="true"></i>
                        <span>علاقه مندی ها</span></a>
                </li>
                <li>
                    <a href="comments.php" <?= (isset($path) and $path == 'comments.php')?"class='active'":"" ?>><i class="far fa-bell" aria-hidden="true"></i>
                        <span>کامنت ها</span></a>
                </li>
                <li>
                    <a href="reset_password.php"><i class="fa fa-key" aria-hidden="true"></i>
                        <span>تغییر رمز عبور</span></a>
                </li>
                <li>
                    <a href="../auth/logout.php"><i class="fas fa-sign-out-alt" aria-hidden="true"></i>
                        <span>خروج</span></a>
                </li>
            </ul>
        </div>
    </div>
</div>
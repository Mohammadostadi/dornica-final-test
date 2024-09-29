<?php

require_once('../../app/connection/DB.php');
require_once('../../app/controller/city_show.php');
$member = $db->where('username', $_SESSION['member'])
	->getOne('members');
$provinceList = $db->where('status', 1)
->orderBy('name', 'ASC')
->get('provinces', null, 'id, name');

?>


<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from bookland.dexignzone.com/xhtml/my-profile.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Apr 2024 14:18:19 GMT -->

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="robots" content="" />
	<meta name="description" content="Bookland-Book Store Ecommerce Website" />
	<meta property="og:title" content="Bookland-Book Store Ecommerce Website" />
	<meta property="og:description" content="Bookland-Book Store Ecommerce Website" />
	<meta property="og:image" content="../../makaanlelo.com/tf_products_007/bookland/xhtml/social-image.php" />
	<meta name="format-detection" content="telephone=no">

	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />

	<!-- PAGE TITLE HERE -->
	<title>Bookland-Book Store Ecommerce Website</title>

	<!-- MOBILE SPECIFIC -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php require_once('../layout/css.php') ?>
	<!-- STYLESHEETS -->
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="icons/fontawesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css">

	<!-- GOOGLE FONTS-->
	<link rel="preconnect" href="https://fonts.googleapis.com/">
	<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
	<link
		href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&amp;family=Poppins:wght@100;200;300;400;500;600;700;800;900&amp;display=swap"
		rel="stylesheet">

</head>

<body id="bg" dir="rtl">
	<div class="page-wraper">
		<div id="loading-area">
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
		<!-- Content -->
		<div class="page-content bg-white">
			<!-- contact area -->
			<div class="content-block">
				<!-- Browse Jobs -->
				<section class="content-inner bg-white">
					<div class="container">
						<div class="row">
							<div class="col-xl-3 col-lg-4 m-b30">
								<div class="sticky-top">
									<div class="shop-account">
										<div class="account-detail text-center">
											<div class="my-image">
												<a href="javascript:void(0);">
													<img alt="" src="../../admin-panel/assets/images/admin/default.png">
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
												<a href="my-profile.php" class="active"><i class="far fa-user"
														aria-hidden="true"></i>
													<span>پروفایل</span></a>
											</li>
											<li>
												<a href="wishlist.php"><i class="far fa-heart" aria-hidden="true"></i>
													<span>علاقه مندی ها</span></a>
											</li>
											<li>
												<a href="services.php"><i class="far fa-bell" aria-hidden="true"></i>
													<span>خدمات</span></a>
											</li>
											<li>
												<a href="help-desk.php"><i class="far fa-id-card"
														aria-hidden="true"></i>
													<span>پشتیبانی</span></a>
											</li>
											<li>
												<a href="privacy-policy.php"><i class="fa fa-key"
														aria-hidden="true"></i>
													<span>امنیت</span></a>
											</li>
											<li>
												<a href="shop-login.php"><i class="fas fa-sign-out-alt"
														aria-hidden="true"></i>
													<span>خروج</span></a>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-xl-9 col-lg-8 m-b30">
								<div class="shop-bx shop-profile">
									<div class="shop-bx-title clearfix">
										<h5 class="text-uppercase">اطلاعات پایه</h5>
									</div>
									<form>
										<div class="row m-b30">
											<div class="col-lg-6 col-md-6">
												<div class="mb-3">
													<label for="formcontrolinput1" class="form-label">نام:</label>
													<input name="fname" type="text" class="form-control"
														id="formcontrolinput1" value="<?= $member['fname'] ?>"
														placeholder="نام">
												</div>
											</div>
											<div class="col-lg-6 col-md-6">
												<div class="mb-3">
													<label for="formcontrolinput2" class="form-label">نام
														خانوادگی:</label>
													<input name="lname" type="text" class="form-control"
														id="formcontrolinput2" value="<?= $member['lname'] ?>"
														placeholder="نام خانوادگی">
												</div>
											</div>
											<div class="col-lg-6 col-md-6">
												<div class="mb-3">
													<label for="formcontrolinput3" class="form-label">کدملی:</label>
													<input name="ncode" dir="ltr" type="text" class="form-control"
														id="formcontrolinput3" value="<?= $member['ncode'] ?>"
														placeholder="کدملی">
												</div>
											</div>
											<div class="col-lg-6 col-md-6">
												<div class="mb-3">
													<label for="formcontrolinput4" class="form-label">نام
														کاربری:</label>
													<input name="username" dir="ltr" type="text" class="form-control"
														id="formcontrolinput4" value="<?= $member['username'] ?>"
														placeholder="نام کاربری">
												</div>
											</div>
											<div class="col-lg-6 col-md-6">
												<div class="mb-3">
													<label for="formcontrolinput4" class="form-label">جنسیت:</label>
													<label for="male">مرد</label>
													<input value="0" id="male" type="radio" name="gender" <?= $member['gender'] == 0?"checked":"" ?> >
													<label for="female">زن</label>
													<input id="female" name="gender" type="radio" <?= $member['gender'] == 1?"checked":"" ?> >
												</div>
											</div>
											<div class="col-lg-6 col-md-6 <?= $member['gender'] == 1?"d-none":"" ?>" id="military">
												<div class="mb-3">
													<label for="formcontrolinput4" class="form-label">نظام وظیفه:</label>
													<select class="form-select" name="military_service" id="military_service">
														<option <?= $member['military_service'] == 0?"SELECTED":"" ?> value="0">پایان خدمت</option>
														<option <?= $member['military_service'] == 1?"SELECTED":"" ?> value="1">در حال خدمت</option>
														<option <?= $member['military_service'] == 2?"SELECTED":"" ?> value="2">معاف</option>
													</select>
												</div>
											</div>
										</div>
										<div class="shop-bx-title clearfix">
											<h5 class="text-uppercase">اطلاعات تماس</h5>
										</div>
										<div class="row">
											<div class="col-lg-6 col-md-6">
												<div class="mb-3">
													<label for="formcontrolinput5" class="form-label">شماره
														تماس:</label>
													<input name="phone" value="<?= $member['phone'] ?>" dir="ltr" type="text" class="form-control" id="formcontrolinput5"
														placeholder="+98">
												</div>
											</div>
											<div class="col-lg-6 col-md-6">
												<div class="mb-3">
													<label for="formcontrolinput6" class="form-label">ایمیل:</label>
													<input name="email" value="<?= $member['email'] ?>" dir="ltr" type="text" class="form-control" id="formcontrolinput6"
														placeholder="info@example.com">
												</div>
											</div>
											<div class="col-lg-6 col-md-6">
												<div class="mb-3">
													<label for="formcontrolinput7" class="form-label">استان:</label>
													<select name="province" class="form-select" id="province">
														<option value="">استان را انتخاب کنید</option>
														<?php foreach($provinceList as $province){ ?>
															<option <?= (!is_null($member['province_id']) and $member['province_id'] == $province['id'])?"SELECTED":"" ?> value="<?= $province['id'] ?>"><?= $province['name'] ?></option>
														<?php } ?>
													</select>
												</div>
											</div>
											<div class="col-lg-6 col-md-6">
												<div class="mb-3">
													<label for="formcontrolinput9" class="form-label">شهر:</label>
													<select name="city" class="form-select" id="city">
														<option value="">ابتدا استان را انتخاب کنید</option>
													</select>
												</div>
											</div>
										</div>
										<button class="btn btn-primary btnhover">ذخیره تنظیمات</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</section>
				<!-- Browse Jobs END -->
			</div>
		</div>
		<!-- Content END-->

		<!-- Footer -->
		<?php
		require_once('layout/footer.php');
		?>
		<!-- Footer End -->

		<button class="scroltop" type="button"><i class="fas fa-arrow-up"></i></button>
	</div>

	<!-- JAVASCRIPT FILES ========================================= -->
	<script src="js/jquery.min.js"></script><!-- JQUERY MIN JS -->
	<script src="vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script><!-- BOOTSTRAP MIN JS -->
	<script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script><!-- BOOTSTRAP SELECT MIN JS -->
	<script src="js/custom.js"></script><!-- CUSTOM JS -->

	<script>
		$('#male').click(function(){
			$('#military').removeClass('d-none');
		});
		$('#female').click(function(){
			$('#military').addClass('d-none');
		});

	</script>
	<script>
        $("#province").change(function () {
            const id = $(this).val();
            console.log(cities(id));
            cities(id);
            });
            const current_province = "<?= isset($member['province_id'])?$member['province_id']:""?>";
                const current_city = "<?= isset($member['city_id'])?$member['city_id']:""?>";
            if (current_city != "" && current_province != "") {
            cities(current_province, current_city);
            }
            if (current_city == "" && current_province != "") {
            cities(current_province);
            }

            function cities(province, city = null) {
            $.ajax({
                url: "my-profile.php",
                type: "POST",
                data: {
                province_id: province,
                city_id: city,
                },
                success: function (msg) {
                $("#city").html(msg);
                },
            });
            }
    </script>

</body>

<!-- Mirrored from bookland.dexignzone.com/xhtml/my-profile.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Apr 2024 14:18:19 GMT -->

</html>
<?php

require_once('../../app/connection/DB.php');
require_once('../../app/controller/function.php');
require_once('../../app/controller/city_show.php');
require_once('../../app/helper/view.php');

$member = $db->where('username', $_SESSION['member'])
->getOne('members');

$path = basename($_SERVER['PHP_SELF']);
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
							<?php require_once('layout/sidebar.php') ?>
							<div class="col-xl-9 col-lg-8 m-b30">
								<div class="shop-bx shop-profile">
									<div class="shop-bx-title clearfix">
										<h5 class="text-uppercase">تغییر رمز عبور</h5>
									</div>
									<form>
										<div class="row m-b30">
											<div class="col-lg-6 col-md-6">
												<div class="mb-3">
													<label for="formcontrolinput1" class="form-label">رمز عبور جدید:</label>
													<input name="fname" type="text" class="form-control"
														id="formcontrolinput1" value=""
														placeholder="رمز عبور جدید">
												</div>
											</div>
											<div class="col-lg-6 col-md-6">
												<div class="mb-3">
													<label for="formcontrolinput2" class="form-label">تایید رمز عبور:</label>
													<input name="lname" type="text" class="form-control"
														id="formcontrolinput2" value=""
														placeholder="تایید رمز عبور">
												</div>
											</div>
										</div>
										<button class="btn btn-primary btnhover">تغییر رمز</button>
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

		<button class="scroltop" type="button"><i class="fas fa-arrow-up"></i></button>
	</div>

	<!-- JAVASCRIPT FILES ========================================= -->
	<script src="js/jquery.min.js"></script><!-- JQUERY MIN JS -->
	<script src="vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script><!-- BOOTSTRAP MIN JS -->
	<script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script><!-- BOOTSTRAP SELECT MIN JS -->
	<script src="js/custom.js"></script><!-- CUSTOM JS -->

	
</body>

<!-- Mirrored from bookland.dexignzone.com/xhtml/my-profile.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Apr 2024 14:18:19 GMT -->

</html>
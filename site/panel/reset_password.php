<?php

require_once('../../app/connection/DB.php');
require_once('../../app/controller/function.php');
require_once('../../app/controller/city_show.php');
require_once('../../app/helper/view.php');
$SITE_PATH = '..';
$URL_PATH = '../..';
$member = $db->where('username', $_SESSION['member'])
	->getOne('members');

$errors = [];

if(isset($_POST['_reset_password'])){
	$password = checkDataSecurity($_POST['password']);
	$confirmPassword = checkDataSecurity($_POST['confirmPassword']);

	checkDataEmpty($password, 'password', 'رمزعبور شما نمیتواند خالی باشد.');
	checkDataEmpty($confirmPassword, 'confirmPassword', 'تایید رمزعبور شما نمیتواند خالی باشد.');


	if($confirmPassword != $password)
		setErrorMessage('confirmPassword', 'رمزعبور شما با تایید رمزعبور مطابقت ندارند.');

	if(count($errors) == 0){
		$db->where('username', $_SESSION['member'])
		->update('members', [
			'password'=>password_hash($password, PASSWORD_DEFAULT)
		]);
		header('Location:my-profile.php?ok=7');
	}
}



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
	<?php require_once('assets/layout/css.php') ?>

</head>

<body id="bg" dir="rtl">
	<div class="page-wraper">
	<?php require_once('assets/layout/loader.php') ?>
		<!-- Content -->
		<div class="page-content bg-white">
			<!-- contact area -->
			<div class="content-block">
				<!-- Browse Jobs -->
				<section class="content-inner bg-white">
					<div class="container">
						<div class="row">
							<?php require_once('assets/layout/sidebar.php') ?>
							<div class="col-xl-9 col-lg-8 m-b30">
								<div class="shop-bx shop-profile">
									<div class="shop-bx-title clearfix">
										<h5 class="text-uppercase">تغییر رمز عبور</h5>
									</div>
									<form action="" method="post" class="needs-validation" novalidate>
										<div class="row m-b30">
											<div class="col-lg-6 col-md-6">
												<div class="mb-3">
													<label for="password" class="form-label">رمز عبور
														جدید:</label>
													<input name="password" type="text" class="form-control"
														id="password" value="" placeholder="رمز عبور جدید"
														required>
													<div class="invalid-feedback">
														فیلد رمزعبور نباید خالی باشد
													</div>
												</div>
											</div>
											<div class="col-lg-6 col-md-6">
												<div class="mb-3">
													<label for="confirmPassword" class="form-label">تایید رمز
														عبور:</label>
													<input name="confirmPassword" type="text" class="form-control"
														id="confirmPassword" value="" placeholder="تایید رمز عبور"
														required>
														<div class="invalid-feedback">
															فیلد تایید رمزعبور نباید خالی باشد
														</div>
												</div>
											</div>
										</div>
										<button class="btn btn-primary btnhover" name="_reset_password">تغییر
											رمز</button>
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

	<?php require_once('assets/layout/js.php') ?>

	<script>
		(() => {
			"use strict";
			const forms = document.querySelectorAll(".needs-validation");
			Array.from(forms).forEach((form) => {
				form.addEventListener(
					"submit",
					(event) => {
						if (!form.checkValidity()) {
							event.preventDefault();
							event.stopPropagation();
						}
						form.classList.add("was-validated");
					},
					false
				);
			});
		})();
	</script>
</body>

<!-- Mirrored from bookland.dexignzone.com/xhtml/my-profile.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Apr 2024 14:18:19 GMT -->

</html>
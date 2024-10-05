<?php

require_once('../../app/connection/DB.php');
require_once('../../app/controller/function.php');
require_once('../../app/helper/jdf.php');
require_once('../../app/controller/city_show.php');

$SITE_PATH = '..';
$URL_PATH = '../..';
$errors = [];



if (isset($_POST['_update'])) {
	$fname = checkDataSecurity($_POST['fname']);
	$lname = checkDataSecurity($_POST['lname']);
	$ncode = checkDataSecurity($_POST['ncode']);
	$phone = checkDataSecurity($_POST['phone']);
	$gender = checkDataSecurity($_POST['gender']);
	$email = checkDataSecurity($_POST['email']);
	$username = checkDataSecurity($_POST['username']);
	$lastImage = $db->where('username', $_SESSION['member'])
		->getValue('members', 'image');

	checkDataEmpty($fname, 'fname', 'نام شما نمیتواند خالی باشد.');
	checkDataEmpty($lname, 'lname', 'نام خانوادگی شما نمیتواند خالی باشد.');
	checkDataEmpty($ncode, 'ncode', 'کدملی شما نمیتواند خالی باشد.');
	checkDataEmpty($phone, 'phone', 'شماره تماس شما نمیتواند خالی باشد.');
	checkDataEmpty($username, 'username', 'نام کاربری شما نمیتواند خالی باشد.');
	checkDataEmpty($email, 'email', 'ایمیل شما نمیتواند خالی باشد.');
	checkDataEmpty($gender, 'gender', 'جنسیت شما نمیتواند خالی باشد.');
	checkUniqData($username, 'username', 'members', 'نام کاربری قبلا وارد شده است.', true);
	checkUniqData($phone, 'phone', 'members', ' شماره تماس قبلا وارد شده است.', true);
	checkUniqData($ncode, 'ncode', 'members', ' کدملی قبلا وارد شده است.', true);
	checkUniqData($email, 'email', 'members', ' ایمیل قبلا وارد شده است.', true);
	if (strlen($ncode) != 10)
		setErrorMessage('ncode', 'کدملی شما نا معتبر میباشد.');

	if ($gender == 0) {
		$military_service = checkDataSecurity($_POST['military_service']);
		checkDataEmpty($military_service, 'military_service', 'نظام وظیفه نمیتواند خالی باشد');
	}


	if (!filter_var($email, FILTER_VALIDATE_EMAIL))
		setErrorMessage('email', 'فرمت ایمیل شما صحیح نمیباشد .');
	if (!preg_match("/^[0-9]*$/", $phone))
		setErrorMessage('phone', 'فقط عدد میتوانید وارد کنید.');

	if (isset($_FILES['image']) and !empty($_FILES['image']['name'])) {
		$dir = '../../attachment/imgs/members/';
		$image = $_FILES['image']['tmp_name'];
		$image_name = rand() . $_FILES['image']['name'];
		$source_properties = getimagesize($image);
		$image_type = $source_properties['mime'];
		checkImage($_FILES['image']);
	}


	if (count($errors) == 0) {
		if (isset($image_name)) {
			$target_file = $dir . $image_name;
			if (!is_null($lastImage) and file_exists($dir . $lastImage))
				unlink($dir . $lastImage);
			if ($image_type == 'image/jpeg') {
				$image_resource_id = imagecreatefromjpeg($image);
				$target_layer = fn_resize($image_resource_id, $source_properties[0], $source_properties[1]);
				imagejpeg($target_layer, $image_name);
			} elseif ($image_type == 'image/gif') {
				$image_resource_id = imagecreatefromgif($image);
				$target_layer = fn_resize($image_resource_id, $source_properties[0], $source_properties[1]);
				imagegif($target_layer, $image_name);
			} elseif ($image_type == 'image/png') {
				$image_resource_id = imagecreatefrompng($image);
				$target_layer = fn_resize($image_resource_id, $source_properties[0], $source_properties[1]);
				imagepng($target_layer, $image_name);
			}
			rename($image_name, $target_file);
		}
		$db->where('username', $_SESSION['member'])
			->update('members', [
				'fname' => $fname,
				'lname' => $lname,
				'ncode' => $ncode,
				'username' => $username,
				'email' => $email,
				'phone' => $phone,
				'gender' => $gender,
				'province_id' => isset($_POST['province']) ? checkDataSecurity($_POST['province']) : NULL,
				'city_id' => isset($_POST['city']) ? checkDataSecurity($_POST['city']) : NULL,
				'image' => isset($image_name) ? checkDataSecurity($image_name) : $lastImage,
				'military_service' => isset($military_service) ? $military_service : NULL,
				'status' => 1,
				'setdate' => persian_number(jdate('Y/m/d H:i:s', strtotime($date))),
			]);
		$_SESSION['member'] = $username;
	}
}


$member = $db->where('username', $_SESSION['member'])
	->getOne('members');
require_once('../../app/helper/view.php');

$provinceList = $db->where('status', 1)
	->orderBy('name', 'ASC')
	->get('provinces', null, 'id, name');
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
								<?php
								if (isset($_GET['ok']) and $_GET['ok'] != '')
									showMessage($_GET['ok'])
										?>
									<div class="shop-bx shop-profile">
										<div class="shop-bx-title clearfix">
											<h5 class="text-uppercase">اطلاعات پایه</h5>
										</div>
										<form action="" method="post" enctype="multipart/form-data">
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
													<label for="formcontrolinput4" class="form-label">تصویر:</label>
													<input name="image" dir="ltr" type="file" class="form-control"
														id="formcontrolinput4" placeholder="تصویر">
												</div>
											</div>
											<div class="col-lg-12 col-md-12">
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
													<input value="0" id="male" type="radio" name="gender"
														<?= $member['gender'] == 0 ? "checked" : "" ?>>
													<label for="female">زن</label>
													<input value="1" id="female" name="gender" type="radio"
														<?= $member['gender'] == 1 ? "checked" : "" ?>>
												</div>
											</div>
											<div class="col-lg-6 col-md-6 <?= $member['gender'] == 1 ? "d-none" : "" ?>"
												id="military">
												<div class="mb-3">
													<label for="formcontrolinput4" class="form-label">نظام
														وظیفه:</label>
													<select class="form-select" name="military_service"
														id="military_service">
														<option <?= $member['military_service'] == 0 ? "SELECTED" : "" ?>
															value="0">پایان خدمت</option>
														<option <?= $member['military_service'] == 1 ? "SELECTED" : "" ?>
															value="1">در حال خدمت</option>
														<option <?= $member['military_service'] == 2 ? "SELECTED" : "" ?>
															value="2">معاف</option>
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
													<input name="phone" value="<?= $member['phone'] ?>" dir="ltr"
														type="text" class="form-control" id="formcontrolinput5"
														placeholder="+98">
												</div>
											</div>
											<div class="col-lg-6 col-md-6">
												<div class="mb-3">
													<label for="formcontrolinput6" class="form-label">ایمیل:</label>
													<input name="email" value="<?= $member['email'] ?>" dir="ltr"
														type="text" class="form-control" id="formcontrolinput6"
														placeholder="info@example.com">
												</div>
											</div>
											<div class="col-lg-6 col-md-6">
												<div class="mb-3">
													<label for="formcontrolinput7" class="form-label">استان:</label>
													<select name="province" class="form-select" id="province">
														<option value="">استان را انتخاب کنید</option>
														<?php foreach ($provinceList as $province) { ?>
															<option <?= (!is_null($member['province_id']) and $member['province_id'] == $province['id']) ? "SELECTED" : "" ?>
																value="<?= $province['id'] ?>"><?= $province['name'] ?>
															</option>
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
										<button class="btn btn-primary btnhover" name="_update">ذخیره تنظیمات</button>
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
		$('#male').click(function () {
			$('#military').removeClass('d-none');
		});
		$('#female').click(function () {
			$('#military').addClass('d-none');
		});

	</script>
	<script>
		$("#province").change(function () {
			const id = $(this).val();
			console.log(cities(id));
			cities(id);
		});
		const current_province = "<?= isset($member['province_id']) ? $member['province_id'] : "" ?>";
		const current_city = "<?= isset($member['city_id']) ? $member['city_id'] : "" ?>";
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
	<script>
        $('.btn-close').click(function () {
            window.location = 'my-profile.php';
        });
    </script>

</body>

<!-- Mirrored from bookland.dexignzone.com/xhtml/my-profile.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Apr 2024 14:18:19 GMT -->

</html>
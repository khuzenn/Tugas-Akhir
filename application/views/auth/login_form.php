<?php
$login = array(
	'name' => 'login',
	'id' => 'user',
	'value' => set_value('login'),
	'placeholder' => 'Username',
	'class' => 'form-control',
	'autocomplete' => 'off'
);
if ($login_by_username and $login_by_email) {
	$login_label = 'Email or username';
} else if ($login_by_username) {
	$login_label = 'Login';
} else {
	$login_label = 'Email';
}
$password = array(
	'name' => 'password',
	'id' => 'pass',
	'data-type' => 'password',
	'value' => set_value('password'),
	'class' => 'form-control',
	'placeholder' => 'Katasandi',
	'autocomplete' => 'off'
);
$remember = array(
	'name' => 'remember',
	'id' => 'monthly',
	'class' => 'form-check-input',
	'value' => 1,
	'checked' => set_value('remember'),
	'autocomplete' => 'off',
	'style' => 'display: block !important;'
);
?>
<!DOCTYPE html> 
<html lang="en">

<head>
	<title>Web Monitoring Diskominfo Jawa Barat</title>

	<meta name="description" content="Ceres admin dashboard live demo. Check out all the features of the admin panel. A large number of settings, additional services and widgets." />
	<meta name="keywords" content="Ceres theme, bootstrap, bootstrap 5, admin themes, free admin themes, bootstrap admin, bootstrap dashboard" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta charset="utf-8" />
	<meta property="og:locale" content="en_US" />
	<meta property="og:type" content="article" />
	<meta property="og:title" content="Ceres HTML Free - Bootstrap 5 HTML Multipurpose Admin Dashboard Theme" />
	<meta property="og:url" content="https://keenthemes.com/products/ceres-html-pro" />
	<meta property="og:site_name" content="Keenthemes | Ceres HTML Free" />
	<link rel="stylesheet" href="<?php echo base_url() ?>assets-landing/css/templatemo-digital-trend.css">
	<link rel="canonical" href="Https://preview.keenthemes.com/ceres-html-free" />
	<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/diskominfo-jabar.png" />
	<!--begin::Fonts-->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
	<!--end::Fonts-->
	<!--begin::Page Vendor Stylesheets(used by this page)-->
	<link href="<?php echo base_url(); ?>assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
	<!--end::Page Vendor Stylesheets-->
	<!--begin::Global Stylesheets Bundle(used by all pages)-->
	<link href="<?php echo base_url(); ?>assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
	<!--end::Global Stylesheets Bundle-->

	<!--end::Main-->
	<script>
		var hostUrl = "<?php echo base_url(); ?>assets/";
	</script>
	<!--begin::Javascript-->
	<!--begin::Global Javascript Bundle(used by all pages)-->
	<script src="<?php echo base_url(); ?>assets/plugins/global/plugins.bundle.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/scripts.bundle.js"></script>
	<!--end::Global Javascript Bundle-->
	<!--begin::Page Vendors Javascript(used by this page)-->
	<script src="<?php echo base_url(); ?>assets/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
	<!--end::Page Vendors Javascript-->
	<!--begin::Page Custom Javascript(used by this page)-->
	<script src="<?php echo base_url(); ?>assets/js/custom/widgets.js"></script>
	<!--end::Page Custom Javascript-->
	<!--end::Javascript-->

</head>
 

<body id="kt_body" class="page-auth">
	<!--begin::Main-->
	<div class="d-flex flex-column flex-root">
		<!--begin::Authentication - Sign-in -->
		<div class="hero hero-bg  d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-attachment-fixed" >
			<!--begin::Content-->
			<div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
				<!--begin::Logo-->
				<a href="/ceres-html-pro/?page=index" class="mb-12">
					<img alt="Logo" src="<?php echo base_url() ?>assets-landing/images/diskominfo-jabar.png" class="h-60px" />
				</a>
				<!--end::Logo-->
				<!--begin::Wrapper-->
				<div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
					<!--begin::Form-->
					<?php echo form_open($this->uri->uri_string(), array('class' => 'form w-100', 'novalidate' => 'novalidate', 'id' => 'kt_sign_in_form')); ?>
					<!--begin::Heading-->
					<div class="text-center mb-3">
						<!--begin::Title-->
						<h1 class="text-dark mb-3">Website Monitoring Diskominfo Jawa Barat</h1>
						<!--end::Title-->
						<!--begin::Link-->
						<!--<div class="text-gray-400 fw-bold fs-4">Belum Punya Akun?-->
						<!----><?php //if ($this->config->item('allow_registration', 'tank_auth')) echo anchor('/Auth/register/', 'Buat Akun', array('class' => 'link-primary fw-bolder')); ?>
						<!--</div>-->
						<!--end::Link-->
					</div>
					<!--begin::Heading-->
					<div class="fv-row mb-3">
						<!--begin::Label-->
						<label class="form-label fs-6 fw-bolder text-dark">Username</label>
						<!--end::Label-->
						<?php echo form_input($login, array('class' => 'form-control form-control-lg form-control-solid', 'autocomplete' => 'off')); ?>
						<span style="color:red;">
							<?php echo form_error($login['name']); ?>
							<?php echo isset($errors[$login['name']]) ? $errors[$login['name']] : ''; ?>
						</span>
						<span class="form-bar"></span>
					</div>
					<div class="fv-row mb-5">
						<!--begin::Wrapper-->
						<div class="d-flex flex-stack mb-2">
							<!--begin::Label-->
							<label class="form-label fw-bolder text-dark fs-6 mb-0">Katasandi</label>
							<!--end::Label-->
							<!--begin::Link-->
							<!----><?php //echo anchor('/Auth/forgot_password/', 'Lupa Kata sandi ?', array('class' => 'link-primary fs-6 fw-bolder')); ?>
							<!--end::Link-->
						</div>
						<!--end::Wrapper-->
						<?php echo form_password($password, array('class' => 'form-control form-control-lg form-control-solid', 'autocomplete' => 'off')); ?>
						<span style="color:red;">
							<?php echo form_error($password['name']); ?>
							<?php echo isset($errors[$password['name']]) ? $errors[$password['name']] : ''; ?>
						</span>
						<span class="form-bar"></span>
					</div>
					<div class="fv-row mb-8">
						<div class="form-check">
							<?php echo form_checkbox($remember, array('class' => 'form-check-input', 'id' => 'flexCheckDefault')); ?>
							<!-- <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"> -->
							<label class="form-check-label" for="flexCheckDefault">
								Ingat Saya
							</label>
						</div>
						<!-- <div class="checkbox-fade fade-in-primary d-">
								<label>
									<?php echo form_checkbox($remember); ?>
									<span class="text-inverse">Ingat Saya</span>
								</label>
							</div> -->
						<!-- <div class="forgot-phone text-right f-right">
									<?php echo anchor('/auth/forgot_password/', 'Lupa Katasandi?', array('class' => 'text-right f-w-600')); ?>
								</div> -->
					</div>
					<!-- <div class="col-lg-5 mx-auto col-7">
						<button type="submit" class="form-control" id="submit-button" name="submit">Masuk</button>
					</div> -->
					<!--begin::Actions-->
					<div class="text-center">
						<!--begin::Submit button-->
						<button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
							<span class="indicator-label">Masuk</span>
							<span class="indicator-progress">Please wait...
								<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
						</button>
						<!--end::Submit button-->
					</div>
					<!--end::Actions-->
					<?php echo form_close(); ?>
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Content-->
		</div>
		<!--end::Authentication - Sign-in-->
	</div>
</body>

</html>

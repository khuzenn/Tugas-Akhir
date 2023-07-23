<?php
$nama = array(
		'name' => 'nama',
		'id' => 'nama',
		'class' => 'form-control',
		'value' => $data_nama,
		'autocomplete' => 'off'
);
$detail = array(
		'name' => 'detail',
		'id' => 'detail',
		'class' => 'form-control',
		'value' => $data_detail,
		'autocomplete' => 'off'
);
$kota = array(
		'name' => 'kota',
		'id' => 'kota',
		'class' => 'form-control',
		'value' => $data_kota,
		'autocomplete' => 'off'
);
$alamat = array(
    'name' => 'alamat',
    'id' => 'alamat',
    'class' => 'form-control',
    'value' => $data_alamat,
    'autocomplete' => 'off'
);
$telpon = array(
    'name' => 'telpon',
    'id' => 'telpon',
    'class' => 'form-control',
    'value' => $data_telpon,
    'autocomplete' => 'off'
);
$email = array(
    'name' => 'email',
    'id' => 'email',
    'class' => 'form-control',
    'value' => $data_email,
    'autocomplete' => 'off'
);
$logo = array(
		'class' => 'form-control',
		'name' => 'logo',
		'id' => 'logo',
		'type' => 'file',
		'value' => set_value('logo'),
		'autocomplete' => 'off'
);
?>

<div class="content flex-row-fluid" id="kt_content">
	<!--begin::Row-->
	<div class="row gy-5 g-xl-8">
		<!-- left column -->
		<div class="col-md-4">
			<!-- Profile Image -->
			<div class="card card-primary card-outline">
				<div class="card-body box-profile">
					<div class="text-center mb-3">
						<!--<img class="profile-user-img img-fluid img-circle" src="--><?php //echo base_url('/assets/adminLTE3/foto-profil/' . $data_foto) ?><!--">-->
						<img class="img-fluid rounded w-75" src="<?php echo ($data_logo != 'no_image.jpg') ? base_url('/assets/logo/') . $data_logo : base_url('/assets/media/avatars/blank.png') ; ?>">
					</div>

					<h3 class="profile-username text-center"><?php if (isset($data_nama)) {
							echo $data_nama;
						} ?></h3>
					<ul class="list-group list-group-unbordered mb-3">
						<li class="list-group-item">
							<b>Detail :</b> <a class="float-right"><?php echo $data_detail; ?></a>
						</li>
						<li class="list-group-item">
							<b>Kota :</b> <a class="float-right"><?php echo $data_kota; ?></a>
						</li>
						<li class="list-group-item">
							<b>Alamat :</b> <a class="float-right"><?php echo $data_alamat; ?></a>
						</li>
						<li class="list-group-item">
							<b>Telpon :</b> <a class="float-right"><?php echo $data_telpon; ?></a>
						</li>
						<li class="list-group-item">
							<b>Email :</b> <a class="float-right"><?php echo $data_email; ?></a>
						</li>
					</ul>
				</div>
				<!-- /.card-body -->
			</div>
			<!-- /.card -->
		</div>
		<!-- right column -->
		<div class="col-md-8">
			<!-- general form elements -->
			<div class="card card-primary">
				<div class="card-header border-0 pt-5 pb-3">
					<h3 class="card-title fw-bolder text-gray-800 fs-2">Sunting Kab/Kot</h3>
				</div>
				<?php echo form_open($action, 'class="form-horizontal" enctype="multipart/form-data"'); ?>
				<div class="card-body pt-0">
					<div class="mb-3 row">
						<label class="col-sm-3 col-form-label text-end">Nama : </label>
						<div class="col-sm-9">
							<?php echo form_input($nama); ?>
						</div>
						<span style="color: red;"><?php echo form_error($nama['name']); ?><?php echo isset($errors[$nama['name']]) ? $errors[$nama['name']] : ''; ?></span>
					</div>
					<div class="mb-3 row">
						<label class="col-sm-3 col-form-label text-end">Detail : </label>
						<div class="col-sm-9">
							<?php echo form_input($detail); ?>
						</div>
						<span style="color: red;"><?php echo form_error($detail['name']); ?><?php echo isset($errors[$detail['name']]) ? $errors[$detail['name']] : ''; ?></span>
					</div>
					<div class="mb-3 row">
						<label class="col-sm-3 col-form-label text-end">Kota : </label>
						<div class="col-sm-9">
							<?php echo form_input($kota); ?>
						</div>
						<span style="color: red;"><?php echo form_error($kota['name']); ?><?php echo isset($errors[$kota['name']]) ? $errors[$kota['name']] : ''; ?></span>
					</div>
					<div class="mb-3 row">
						<label class="col-sm-3 col-form-label text-end">Alamat : </label>
						<div class="col-sm-9">
							<?php echo form_input($alamat); ?>
						</div>
						<span style="color: red;"><?php echo form_error($alamat['name']); ?><?php echo isset($errors[$alamat['name']]) ? $errors[$alamat['name']] : ''; ?></span>
					</div>
					<div class="mb-3 row">
						<label class="col-sm-3 col-form-label text-end">Telpon : </label>
						<div class="col-sm-9">
							<?php echo form_input($telpon); ?>
						</div>
						<span style="color: red;"><?php echo form_error($telpon['name']); ?><?php echo isset($errors[$telpon['name']]) ? $errors[$telpon['name']] : ''; ?></span>
					</div>
                    <div class="mb-3 row">
						<label class="col-sm-3 col-form-label text-end">Email : </label>
						<div class="col-sm-9">
							<?php echo form_input($email); ?>
						</div>
						<span style="color: red;"><?php echo form_error($email['name']); ?><?php echo isset($errors[$email['name']]) ? $errors[$email['name']] : ''; ?></span>
					</div>
					<div class="row">
						<label class="col-sm-3 col-form-label text-end">Logo : </label>
						<div class="col-sm-9">
							<?php echo form_input($logo); ?>
						</div>
						<span style="color: red;"><?php echo form_error($logo['name']); ?><?php echo isset($errors[$logo['name']]) ? $errors[$logo['name']] : ''; ?></span>
					</div>
				</div>
				<div class="card-footer">
					<center>
						<button type="submit" class="btn btn-primary btn-sm"><i class="fal fa-plus"></i>&nbsp Simpan
						</button>
						<a href="<?php echo $url; ?>" class="btn btn-danger btn-sm"><i class="fal fa-arrow-left"></i>&nbsp Kembali</a>
					</center>
				</div>
				<?php echo form_close() ?>
			</div>
		</div>
	</div>
</div>
<script>
	$("#kt_datepicker_user").flatpickr();
</script>

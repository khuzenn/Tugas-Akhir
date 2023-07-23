<?php
$ap_name = array(
		'name' => 'ap_name',
		'id' => 'ap_name',
		'class' => 'form-control',
		'value' => $data_ap_name,
		'autocomplete' => 'off'
);
$ap_name_url = array(
		'name' => 'ap_name_url',
		'id' => 'ap_name_url',
		'class' => 'form-control',
		'value' => $data_ap_name_url,
		'autocomplete' => 'off'
);
$ap_group = array(
		'name' => 'ap_group',
		'id' => 'ap_group',
		'class' => 'form-control',
		'value' => $data_ap_group,
		'autocomplete' => 'off'
);
$alamat = array(
    'name' => 'alamat',
    'id' => 'alamat',
    'class' => 'form-control',
    'value' => $data_alamat,
    'autocomplete' => 'off'
);
$kota = array(
    'name' => 'kota',
    'id' => 'kota',
    'class' => 'form-control',
    'value' => $data_kota,
    'autocomplete' => 'off'
);
$latitude = array(
    'name' => 'latitude',
    'id' => 'latitude',
    'class' => 'form-control',
    'value' => $data_latitude,
    'autocomplete' => 'off'
);
$longitude = array(
    'name' => 'longitude',
    'id' => 'longitude',
    'class' => 'form-control',
    'value' => $data_longitude,
    'autocomplete' => 'off'
);
$mac_address = array(
    'name' => 'mac_address',
    'id' => 'mac_address',
    'class' => 'form-control',
    'value' => $data_mac_address,
    'autocomplete' => 'off'
);
$ip_address = array(
    'name' => 'ip_address',
    'id' => 'ip_address',
    'class' => 'form-control',
    'value' => $data_ip_address,
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
                    <h3>Detail Access Point</h3>
					<ul class="list-group list-group-unbordered mb-3">
						<li class="list-group-item">
							<b>AP Name :</b> <a class="float-right"><?php echo $data_ap_name; ?></a>
						</li>
						<li class="list-group-item">
							<b>AP Name URL :</b> <a class="float-right"><?php echo $data_ap_name_url; ?></a>
						</li>
						<li class="list-group-item">
							<b>AP Group :</b> <a class="float-right"><?php echo $data_ap_group; ?></a>
						</li>
						<li class="list-group-item">
							<b>Alamat :</b> <a class="float-right"><?php echo $data_alamat; ?></a>
						</li>
						<li class="list-group-item">
							<b>Kota :</b> <a class="float-right"><?php echo $data_kota; ?></a>
						</li>
                        <li class="list-group-item">
							<b>Latitude :</b> <a class="float-right"><?php echo $data_latitude; ?></a>
						</li>
                        <li class="list-group-item">
							<b>Longitude :</b> <a class="float-right"><?php echo $data_longitude; ?></a>
						</li>
                        <li class="list-group-item">
							<b>Mac Address :</b> <a class="float-right"><?php echo $data_mac_address; ?></a>
						</li>
                        <li class="list-group-item">
							<b>IP Address :</b> <a class="float-right"><?php echo $data_ip_address; ?></a>
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
					<h3 class="card-title fw-bolder text-gray-800 fs-2">Form Access Point</h3>
				</div>
				<?php echo form_open($action, 'class="form-horizontal" enctype="multipart/form-data"'); ?>
				<div class="card-body pt-0">
					<div class="mb-3 row">
						<label class="col-sm-3 col-form-label text-end">AP Name : </label>
						<div class="col-sm-9">
							<?php echo form_input($ap_name); ?>
						</div>
						<span style="color: red;"><?php echo form_error($ap_name['name']); ?><?php echo isset($errors[$ap_name['name']]) ? $errors[$ap_name['name']] : ''; ?></span>
					</div>
					<div class="mb-3 row">
						<label class="col-sm-3 col-form-label text-end">AP Name URL : </label>
						<div class="col-sm-9">
							<?php echo form_input($ap_name_url); ?>
						</div>
						<span style="color: red;"><?php echo form_error($ap_name_url['name']); ?><?php echo isset($errors[$ap_name_url['name']]) ? $errors[$ap_name_url['name']] : ''; ?></span>
					</div>
					<div class="mb-3 row">
						<label class="col-sm-3 col-form-label text-end">AP Group : </label>
						<div class="col-sm-9">
							<?php echo form_input($ap_group); ?>
						</div>
						<span style="color: red;"><?php echo form_error($ap_group['name']); ?><?php echo isset($errors[$ap_group['name']]) ? $errors[$ap_group['name']] : ''; ?></span>
					</div>
					<div class="mb-3 row">
						<label class="col-sm-3 col-form-label text-end">Alamat : </label>
						<div class="col-sm-9">
							<?php echo form_input($alamat); ?>
						</div>
						<span style="color: red;"><?php echo form_error($alamat['name']); ?><?php echo isset($errors[$alamat['name']]) ? $errors[$alamat['name']] : ''; ?></span>
					</div>
					<div class="mb-3 row">
						<label class="col-sm-3 col-form-label text-end">Kota : </label>
						<div class="col-sm-9">
							<?php echo form_input($kota); ?>
						</div>
						<span style="color: red;"><?php echo form_error($kota['name']); ?><?php echo isset($errors[$kota['name']]) ? $errors[$kota['name']] : ''; ?></span>
					</div>
                    <div class="mb-3 row">
						<label class="col-sm-3 col-form-label text-end">Latitude : </label>
						<div class="col-sm-9">
							<?php echo form_input($latitude); ?>
						</div>
						<span style="color: red;"><?php echo form_error($latitude['name']); ?><?php echo isset($errors[$latitude['name']]) ? $errors[$latitude['name']] : ''; ?></span>
					</div>
					<div class="mb-3 row">
						<label class="col-sm-3 col-form-label text-end">Longitude : </label>
						<div class="col-sm-9">
							<?php echo form_input($longitude); ?>
						</div>
						<span style="color: red;"><?php echo form_error($longitude['name']); ?><?php echo isset($errors[$longitude['name']]) ? $errors[$longitude['name']] : ''; ?></span>
					</div>
                    <div class="mb-3 row">
						<label class="col-sm-3 col-form-label text-end">MAC Address : </label>
						<div class="col-sm-9">
							<?php echo form_input($mac_address); ?>
						</div>
						<span style="color: red;"><?php echo form_error($mac_address['name']); ?><?php echo isset($errors[$mac_address['name']]) ? $errors[$mac_address['name']] : ''; ?></span>
					</div>
                    <div class="mb-3 row">
						<label class="col-sm-3 col-form-label text-end">IP Address : </label>
						<div class="col-sm-9">
							<?php echo form_input($ip_address); ?>
						</div>
						<span style="color: red;"><?php echo form_error($ip_address['name']); ?><?php echo isset($errors[$ip_address['name']]) ? $errors[$ip_address['name']] : ''; ?></span>
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

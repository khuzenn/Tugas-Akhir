<?php
$judul = array(
		'name' => 'judul',
		'id' => 'judul',
		'class' => 'form-control',
		'value' => $data_judul,
		'autocomplete' => 'off'
);
$nama = array(
		'name' => 'nama',
		'id' => 'nama',
		'class' => 'form-control',
		'value' => $data_nama,
		'autocomplete' => 'off'
);
$ap_name_slider = array(
		'name' => 'ap_name_slider',
		'id' => 'ap_name_slider',
		'class' => 'form-control',
		'value' => $data_ap_name_slider,
		'autocomplete' => 'off'
);
$start_date = array(
    'name' => 'start_date',
    'id' => 'start_date',
    'class' => 'form-control',
    'value' => $data_start_date,
    'autocomplete' => 'off'
);
$end_date = array(
    'name' => 'end_date',
    'id' => 'end_date',
    'class' => 'form-control',
    'value' => $data_end_date,
    'autocomplete' => 'off'
);
$video = array(
    'name' => 'video',
    'id' => 'video',
    'class' => 'form-control',
    'value' => $data_video,
    'autocomplete' => 'off'
);
$photo = array(
		'class' => 'form-control',
		'name' => 'photo',
		'id' => 'photo',
		'type' => 'file',
		'value' => set_value('photo'),
		'autocomplete' => 'off'
);
?>

<div class="content flex-row-fluid" id="kt_content">
	<!--begin::Row-->
	<div class="row gy-5 g-xl-8">
		<!-- left column -->
		
		<!-- right column -->
		<div class="col-md-12">
			<!-- general form elements -->
			<div class="card card-primary">
				<div class="card-header border-0 pt-5 pb-3">
					<h3 class="card-title fw-bolder text-gray-800 fs-2">Sunting Slider</h3>
				</div>
				<?php echo form_open($action, 'class="form-horizontal" enctype="multipart/form-data"'); ?>
				<div class="card-body pt-0">
					<div class="mb-3 row">
						<label class="col-sm-3 col-form-label text-end">Judul : </label>
						<div class="col-sm-9">
							<?php echo form_input($judul); ?>
						</div>
						<span style="color: red;"><?php echo form_error($judul['name']); ?><?php echo isset($errors[$judul['name']]) ? $errors[$judul['name']] : ''; ?></span>
					</div>
					<div class="mb-3 row">
						<label class="col-sm-3 col-form-label text-end">Kab/Kot : </label>
						<div class="col-sm-9">
							<?php echo form_input($nama,'','disabled'); ?>
						</div>
						<span style="color: red;"><?php echo form_error($nama['name']); ?><?php echo isset($errors[$nama['name']]) ? $errors[$nama['name']] : ''; ?></span>
					</div>
					<div class="mb-3 row">
						<label class="col-sm-3 col-form-label text-end">AP Name : </label>
						<div class="col-sm-9">
							<?php echo form_input($ap_name_slider); ?>
						</div>
						<span style="color: red;"><?php echo form_error($ap_name_slider['name']); ?><?php echo isset($errors[$ap_name_slider['name']]) ? $errors[$ap_name_slider['name']] : ''; ?></span>
					</div>
					<div class="mb-3 row">
					<label class="col-sm-3 col-form-label text-end">Start Date : </label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="kt_datepicker_start" name="start_date" value="<?php echo $data_start_date; ?>"/>
						</div>
					</div>
					<div class="mb-3 row">
					<label class="col-sm-3 col-form-label text-end">End Date : </label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="kt_datepicker_end" name="end_date" value="<?php echo $data_end_date; ?>"/>
						</div>
					</div>
                    <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label text-end">Konten : </label>
							<div class="col-sm-9">
								<select class="form-control" id="tipe" name="tipe">
									<option value="photo">Photo</option>
									<option value="videos">Videos</option>
								</select>
							</div>
					</div>
                    <div class="mb-3 row" id="photo_div">
                    <label class="col-sm-3 col-form-label text-end">Photo : </label>
						<div class="col-sm-9">
							<div class="d-flex flex-row">
								<input class="form-control" name="photo" accept="image/*" type='file' id="imgInpphoto"/>
								</div>
							Note : Untuk jenis file yang bisa diunggah adalah jpg, jpeg, atau png, maksimal ukuran file 10mb
							<!-- <div class="col">
								<div class="col-9">
									<img class="rounded img-photo w-25" id="imagephoto"
										src="<?php if (isset($photo)) {
											echo base_url('assets/file/') . '/' . $photo;
										} else {
											echo base_url('assets/media/avatars/blank.png');
										} ?>" alt="your image"/>
								</div>
							</div> -->
							<script>
								imgInpphoto.onchange = evt => {
									const [file] = imgInpphoto.files
									if (file) {
										imagephoto.src = URL.createObjectURL(file)
									}
								}
							</script>
							<span style="color: red;"><?php echo form_error('photo'); ?></span>
						</div>
                    </div>
                    <div class="mb-3 row" id="url_div" style="display: none;">
						<div class="form-group row">
                        <label class="col-sm-3 col-form-label text-end">Url : </label>
							<div class="col-lg-9">
                                <div class="d-flex flex-row">
                                <input type="text" class="form-control" name="video" id="video" maxlength="100" autocomplete="off">
                                </div>
							</div>
						</div>
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
<script type="text/javascript">


	$('#tipe').select2()
    $("#tipe").change(function(e){
		tipe = $(this).val();
      if (tipe=="videos") {
        $( "#photo_div" ).hide();
        $( "#url_div" ).show();
        $( "#intruksi-video" ).show();
        $( "#url" ).attr("placeholder", "Masukan kode youtube embed youtube. Contoh : qgO9bb-q2EE");
      }else if (tipe=="photo_url") {
        $( "#photo_div" ).show();
        $( "#url_div" ).hide();
        $( "#intruksi-video" ).hide();
        $( "#url" ).attr("placeholder", "Masukan url link...");
      }else{
        $( "#url_div" ).hide();
        $( "#photo_div" ).show();
        $( "#intruksi-video" ).hide();
      }

		});

	$("#kt_datepicker_start").flatpickr({
		maxDate: new Date()
	});
	$("#kt_datepicker_end").flatpickr({
		maxDate: new Date()
	});
</script>

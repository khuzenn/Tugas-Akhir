<div class="content flex-row-fluid" id="kt_content">
	<!--begin::Row-->
	<div class="row gy-5 g-xl-8">
		<!--begin::Col-->
		<?php
		if ($this->session->flashdata('msg')) {
			?>
			<div class="col-xxl-12">
				<!--begin::Alert-->
				<div class="alert alert-dismissible bg-light-success d-flex flex-column flex-sm-row w-100 p-5">
					<!--begin::Icon-->
					<!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
					<span class="svg-icon svg-icon-2hx svg-icon-success me-4 mb-5 mb-sm-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="black"/>
                            <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="black"/>
                        </svg>
                    </span>
					<!--end::Svg Icon-->
					<!--end::Icon-->
					<!--begin::Content-->
					<div class="d-flex flex-column pe-0 pe-sm-10">
						<h4 class="fw-bold">Berhasil!</h4>
						<span><?php echo $this->session->flashdata('msg'); ?></span>
					</div>
					<!--end::Content-->
					<!--begin::Close-->
					<button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
						<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
						<span class="svg-icon svg-icon-1 svg-icon-success">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black"/>
                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black"/>
                            </svg>
                        </span>
						<!--end::Svg Icon-->
					</button>
					<!--end::Close-->
				</div>
				<!--end::Alert-->
			</div>
		<?php } ?>
		<div class="col-xxl-12">
			<!--begin::Table Widget 1-->
			<div class="card">
				<!--begin::Header-->
				<div class="card-header border-0 pt-5 pb-3">
					<!--begin::Card title-->
					<h3 class="card-title fw-bolder text-gray-800 fs-2">Kabkot/AP Group Input</h3>
					<!--end::Card title-->
				</div>
				<!--end::Header-->
				<!--begin::Body-->
				<form class="form-horizontal" role="form" action="<?php echo $action; ?>" method="POST" enctype="multipart/form-data">
					<div class="card-body pt-0">
						<div class="mb-3 row">
							<label for="inputPassword" class="col-sm-2 col-form-label text-end">Title<span style="color:red;">*</span></label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan Title" autocomplete="off" value="<?php if (isset($judul)) {
									echo $judul;
								} ?>">
								<div class="text-danger"><?php echo form_error('judul'); ?></div>
							</div>
						</div>
                        <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-2 col-form-label text-end">AP Group<span style="color:red;">*</span></label>
                            <div class="col-sm-10">
                                <select class="form-select select-kabkot" data-control="select2" data-placeholder="Pilih Kabkot/ AP Group"  name="nama" >
                                    <option value="">Pilih Kabkot/ AP Group</option>
                                    <?php
                                    foreach ($list_kabkot as $nama) {
                                        if ($nama->id_kabkot == $selected_nama) {
                                            ?>
                                            <option value="<?php echo encrypt_url($nama->id_kabkot); ?>" selected><?php echo $nama->nama; ?></option>
                                        <?php } else { ?>
                                            <option value="<?php echo encrypt_url($nama->id_kabkot); ?>"><?php echo $nama->nama; ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
						<div class="mb-3 row">
							<label for="inputPassword" class="col-sm-2 col-form-label text-end">AP NAME<span style="color:red;">*</span></label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="ap_name_slider" name="ap_name_slider" placeholder="Masukkan AP Name" autocomplete="off" value="<?php if (isset($ap_name_slider)) {
									echo $ap_name_slider;
								} ?>">
								<div class="text-danger"><?php echo form_error('ap_name_slider'); ?></div>
							</div>
						</div>
                        <div class="mb-3 row">
							<label for="inputPassword" class="col-sm-2 col-form-label text-end">Start Date<span style="color:red;">*</span></label>
							<div class="col-sm-10">
								<input id="kt_datepicker_start" type="text" class="form-control" name="start_date" placeholder="Masukkan Start Date" autocomplete="off" value="<?php if (isset($start_date)) {
									echo $start_date;
								} ?>">
								<div class="text-danger"><?php echo form_error('start_date'); ?></div>
							</div>
						</div>
                        <div class="mb-3 row">
							<label for="inputPassword" class="col-sm-2 col-form-label text-end">End Date<span style="color:red;">*</span></label>
							<div class="col-sm-10">
								<input id="kt_datepicker_end" type="text" class="form-control" name="end_date" placeholder="Masukkan End Date" autocomplete="off" value="<?php if (isset($end_date)) {
									echo $end_date;
								} ?>">
								<div class="text-danger"><?php echo form_error('end_date'); ?></div>
							</div>
						</div>
					<div class="mb-3 row">
					<div class="form-group row">
						<label for="inputPassword" class="col-sm-2 col-form-label text-end">Type<span style="color:red;">*</span></label>
							<div class="col-sm-10">
								<select class="form-control" id="tipe" name="tipe">
									<option value="photo">Photo</option>
									<option value="videos">Videos</option>
								</select>
							</div>
						</div>
					</div>
					<div class="mb-3 row" id="photo_div">
						<label for="inputPassword" class="col-sm-2 col-form-label text-end">Photo</label>
						<div class="col-sm-10">
							<div class="d-flex flex-row">
								<input class="form-control" name="photo" accept="image/*" type='file' id="imgInpphoto"/>
								</div>
							Note : Untuk jenis file yang bisa diunggah adalah jpg, jpeg, atau png, maksimal ukuran file 10mb
							<div class="col">
								<div class="col-10">
									<img class="rounded img-photo w-25" id="imagephoto"
										src="<?php if (isset($photo)) {
											echo base_url('assets/file/') . '/' . $photo;
										} else {
											echo base_url('assets/media/avatars/blank.png');
										} ?>" alt="your image"/>
								</div>
							</div>
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
							<label class="col-sm-2 col-form-label text-end">Url <span style="color:red;">*</span></label>
							<div class="col-lg-9">
							<input type="text" class="form-control" name="video" id="video" maxlength="100" autocomplete="off">
							</div>
						</div>
                    </div>
                    <div class="mb-3 row" id="intruksi-video" style="display:none">
                    <div class="col-md-4 grid-margin stretch-card " style="margin-top: 15pt;">
                      <div class="card d-flex ">
                          <h4 class="card-title" style="text-align: center !important;font-size: 12pt !important;">Siapkan Link Youtube seperti dibawah ini :</h4>
                          <img data-enlargeable src="https://wificms.jabarprov.go.id/api/helper/get_image/persiapan-video.png" class="img-custom-video img-lg " alt="Intruksi-Video-Persiapan">
                      </div>
                    </div>

                    <div class="col-md-4 grid-margin stretch-card" style="margin-top: 15pt;">
                      <div class="card d-flex">
                          <h4 class="card-title" style="text-align: center !important;font-size: 12pt !important; ">Pilih "SHARE"</h4>
                          <img data-enlargeable src="https://wificms.jabarprov.go.id/api/helper/get_image/intro-video1.png" class="img-custom-video img-lg rounded" alt="Intruksi-Video-1">
                      </div>
                    </div>
                    <div class="col-md-4 grid-margin stretch-card" style="margin-top: 10pt;">
                      <div class="card d-flex">
                          <h4 class="card-title" style="text-align: center !important;font-size: 12pt !important;">Copy Kode Youtube, sesuai gambar dibawah : </h4>
                          <img data-enlargeable src="https://wificms.jabarprov.go.id/api/helper/get_image/intro-video2.png" class="img-custom-video img-lg rounded" alt="Intruksi-Video-2">
                      </div>
                    </div>
                </div>
				<div class="content-am">
				</div>
					</div>
					<div class="card-footer">
						<center>
							<button type="submit" class="btn btn-primary btn-md">
								<i class="fal fa-plus"></i>&nbsp Simpan
							</button>
						</center>
					</div>
				</form>
				<!--end::Body-->
			</div>
			<!--end::Table Widget 1-->
		</div>
		<!--end::Col-->
	</div>
	<!--end::Row-->
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

	$("#kt_datepicker_start").flatpickr();
	$("#kt_datepicker_end").flatpickr();
</script>
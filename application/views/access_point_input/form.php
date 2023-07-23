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
					<h3 class="card-title fw-bolder text-gray-800 fs-2">Access Point Input</h3>
                    <div class="column">
						<a href="<?php echo site_url('access-point-input/import/excel'); ?>" class="btn btn-warning btn-sm my-2" tooltip="Impor Kastemer">Import Access Point</a>
					</div>
					<!--end::Card title-->
				</div>
				<!--end::Header-->
				<!--begin::Body-->
				<form class="form-horizontal" role="form" action="<?php echo $action; ?>" method="POST">
					<div class="card-body pt-0">
                        <div class="mb-3 row">
							<label for="inputPassword" class="col-sm-2 col-form-label text-end">AP Name<span style="color:red;">*</span></label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="ap_name" name="ap_name" placeholder="Masukkan AP Name" autocomplete="off" value="<?php if (isset($ap_name)) {
									echo $ap_name;
								} ?>">
								<div class="text-danger"><?php echo form_error('ap_name'); ?></div>
							</div>
						</div>
                        <div class="mb-3 row">
							<label for="inputPassword" class="col-sm-2 col-form-label text-end">AP Name URL<span style="color:red;">*</span></label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="ap_name_url" name="ap_name_url" placeholder="Masukkan AP Name URL" autocomplete="off" value="<?php if (isset($ap_name_url)) {
									echo $ap_name_url;
								} ?>">
								<div class="text-danger"><?php echo form_error('ap_name_url'); ?></div>
							</div>
						</div>
						<div class="mb-3 row">
							<label for="inputPassword" class="col-sm-2 col-form-label text-end">AP Group<span style="color:red;">*</span></label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="ap_group" name="ap_group" placeholder="Masukkan AP Group" autocomplete="off" value="<?php if (isset($ap_group)) {
									echo $ap_group;
								} ?>">
								<div class="text-danger"><?php echo form_error('ap_group'); ?></div>
							</div>
						</div>
                        <div class="mb-3 row">
							<label for="inputPassword" class="col-sm-2 col-form-label text-end">Alamat<span style="color:red;">*</span></label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat" autocomplete="off" value="<?php if (isset($alamat)) {
									echo $alamat;
								} ?>">
								<div class="text-danger"><?php echo form_error('alamat'); ?></div>
							</div>
						</div>
                        <div class="mb-3 row">
							<label for="inputPassword" class="col-sm-2 col-form-label text-end">Kota<span style="color:red;">*</span></label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="kota" name="kota" placeholder="Masukkan Kota" autocomplete="off" value="<?php if (isset($kota)) {
									echo $kota;
								} ?>">
								<div class="text-danger"><?php echo form_error('kota'); ?></div>
							</div>
						</div>
                        <div class="mb-3 row">
							<label for="inputPassword" class="col-sm-2 col-form-label text-end">Latitude<span style="color:red;">*</span></label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="latitude" name="latitude" placeholder="Masukkan Latitude" autocomplete="off" value="<?php if (isset($latitude)) {
									echo $latitude;
								} ?>">
								<div class="text-danger"><?php echo form_error('latitude'); ?></div>
							</div>
						</div>
                        <div class="mb-3 row">
							<label for="inputPassword" class="col-sm-2 col-form-label text-end">Longitude<span style="color:red;">*</span></label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="longitude" name="longitude" placeholder="Masukkan Longitude" autocomplete="off" value="<?php if (isset($longitude)) {
									echo $longitude;
								} ?>">
								<div class="text-danger"><?php echo form_error('longitude'); ?></div>
							</div>
						</div>
                        <div class="mb-3 row">
							<label for="inputPassword" class="col-sm-2 col-form-label text-end">MAC Address<span style="color:red;">*</span></label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="mac_address" name="mac_address" placeholder="Masukkan MAC Address" autocomplete="off" value="<?php if (isset($mac_address)) {
									echo $mac_address;
								} ?>">
								<div class="text-danger"><?php echo form_error('mac_address'); ?></div>
							</div>
						</div>
                        <div class="mb-3 row">
							<label for="inputPassword" class="col-sm-2 col-form-label text-end">IP Address<span style="color:red;">*</span></label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="ip_address" name="ip_address" placeholder="Masukkan IP Address" autocomplete="off" value="<?php if (isset($ip_address)) {
									echo $ip_address;
								} ?>">
								<div class="text-danger"><?php echo form_error('ip_address'); ?></div>
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
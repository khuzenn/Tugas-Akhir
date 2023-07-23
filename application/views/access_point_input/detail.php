<div class="content row flex-row-fluid" id="kt_content">
	<!--<div class="content flex-row-fluid" id="kt_content">-->
	<!--begin::Row-->
	<div class="row gy-5 g-xl-8">
		<!--begin::Col-->
		<div class="col-xxl-12">
			<!--begin::Table Widget 1-->
			<div class="card">
				<!--begin::Header-->
				<div class="card-header border-0 pt-5 pb-3">
					<!--begin::Card title-->
					<h3 class="card-title fw-bolder text-gray-800 fs-2">Detail Access Point</h3>
					<!--end::Card title-->
				</div>
				<!--end::Header-->
				<div class="card-body pt-0">
					<table class="table table-striped table-row-bordered table-rounded table-striped table-hover border gy-5 gs-7">
						<tr>
							<td class="fw-bold text-start">AP Name :</td>
							<td><?php echo $ap_name; ?></td>
						</tr>
						<tr>
							<td class="fw-bold text-start">AP Group :</td>
							<td><?php echo $ap_group; ?></td>
						</tr>
						<tr>
							<td class="fw-bold text-start">Alamat :</td>
							<td><?php echo $alamat; ?></td>
						</tr>
						<tr>
							<td class="fw-bold text-start">Kota :</td>
							<td><?php echo $kota; ?></td>
						</tr>
						<tr>
							<td class="fw-bold text-start">Latitude :</td>
							<td><?php echo $latitude; ?></td>
						</tr>
						<tr>
							<td class="fw-bold text-start">Longtitude :</td>
							<td><?php echo $longitude; ?></td>
						</tr>
						<tr>
							<td class="fw-bold ">Mac Address :</td>
							<td><?php echo $mac_address; ?></td>
						</tr>
						<tr>
							<td class="fw-bold ">Ip Address :</td>
							<td><?php echo $ip_address; ?></td>
						</tr>
					</table>
					<div class="card-footer">
					<center>
						<a href="<?php echo $url; ?>" class="btn btn-danger btn-sm">
							<i class="fal fa-arrow-left"></i>&nbsp Kembali
						</a>
					</center>
				</div>	
			</div>
			<!--end::Table Widget 1-->
		</div>
		<!--end::Col-->
	</div>
	</div>
	<!--end::Row-->
</div>

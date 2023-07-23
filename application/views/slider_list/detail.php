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
					<h3 class="card-title fw-bolder text-gray-800 fs-2">Detail Slider</h3>
					<!--end::Card title-->
				</div>
				<!--end::Header-->
				<div class="card-body pt-0">
					<table class="table table-striped table-row-bordered table-rounded table-striped table-hover border gy-5 gs-7">
						<center>
						<?php if ($video): ?>
								<iframe width="640" height="360" src="https://www.youtube.com/embed/<?php echo $video; ?>" frameborder="0" allowfullscreen></iframe>
							<?php else: ?>
								<img src="<?= base_url('./assets/konten/' . $photo) ?>" style="width: 300px">
							<?php endif; ?>
						</center>
						<tr>
							<td class="fw-bold text-start">Title :</td>
							<td><?php echo $judul; ?></td>
						</tr>
						<tr>
							<td class="fw-bold text-start">Kab/Kot :</td>
							<td><?php echo $nama; ?></td>
						</tr>
						<tr>
							<td class="fw-bold text-start">AP Name Slider :</td>
							<td><?php echo $ap_name_slider; ?></td>
						</tr>
						<tr>
							<td class="fw-bold text-start">Start Date :</td>
							<td><?php echo $start_date; ?></td>
						</tr>
						<tr>
							<td class="fw-bold text-start">End Date :</td>
							<td><?php echo $end_date; ?></td>
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

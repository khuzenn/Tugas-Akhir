<div class="content flex-row-fluid" id="kt_content">  
    <!--begin::Row-->
    <div class="row gy-5 g-xl-8">
        <!--begin::Col-->
        <div class="col-xxl-12">
            <!--begin::Table Widget 1-->
            <div class="card">
                <!--begin::Header-->
                <div class="card-header border-0 pt-5 pb-3">
                    <!--begin::Card title-->
                    <h3 class="card-title fw-bolder text-gray-800 fs-2">Slider List</h3>
                    <!--end::Card title-->
                    <!--begin::Button-->

                    <!--end::Button-->
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body pt-10">
                    <!--begin::Table-->
                    <table id="kt_datatable_example_access" class="table table-striped table-row-bordered table-rounded table-striped table-hover border gy-5 gs-7">
                        <thead class="fw-bold fs-6 text-gray-800">
                            <tr>
                                <td>No</td>
                                <td>Title</td>
                                <td>Nama</td>
                                <td>Konten</td>
                                <td>AP Name</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($slider as $key => $slider) {
                            ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $slider->judul; ?></td>
                                    <td><?php echo $slider->nama; ?></td>
                                    <td>
                                    <?php if ($slider->video): ?>
                                        <iframe width="240" height="115" src="https://www.youtube.com/embed/<?php echo $slider->video; ?>" frameborder="0" allowfullscreen></iframe>
                                    <?php else: ?>
                                        <img src="<?= base_url('./assets/konten/' . $slider->photo) ?>" style="width: 100px">
                                    <?php endif; ?>
                                    </td>
                                    <td><?php echo $slider->ap_name_slider; ?></td> 
                                    <td class="d-flex align-items-center">
                                        <a data-toggle="modal" href="<?php echo site_url('slider-list/detail/' . encrypt_url($slider->id_slider)); ?>" class="btn btn-warning btn-sm">Detail</a>&nbsp
                                        <a href="<?php echo site_url('slider-list/sunting/' . $slider->id_slider); ?>" class="btn btn-primary btn-sm" tooltip="Tambah Kabkot/AP Group">Sunting</a>&nbsp
                                        <a href="<?php echo site_url('slider-list/hapus/' . encrypt_url($slider->id_slider)); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin untuk menghapus data Slider ini?')">
                                        Hapus
                                    </a>
                                    </td>
                                </tr>
                            <?php
                                $no++;
                            }
                            ?>
                        </tbody>
                    </table>
                    <!--end::Table-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Table Widget 1-->
        </div>
        <!--end::Col-->
    </div>
    <!--end::Row-->
</div>
<script>
    $(function() {
        $("#kt_datatable_example_access").DataTable({
            "language": {
                "lengthMenu": "Show _MENU_",
            },
            "dom": "<'row'" +
                "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
                "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
                ">" +

                "<'table-responsive'tr>" +

                "<'row'" +
                "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
                "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
                ">",
            "scrollX": true,
            "processing": false,
            "order": [],
            "columnDefs": [{
                orderable: false,
                targets: 0
            }, {
                orderable: false,
                targets: 5
            }],
            "columns": [{
                    className: "text-center"
                },
                null,
                null,
                null,
                null,
                {
                    className: "text-center justify-content-center"
                },
            ]
        });
    });
</script>

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
                    <h3 class="card-title fw-bolder text-gray-800 fs-2">Access Point List</h3>
                    <!--end::Card title-->
                    <!--begin::Button-->
                    <div class="column">
                        <a href="<?php echo site_url('access-point-input'); ?>" class="btn btn-success btn-sm my-2" tooltip="Tambah Kabkot/AP Group">Tambah Access Point</a>
                        <a href="<?php echo site_url('access-point-input/import/excel'); ?>" class="btn btn-warning btn-sm my-2" tooltip="Impor Kastemer">Import Access Point</a>
                    </div>
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
                                <td>Satker atau AP Group</td>
                                <!-- <td>AP Name</td> -->
                                <td>Kota</td>
                                <!-- <td>Alamat</td> -->
                                <td>Longitude</td>
                                <td>Latitude</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($access_point as $key => $access) {
                            ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <!-- <td><a href="<?php echo site_url('' . $access->ap_name_url); ?>" class="btn btn-primary btn-sm">Detail</a></td> -->
                                    <td><?php echo $access->ap_group; ?></td>
                                    <!-- <td><?php echo $access->ap_name; ?></td> -->
                                    <td><?php echo $access->kota; ?></td>
                                    <!-- <td><?php echo $access->alamat; ?></td>  -->
                                    <td><?php echo $access->longitude; ?></td>
                                    <td><?php echo $access->latitude; ?></td>
                                    <td class="d-flex align-items-center">
                                        <a data-toggle="modal" href="<?php echo site_url('access-point-input/detail/' . encrypt_url($access->id)); ?>" class="btn btn-warning btn-sm">Detail</a>&nbsp
                                        <a href="<?php echo site_url('access-point-list/sunting/' . $access->id); ?>" class="btn btn-primary btn-sm" tooltip="Tambah Kabkot/AP Group">Sunting</a>&nbsp
                                        <a href="<?php echo site_url('access-point-list/hapus/' . encrypt_url($access->id)); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin untuk menghapus data Access Point ini?')">
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
            "processing": true,
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

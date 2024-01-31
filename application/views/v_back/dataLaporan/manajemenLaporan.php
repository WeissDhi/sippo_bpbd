<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">

        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4><?= $title; ?></h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="javascript:void(0);"><?= $breadcrumb; ?></a></li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="row tab-content">
                    <div id="list-view" class="tab-pane fade active show col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Data Laporan Aduan</h4>
                                <a href="<?= base_url('admin/ManajemenLaporan/add'); ?>" class="btn btn-secondary">+ Tambah Data</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover" id="myTable" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th class="text-center" width="3%">No</th>
                                                <th class="text-center" width="15%">Tanggal</th>
                                                <th class="text-center" width="7%">Jam</th>
                                                <th class="text-center" width="15%">Jenis Bencana</th>
                                                <th class="text-center" width="10%">Kecamatan</th>
                                                <th class="text-center" width="10%">Desa</th>
                                                <th class="text-center" width="15%">Lokasi</th>
                                                <th class="text-center" width="10%">Status</th>
                                                <th class="text-center" width="10%">Tanggal Update</th>
                                                <th class="text-center" width="5%">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            for ($x = 1; $x <= 3; $x++) {
                                            ?> <tr>
                                                    <td class="text-center">
                                                        <?= $x; ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <?= date('d M Y'); ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <?= date('h:m:s'); ?>
                                                    </td>
                                                    <td>
                                                        Kebakaran Hutan / Lahan (Faktor Alam)
                                                    </td>
                                                    <td>
                                                        Pasir Kuda
                                                    </td>
                                                    <td>
                                                        Giri Jaya
                                                    </td>
                                                    <td>
                                                        Gunung Picung Lamping
                                                    </td>
                                                    <td class="text-center">
                                                        Ajuan Pengaduan
                                                    </td>
                                                    <td class="text-center">
                                                        <?= date('d M Y h:m:s'); ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <a class="btn btn-warning btn-sm mb-2 mt-1 mr-1" href="javascript:void(0)" title="Edit" onclick=""><i class="fa fa-edit"></i></a>
                                                        <?php if ($role == 99 or $role == 1) {
                                                        ?><?php if ($role == 99) {
                                                            ?>
                                                        <a class="btn btn-info btn-sm mr-1 mb-2" href="javascript:void(0)" title="Tanggapi" onclick="tanggapi()"><i class="fa fa-check"></i></a>
                                                        <a class="btn btn-danger btn-sm mr-1 mb-2" href="javascript:void(0)" title="Tolak" onclick="tolak()"><i class="fa fa-times"></i></a>
                                                    <?php } ?>
                                                    <?php if ($role == 1) {
                                                    ?>
                                                        <a class="btn btn-success btn-sm mr-1 mb-2" href="javascript:void(0)" title="Validasi" onclick="validasi()"><i class="fa fa-check"></i></a>
                                                <?php }
                                                        } ?>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                            <?php
                                            $no = 4;
                                            for ($x = 1; $x <= 2; $x++) {
                                            ?> <tr>
                                                    <td class="text-center">
                                                        <?= $no++; ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <?= date('d M Y'); ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <?= date('h:m:s'); ?>
                                                    </td>
                                                    <td>
                                                        Banjir dan Longsor
                                                    </td>
                                                    <td>
                                                        Ciranjang
                                                    </td>
                                                    <td>
                                                        Sindang Jaya
                                                    </td>
                                                    <td>
                                                        Hutan Calingcing
                                                    </td>
                                                    <td class="text-center">
                                                        Dalam Penanganan
                                                    </td>
                                                    <td class="text-center">
                                                        <?= date('d M Y h:m:s'); ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <a class="btn btn-warning btn-sm mb-2 mt-1 mr-1" href="javascript:void(0)" title="Edit" onclick=""><i class="fa fa-edit"></i></a>
                                                        <?php if ($role == 99 or $role == 1) {
                                                        ?><?php if ($role == 99) {
                                                            ?>
                                                        <a class="btn btn-info btn-sm mr-1 mb-2" href="javascript:void(0)" title="Tanggapi" onclick="tanggapi()"><i class="fa fa-check"></i></a>
                                                        <a class="btn btn-danger btn-sm mr-1 mb-2" href="javascript:void(0)" title="Tolak" onclick="tolak()"><i class="fa fa-times"></i></a>
                                                    <?php } ?>
                                                    <?php if ($role == 1) {
                                                    ?>
                                                        <a class="btn btn-success btn-sm mr-1 mb-2" href="javascript:void(0)" title="Validasi" onclick="validasi()"><i class="fa fa-check"></i></a>
                                                <?php }
                                                        } ?>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--**********************************
            Content body end
        ***********************************-->
<script type="text/javascript">
    $(document).ready(function() {
        $('#myTable').dataTable({
            "aLengthMenu": [
                [10, 20, 50, 75, 100, -1],
                [10, 20, 50, 75, 100, "All"]
            ],
            "iDisplayLength": 20
        });
    });
    var baseurl = "<?php print base_url(); ?>";

    function tanggapi() {
        Swal.fire({
            title: 'Peringatan!',
            text: "Apakah anda ingin menanggapi Laporan Aduan ini?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Tanggapi!'
        }).then((result) => {
            if (result.isConfirmed) {

                return false;
            }
        });
    }

    function tolak() {
        Swal.fire({
            title: 'Peringatan!',
            text: "Apakah anda ingin menolak Laporan Aduan ini?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Tolak!'
        }).then((result) => {
            if (result.isConfirmed) {

                return false;
            }
        });
    }

    function validasi() {
        Swal.fire({
            title: 'Peringatan!',
            text: "Apakah anda ingin melakukan validasi Laporan Aduan ini?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Validasi!'
        }).then((result) => {
            if (result.isConfirmed) {

                return false;
            }
        });
    }
</script>
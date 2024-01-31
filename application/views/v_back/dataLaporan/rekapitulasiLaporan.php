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
                                <h4 class="card-title">Data Rekapitulasi Laporan</h4>
                                <a href="#" class="btn btn-info">Export Data <i class="fa fa-file-excel-o"></i> </a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover" id="myTable" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th class="text-center" width="3%">No</th>
                                                <th class="text-center" width="10%">Bulan</th>
                                                <th class="text-center" width="7%">Tahun</th>
                                                <th class="text-center" width="30%">Jenis Bencana</th>
                                                <th class="text-center" width="10%">Kecamatan</th>
                                                <th class="text-center" width="5%">Ajuan Laporan</th>
                                                <th class="text-center" width="5%">Dalam Penanganan</th>
                                                <th class="text-center" width="5%">Sudah Ditanggapi</th>
                                                <th class="text-center" width="10%">Total</th>
                                                <th class="text-center" width="15%">Tanggal Update</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-center">
                                                    1
                                                </td>
                                                <td class="text-center">
                                                    <?= date('F'); ?>
                                                </td>
                                                <td class="text-center">
                                                    <?= date('Y'); ?>
                                                </td>
                                                <td>
                                                    Kebakaran Hutan / Lahan (Faktor Alam)
                                                </td>
                                                <td>
                                                    Pasir Kuda
                                                </td>
                                                <td class="text-center">
                                                    5
                                                </td>
                                                <td class="text-center">
                                                    10
                                                </td>
                                                <td class="text-center">
                                                    25
                                                </td>
                                                <td class="text-center">
                                                    30
                                                </td>
                                                <td class="text-center">
                                                    <?= date('d M Y h:m:s'); ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">
                                                    2
                                                </td>
                                                <td class="text-center">
                                                    <?= date('F'); ?>
                                                </td>
                                                <td class="text-center">
                                                    <?= date('Y'); ?>
                                                </td>
                                                <td>
                                                    Banjir dan Tanah Longsor
                                                </td>
                                                <td>
                                                    Cianjur
                                                </td>
                                                <td class="text-center">
                                                    4
                                                </td>
                                                <td class="text-center">
                                                    8
                                                </td>
                                                <td class="text-center">
                                                    2
                                                </td>
                                                <td class="text-center">
                                                    14
                                                </td>
                                                <td class="text-center">
                                                    <?= date('d M Y h:m:s'); ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">
                                                    3
                                                </td>
                                                <td class="text-center">
                                                    <?= date('F'); ?>
                                                </td>
                                                <td class="text-center">
                                                    <?= date('Y'); ?>
                                                </td>
                                                <td>
                                                    Banjir Bandang
                                                </td>
                                                <td>
                                                    Cianjur
                                                </td>
                                                <td class="text-center">
                                                    4
                                                </td>
                                                <td class="text-center">
                                                    10
                                                </td>
                                                <td class="text-center">
                                                    10
                                                </td>
                                                <td class="text-center">
                                                    24
                                                </td>
                                                <td class="text-center">
                                                    <?= date('d M Y h:m:s'); ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">
                                                    4
                                                </td>
                                                <td class="text-center">
                                                    <?= date('F'); ?>
                                                </td>
                                                <td class="text-center">
                                                    <?= date('Y'); ?>
                                                </td>
                                                <td>
                                                    Banjir Bandang
                                                </td>
                                                <td>
                                                    Sukaluyu
                                                </td>
                                                <td class="text-center">
                                                    0
                                                </td>
                                                <td class="text-center">
                                                    2
                                                </td>
                                                <td class="text-center">
                                                    2
                                                </td>
                                                <td class="text-center">
                                                    4
                                                </td>
                                                <td class="text-center">
                                                    <?= date('d M Y h:m:s'); ?>
                                                </td>
                                            </tr>
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
</script>
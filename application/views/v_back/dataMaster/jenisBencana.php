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
                                <h4 class="card-title">Data Master Jenis Bencana</h4>
                                <a href="#" class="btn btn-secondary">+ Tambah Data</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover" id="myTable" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th class="text-center" width="10%">No</th>
                                                <th class="text-center" width="45%">Nama Bencana</th>
                                                <th class="text-center" width="20%">Tanggal Update</th>
                                                <th class="text-center" width="10%">Petugas</th>
                                                <th class="text-center" width="15%">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-center">
                                                    1
                                                </td>
                                                <td>
                                                    Kebakaran Hutan / Lahan (Faktor Alam)
                                                </td>
                                                <td class="text-center">
                                                    <?= date('d M Y h:m:s'); ?>
                                                </td>
                                                <td class="text-center">
                                                    Admin
                                                </td>
                                                <td class="text-center">
                                                    <a class="btn btn-warning btn-sm mb-2 mr-1" href="javascript:void(0)" title="Edit" onclick=""><i class="fa fa-edit"></i></a>
                                                    <a class="btn btn-danger btn-sm mr-1 mb-2" href="javascript:void(0)" title="Hapus" onclick=""><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">
                                                    2
                                                </td>
                                                <td>
                                                    Banjir dan Longsor
                                                </td>
                                                <td class="text-center">
                                                    <?= date('d M Y h:m:s'); ?>
                                                </td>
                                                <td class="text-center">
                                                    Admin
                                                </td>
                                                <td class="text-center">
                                                    <a class="btn btn-warning btn-sm mb-2 mr-1" href="javascript:void(0)" title="Edit" onclick=""><i class="fa fa-edit"></i></a>
                                                    <a class="btn btn-danger btn-sm mr-1 mb-2" href="javascript:void(0)" title="Hapus" onclick=""><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">
                                                    3
                                                </td>
                                                <td>
                                                    Banjir Bandang
                                                </td>
                                                <td class="text-center">
                                                    <?= date('d M Y h:m:s'); ?>
                                                </td>
                                                <td class="text-center">
                                                    Admin
                                                </td>
                                                <td class="text-center">
                                                    <a class="btn btn-warning btn-sm mb-2 mr-1" href="javascript:void(0)" title="Edit" onclick=""><i class="fa fa-edit"></i></a>
                                                    <a class="btn btn-danger btn-sm mr-1 mb-2" href="javascript:void(0)" title="Hapus" onclick=""><i class="fa fa-trash"></i></a>
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
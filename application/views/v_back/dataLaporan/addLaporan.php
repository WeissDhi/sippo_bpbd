<!--**********************************
            Content body start
    ***********************************-->
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">

        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Tambah Master Guru</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="<?= base_url('admin/ManajemenLaporan'); ?>">Manajemen Laporan</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0);">Tambah Laporan</a></li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 col-xxl-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                    </div>
                    <div class="card-body">
                        <form action="<?= site_url('admin/ManajemenLaporan'); ?>" id="form" method="POST" class="form-horizontal" data-parsley-validate="" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <h4 class="form-label mt-3">Waktu</h4>
                                    <hr>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label">Jenis Kejadian*</label>
                                        <select class="form-control form-control-sm select2" name="id_jenis_kejadian" required>
                                            <option value="" disabled selected>Pilih Jenis Kejadian </option>
                                            <option value="1">Kebakaran Hutan / Lahan (Faktor Alam)</option>
                                            <option value="2">Banjir dan Longsor</option>
                                            <option value="3">Banjir Bandang</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="col-auto">
                                        <label class="form-label">Tanggal (YYYY-MM-DD)*</label>
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                            <input name="tanggal" autocomplete="off" class="datepicker form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2">
                                    <div class="form-group">
                                        <label class="form-label">Waktu / Jam*</label>
                                        <input type="text" name="jam" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <h4 class="form-label mt-3">Lokasi</h4>
                                    <hr>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="form-group">
                                        <label class="form-label">Kecamatan*</label>
                                        <select class="form-control form-control-sm select2" name="id_kecamatan" required>
                                            <option value="" disabled selected>Pilih Kecamatan </option>
                                            <option value="1">Cianjur</option>
                                            <option value="2">Sukaluyu</option>
                                            <option value="3">Ciranjang</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="form-group">
                                        <label class="form-label">Desa*</label>
                                        <select class="form-control form-control-sm select2" name="id_desa" required>
                                            <option value="" disabled selected>Pilih Desa </option>
                                            <option value="1">Babakan Karet</option>
                                            <option value="2">Hegarmanah</option>
                                            <option value="3">Sindang Jaya</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Detail Alamat Lokasi</label>
                                        <textarea class="form-control" id="editor1" name="lokasi" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <h4 class="form-label mt-3">Detail Laporan</h4>
                                    <hr>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label">Sumber Informasi</label>
                                        <textarea class="form-control" id="editor2" name="sumber_informasi" rows="5"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label">Kronologis / Penyebab Kejadian</label>
                                        <textarea class="form-control" id="editor3" name="kronologis" rows="5"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label">Kondisi Mutahir / Terakhir</label>
                                        <textarea class="form-control" id="editor4" name="kondisi_mutahir" rows="5"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label">Dampak Kejadian</label>
                                        <textarea class="form-control" id="editor5" name="dampak_kejadian" rows="5"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label">Upaya</label>
                                        <textarea class="form-control" id="editor6" name="upaya" rows="5"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label">Kebutuhan Mendesak</label>
                                        <textarea class="form-control" id="editor7" name="kebutuhan_mendesak" rows="5"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label">Rekomendasi</label>
                                        <textarea class="form-control" id="editor8" name="rekomendasi" rows="5"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label">Petugas Terlibat</label>
                                        <textarea class="form-control" id="editor9" name="petugas_terlibat" rows="5"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <div class="form-group">
                                        <label class="form-label">UPLOAD FOTO 1</label>
                                        <input type="file" name="gambar_bukti" class="dropify" data-default-file="" data-height="220" data-max-file-size="2M" multiple>
                                        <span class="mb-0">Ext. *jpg, *png, Maks Size. 2Mb</span>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <div class="form-group">
                                        <label class="form-label">UPLOAD FOTO 3</label>
                                        <input type="file" name="gambar_bukti" class="dropify" data-default-file="">
                                        <span class="mb-0">Ext. *jpg, *png, Maks Size. 2Mb</span>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <div class="form-group">
                                        <label class="form-label">UPLOAD FOTO 4</label>
                                        <input type="file" name="gambar_bukti" class="dropify" data-default-file="">
                                        <span class="mb-0">Ext. *jpg, *png, Maks Size. 2Mb</span>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <div class="form-group">
                                        <label class="form-label">UPLOAD FOTO 5</label>
                                        <input type="file" name="gambar_bukti" class="dropify" data-default-file="">
                                        <span class="mb-0">Ext. *jpg, *png, Maks Size. 2Mb</span>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <hr>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="<?= base_url('admin/masterGuru'); ?>" class="btn btn-dark">Cancel</a>
                                </div>
                            </div>
                        </form>
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
        var editor_config = {
            height: "180px"
        };
        // CKEditor
        CKEDITOR.replace('editor1', editor_config);
        CKEDITOR.replace('editor2', editor_config);
        CKEDITOR.replace('editor3', editor_config);
        CKEDITOR.replace('editor4', editor_config);
        CKEDITOR.replace('editor5', editor_config);
        CKEDITOR.replace('editor6', editor_config);
        CKEDITOR.replace('editor7', editor_config);
        CKEDITOR.replace('editor8', editor_config);
        CKEDITOR.replace('editor9', editor_config);
    });
</script>
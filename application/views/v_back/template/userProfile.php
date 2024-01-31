<!--**********************************
            Content body start
    ***********************************-->
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">

        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Update Profile</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0);">Update Profile</a></li>
                </ol>
            </div>
        </div>
        <form action="<?= site_url('admin/UserProfile/update_profile'); ?>" id="form" method="POST" class="form-horizontal" data-parsley-validate="" enctype="multipart/form-data">
            <div class="row">
                <div class="col-xl-9 col-xxl-8 col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <?= $this->session->flashdata('message'); ?>
                            <input type="hidden" name="username" value="<?= $detail_user->username; ?>" readonly>
                            <div class="row">
                                <div class="col-lg-9 col-md-9 col-sm-9">
                                    <div class="form-group">
                                        <label class="form-label">Nama Lengkap*</label>
                                        <input type="text" name="full_name" class="form-control text-uppercase" value="<?= $detail_user->full_name; ?>" required>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <div class="form-group">
                                        <label class="form-label">Nomor Hp*</label>
                                        <input name="no_hp" type="text" maxlength="13" class="form-control" value="<?= $detail_user->no_hp; ?>" required>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Alamat*</label>
                                        <textarea class="form-control" name="alamat" id="alamat" rows="3" required><?= $detail_user->alamat; ?></textarea>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <hr>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="<?= base_url('admin/masterSiswa'); ?>" class="btn btn-dark">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-xxl-4 col-lg-4">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="text-center p-3 overlay-box" style="background-image: url(images/big/img1.jpg);">
                                    <div class="profile-photo">
                                        <?php if ($detail_user->photo_profile == '') { ?>
                                            <img src="<?= base_url('assets/back/'); ?>images/profile/default.jpg" width="100" class="img-fluid rounded-circle" alt="">
                                        <?php } else { ?>
                                            <img src="<?= base_url('assets/files/admin/profile/') . $detail_user->photo_profile; ?>" width="100" class="img-fluid rounded-circle" alt="">
                                        <?php } ?>
                                    </div>
                                    <h4 class="mt-3 mb-1 text-white"><?= $detail_user->full_name; ?><br><i class="blockquote-footer"><?= strtoupper($detail_user->role); ?> </i></h4>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 mt-3">
                                    <div class="form-group">
                                        <label class="ui-checkbox ui-checkbox-primary">
                                            <input type="checkbox" name="remove_foto" value="<?= $detail_user->photo_profile; ?>" /> <span class="input-span"></span>Hapus Foto saat disimpan
                                        </label>
                                        <hr>
                                        <label class="form-label">UPLOAD FOTO</label>
                                        <input type="file" name="photo_profile" class="dropify" data-default-file="">
                                        <span class="mb-0">Ekstensi (*jpg, *png)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<!--**********************************
            Content body end
        ***********************************-->
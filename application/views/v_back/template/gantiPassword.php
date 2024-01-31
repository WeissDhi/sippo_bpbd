<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Ubah Password</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Ubah Password</a></li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <?= $this->session->flashdata('message'); ?>
                        <?php
                        echo form_open_multipart('admin/userProfile/changePassword');
                        ?>
                        <div class="form-group">
                            <label for="password">Password Sekarang*</label>
                            <input type="password" class="form-control" id="current_password" name="current_password" placeholder="Password Anda Sekarang" required autofocus>
                        </div>
                        <?= form_error('current_password', '<small class="text-danger">', '</small>'); ?>

                        <div class="form-group">
                            <label for="password">Password Baru*</label>
                            <input type="password" class="form-control" id="new_password1" name="new_password1" placeholder="Password Baru" required>
                        </div>
                        <?= form_error('new_password1', '<small class="text-danger">', '</small>'); ?>

                        <div class="form-group">
                            <label for="password">Ulangi Password*</label>
                            <input type="password" class="form-control" id="new_password2" name="new_password2" placeholder="Ulangi Password" required>
                        </div>
                        <?= form_error('new_password2', '<small class="text-danger">', '</small>'); ?>
                        <hr>
                        <div class="form-group row">
                            <div class="col-sm-10 ml-sm-auto text-right">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Ubah Password</button>
                            </div>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--**********************************
            Content body end
        ***********************************-->
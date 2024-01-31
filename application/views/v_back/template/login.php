<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title><?= $title; ?></title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets/front/'); ?>images/logo_kemdikbud.png">
    <link href="<?= base_url('assets/back/'); ?>css/style.css" rel="stylesheet">

</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <div class="mb-4 text-center">
                                        <h4 class="text-center mb-3">Login <br>Sistem Informasi Pusat Pengendalian Operasional <br>(SI PPO) </h4>
                                        <a href="<?= base_url(''); ?>"><img class="logo-abbr" width="160" src="<?= base_url('assets/files/admin/konten/'); ?><?= $getDataKonten->logo_header; ?>" alt=""></a>
                                    </div>
                                    <?= $this->session->flashdata('message'); ?>
                                    <form action="<?php echo site_url() . 'auth' ?>" id="login-form" method="post">
                                        <div class="form-group">
                                            <label><strong>Email / Username</strong></label>
                                            <input type="text" name="email" class="form-control" value="" placeholder="Enter Username / Email Address...">
                                            <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Pasword</strong></label>
                                            <input type="password" name="password" class="form-control" placeholder="Password" value="">
                                            <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="<?= base_url('assets/back/'); ?>vendor/global/global.min.js"></script>
    <script src="<?= base_url('assets/back/'); ?>vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="<?= base_url('assets/back/'); ?>js/deznav-init.js"></script>
    <script src="<?= base_url('assets/back/'); ?>js/custom.min.js"></script>

</body>

</html>
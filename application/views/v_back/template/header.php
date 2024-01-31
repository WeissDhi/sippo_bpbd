<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>SIPPO | <?= $title; ?></title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets/back/'); ?>images/logo-header.png">
    <link rel="stylesheet" href="<?= base_url('assets/back/'); ?>vendor/bootstrap-select/dist/css/bootstrap-select.min.css">
    <link href="<?= base_url('assets/back/'); ?>vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/back/'); ?>css/style.css">
    <link href="<?= base_url('assets/back/'); ?>vendor/select2/css/select2.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/back/'); ?>vendor/sweetalert2/sweetalert2.min.css" rel="stylesheet">

    <!-- datepicker -->
    <link rel="stylesheet" href="<?= base_url('assets/back/'); ?>vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css">
    <!-- CKEDITOR-->
    <script src="<?= base_url('assets/back/'); ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/back/'); ?>vendor/moment/moment.min.js"></script>
    <script src="<?= base_url('assets/back/'); ?>vendor/ckeditor/ckeditor.js"></script>

    <style>
        div#outer {
            overflow: hidden;
        }

        .mapControls {
            margin-top: 10px;
            border: 1px solid transparent;
            border-radius: 2px 0 0 2px;
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            height: 32px;
            outline: none;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        }

        #searchMapInput {
            background-color: #fff;
            font-family: Roboto;
            font-size: 15px;
            font-weight: 300;
            margin-left: 8px;
            padding: 0 11px 0 13px;
            text-overflow: ellipsis;
            width: 95%;
        }

        #searchMapInput:focus {
            border-color: #4d90fe;
        }

        .map-responsive {
            overflow: hidden;
            padding-bottom: 50%;
            position: relative;
            height: 0;
        }

        .map-responsive iframe {
            left: 0;
            top: 0;
            height: 100%;
            width: 100%;
            position: absolute;
        }

        @media print {
            @page {
                margin-top: 0;
                margin-bottom: 0;
            }

            @page :footer {
                display: none
            }

            @page :header {
                display: none
            }

            body {
                padding-top: 72px;
                padding-bottom: 72px;
            }

            a[href]::after {
                content: none !important;
            }

            #Header,
            #Footer {
                display: none !important;
            }

            a[href]:after {
                content: none !important;
            }
        }
    </style>
</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="<?= base_url('dashboard'); ?>" class="brand-logo" style="background-color:white;">
                <img class="logo-abbr" src="<?= base_url('assets/files/admin/konten/'); ?><?= $getDataKonten->logo_header; ?>" alt="">
                <b class="brand-title ml-3 text-primary"><?= $getDataKonten->nama_instansi; ?></b>
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <a href="<?= base_url(''); ?>" class="btn btn-secondary" target="_blank"><i class="la la-external-link"></i></a>
                        </div>
                        <ul class="navbar-nav header-right">
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="<?= base_url('assets/back/'); ?>#" role="button" data-toggle="dropdown">
                                    <?= $detail_user->full_name; ?> &nbsp | &nbsp
                                    <?php if ($detail_user->photo_profile == '') { ?>
                                        <img src="<?= base_url('assets/back/'); ?>images/profile/pic1.jpg" width="20" alt="" />
                                    <?php } else { ?>
                                        <img src="<?= base_url('assets/files/admin/profile/') . $detail_user->photo_profile; ?>" width="20" alt="">
                                    <?php } ?>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="<?= base_url('admin/UserProfile'); ?>" class="dropdown-item ai-icon">
                                        <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="12" cy="7" r="4"></circle>
                                        </svg>
                                        <span class="ml-2">Profile </span>
                                    </a>
                                    <a href="<?= base_url('admin/UserProfile/changePassword'); ?>" class="dropdown-item ai-icon">
                                        <svg id="icon-key" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-key">
                                            <path d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4"></path>
                                        </svg>
                                        <span class="ml-2">Ubah Password </span>
                                    </a>
                                    <a href="<?= base_url('auth/logout'); ?>" class="dropdown-item ai-icon">
                                        <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out">
                                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                            <polyline points="16 17 21 12 16 7"></polyline>
                                            <line x1="21" y1="12" x2="9" y2="12"></line>
                                        </svg>
                                        <span class="ml-2">Logout </span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->
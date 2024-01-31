<?php
$page2 = $this->uri->segment(3);
$page = $this->uri->segment(2);
?>
<!--**********************************
            Sidebar start
        ***********************************-->
<div class="deznav">
    <div class="deznav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label first">Main Menu</li>
            <li <?= ($page == 'dashboard' || $page == '') ? 'class="mm-active active-no-child"' : ''; ?>>
                <a class="ai-icon <?= ($page == 'dashboard' || $page == '') ? 'mm-active"' : ''; ?> " href="<?= base_url('dashboard'); ?>" aria-expanded="false">
                    <i class="la la-home"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>
            <li <?= ($page == 'ManajemenLaporan') ? 'class="mm-active active-no-child"' : ''; ?>>
                <a class="ai-icon" href="<?= base_url('admin/ManajemenLaporan'); ?>" aria-expanded="false">
                    <i class="la la-th-list"></i>
                    <span class="nav-text">Manajemen Laporan</span>
                </a>
            </li>
            <?php if ($role == "99" or $role == "1") { ?>

                <li <?= ($page == 'RekapitulasiLaporan') ? 'class="mm-active active-no-child"' : ''; ?>>
                    <a class="ai-icon" href="<?= base_url('admin/RekapitulasiLaporan'); ?>" aria-expanded="false">
                        <i class="la la-map"></i>
                        <span class="nav-text">Rekapitulasi Laporan</span>
                    </a>
                </li>
                <?php if ($role == "99") { ?>
                    <li class="nav-label">Data Master</li>
                    <li <?= ($page == 'JenisBencana') ? 'class="mm-active active-no-child"' : ''; ?>>
                        <a class="ai-icon  <?= ($page == 'JenisBencana') ? 'mm-active"' : ''; ?> " href="<?= base_url('admin/JenisBencana'); ?>" aria-expanded="false">
                            <i class="la la-database"></i>
                            <span class="nav-text">Data Jenis Bencana</span>
                        </a>
                    </li>
                    <li <?= ($page == 'MasterKecamatan') ? 'class="mm-active active-no-child"' : ''; ?>>
                        <a class="ai-icon  <?= ($page == 'MasterKecamatan') ? 'mm-active"' : ''; ?> " href="<?= base_url('admin/MasterKecamatan'); ?>" aria-expanded="false">
                            <i class="la la-database"></i>
                            <span class="nav-text">Data Kecamatan</span>
                        </a>
                    </li>
                    <li <?= ($page == 'MasterDesa') ? 'class="mm-active active-no-child"' : ''; ?>>
                        <a class="ai-icon  <?= ($page == 'MasterDesa') ? 'mm-active"' : ''; ?> " href="<?= base_url('admin/MasterDesa'); ?>" aria-expanded="false">
                            <i class="la la-database"></i>
                            <span class="nav-text">Data Desa</span>
                        </a>
                    </li>
                    <li <?= ($page == 'ManajemenPengguna') ? 'class="mm-active active-no-child"' : ''; ?>>
                        <a class="ai-icon  <?= ($page == 'ManajemenPengguna') ? 'mm-active"' : ''; ?> " href="<?= base_url('admin/ManajemenPengguna'); ?>" aria-expanded="false">
                            <i class="la la-users"></i>
                            <span class="nav-text">Manajemen Pengguna</span>
                        </a>
                    </li>
                    <li class="nav-label">Manajemen Konten</li>
                    <li <?= ($page == 'ManajemenKonten') ? 'class="mm-active active-no-child"' : ''; ?>>
                        <a class="ai-icon  <?= ($page == 'ManajemenKonten') ? 'mm-active"' : ''; ?> " href="<?= base_url('admin/ManajemenKonten'); ?>" aria-expanded="false">
                            <i class="la la-cogs"></i>
                            <span class="nav-text">Manajemen Konten</span>
                        </a>
                    </li>
            <?php }
            } ?>
        </ul>
    </div>
</div>
<!--**********************************
            Sidebar end
        ***********************************-->
<!--**********************************
            Footer start
        ***********************************-->
<div class="footer">
    <div class="copyright">
        <p>Copyright © <a href="#" target="_blank"><?= $getDataKonten->nama_instansi; ?> 2023</a> </p>
    </div>
</div>
<!--**********************************
            Footer end
        ***********************************-->

</div>

<!--**********************************
        Main wrapper end
    ***********************************-->

<!--**********************************
        Scripts
    ***********************************-->
<!-- Required vendors -->
<script src="<?= base_url('assets/back/'); ?>vendor/global/global.min.js"></script>
<script src="<?= base_url('assets/back/'); ?>js/deznav-init.js"></script>
<script src="<?= base_url('assets/back/'); ?>vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="<?= base_url('assets/back/'); ?>js/custom.min.js"></script>
<script src="<?= base_url('assets/back/'); ?>vendor/parsleyjs/parsley.min.js"></script>
<script src="<?= base_url('assets/back/'); ?>vendor/sweetalert2/sweetalert2.min.js"></script>
<script src="<?= base_url('assets/back/'); ?>vendor/parsleyjs/parsley.min.js"></script>
<script src="<?= base_url('assets/back/'); ?>vendor/select2/js/select2.min.js"></script>
<!-- Chart Morris plugin files -->
<script src="<?= base_url('assets/back/'); ?>vendor/raphael/raphael.min.js"></script>
<script src="<?= base_url('assets/back/'); ?>vendor/morris/morris.min.js"></script>

<!-- Datatable -->
<script src="<?= base_url('assets/back/'); ?>vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/back/'); ?>js/plugins-init/datatables.init.js"></script>

<!-- Chart piety plugin files -->
<script src="<?= base_url('assets/back/'); ?>vendor/peity/jquery.peity.min.js"></script>

<!-- Demo scripts -->
<script src="<?= base_url('assets/back/'); ?>js/dashboard/dashboard-2.js"></script>

<!-- Svganimation scripts -->
<script src="<?= base_url('assets/back/'); ?>vendor/svganimation/vivus.min.js"></script>
<script src="<?= base_url('assets/back/'); ?>vendor/svganimation/svg.animation.js"></script>

<!-- datepicker -->
<script src="<?= base_url('assets/back/'); ?>vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

<script>
    $('.select2').select2();
    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd'
    })


    function swalert(status, pesan) {

        if (status == 'success') {
            Swal.fire({
                icon: 'success',
                title: status,
                text: pesan,
                showConfirmButton: false,
                timer: 2000,
            })
        } else if (status == 'error') {
            Swal.fire({
                icon: 'error',
                title: status,
                text: pesan,
                showConfirmButton: false,
                timer: 2000,
            })
        } else {
            Swal.fire({
                icon: 'warning',
                title: status,
                text: pesan,
                timer: 2000,
            })
        }
    }
</script>
</body>

</html>
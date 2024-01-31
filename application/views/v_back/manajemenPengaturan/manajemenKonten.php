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
                       <li class="breadcrumb-item"><a href="javascript:void(0);"><?= $breadcrumb; ?></a></li>
                   </ol>
               </div>
           </div>

           <div class="row">
               <div class="col-lg-12">
                   <div class="row tab-content">
                       <div id="list-view" class="tab-pane fade active show col-lg-12">
                           <div class="card">
                               <form action="<?= site_url('admin/ManajemenKonten/updateItem'); ?>" method="POST" class="form-horizontal" data-parsley-validate="" enctype="multipart/form-data">
                                   <div class="card-header">
                                       <h4 class="card-title">Manajemen Konten</h4>
                                       <div class="form-group text-right">
                                           <button type="submit" class="btn btn-primary text-white"> <i class="fa fa-edit"></i> Update</button>
                                       </div>
                                   </div>
                                   <div class="card-body">
                                       <div class="row">
                                           <div class="col-lg-6">
                                               <div class="form-group">
                                                   <label class="form-label">Nama Instansi/Web*</label>
                                                   <input name="nama_instansi" type="text" class="form-control" value="<?= $getDataKonten->nama_instansi; ?>" required>
                                               </div>
                                           </div>
                                           <div class="col-lg-6">
                                               <div class="form-group">
                                                   <label class="form-label">API Key Maps*</label>
                                                   <input name="api_key" type="text" class="form-control" value="<?= $getDataKonten->api_key; ?>" required>
                                               </div>
                                           </div>
                                           <div class="col-lg-6">
                                               <div class="form-group">
                                                   <label class="form-label">Alamat*</label>
                                                   <textarea class="form-control" id="alamat" name="alamat" rows="5" required><?= $getDataKonten->alamat; ?></textarea>
                                               </div>
                                           </div>
                                           <div class="col-lg-3">
                                               <div class="form-group">
                                                   <label class="form-label">No Telp*</label>
                                                   <input name="no_telp" type="text" class="form-control" value="<?= $getDataKonten->no_telp; ?>" required>
                                               </div>
                                               <div class="form-group">
                                                   <label class="form-label">No Telp 2</label>
                                                   <input name="no_telp2" type="text" class="form-control" value="<?= $getDataKonten->no_telp2; ?>">
                                               </div>
                                           </div>
                                           <div class="col-lg-3">
                                               <div class="form-group">
                                                   <label class="form-label">Email*</label>
                                                   <input name="email1" type="text" class="form-control" value="<?= $getDataKonten->email1; ?>" required>
                                               </div>
                                               <div class="form-group">
                                                   <label class="form-label">Email 2</label>
                                                   <input name="email2" type="text" class="form-control" value="<?= $getDataKonten->email2; ?>">
                                               </div>
                                           </div>
                                           <div class="col-lg-12">
                                               <hr>
                                           </div>
                                           <div class="col-lg-6">
                                               <label class="form-label">Logo Front Page*</label>
                                               <div class="form-group">
                                                   <?php if ($getDataKonten->logo != '') { ?>
                                                       <img src="<?= base_url('assets/files/admin/konten/') . $getDataKonten->logo; ?>" width="100" class="img-fluid mb-2" alt="">
                                                       <br>
                                                       <label class="ui-checkbox ui-checkbox-primary">
                                                           <input type="checkbox" name="remove_logo" value="<?= $getDataKonten->logo; ?>" /> <span class="input-span"></span>Hapus Gambar Logo saat disimpan
                                                       </label>
                                                   <?php } else { ?>
                                                       <img src="<?= base_url('assets/back/'); ?>images/profile/default.jpg" width="100" alt="" /><br>
                                                       <i class="text-danger">Not Set</i>
                                                   <?php } ?>
                                                   <hr>
                                                   <label class="form-label">UPLOAD GAMBAR LOGO</label>
                                                   <input type="file" name="logo" class="dropify" data-default-file=""><br>
                                                   <span class="mb-0">Ext. *jpg, *png, Maks Size. 5Mb</span>
                                               </div>
                                           </div>
                                           <div class="col-lg-6">
                                               <label class="form-label">Logo Admin*</label>
                                               <div class="form-group">
                                                   <?php if ($getDataKonten->logo_header != '') { ?>
                                                       <img src="<?= base_url('assets/files/admin/konten/') . $getDataKonten->logo_header; ?>" width="100" class="img-fluid mb-2" alt="">
                                                       <br>
                                                       <label class="ui-checkbox ui-checkbox-primary">
                                                           <input type="checkbox" name="remove_logo_header" value="<?= $getDataKonten->logo_header; ?>" /> <span class="input-span"></span>Hapus Gambar Logo Admin saat disimpan
                                                       </label>
                                                   <?php } else { ?>
                                                       <img src="<?= base_url('assets/back/'); ?>images/profile/default.jpg" width="100" alt="" /><br>
                                                       <i class="text-danger">Not Set</i>
                                                   <?php } ?>
                                                   <hr>
                                                   <label class="form-label">UPLOAD GAMBAR LOGO ADMIN</label>
                                                   <input type="file" name="logo_header" class="dropify" data-default-file=""><br>
                                                   <span class="mb-0">Ext. *jpg, *png, Maks Size. 5Mb</span>
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                               </form>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>

   <?php
    if (!empty($this->session->flashdata('notif'))) {
        $notif = $this->session->flashdata('notif');
        $status_notif = $notif['status'];
        $pesan_notif = $notif['pesan'];
    } else {
        $status_notif = "";
        $pesan_notif = "";
    }
    ?>
   <script type="text/javascript">
       var baseurl = "<?php echo base_url(); ?>";
       var status_notif = "<?= $status_notif; ?>";
       var pesan_notif = "<?= $pesan_notif; ?>";

       $(document).ready(function() {

           if (status_notif != "" && pesan_notif != "") {
               swalert(status_notif, pesan_notif);
           }

       });
   </script>
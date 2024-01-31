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
                               <div class="card-header">
                                   <h4 class="card-title">Data Akun Admin </h4>
                                   <button class="btn btn-secondary btn-round ml-auto" onclick="add_users()">
                                       <i class="fa fa-plus"></i>
                                       Tambah Pengguna
                                   </button>
                               </div>
                               <div class="card-body">
                                   <div class="table-responsive">
                                       <table class="table table-striped  table-hover" width="100%" id="myTable">
                                           <thead>
                                               <tr>
                                                   <th class="text-center text-white" style="background-color:#143b64" width="5%">No</th>
                                                   <th class="text-center text-white" style="background-color:#143b64" width="15%">Username</th>
                                                   <th class="text-center text-white" style="background-color:#143b64" width="30%">Email / No Hp</th>
                                                   <th class="text-center text-white" style="background-color:#143b64" width="15%">Full Name</th>
                                                   <th class="text-center text-white" style="background-color:#143b64" width="5%">Role</th>
                                                   <th class="text-center text-white" style="background-color:#143b64" width="5%">Status Aktif</th>
                                                   <th class="text-center text-white" style="background-color:#143b64" width="5%">Status Pass</th>
                                                   <th class="text-center text-white" style="background-color:#143b64" width="15%">Tanggal Update</th>
                                                   <th class="text-center text-white" style="background-color:#143b64" width="5%">Aksi</th>
                                               </tr>
                                           </thead>
                                           <tbody>

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

   <!-- Bootstrap modal -->
   <div class="modal fade" id="modal_form">
       <div class="modal-dialog modal-md" role="document">
           <div class="modal-content modal-content-demo">
               <div class="modal-header" id="header-modal">
                   <h3 class="modal-title w-100 text-center text-white">Manajemen User Form</h3>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
               </div>
               <div class="modal-body form">
                   <form action="#" id="form" class="form-horizontal" data-parsley-validate="">
                       <input type="hidden" value="" name="id" />
                       <div class="form-group">
                           <label>Username*</label>
                           <input class="form-control bg-dark text-white" type="text" name="username" id="username" placeholder="Username" autocomplete="off" readonly>
                       </div>
                       <div class="form-group">
                           <label>Full Name*</label>
                           <input class="form-control" type="text" name="full_name" placeholder="Full Name" required>
                       </div>
                       <div class="form-group">
                           <label>Email*</label>
                           <input class="form-control" type="email" name="email" placeholder="Email address" autocomplete="off" required>
                       </div>
                       <div class="form-group">
                           <label>No Hp*</label>
                           <input class="form-control" type="text" name="no_hp" placeholder="No Handphone" required>
                       </div>
                       <div class="form-group">
                           <label for="smallSelect">Role*</label>
                           <select class="form-control select2" style="width:100%" name="id_role" id="id_role" required="">
                               <option value="">Pilih Salah Satu</option>
                               <?php foreach ($getRole as $rowRole) :
                                ?>
                                   <option value="<?= $rowRole->id_role; ?>">
                                       <?= $rowRole->role; ?>
                                   </option>
                               <?php endforeach; ?>
                           </select>
                       </div>
                       <div class="form-group">
                           <label for="smallSelect">Status Aktif*</label>
                           <select class="form-control select2" style="width:100%" name="status_aktif" id="status_aktif" required="">
                               <option value="">Pilih Salah Satu</option>
                               <option value="yes"> Yes </option>
                               <option value="no"> No </option>
                           </select>
                       </div>
                       <div class="form-group">
                           <label for="smallSelect">Status Password*</label>
                           <select class="form-control select2" style="width:100%" name="status_password" id="status_password" required="">
                               <option value="">Pilih Salah Satu</option>
                               <option value="normal"> Normal </option>
                               <option value="once"> Once </option>
                           </select>
                       </div>
                       <div class="form-group">
                           <label>Alamat</label>
                           <textarea class="form-control" rows="5" name="alamat" placeholder="Alamat"></textarea>
                       </div>
                       <div>
                           <label>Password Default : BpbdCianjur2023</label>
                       </div>
                   </form>
               </div>
               <div class="modal-footer">
                   <button type="button" class="btn btn-danger" data-dismiss="modal">Batalkan</button>
                   <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Simpan</button>
               </div>
           </div><!-- /.modal-content -->
       </div><!-- /.modal-dialog -->
   </div><!-- /.modal -->
   <!-- End Bootstrap modal -->

   <script type="text/javascript">
       var baseurl = "<?php print base_url('admin/manajemenPengguna'); ?>";

       var save_method; //for save method string
       var table;

       $(document).ready(function() {
           //datatables
           table = $('#myTable').DataTable({

               "processing": true, //Feature control the processing indicator.
               "serverSide": true, //Feature control DataTables' server-side processing mode.
               "order": [], //Initial no order.

               // Load data for the table's content from an Ajax source
               "ajax": {
                   "url": baseurl + "/ajax_list",
                   "type": "POST"
               },

               //Set column definition initialisation properties.
               "columnDefs": [{
                   "targets": [-1], //last column
                   "orderable": false, //set not orderable
               }, ],

           });

       });

       function add_users() {
           save_method = 'add';
           $('#form')[0].reset(); // reset form on modals
           $('#id_role').val('');
           $('#id_role').trigger('change');
           $('#status_aktif').val('');
           $('#status_aktif').trigger('change');
           $('#status_password').val('');
           $('#status_password').trigger('change');
           $("#username").attr("readonly", false);
           $("#username").removeClass('bg-dark text-white');
           $('.form-group').removeClass('has-error'); // clear error class
           $('.help-block').empty(); // clear error string  
           $('#modal_form').modal('show'); // show bootstrap modal
           $("#header-modal").removeClass('btn-warning').addClass('btn-secondary');
           $('.modal-title').text('Tambah User'); // Set Title to Bootstrap modal title
       }

       function edit_users(id) {
           save_method = 'update';
           $('#form')[0].reset(); // reset form on modals
           $('.form-group').removeClass('has-error'); // clear error class
           $('.help-block').empty(); // clear error string
           $("#username").addClass('bg-dark text-white');
           $("#username").attr("readonly", true);

           //Ajax Load data from ajax
           $.ajax({
               url: baseurl + "/ajax_edit/" + id,
               type: "GET",
               dataType: "JSON",
               success: function(data) {

                   // $('[name="username"]').prop("disabled", true);
                   $('[name="id"]').val(data.id_users);
                   $('[name="username"]').val(data.username);
                   $('[name="full_name"]').val(data.full_name);
                   $('[name="email"]').val(data.email);
                   $('[name="no_hp"]').val(data.no_hp);
                   $('[name="alamat"]').val(data.alamat);

                   $('#id_role').val(data['id_role']);
                   $('#id_role').trigger('change');
                   $('#status_aktif').val(data['status_aktif']);
                   $('#status_aktif').trigger('change');
                   $('#status_password').val(data['status_pass']);
                   $('#status_password').trigger('change');

                   $("#header-modal").removeClass('btn-secondary').addClass('btn-warning');
                   $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
                   $('.modal-title').text('Edit User'); // Set title to Bootstrap modal title

               },
               error: function(jqXHR, textStatus, errorThrown) {
                   console.log(jqXHR.responseText);
                   alert('Error Get Data');
               }
           });
       }

       function reload_table() {
           table.ajax.reload(null, false); //reload datatable ajax 
       }

       function save() {
           var form = $('#form').parsley();
           form.validate();

           if (form.isValid()) {

               $('#btnSave').text('saving...'); //change button text
               $('#btnSave').attr('disabled', true); //set button disable 
               var url;

               if (save_method == 'add') {
                   url = baseurl + "/ajax_add";
               } else {
                   url = baseurl + "/ajax_update";
               }
               $.ajax({
                   url: url,
                   type: "POST",
                   data: $('#form').serialize(),
                   dataType: "JSON",
                   success: function(data) {

                       status = data['status'];
                       pesan = data['pesan'];
                       swalert(status, pesan);

                       if (data.status) //if success close modal and reload ajax table
                       {
                           $('#modal_form').modal('hide');
                           reload_table();
                       }

                       $('#btnSave').text('save'); //change button text
                       $('#btnSave').attr('disabled', false); //set button enable 

                   },
                   error: function(jqXHR, textStatus, errorThrown) {
                       console.log(jqXHR.responseText);
                       alert('Error adding / update data');
                       $('#btnSave').text('save'); //change button text
                       $('#btnSave').attr('disabled', false); //set button enable 

                   }
               });
           }
       }

       function delete_users(id) {
           Swal.fire({
               title: 'Peringatan!',
               text: "Apakah anda yakin akan menghapus Data ini!",
               icon: "warning",
               showCancelButton: true,
               confirmButtonColor: '#3085d6',
               cancelButtonColor: '#d33',
               confirmButtonText: 'Yes, delete it!'
           }).then((result) => {
               if (result.isConfirmed) {
                   console.log(id);
                   $.ajax({
                       method: "POST",
                       url: baseurl + "/ajax_delete/" + id,
                       dataType: "JSON",
                       cache: false,
                       success: function(data) {
                           $('#modal_form').modal('hide');
                           reload_table();
                           status = data['status'];
                           pesan = data['pesan'];
                           swalert(status, pesan);
                       },
                       error: function(jqXHR, textStatus, errorThrown) {
                           status = 'error';
                           pesan = "Delete Data gagal, karena id colom ini digunakan pada table lain!";
                           swalert(status, pesan);
                       }
                   });
                   return false;
               }
           });
       }

       function reset_password(id) {
           Swal.fire({
               title: 'Peringatan!',
               text: "Apakah anda yakin akan Mereset User ini menjadi BpbdCianjur2023?",
               icon: "warning",
               showCancelButton: true,
               confirmButtonColor: '#3085d6',
               cancelButtonColor: '#d33',
               confirmButtonText: 'Yes, Reset it!'
           }).then((result) => {
               if (result.isConfirmed) {
                   // console.log(id);
                   $.ajax({
                       method: "POST",
                       url: baseurl + "/reset_password/" + id,
                       dataType: "JSON",
                       cache: false,
                       success: function(data) {
                           $('#modal_form').modal('hide');
                           reload_table();
                           status = data['status'];
                           pesan = data['pesan'];
                           swalert(status, pesan);
                       },
                       error: function(jqXHR, textStatus, errorThrown) {
                           alert('Error deleting data');
                       }
                   });
                   return false;
               }
           });
       }
   </script>
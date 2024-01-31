<?php

function cek_otentikasi()
{
    $this_ci = get_instance();

    $this_ci->load->model("user_model");
    if ($this_ci->user_model->isNotLogin()){
        $this_ci->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable fade show">
        <button class="close" data-dismiss="alert" aria-label="Close">×</button><strong>Not Login!</strong> Upss, Anda tidak memiliki Akses, Silahkan Login dengan benar!</div>');
        redirect('auth');
    }

    $role =  $this_ci->session->userdata('role');

    if ($role != 1 and $role != 2 and $role != 3 and $role != 4 and $role != 99) {
        $this_ci->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable fade show">
        <button class="close" data-dismiss="alert" aria-label="Close">×</button><strong>Not Login!</strong> Upss, Anda tidak memiliki Akses, Silahkan Login dengan benar!</div>');
        redirect('auth');
    }
}

function cek_status_pass()
{
    $this_ci = get_instance();
    $this_ci->load->model("user_model");

    $status_pass =  $this_ci->user_model->cek_status_pass($this_ci->session->userdata('id_users'));
    if ($status_pass == 'once') {
        $this_ci->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissable fade show">
        <button class="close" data-dismiss="alert" aria-label="Close">×</button><strong><strong>Warning!</strong> Silahkan ubah terlebih dahulu password default anda!</div>');

        redirect(site_url('admin/UserProfile/changePassword'));
    }
}

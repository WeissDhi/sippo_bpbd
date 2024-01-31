<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserProfile extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_otentikasi();
        $this->load->model("user_model");
        $this->load->model('m_konten');
    }

    public function header()
    {
        $role = $this->session->userdata('role');
        $id_users = $this->session->userdata('id_users');
        $data = array(
            'role' => $role,
            'detail_user' => $this->user_model->data_user($id_users),
            'getDataKonten' => $this->m_konten->getDataKonten('1')->row(),
            'title' => 'User Profile'
        );

        $this->load->view('v_back/template/header', $data);
        $this->load->view('v_back/template/sidebar', $data);
    }

    public function index()
    {
        $this->header();
        $this->load->view('v_back/template/userProfile');
        $this->load->view('v_back/template/footer');
    }

    public function changePassword()
    {

        $id_users = $this->session->userdata('id_users');
        $data_user = $this->user_model->data_user($id_users);

        $this->form_validation->set_rules('current_password', 'Current Password', 'trim|required');
        $this->form_validation->set_rules('new_password1', 'New Password', 'trim|required|min_length[6]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'New Password', 'trim|required|min_length[6]|matches[new_password1]');

        if ($this->form_validation->run() == false) {

            $role = $this->session->userdata('role');
            $data = array(
                'role' => $role,
                'detail_user' => $this->user_model->data_user($id_users),
                'getDataKonten' => $this->m_konten->getDataKonten('1')->row(),
                'title' => 'Ubah Password',
                'breadcrumb' => 'Ubah Password'
            );

            $this->load->view('v_back/template/header', $data);
            $this->load->view('v_back/template/sidebar', $data);
            $this->load->view('v_back/template/gantiPassword');
            $this->load->view('v_back/template/footer');
        } else {

            $current_password     = $this->input->post('current_password');
            $new_password         = $this->input->post('new_password1');

            if (!password_verify($current_password, $data_user->password)) {

                $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissable fade show">
                <button class="close" data-dismiss="alert" aria-label="Close">×</button>
                <strong>Warning!</strong>Password anda sebelumnya salah!</div>');
                redirect('admin/userProfile/changePassword');
            } else {

                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissable fade show">
                    <button class="close" data-dismiss="alert" aria-label="Close">×</button>
                    <strong>Warning!</strong>Password baru anda tidak boleh sama dengan yang sedang aktif!</div>');
                    redirect('admin/userProfile/changePassword');
                } else {

                    //Password sudah ok
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->set('status_pass', 'normal');
                    $this->db->where('id_users', $id_users);
                    $update = $this->db->update('tb_users');

                    if ($update) {
                        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable fade show">
                        <button class="close" data-dismiss="alert" aria-label="Close">×</button>
                        <strong>Success!</strong> Ubah Password Berhasil!</div>');
                        redirect('admin/userProfile/changePassword');
                    }
                }
            }
        }
    }

    public function update_profile()
    {
        if (!empty($this->input->post('full_name'))) {

            $id_users = $this->session->userdata('id_users');
            $full_name = $this->input->post('full_name', true);
            $email = $this->input->post('email', true);
            $no_hp = $this->input->post('no_hp', true);
            $username = $this->input->post('username', true);
            $alamat = $this->input->post('alamat', true);
            $datetime = date("Y-m-d H:i:s");

            $cek_email = $this->user_model->cek_email($email)->num_rows();

            if ($cek_email > 1) {
                $response = array('status' => 'Error', 'pesan' => 'Maaf, alamat email ' . $email . ' sudah digunakan. Silahkan ganti dengan alamat email lain!');
                echo $this->session->set_flashdata('notif', $response);
                redirect('admin/userProfile');
            } else {

                $dataUser = $this->user_model->data_user($id_users);
                $fileName = date('Ymd') . '_' . $dataUser->full_name . '_' . rand();

                $data = array(
                    // 'username' => $username,
                    'full_name' => $full_name,
                    'email' => $email,
                    'no_hp' => $no_hp,
                    'alamat' => $alamat,
                    'tgl_update' => $datetime,
                );

                //Remove Lampiran 1
                if ($this->input->post('remove_foto')) // if remove lampiran checked
                {
                    if (file_exists('./assets/files/admin/profile/' . $this->input->post('remove_foto')) && $this->input->post('remove_foto'))
                        unlink('./assets/files/admin/profile/' . $this->input->post('remove_foto'));
                    $data['photo_profile'] = '';
                }

                if (!empty($_FILES['photo_profile']['name'])) {
                    $upload1 = $this->_do_upload($fileName);

                    //delete file  
                    if (file_exists('./assets/files/admin/profile/' . $dataUser->photo_profile) && $dataUser->photo_profile)
                        unlink('./assets/files/admin/profile/' . $dataUser->photo_profile);

                    $data['photo_profile'] = $upload1;
                }

                if (!empty($id_users)) {
                    $update = $this->user_model->update_users($id_users, $data);
                } else {
                    redirect('admin/userProfile');
                }

                if ($update) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable fade show">
                        <button class="close" data-dismiss="alert" aria-label="Close">×</button>
                        <strong>Success!</strong> Profile Berhasil di Update!</div>');
                    redirect('admin/userProfile');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable fade show">
                    <button class="close" data-dismiss="alert" aria-label="Close">×</button>
                    <strong>Error!</strong> Profile Gagal di Update!</div>');
                    redirect('admin/userProfile');
                }
            }
        } else {
            redirect('admin/userProfile');
        }
    }

    private function _do_upload($fileName)
    {
        $config['upload_path']          = './assets/files/admin/profile/';
        $config['allowed_types']        = 'gif|jpg|jpeg|png|PNG|JPG|JPEG';
        $config['max_size']             = 2000; //set max size allowed in Kilobyte
        // $config['max_width']            = 1000; // set max width image allowed
        // $config['max_height']           = 1000; // set max height allowed
        $config['file_name']            = $fileName; //just milisecond timestamp fot unique name

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('photo_profile')) //upload and validate
        {
            $data['inputerror'][] = 'photo_profile';
            $data['error_string'][] = 'Upload error: ' . $this->upload->display_errors('', ''); //show ajax error
            $data['status'] = FALSE;
            echo json_encode($data);
            exit();
        }
        return $this->upload->data('file_name');
    }
}

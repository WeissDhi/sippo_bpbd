<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class ManajemenKonten extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_otentikasi();
        cek_status_pass();
        $this->load->model('user_model');
        $this->load->model("m_konten");
    }

    public function header()
    {
        $id_users = $this->session->userdata('id_users');
        $role = $this->session->userdata('role');
        $data = array(
            'role' => $role,
            'detail_user' => $this->user_model->data_user($id_users),
            'getDataKonten' => $this->m_konten->getDataKonten('1')->row(),
            'title' => 'Manajemen Konten',
            'breadcrumb' => 'Manajemen Konten'
        );

        $this->load->view('v_back/template/header', $data);
        $this->load->view('v_back/template/sidebar', $data);
    }

    public function index()
    {
        $this->header();
        $this->load->view('v_back/manajemenPengaturan/manajemenKonten');
        $this->load->view('v_back/template/footer');
    }

    public function updateItem()
    {
        $id_users = $this->session->userdata('id_users');
        $datetime = date("Y-m-d H:i:s");
        $fileName4 = date('Ymd') . '_logo_' . rand();
        $fileName5 = date('Ymd') . '_logo_header_' . rand();

        $fileLogo = $this->m_konten->getDataKonten('1')->row();

        $data = array(
            'nama_instansi' => $this->input->post('nama_instansi'),
            'api_key' => $this->input->post('api_key'),
            'no_telp' => $this->input->post('no_telp'),
            'no_telp2' => $this->input->post('no_telp2'),
            'email1' => $this->input->post('email1'),
            'email2' => $this->input->post('email2'),
            'id_users' => $id_users,
            'tgl_update' => $datetime
        );

        //Remove Lampiran 1
        if ($this->input->post('remove_logo')) // if remove lampiran checked
        {
            if (file_exists('./assets/files/admin/konten/' . $this->input->post('remove_logo')) && $this->input->post('remove_logo'))
                unlink('./assets/files/admin/konten/' . $this->input->post('remove_logo'));
            $data['logo'] = '';
        }

        if (!empty($_FILES['logo']['name'])) {
            $upload1 = $this->_do_upload4($fileName4);

            //delete file  
            if (file_exists('./assets/files/admin/konten/' . $fileLogo->logo) && $fileLogo->logo)
                unlink('./assets/files/admin/konten/' . $fileLogo->logo);

            $data['logo'] = $upload1;
        }

        //Remove Lampiran 2
        if ($this->input->post('remove_logo_header')) // if remove lampiran checked
        {
            if (file_exists('./assets/files/admin/konten/' . $this->input->post('remove_logo_header')) && $this->input->post('remove_logo_header'))
                unlink('./assets/files/admin/konten/' . $this->input->post('remove_logo_header'));
            $data['logo_header'] = '';
        }

        if (!empty($_FILES['logo_header']['name'])) {
            $upload2 = $this->_do_upload5($fileName5);

            //delete file  
            if (file_exists('./assets/files/admin/konten/' . $fileLogo->logo_header) && $fileLogo->logo_header)
                unlink('./assets/files/admin/konten/' . $fileLogo->logo_header);

            $data['logo_header'] = $upload2;
        }

        $update = $this->m_konten->update('1', $data);

        if ($update) {
            $response = array('status' => 'success', 'pesan' => 'Data item Berhasil di Update!');
            echo $this->session->set_flashdata('notif', $response);
            redirect('admin/ManajemenKonten');
        } else {
            $response = array('status' => 'error', 'pesan' => 'Upss, Data item Gagal di Update!');
            echo $this->session->set_flashdata('notif', $response);
            redirect('admin/ManajemenKonten');
        }
    }

    private function _do_upload4($fileName4)
    {
        $config['upload_path']          = './assets/files/admin/konten/';
        $config['allowed_types']        = 'gif|jpg|jpeg|png|PNG|JPG|JPEG';
        $config['max_size']             = 5046; //set max size allowed in Kilobyte
        // $config['max_width']            = 1000; // set max width image allowed
        // $config['max_height']           = 1000; // set max height allowed
        $config['file_name']            = $fileName4; //just milisecond timestamp fot unique name

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('logo')) //upload and validate
        {
            $data['inputerror'][] = 'logo';
            $data['error_string'][] = 'Upload error: ' . $this->upload->display_errors('', ''); //show ajax error
            $data['status'] = FALSE;
            echo json_encode($data);
            exit();
        }
        return $this->upload->data('file_name');
    }

    private function _do_upload5($fileName5)
    {
        $config['upload_path']          = './assets/files/admin/konten/';
        $config['allowed_types']        = 'gif|jpg|jpeg|png|PNG|JPG|JPEG';
        $config['max_size']             = 5046; //set max size allowed in Kilobyte
        // $config['max_width']            = 1000; // set max width image allowed
        // $config['max_height']           = 1000; // set max height allowed
        $config['file_name']            = $fileName5; //just milisecond timestamp fot unique name

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('logo_header')) //upload and validate
        {
            $data['inputerror'][] = 'logo_header';
            $data['error_string'][] = 'Upload error: ' . $this->upload->display_errors('', ''); //show ajax error
            $data['status'] = FALSE;
            echo json_encode($data);
            exit();
        }
        return $this->upload->data('file_name');
    }
}

<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class ManajemenPengguna extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_otentikasi();
        cek_status_pass();
        $this->load->model('user_model');
        $this->load->model('m_konten');
    }

    public function header()
    {
        $id_users = $this->session->userdata('id_users');
        $role = $this->session->userdata('role');
        $data = array(
            'role' => $role,
            'detail_user' => $this->user_model->data_user($id_users),
            'getDataKonten' => $this->m_konten->getDataKonten('1')->row(),
            'getRole' => $this->user_model->getAllRole()->result(),
            'title' => 'Manajemen',
            'breadcrumb' => 'Manajemen Pengguna'
        );

        $this->load->view('v_back/template/header', $data);
        $this->load->view('v_back/template/sidebar', $data);
    }

    public function index()
    {
        $this->header();
        $this->load->view('v_back/manajemenPengaturan/manajemenPengguna');
        $this->load->view('v_back/template/footer');
    }

    public function ajax_list()
    {
        $list = $this->user_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $users) {
            if ($users->id_role == '99') {
                $tombolDelete = "";
            } else {
                if ($this->session->userdata('id_users') == $users->id_users) {
                    $tombolDelete = "";
                } else {
                    $tombolDelete = '<a class="btn btn-danger btn-sm" href="javascript:void(0)" title="Hapus" onclick="delete_users(' . "'" . $users->id_users . "'" . ')"> <i class="fa fa-trash"></i></a>';
                }
            }

            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $users->username;
            $row[] = '<i class="fa fa-envelope"></i> : ' . $users->email . '<br><i class="fa fa-phone"></i> : ' . $users->no_hp;
            $row[] = $users->full_name;
            $row[] = strtoupper($users->sort_name);
            $row[] = strtoupper($users->status_aktif);
            $row[] = strtoupper($users->status_pass);
            $row[] = date('d F Y h:m:s ', strtotime($users->tgl_update));

            //add html for action
            $row[] = '<a class="btn btn-warning btn-sm mb-2 mt-1 mr-1" href="javascript:void(0)" title="Edit" onclick="edit_users(' . "'" . $users->id_users . "'" . ')"><i class="fa fa-edit"></i></a>
                  <a class="btn btn-info btn-sm mr-1 mb-2" href="javascript:void(0)" title="Reset Password" onclick="reset_password(' . "'" . $users->id_users . "'" . ')"><i class="fa fa-recycle"></i></a>' . $tombolDelete;

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->user_model->count_all(),
            "recordsFiltered" => $this->user_model->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_edit($id)
    {
        $data = $this->user_model->get_by_id($id);
        echo json_encode($data);
    }

    public function ajax_add()
    {
        if (!empty($this->input->post('username'))) {

            $cek_username = $this->user_model->cek_username($this->input->post('username'))->num_rows();
            $cek_email = $this->user_model->cek_email($this->input->post('email'))->num_rows();

            if ($cek_username > 0) {
                $response = array('status' => 'error', 'pesan' => 'Maaf, Username ' . $this->input->post('username') . ' sudah digunakan. Silahkan ganti dengan username lain!');
                echo json_encode($response);
            } else {
                if ($cek_email > 0) {
                    $response = array('status' => 'error', 'pesan' => 'Maaf, alamat email ' . $this->input->post('email') . ' sudah digunakan. Silahkan ganti dengan alamat email lain!');
                    echo json_encode($response);
                } else {
                    $id_users = $this->session->userdata('id_users');
                    $password = password_hash('BpbdCianjur2023', PASSWORD_DEFAULT);
                    $datetime = date("Y-m-d H:i:s");
                    $getRole  = $this->user_model->getRoleById($this->input->post('id_role'))->row();

                    $data = array(
                        'username' => $this->input->post('username'),
                        'password' => $password,
                        'email' => $this->input->post('email'),
                        'alamat' => $this->input->post('alamat'),
                        'full_name' => $this->input->post('full_name'),
                        'no_hp' => $this->input->post('no_hp'),
                        'jabatan' => $getRole->role,
                        'id_role' => $this->input->post('id_role'),
                        'status_aktif' => $this->input->post('status_aktif'),
                        'status_pass' => $this->input->post('status_password'),
                        'photo_profile' => "admin-avatar.png",
                        'date_created' => $datetime,
                        'id_user_update' => $id_users,
                        'tgl_update' => $datetime
                    );
                    $insert = $this->user_model->save($data);

                    if ($insert) {
                        $response = array('status' => 'success', 'pesan' => 'Data Berhasil di tambahkan!');
                        echo json_encode($response);
                    } else {
                        $response = array('status' => 'error', 'pesan' => 'Upss, Data gagal di simpan!');
                        echo json_encode($response);
                    }
                }
            }
        } else {
            redirect('dashboard/ManajemenPengguna');
        }
    }

    public function ajax_update()
    {
        if (!empty($this->input->post('username'))) {
            $cek_username = $this->user_model->cek_username($this->input->post('username'))->num_rows();
            $cek_email = $this->user_model->cek_email($this->input->post('email'))->num_rows();

            if ($cek_username > 1) {
                $response = array('status' => 'error', 'pesan' => 'Maaf, Username ' . $this->input->post('username') . ' sudah digunakan. Silahkan ganti dengan username lain!');
                echo json_encode($response);
            } else {
                if ($cek_email > 1) {
                    $response = array('status' => 'error', 'pesan' => 'Maaf, alamat email ' . $this->input->post('email') . ' sudah digunakan. Silahkan ganti dengan alamat email lain!');
                    echo json_encode($response);
                } else {
                    $datetime   = date("Y-m-d H:i:s");
                    $id_users = $this->session->userdata('id_users');
                    $getRole  = $this->user_model->getRoleById($this->input->post('id_role'))->row();
                    $data = array(
                        'username' => $this->input->post('username'),
                        'email' => $this->input->post('email'),
                        'alamat' => $this->input->post('alamat'),
                        'full_name' => $this->input->post('full_name'),
                        'no_hp' => $this->input->post('no_hp'),
                        'jabatan' => $getRole->role,
                        'id_role' => $this->input->post('id_role'),
                        'status_aktif' => $this->input->post('status_aktif'),
                        'status_pass' => $this->input->post('status_password'),
                        'id_user_update' => $id_users,
                        'tgl_update' => $datetime
                    );

                    $update = $this->user_model->update(array('id_users' => $this->input->post('id')), $data);
                    if ($update) {
                        $response = array('status' => 'success', 'pesan' => 'Data Berhasil di Update!');
                        echo json_encode($response);
                    } else {
                        $response = array('status' => 'error', 'pesan' => 'Upss, Data gagal di Update!');
                        echo json_encode($response);
                    }
                }
            }
        } else {
            redirect('dashboard/ManajemenPengguna');
        }
    }

    public function ajax_delete($id)
    {
        if (!empty($id)) {
            $delete = $this->user_model->delete_by_id($id);

            if ($delete) {
                $response = array('status' => 'success', 'pesan' => 'Data Berhasil di Hapus!');
                echo json_encode($response);
            } else {
                $response = array('status' => 'error', 'pesan' => 'Upss, Data gagal di Hapus!');
                echo json_encode($response);
            }
        } else {
            redirect('dashboard/ManajemenPengguna');
        }
    }

    public function reset_password($id)
    {
        $datetime = date("Y-m-d H:i:s");
        $password = password_hash('BpbdCianjur2023', PASSWORD_DEFAULT);

        if (!empty($id)) {
            $data = array(
                'password' => $password,
                'status_pass' => 'once',
                'tgl_update' => $datetime,
            );

            $reset = $this->user_model->update_users($id, $data);

            if ($reset) {
                $response = array('status' => 'success', 'pesan' => 'Akun berhasil dilakukan reset password menjadi BpbdCianjur2023');
                echo json_encode($response);
            } else {
                $response = array('status' => 'error', 'pesan' => 'Upss, gagal melakukan reset password!');
                echo json_encode($response);
            }
        } else {
            redirect('dashboard/ManajemenPengguna');
        }
    }
}

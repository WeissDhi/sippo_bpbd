<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MasterDesa extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		cek_otentikasi();
		cek_status_pass();
		$this->load->model("user_model");
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
			'title' => 'Master Desa',
			'breadcrumb' => 'Data Master'
		);

		$this->load->view('v_back/template/header', $data);
		$this->load->view('v_back/template/sidebar', $data);
	}

	public function index()
	{
		$this->header();
		$this->load->view('v_back/dataMaster/desa');
		$this->load->view('v_back/template/footer');
	}
}

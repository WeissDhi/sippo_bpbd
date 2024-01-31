<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		cek_otentikasi();
		cek_status_pass();
		$this->load->model("m_konten");
	}

	public function header()
	{
		$id_users = $this->session->userdata('id_users');
		$role = $this->session->userdata('role');
		$data = array(
			'title' => 'Dashboard',
			'role' => $role,
			'getDataKonten' => $this->m_konten->getDataKonten('1')->row(),
			'detail_user' => $this->user_model->data_user($id_users),
		);

		$this->load->view('v_back/template/header', $data);
		$this->load->view('v_back/template/sidebar', $data);
	}

	public function index()
	{
		$this->header();
		$this->load->view('v_back/template/dashboard');
		$this->load->view('v_back/template/footer');
	}
}

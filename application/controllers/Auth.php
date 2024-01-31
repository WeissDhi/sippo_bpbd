<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("user_model");
		$this->load->model("m_konten");
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == false) {

			$data = array(
				'title' => 'Login SIPPO BPBD Cianjur',
				'getDataKonten' => $this->m_konten->getDataKonten('1')->row(),
			);
			$this->load->view('v_back/template/login', $data);
		} else {
			//Validasi Success
			if ($this->input->post()) {
				$this->user_model->doLogin();
			}
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('id_role');

		$this->session->unset_userdata('item');
		$this->session->sess_destroy();
		$this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissable fade show">
		<button class="close" data-dismiss="alert" aria-label="Close">×</button><strong>Upss!</strong> <i class="fa fa-info-circle"></i> Anda telah Logout</div>');
		redirect('auth');
	}

	public function blocked()
	{
		$this->load->view('template/404');
	}
}

<?php



defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		$this->load->model('m_home');
		$this->load->model('m_akun');
	}

	// List all your items
	public function index()
	{
		$data = array(
			'title' => 'Dashboard',
			'totalakun' => $this->m_home->totalakun(),
			'totaldebit' => $this->m_home->totaldebit(),
			'totalkredit' => $this->m_home->totalkredit(),
			'akun' => $this->m_akun->akun(),
			'isi' => 'frontend/admin/v_admin'
		);
		$this->load->view('frontend/v_wrapper', $data, FALSE);
	}
}

/* End of file Admin.php */

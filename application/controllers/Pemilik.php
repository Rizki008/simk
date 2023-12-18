<?php



defined('BASEPATH') or exit('No direct script access allowed');

class Pemilik extends CI_Controller
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
			'isi' => 'backend/pemilik/v_pemilik'
		);
		$this->load->view('backend/v_wrapper', $data, FALSE);
	}
}

/* End of file Admin.php */

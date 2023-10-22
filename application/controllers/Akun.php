<?php



defined('BASEPATH') or exit('No direct script access allowed');

class Akun extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		$this->load->model('m_akun');
	}

	// List all your items
	public function index()
	{
		$data = array(
			'title' => 'Data Akun',
			'akun' => $this->m_akun->akun(),
			'isi' => 'frontend/akun/v_akun'
		);
		$this->load->view('frontend/v_wrapper', $data, FALSE);
	}

	// Add a new item
	public function add()
	{
		$data = array(
			'no_reff' => $this->input->post('no_reff'),
			'id_user' => $this->session->userdata('id_user'),
			'nama_reff' => $this->input->post('nama_reff'),
			// 'keterangan' => $this->input->post('keterangan'),
		);
		$this->m_akun->add($data);
		$this->session->set_flashdata('pesan', 'data akun berhasil disimpan');
		redirect('akun');
	}

	//Update one item
	public function update($id_akun)
	{
		$data = array(
			'id_akun' => $id_akun,
			'no_reff' => $this->input->post('no_reff'),
			'id_user' => $this->session->userdata('id_user'),
			'nama_reff' => $this->input->post('nama_reff'),
			// 'keterangan' => $this->input->post('keterangan'),
		);
		$this->m_akun->update($data);
		$this->session->set_flashdata('pesan', 'data akun berhasil diupdate');
		redirect('akun');
	}

	//Delete one item
	public function delete($id_akun = NULL)
	{
		$data = array(
			'id_akun' => $id_akun,
		);
		$this->m_akun->delete($data);
		$this->session->set_flashdata('pesan', 'data akun berhasil dihapus');
		redirect('akun');
	}
}

/* End of file Akun.php */

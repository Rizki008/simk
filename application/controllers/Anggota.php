<?php



defined('BASEPATH') or exit('No direct script access allowed');

class anggota extends CI_Controller
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
		if ($this->session->userdata('level_user') === 1) {
			$data = array(
				'title' => 'Data Anggota',
				'anggota' => $this->m_akun->anggota(),
				'isi' => 'frontend/anggota/v_anggota'
			);
			$this->load->view('frontend/v_wrapper', $data, FALSE);
		} else {
			$data = array(
				'title' => 'Data Anggota',
				'anggota' => $this->m_akun->anggota(),
				'isi' => 'backend/anggota/v_anggota'
			);
			$this->load->view('backend/v_wrapper', $data, FALSE);
		}
	}

	// Add a new item
	public function add()
	{
		$data = array(
			'nama' => $this->input->post('nama'),
			'tgl_masuk' => $this->input->post('tgl_masuk'),
			'no_anggota' => $this->input->post('no_anggota'),
			'no_hp' => $this->input->post('no_hp'),
			'alamat' => $this->input->post('alamat'),
		);
		$this->m_akun->add_anggota($data);
		$this->session->set_flashdata('pesan', 'Data Anggota berhasil disimpan');
		redirect('anggota');
	}

	//Update one item
	public function update($id_anggota = NULL)
	{
		$data = array(
			'id_anggota' => $id_anggota,
			'nama' => $this->input->post('nama'),
			'no_anggota' => $this->input->post('no_anggota'),
			'tgl_masuk' => $this->input->post('tgl_masuk'),
			'no_hp' => $this->input->post('no_hp'),
			'alamat' => $this->input->post('alamat'),
		);
		$this->m_akun->update_anggota($data);
		$this->session->set_flashdata('pesan', 'Data Anggota berhasil diupdate');
		redirect('anggota');
	}

	//Delete one item
	public function delete($id_anggota = NULL)
	{
		$data = array(
			'id_anggota' => $id_anggota,
		);
		$this->m_akun->delete_anggota($data);
		$this->session->set_flashdata('pesan', 'Data Anggota berhasil dihapus');
		redirect('anggota');
	}
}

/* End of file anggota.php */

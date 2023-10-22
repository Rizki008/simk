<?php



defined('BASEPATH') or exit('No direct script access allowed');

class Indeks extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		$this->load->model('m_indeks');
	}

	// List all your items
	public function index()
	{
		$data = array(
			'title' => 'Data Index',
			'indeks' => $this->m_indeks->indeks(),
			'isi' => 'frontend/indeks/v_indeks'
		);
		$this->load->view('frontend/v_wrapper', $data, FALSE);
	}

	// Add a new item
	public function add()
	{
		$data = array(
			'keterangan' => $this->input->post('keterangan'),
		);
		$this->m_indeks->add($data);
		$this->session->set_flashdata('pesan', 'data indeks berhasil disimpan');
		redirect('indeks');
	}

	//Update one item
	public function update($id_index)
	{
		$data = array(
			'id_index' => $id_index,
			'keterangan' => $this->input->post('keterangan'),
		);
		$this->m_indeks->update($data);
		$this->session->set_flashdata('pesan', 'data indeks berhasil diupdate');
		redirect('indeks');
	}

	//Delete one item
	public function delete($id_index = NULL)
	{
		$data = array(
			'id_index' => $id_index,
		);
		$this->m_indeks->delete($data);
		$this->session->set_flashdata('pesan', 'data indeks berhasil dihapus');
		redirect('indeks');
	}
}

/* End of file Akun.php */

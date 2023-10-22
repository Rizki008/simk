<?php



defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		$this->load->model('m_transaksi');
		$this->load->model('m_akun');
		$this->load->model('m_indeks');
	}

	// List all your items
	public function index()
	{
		$data = array(
			'title' => 'Data Transaksi',
			'bulantahun' => $this->m_transaksi->bulantahun(),
			'isi' => 'frontend/transaksi/v_transaksi'
		);
		$this->load->view('frontend/v_wrapper', $data, FALSE);
	}

	public function detail($bulan, $tahun)
	{
		$data = array(
			'title' => 'Transaksi',
			'transaksi' => $this->m_transaksi->transaksidetail($bulan, $tahun),
			'isi' => 'frontend/transaksi/v_detail'
		);
		// echo $this->db->last_query();
		// die();
		$this->load->view('frontend/v_wrapper', $data, FALSE);
	}
	// Add a new item
	public function add()
	{
		$this->form_validation->set_rules('no_reff', 'Nama Reff', 'required', array('required' => '%s Nama Reff Harus Dipilih!!!'));

		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'title' => 'Tambah Transaksi',
				'akun' => $this->m_akun->akun(),
				'index' => $this->m_indeks->indeks(),
				'isi' => 'frontend/transaksi/v_add'
			);
			$this->load->view('frontend/v_wrapper', $data, FALSE);
		} else {
			$data = array(
				'no_reff' => $this->input->post('no_reff'),
				'id_index' => $this->input->post('id_index'),
				'id_user' => $this->session->userdata('id_user'),
				'tgl_input' => date('Y-m-d H:i:s'),
				'tgl_transaksi' => $this->input->post('tgl_transaksi'),
				'keterangan' => $this->input->post('keterangan'),
				'jenis_saldo' => $this->input->post('jenis_saldo'),
				'saldo' => $this->input->post('saldo'),
				'keterangan' => $this->input->post('keterangan'),
				'status' => 'transaksi',
			);
			$this->m_transaksi->add($data);
			$this->session->set_flashdata('pesan', 'data transaksi berhasil disimpan');
			redirect('transaksi');
		}
	}

	//Update one item
	public function update($id_transaksi)
	{
		$this->form_validation->set_rules('no_reff', 'Nama Reff', 'required', array('required' => '%s Nama Reff Harus Dipilih!!!'));

		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'title' => 'Update Transaksi Umum',
				'akun' => $this->m_akun->akun(),
				'index' => $this->m_indeks->indeks(),
				'transaksi' => $this->m_transaksi->transaksiedit($id_transaksi),
				'isi' => 'frontend/transaksi/v_edit'
			);
			$this->load->view('frontend/v_wrapper', $data, FALSE);
		} else {
			$data = array(
				'id_transaksi' => $id_transaksi,
				'no_reff' => $this->input->post('no_reff'),
				'id_index' => $this->input->post('id_index'),
				'id_user' => $this->session->userdata('id_user'),
				'tgl_input' => date('Y-m-d H:i:s'),
				'tgl_transaksi' => $this->input->post('tgl_transaksi'),
				'keterangan' => $this->input->post('keterangan'),
				'jenis_saldo' => $this->input->post('jenis_saldo'),
				'saldo' => $this->input->post('saldo'),
				'keterangan' => $this->input->post('keterangan'),
				'status' => 'transaksi',
			);
			$this->m_transaksi->update($data);
			$this->session->set_flashdata('pesan', 'data transaksi berhasil disimpan');
			redirect('transaksi');
		}
	}

	//Delete one item
	public function delete($id_transaksi = NULL)
	{
		$data = array(
			'id_transaksi' => $id_transaksi,
		);
		$this->m_transaksi->delete($data);
		$this->session->set_flashdata('pesan', 'data transaksi berhasil dihapus');
		redirect('transaksi');
	}
}

/* End of file Akun.php */

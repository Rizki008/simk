<?php



defined('BASEPATH') or exit('No direct script access allowed');

class Jurnal extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		$this->load->model('m_jurnal');
		$this->load->model('m_akun');
	}

	// List all your items
	public function index()
	{
		$data = array(
			'title' => 'Data Jurnal',
			'bulantahun' => $this->m_jurnal->bulantahun(),
			'isi' => 'frontend/jurnal/v_jurnal'
		);
		$this->load->view('frontend/v_wrapper', $data, FALSE);
	}

	public function detail($bulan, $tahun)
	{
		$data = array(
			'title' => 'Jurnal Umum',
			'jurnal' => $this->m_jurnal->jurnaldetail($bulan, $tahun),
			'kredit' => $this->m_jurnal->hasilkredit($bulan, $tahun),
			'debit' => $this->m_jurnal->hasildebit($bulan, $tahun),
			'isi' => 'frontend/jurnal/v_detail'
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
				'title' => 'Tambah Jurnal Umum',
				'akun' => $this->m_akun->akun(),
				'isi' => 'frontend/jurnal/v_add'
			);
			$this->load->view('frontend/v_wrapper', $data, FALSE);
		} else {
			$data = array(
				'no_reff' => $this->input->post('no_reff'),
				'id_user' => $this->session->userdata('id_user'),
				'tgl_input' => date('Y-m-d H:i:s'),
				'tgl_transaksi' => $this->input->post('tgl_transaksi'),
				'jenis_saldo' => $this->input->post('jenis_saldo'),
				'saldo' => $this->input->post('saldo'),
			);
			$this->m_jurnal->add($data);
			$this->session->set_flashdata('pesan', 'data jurnal berhasil disimpan');
			redirect('jurnal');
		}
	}

	//Update one item
	public function update($id_transaksi)
	{
		$this->form_validation->set_rules('no_reff', 'Nama Reff', 'required', array('required' => '%s Nama Reff Harus Dipilih!!!'));

		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'title' => 'Update Jurnal Umum',
				'akun' => $this->m_akun->akun(),
				'jurnal' => $this->m_jurnal->jurnaledit($id_transaksi),
				'isi' => 'frontend/jurnal/v_edit'
			);
			$this->load->view('frontend/v_wrapper', $data, FALSE);
		} else {
			$data = array(
				'id_transaksi' => $id_transaksi,
				'no_reff' => $this->input->post('no_reff'),
				'id_user' => $this->session->userdata('id_user'),
				'tgl_input' => date('Y-m-d H:i:s'),
				'tgl_transaksi' => $this->input->post('tgl_transaksi'),
				'jenis_saldo' => $this->input->post('jenis_saldo'),
				'saldo' => $this->input->post('saldo'),
			);
			$this->m_jurnal->update($data);
			$this->session->set_flashdata('pesan', 'data jurnal berhasil disimpan');
			redirect('jurnal');
		}
	}

	//Delete one item
	public function delete($id_transaksi = NULL)
	{
		$data = array(
			'id_transaksi' => $id_transaksi,
		);
		$this->m_jurnal->delete($data);
		$this->session->set_flashdata('pesan', 'data akun berhasil dihapus');
		redirect('jurnal');
	}
}

/* End of file Akun.php */

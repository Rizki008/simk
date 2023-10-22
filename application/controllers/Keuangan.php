<?php



defined('BASEPATH') or exit('No direct script access allowed');

class Keuangan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		$this->load->model('m_neraca');
	}

	// List all your items
	public function index()
	{
		$data = array(
			'title' => 'Informasi Laporan Keuangan',
			// 'bulantahun' => $this->m_jurnal->bulantahun(),
			// 'keterangan' => $this->m_neraca->keterangan(),
			'isi' => 'frontend/keuangan/v_keuangan_lap'
		);
		$this->load->view('frontend/v_wrapper', $data, FALSE);
	}

	public function search_keuangan()
	{
		$sampai = $this->input->post('sampai');
		$data = array(
			'title' => 'Informasi Laporan Keuangan',
			'sampai' => $sampai,
			'keuangan' => $this->m_neraca->hasil_keuangan($sampai),
			'beban' => $this->m_neraca->hasil_beban($sampai),
			'pendapatan' => $this->m_neraca->hasil_pendapatan($sampai),
			'isi' => 'frontend/keuangan/v_keuangan_hasil'
		);
		$this->load->view('frontend/v_wrapper', $data, FALSE);
	}
}

/* End of file Arus.php */

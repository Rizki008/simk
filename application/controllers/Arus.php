<?php



defined('BASEPATH') or exit('No direct script access allowed');

class Arus extends CI_Controller
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
			'title' => 'Informasi Arus Kas',
			// 'bulantahun' => $this->m_jurnal->bulantahun(),
			'keterangan' => $this->m_neraca->keterangan(),
			'isi' => 'frontend/kas/v_kas_lap'
		);
		$this->load->view('frontend/v_wrapper', $data, FALSE);
	}

	public function search_arus()
	{
		$dari = $this->input->post('dari');
		$sampai = $this->input->post('sampai');
		$id_index = $this->input->post('id_index');
		$data = array(
			'title' => 'Informasi Arus Kas',
			'dari' => $dari,
			'sampai' => $sampai,
			'id_index' => $id_index,
			'keterangan' => $this->m_neraca->keterangan_hasil($id_index),
			// 'keterangan' => $this->m_neraca->keterangan(),
			// 'kas' => $this->m_neraca->hasil_arus_kas($dari, $sampai),
			'kas' => $this->m_neraca->hasil_arus_kas2($id_index, $dari, $sampai),
			'isi' => 'frontend/kas/v_kas_hasil'
		);
		$this->load->view('frontend/v_wrapper', $data, FALSE);
	}
}

/* End of file Arus.php */

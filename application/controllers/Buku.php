<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Buku extends CI_Controller
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
			'title' => 'Data Buku Besar',
			'bulantahun' => $this->m_jurnal->bulantahun(),
			'isi' => 'frontend/buku/v_buku'
		);
		$this->load->view('frontend/v_wrapper', $data, FALSE);
	}

	public function detail($bulan, $tahun)
	{
		$data = array(
			'title' => 'Buku Besar',
			'jurnal' => $this->m_jurnal->bulantahunbuku($bulan, $tahun),
			'isi' => 'frontend/buku/v_detail_buku'
		);
		$this->load->view('frontend/v_wrapper', $data, FALSE);
	}
	public function detail_reff($no_reff, $bulan, $tahun)
	{
		$data = array(
			'title' => 'Buku Besar',
			'jurnal' => $this->m_jurnal->jurnaldetailbuku($no_reff, $bulan, $tahun),
			'isi' => 'frontend/buku/v_detail'
		);
		$this->load->view('frontend/v_wrapper', $data, FALSE);
	}
}

/* End of file Akun.php */

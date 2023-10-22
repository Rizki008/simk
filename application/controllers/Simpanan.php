<?php



defined('BASEPATH') or exit('No direct script access allowed');

class Simpanan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		$this->load->model('m_transaksi');
		$this->load->model('m_akun');
		$this->load->model('m_indeks');
	}

	// VIEW 
	// public function index()
	// {
	// 	$data = array(
	// 			'title' => 'Data Transaksi',
	// 			'pokok' => $this->m_transaksi->pokok(),
	// 			'isi' => 'frontend/transaksi/v_transaksi'
	// 		);
	// 	$this->load->view('frontend/v_wrapper', $data, FALSE);
	// }
	public function pokok()
	{
		$data = array(
			'title' => 'Data Simpanan Pokok',
			'pokok' => $this->m_transaksi->pokok(),
			'isi' => 'frontend/transaksi/v_pokok'
		);
		$this->load->view('frontend/v_wrapper', $data, FALSE);
	}
	public function wajib()
	{
		$data = array(
			'title' => 'Data Simpanan Wajib',
			'wajib' => $this->m_transaksi->wajib(),
			'isi' => 'frontend/transaksi/v_wajib'
		);
		$this->load->view('frontend/v_wrapper', $data, FALSE);
	}
	public function sukarela()
	{
		$data = array(
			'title' => 'Data Simanan Sukarela',
			'sukarela' => $this->m_transaksi->sukarela(),
			'isi' => 'frontend/transaksi/v_sukarela'
		);
		$this->load->view('frontend/v_wrapper', $data, FALSE);
	}

	// CRUD TRANSAKSI
	public function detail($bulan, $tahun)
	{
		$data = array(
			'title' => 'Transaksi',
			'transaksi' => $this->m_transaksi->transaksidetail($bulan, $tahun),
			'isi' => 'frontend/transaksi/v_detail'
		);
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
				'id_user' => $this->session->userdata('id_user'),
				'tgl_input' => date('Y-m-d H:i:s'),
				'tgl_transaksi' => $this->input->post('tgl_transaksi'),
				'keterangan' => $this->input->post('keterangan'),
				'jenis_saldo' => $this->input->post('jenis_saldo'),
				'saldo' => $this->input->post('saldo'),
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
				'id_user' => $this->session->userdata('id_user'),
				'tgl_input' => date('Y-m-d H:i:s'),
				'tgl_transaksi' => $this->input->post('tgl_transaksi'),
				'keterangan' => $this->input->post('keterangan'),
				'jenis_saldo' => $this->input->post('jenis_saldo'),
				'saldo' => $this->input->post('saldo'),
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

	// CRUD SIMPANAN POKOK 
	public function add_pokok()
	{
		$this->form_validation->set_rules('no_reff', 'Nama Reff', 'required', array('required' => '%s Nama Reff Harus Dipilih!!!'));
		$this->form_validation->set_rules('tgl_transaksi', 'Tanggal Transaksi', 'required', array('required' => '%s Nama Reff Harus Dipilih!!!'));
		$this->form_validation->set_rules('no_anggota', 'No Anggota', 'required', array('required' => '%s Nama Reff Harus Dipilih!!!'));
		$this->form_validation->set_rules('jenis_saldo', 'Jenis Saldo', 'required', array('required' => '%s Nama Reff Harus Dipilih!!!'));
		$this->form_validation->set_rules('saldo', 'Saldo', 'required', array('required' => '%s Nama Reff Harus Dipilih!!!'));

		if ($this->form_validation->run() == TRUE) {
			$config['upload_path'] = './assets/bukti';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
			$config['max_size']     = '5000';
			$this->upload->initialize($config);
			$field_name = "bukti";
			if (!$this->upload->do_upload($field_name)) {
				$data = array(
					'title' => 'Tambah Simpanan Pokok',
					'akun' => $this->m_akun->akun(),
					'anggota' => $this->m_akun->anggota(),
					'error_upload' => $this->upload->display_errors(),
					'isi' => 'frontend/transaksi/pokok/v_add'
				);
				$this->load->view('frontend/v_wrapper', $data, FALSE);
			} else {
				$upload_data = array('uploads' => $this->upload->data());
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/bukti' . $upload_data['uploads']['file_name'];
				$this->load->library('image_lib', $config);
				$data = array(
					'id_user' => $this->session->userdata('id_user'),
					'no_transaksi' => $this->input->post('no_transaksi'),
					'tgl_transaksi' => $this->input->post('tgl_transaksi'),
					'no_anggota' => $this->input->post('no_anggota'),
					'no_reff' => $this->input->post('no_reff'),
					'tgl_input' => date('Y-m-d H:i:s'),
					'jenis_saldo' => $this->input->post('jenis_saldo'),
					'saldo' => $this->input->post('saldo'),
					'status' => 'pokok',
					'keterangan' => 'Simpanan Pokok',
					'bukti' => $upload_data['uploads']['file_name'],
				);
				$this->m_transaksi->add($data);
				$this->session->set_flashdata('pesan', 'data transaksi berhasil disimpan');
				redirect('simpanan/pokok');
			}
		}
		$data = array(
			'title' => 'Tambah Simpanan Pokok',
			'akun' => $this->m_akun->akun(),
			'anggota' => $this->m_akun->anggota(),
			'isi' => 'frontend/transaksi/pokok/v_add'
		);
		$this->load->view('frontend/v_wrapper', $data, FALSE);
	}
	//Update one item
	public function update_pokok($id_transaksi)
	{
		$this->form_validation->set_rules('no_reff', 'Nama Reff', 'required', array('required' => '%s Nama Reff Harus Dipilih!!!'));
		$this->form_validation->set_rules('tgl_transaksi', 'Tanggal Transaksi', 'required', array('required' => '%s Nama Reff Harus Dipilih!!!'));
		$this->form_validation->set_rules('no_anggota', 'No Anggota', 'required', array('required' => '%s Nama Reff Harus Dipilih!!!'));
		$this->form_validation->set_rules('jenis_saldo', 'Jenis Saldo', 'required', array('required' => '%s Nama Reff Harus Dipilih!!!'));
		$this->form_validation->set_rules('saldo', 'Saldo', 'required', array('required' => '%s Nama Reff Harus Dipilih!!!'));

		if ($this->form_validation->run() == TRUE) {
			$config['upload_path'] = './assets/bukti';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
			$config['max_size']     = '5000';
			$this->upload->initialize($config);
			$field_name = "bukti";
			if (!$this->upload->do_upload($field_name)) {
				$data = array(
					'title' => 'Update Simpanan Pokok',
					'akun' => $this->m_akun->akun(),
					'anggota' => $this->m_akun->anggota(),
					'error_upload' => $this->upload->display_errors(),
					'transaksi' => $this->m_transaksi->transaksiedit($id_transaksi),
					'isi' => 'frontend/transaksi/pokok/v_edit'
				);
				$this->load->view('frontend/v_wrapper', $data, FALSE);
			} else {
				//hapus gambar di folder
				$simpanan = $this->m_transaksi->transaksiedit($id_transaksi);
				if ($simpanan->bukti !== "") {
					unlink('./assets/bukti/' . $simpanan->bukti);
				}
				//end
				$upload_data = array('uploads' => $this->upload->data());
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/bukti' . $upload_data['uploads']['file_name'];
				$this->load->library('image_lib', $config);
				$data = array(
					'id_transaksi' => $id_transaksi,
					'id_user' => $this->session->userdata('id_user'),
					'no_transaksi' => $this->input->post('no_transaksi'),
					'tgl_transaksi' => $this->input->post('tgl_transaksi'),
					'no_anggota' => $this->input->post('no_anggota'),
					'no_reff' => $this->input->post('no_reff'),
					'tgl_input' => date('Y-m-d H:i:s'),
					'jenis_saldo' => $this->input->post('jenis_saldo'),
					'saldo' => $this->input->post('saldo'),
					'status' => 'pokok',
					'keterangan' => 'Simpanan Pokok',
					'bukti' => $upload_data['uploads']['file_name'],
				);
				$this->m_transaksi->update($data);
				$this->session->set_flashdata('pesan', 'data transaksi berhasil diubah');
				redirect('simpanan/pokok');
			}
			$data = array(
				'id_transaksi' => $id_transaksi,
				'id_user' => $this->session->userdata('id_user'),
				'no_transaksi' => $this->input->post('no_transaksi'),
				'tgl_transaksi' => $this->input->post('tgl_transaksi'),
				'no_anggota' => $this->input->post('no_anggota'),
				'no_reff' => $this->input->post('no_reff'),
				'tgl_input' => date('Y-m-d H:i:s'),
				'jenis_saldo' => $this->input->post('jenis_saldo'),
				'saldo' => $this->input->post('saldo'),
				'keterangan' => 'Simpanan Pokok',
				'status' => 'pokok',
			);
			$this->m_transaksi->update($data);
			$this->session->set_flashdata('pesan', 'data transaksi berhasil diubah');
			redirect('simpanan/pokok');
		}
		$data = array(
			'title' => 'Update Simpanan Pokok',
			'akun' => $this->m_akun->akun(),
			'anggota' => $this->m_akun->anggota(),
			'transaksi' => $this->m_transaksi->transaksiedit($id_transaksi),
			'isi' => 'frontend/transaksi/pokok/v_edit'
		);
		$this->load->view('frontend/v_wrapper', $data, FALSE);
	}
	//Delete one item
	public function delete_pokok($id_transaksi = NULL)
	{
		$data = array(
			'id_transaksi' => $id_transaksi,
		);
		$this->m_transaksi->delete($data);
		$this->session->set_flashdata('pesan', 'data transaksi berhasil dihapus');
		redirect('simpanan/pokok');
	}

	// CRUD SIMPANAN WAJIB 
	public function add_wajib()
	{
		$this->form_validation->set_rules('no_reff', 'Nama Reff', 'required', array('required' => '%s Nama Reff Harus Dipilih!!!'));
		$this->form_validation->set_rules('tgl_transaksi', 'Tanggal Transaksi', 'required', array('required' => '%s Nama Reff Harus Dipilih!!!'));
		$this->form_validation->set_rules('no_anggota', 'No Anggota', 'required', array('required' => '%s Nama Reff Harus Dipilih!!!'));
		$this->form_validation->set_rules('jenis_saldo', 'Jenis Saldo', 'required', array('required' => '%s Nama Reff Harus Dipilih!!!'));
		$this->form_validation->set_rules('saldo', 'Saldo', 'required', array('required' => '%s Nama Reff Harus Dipilih!!!'));

		if ($this->form_validation->run() == TRUE) {
			$config['upload_path'] = './assets/bukti';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
			$config['max_size']     = '5000';
			$this->upload->initialize($config);
			$field_name = "bukti";
			if (!$this->upload->do_upload($field_name)) {
				$data = array(
					'title' => 'Tambah Simpanan wajib',
					'akun' => $this->m_akun->akun(),
					'anggota' => $this->m_akun->anggota(),
					'error_upload' => $this->upload->display_errors(),
					'isi' => 'frontend/transaksi/wajib/v_add'
				);
				$this->load->view('frontend/v_wrapper', $data, FALSE);
			} else {
				$upload_data = array('uploads' => $this->upload->data());
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/bukti' . $upload_data['uploads']['file_name'];
				$this->load->library('image_lib', $config);
				$data = array(
					'id_user' => $this->session->userdata('id_user'),
					'no_transaksi' => $this->input->post('no_transaksi'),
					'tgl_transaksi' => $this->input->post('tgl_transaksi'),
					'no_anggota' => $this->input->post('no_anggota'),
					'no_reff' => $this->input->post('no_reff'),
					'tgl_input' => date('Y-m-d H:i:s'),
					'jenis_saldo' => $this->input->post('jenis_saldo'),
					'saldo' => $this->input->post('saldo'),
					'status' => 'wajib',
					'keterangan' => 'Simpanan Wajib',
					'bukti' => $upload_data['uploads']['file_name'],
				);
				$this->m_transaksi->add($data);
				$this->session->set_flashdata('pesan', 'data transaksi berhasil disimpan');
				redirect('simpanan/wajib');
			}
		}
		$data = array(
			'title' => 'Tambah Simpanan wajib',
			'akun' => $this->m_akun->akun(),
			'anggota' => $this->m_akun->anggota(),
			'isi' => 'frontend/transaksi/wajib/v_add'
		);
		$this->load->view('frontend/v_wrapper', $data, FALSE);
	}
	//Update one item
	public function update_wajib($id_transaksi)
	{
		$this->form_validation->set_rules('no_reff', 'Nama Reff', 'required', array('required' => '%s Nama Reff Harus Dipilih!!!'));
		$this->form_validation->set_rules('tgl_transaksi', 'Tanggal Transaksi', 'required', array('required' => '%s Nama Reff Harus Dipilih!!!'));
		$this->form_validation->set_rules('no_anggota', 'No Anggota', 'required', array('required' => '%s Nama Reff Harus Dipilih!!!'));
		$this->form_validation->set_rules('jenis_saldo', 'Jenis Saldo', 'required', array('required' => '%s Nama Reff Harus Dipilih!!!'));
		$this->form_validation->set_rules('saldo', 'Saldo', 'required', array('required' => '%s Nama Reff Harus Dipilih!!!'));

		if ($this->form_validation->run() == TRUE) {
			$config['upload_path'] = './assets/bukti';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
			$config['max_size']     = '5000';
			$this->upload->initialize($config);
			$field_name = "bukti";
			if (!$this->upload->do_upload($field_name)) {
				$data = array(
					'title' => 'Update Simpanan Pokok',
					'akun' => $this->m_akun->akun(),
					'anggota' => $this->m_akun->anggota(),
					'error_upload' => $this->upload->display_errors(),
					'transaksi' => $this->m_transaksi->transaksiedit($id_transaksi),
					'isi' => 'frontend/transaksi/pokok/v_edit'
				);
				$this->load->view('frontend/v_wrapper', $data, FALSE);
			} else {
				//hapus gambar di folder
				$simpanan = $this->m_transaksi->transaksiedit($id_transaksi);
				if ($simpanan->bukti !== "") {
					unlink('./assets/bukti/' . $simpanan->bukti);
				}
				//end
				$upload_data = array('uploads' => $this->upload->data());
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/bukti' . $upload_data['uploads']['file_name'];
				$this->load->library('image_lib', $config);
				$data = array(
					'id_transaksi' => $id_transaksi,
					'id_user' => $this->session->userdata('id_user'),
					'no_transaksi' => $this->input->post('no_transaksi'),
					'tgl_transaksi' => $this->input->post('tgl_transaksi'),
					'no_anggota' => $this->input->post('no_anggota'),
					'no_reff' => $this->input->post('no_reff'),
					'tgl_input' => date('Y-m-d H:i:s'),
					'jenis_saldo' => $this->input->post('jenis_saldo'),
					'saldo' => $this->input->post('saldo'),
					'status' => 'wajib',
					'keterangan' => 'Simpanan Wajib',
					'bukti' => $upload_data['uploads']['file_name'],
				);
				$this->m_transaksi->update($data);
				$this->session->set_flashdata('pesan', 'data transaksi berhasil diubah');
				redirect('simpanan/wajib');
			}
			$data = array(
				'id_transaksi' => $id_transaksi,
				'id_user' => $this->session->userdata('id_user'),
				'no_transaksi' => $this->input->post('no_transaksi'),
				'tgl_transaksi' => $this->input->post('tgl_transaksi'),
				'no_anggota' => $this->input->post('no_anggota'),
				'no_reff' => $this->input->post('no_reff'),
				'tgl_input' => date('Y-m-d H:i:s'),
				'jenis_saldo' => $this->input->post('jenis_saldo'),
				'saldo' => $this->input->post('saldo'),
				'keterangan' => 'Simpanan Wajib',
				'status' => 'wajib',
			);
			$this->m_transaksi->update($data);
			$this->session->set_flashdata('pesan', 'data transaksi berhasil diubah');
			redirect('simpanan/wajib');
		}
		$data = array(
			'title' => 'Update Simpanan wajib',
			'akun' => $this->m_akun->akun(),
			'anggota' => $this->m_akun->anggota(),
			'transaksi' => $this->m_transaksi->transaksiedit($id_transaksi),
			'isi' => 'frontend/transaksi/wajib/v_edit'
		);
		$this->load->view('frontend/v_wrapper', $data, FALSE);
	}
	//Delete one item
	public function delete_wajib($id_transaksi = NULL)
	{
		$data = array(
			'id_transaksi' => $id_transaksi,
		);
		$this->m_transaksi->delete($data);
		$this->session->set_flashdata('pesan', 'data transaksi berhasil dihapus');
		redirect('simpanan/wajib');
	}

	// CRUD SIMPANAN SUKARELA 
	public function add_sukarela()
	{
		$this->form_validation->set_rules('no_reff', 'Nama Reff', 'required', array('required' => '%s Nama Reff Harus Dipilih!!!'));
		$this->form_validation->set_rules('tgl_transaksi', 'Tanggal Transaksi', 'required', array('required' => '%s Nama Reff Harus Dipilih!!!'));
		$this->form_validation->set_rules('no_anggota', 'No Anggota', 'required', array('required' => '%s Nama Reff Harus Dipilih!!!'));
		$this->form_validation->set_rules('jenis_saldo', 'Jenis Saldo', 'required', array('required' => '%s Nama Reff Harus Dipilih!!!'));
		$this->form_validation->set_rules('saldo', 'Saldo', 'required', array('required' => '%s Nama Reff Harus Dipilih!!!'));

		if ($this->form_validation->run() == TRUE) {
			$config['upload_path'] = './assets/bukti';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
			$config['max_size']     = '5000';
			$this->upload->initialize($config);
			$field_name = "bukti";
			if (!$this->upload->do_upload($field_name)) {
				$data = array(
					'title' => 'Tambah Simpanan sukarela',
					'akun' => $this->m_akun->akun(),
					'anggota' => $this->m_akun->anggota(),
					'error_upload' => $this->upload->display_errors(),
					'isi' => 'frontend/transaksi/sukarela/v_add'
				);
				$this->load->view('frontend/v_wrapper', $data, FALSE);
			} else {
				$upload_data = array('uploads' => $this->upload->data());
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/bukti' . $upload_data['uploads']['file_name'];
				$this->load->library('image_lib', $config);
				$data = array(
					'id_user' => $this->session->userdata('id_user'),
					'no_transaksi' => $this->input->post('no_transaksi'),
					'tgl_transaksi' => $this->input->post('tgl_transaksi'),
					'no_anggota' => $this->input->post('no_anggota'),
					'no_reff' => $this->input->post('no_reff'),
					'tgl_input' => date('Y-m-d H:i:s'),
					'jenis_saldo' => $this->input->post('jenis_saldo'),
					'saldo' => $this->input->post('saldo'),
					'status' => 'sukarela',
					'keterangan' => 'Simpanan Sukarela',
					'bukti' => $upload_data['uploads']['file_name'],
				);
				$this->m_transaksi->add($data);
				$this->session->set_flashdata('pesan', 'data transaksi berhasil disimpan');
				redirect('simpanan/sukarela');
			}
		}
		$data = array(
			'title' => 'Tambah Simpanan sukarela',
			'akun' => $this->m_akun->akun(),
			'anggota' => $this->m_akun->anggota(),
			'isi' => 'frontend/transaksi/sukarela/v_add'
		);
		$this->load->view('frontend/v_wrapper', $data, FALSE);
	}
	//Update one item
	public function update_sukarela($id_transaksi)
	{
		$this->form_validation->set_rules('no_reff', 'Nama Reff', 'required', array('required' => '%s Nama Reff Harus Dipilih!!!'));
		$this->form_validation->set_rules('tgl_transaksi', 'Tanggal Transaksi', 'required', array('required' => '%s Nama Reff Harus Dipilih!!!'));
		$this->form_validation->set_rules('no_anggota', 'No Anggota', 'required', array('required' => '%s Nama Reff Harus Dipilih!!!'));
		$this->form_validation->set_rules('jenis_saldo', 'Jenis Saldo', 'required', array('required' => '%s Nama Reff Harus Dipilih!!!'));
		$this->form_validation->set_rules('saldo', 'Saldo', 'required', array('required' => '%s Nama Reff Harus Dipilih!!!'));

		if ($this->form_validation->run() == TRUE) {
			$config['upload_path'] = './assets/bukti';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
			$config['max_size']     = '5000';
			$this->upload->initialize($config);
			$field_name = "bukti";
			if (!$this->upload->do_upload($field_name)) {
				$data = array(
					'title' => 'Update Simpanan Pokok',
					'akun' => $this->m_akun->akun(),
					'anggota' => $this->m_akun->anggota(),
					'error_upload' => $this->upload->display_errors(),
					'transaksi' => $this->m_transaksi->transaksiedit($id_transaksi),
					'isi' => 'frontend/transaksi/pokok/v_edit'
				);
				$this->load->view('frontend/v_wrapper', $data, FALSE);
			} else {
				//hapus gambar di folder
				$simpanan = $this->m_transaksi->transaksiedit($id_transaksi);
				if ($simpanan->bukti !== "") {
					unlink('./assets/bukti/' . $simpanan->bukti);
				}
				//end
				$upload_data = array('uploads' => $this->upload->data());
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/bukti' . $upload_data['uploads']['file_name'];
				$this->load->library('image_lib', $config);
				$data = array(
					'id_transaksi' => $id_transaksi,
					'id_user' => $this->session->userdata('id_user'),
					'no_transaksi' => $this->input->post('no_transaksi'),
					'tgl_transaksi' => $this->input->post('tgl_transaksi'),
					'no_anggota' => $this->input->post('no_anggota'),
					'no_reff' => $this->input->post('no_reff'),
					'tgl_input' => date('Y-m-d H:i:s'),
					'jenis_saldo' => $this->input->post('jenis_saldo'),
					'saldo' => $this->input->post('saldo'),
					'status' => 'sukarela',
					'keterangan' => 'Simpanan Sukarela',
					'bukti' => $upload_data['uploads']['file_name'],
				);
				$this->m_transaksi->update($data);
				$this->session->set_flashdata('pesan', 'data transaksi berhasil diubah');
				redirect('simpanan/sukarela');
			}
			$data = array(
				'id_transaksi' => $id_transaksi,
				'id_user' => $this->session->userdata('id_user'),
				'no_transaksi' => $this->input->post('no_transaksi'),
				'tgl_transaksi' => $this->input->post('tgl_transaksi'),
				'no_anggota' => $this->input->post('no_anggota'),
				'no_reff' => $this->input->post('no_reff'),
				'tgl_input' => date('Y-m-d H:i:s'),
				'jenis_saldo' => $this->input->post('jenis_saldo'),
				'saldo' => $this->input->post('saldo'),
				'status' => 'sukarela',
				'keterangan' => 'Simpanan Sukarela',
			);
			$this->m_transaksi->update($data);
			$this->session->set_flashdata('pesan', 'data transaksi berhasil diubah');
			redirect('simpanan/sukarela');
		}
		$data = array(
			'title' => 'Update Simpanan sukarela',
			'akun' => $this->m_akun->akun(),
			'anggota' => $this->m_akun->anggota(),
			'transaksi' => $this->m_transaksi->transaksiedit($id_transaksi),
			'isi' => 'frontend/transaksi/sukarela/v_edit'
		);
		$this->load->view('frontend/v_wrapper', $data, FALSE);
	}
	//Delete one item
	public function delete_sukarela($id_transaksi = NULL)
	{
		$data = array(
			'id_transaksi' => $id_transaksi,
		);
		$this->m_transaksi->delete($data);
		$this->session->set_flashdata('pesan', 'data transaksi berhasil dihapus');
		redirect('simpanan/sukarela');
	}
}

/* End of file Akun.php */
